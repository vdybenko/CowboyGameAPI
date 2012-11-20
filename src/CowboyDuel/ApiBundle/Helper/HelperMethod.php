<?php
namespace CowboyDuel\ApiBundle\Helper;

use CowboyDuel\ApiBundle\Libraries\S3;

use CowboyDuel\ApiBundle\Helper\HelperQueryHolds,
	CowboyDuel\ApiBundle\Helper\HelperQueryStore;

class HelperMethod 
{
	private $container;
	
	public function __construct($_container)
	{
		$this->container = $_container;
	}
	
	public function sendStatS3($file_upload, $uri, $data)
	{	
		S3::$use_ssl =  $this->container->getParameter('S3_use_ssl');
		S3::setAuth($this->container->getParameter('S3_access_key'), $this->container->getParameter('S3_secret_key'));
		
		file_put_contents($file_upload, $data);
		
		// List Buckets
		//var_dump($this->s3->listBuckets());
		$bucket = "bidoncd";
		S3::putObject(S3::inputFile($file_upload), 
					  $bucket, 
					  $uri, S3::ACL_PUBLIC_READ);
	}
	
	public function deleteElmInMas($m, $unsetStr)
	{	
		$newM = array();
  		foreach ($m as $ki => $vi)
  		{  			
   			for($i = 0; $i < count($unsetStr); $i++)   		
   			  unset($vi[$unsetStr[$i]]);   			
       		$newM[] = $vi;
  		}		
		
		return $newM;
	}
	
	public function replaceKeyInMas($m, $str)
	{		
		$newM = array();
		foreach ($m as $ki => $vi)
		{
			$newR = array();
			foreach ($vi as $kj => $vj)				 
				$newR[str_replace($str, '', $kj)] = $vj;				
			$newM[] = $newR;		
		}
		
		return $newM;
	}
	
	public function sendBotListToS3($em)
	{		
		$queryHolds = new HelperQueryHolds($em);
		$queryHoldsStore = new HelperQueryStore($em);
		
		$bots = $queryHolds->getUserData(array('snetwork' => 'B'));
		
		for($i = 0; $i < count($bots); $i++)
		{
			$bots[$i]['weapons']  = $queryHoldsStore->getLastBuyItemStore($bots[$i]['authen'], 'weapons');
			$bots[$i]['defenses'] = $queryHoldsStore->getLastBuyItemStore($bots[$i]['authen'], 'defenses');
		}
		$entitiesJson = json_encode($bots);
		
		$this->sendStatS3($this->container->getParameter('S3_bot_file_upload'),
						  $this->container->getParameter('S3_bot_uri')
						  .$this->container->getParameter('S3_type_file'),
						  $entitiesJson);
		return $entitiesJson;
	}
}
