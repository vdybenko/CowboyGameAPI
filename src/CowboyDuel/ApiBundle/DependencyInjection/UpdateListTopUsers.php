<?php
namespace CowboyDuel\ApiBundle\DependencyInjection;

use Symfony\Component\DependencyInjection,
	Doctrine\ORM\EntityManager;

use CowboyDuel\ApiBundle\Helper\HelperQueryHolds,
	CowboyDuel\ApiBundle\Helper\HelperMethod;

class UpdateListTopUsers
{
	protected $em;
	protected $container;
	
	public function __construct($_container, EntityManager $entityManager)
	{
		$this->em = $entityManager;
		$this->container = $_container;
	}
	
    public function update()
    {
    	$queryHolds = new HelperQueryHolds($this->em);    	
    	$entitiesJson = json_encode($queryHolds->get_top_users());
    	
    	$env = $this->container->get('kernel')->getEnvironment();
    	 
    	$wayStr = '';
    	if($env != 'prod')    		
    		$wayStr = 'web/';    	 
    	
    	$helperMethod = new HelperMethod($this->container);
    	$helperMethod->sendStatS3($wayStr.$this->container->getParameter('S3_topBoard_file_upload'),
    							  $this->container->getParameter('S3_topBoard_uri')
    							  .$this->container->getParameter('S3_type_file'),
    							  $entitiesJson);  		
    	$queryHolds->setSettings('timeLastRefresh',time());    
    	
    	$queryHolds = new HelperQueryHolds($this->em);
    	 
    	$entitiesJson = json_encode($queryHolds->get_top_users());
    }
}