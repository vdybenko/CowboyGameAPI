<?php
namespace CowboyDuel\ApiBundle\Helper;

use CowboyDuel\ApiBundle\Libraries\S3;

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
		
		file_put_contents($file_upload, $data, FILE_APPEND);
		
		// List Buckets
		//var_dump($this->s3->listBuckets());
		$bucket = "bidoncd";
		S3::putObject(S3::inputFile($file_upload), 
					  $bucket, 
					  $uri, S3::ACL_PUBLIC_READ);
	}
}
