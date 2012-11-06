<?php
namespace CowboyDuel\ApiBundle\Listener;

use Doctrine\Common\Annotations\Reader,
 	Symfony\Component\HttpKernel\Event\FilterControllerEvent,
	Symfony\Component\HttpFoundation\Response,
	Doctrine\ORM\EntityManager;

use CowboyDuel\ApiBundle\Helper\HelperQueryHolds,
	CowboyDuel\ApiBundle\Helper\HelperMethod;

class UpdateWithTimeListener
{
	protected $em;
	protected $container;
	
	public function __construct($_container, EntityManager $entityManager)
	{
		$this->em = $entityManager;
		$this->container = $_container;
	}
	
    public function onKernelController(FilterControllerEvent $event)
    {
    	$queryHolds = new HelperQueryHolds($this->em);
    	
    	$query = $this->em->getRepository('CowboyDuelApiBundle:Settings')->findAll();    	
    	
    	if($query[0]->getValue() + $query[1]->getValue() * 3600 < time())
    	{
    		$entitiesJson = json_encode($queryHolds->get_top_users());
    		 
    		$helperMethod = new HelperMethod($this->container);
    		$helperMethod->sendStatS3($this->container->getParameter('S3_topBoard_file_upload'),
    							  	  $this->container->getParameter('S3_topBoard_uri')
    							  	  .$this->container->getParameter('S3_type_file'),
    							  	  $entitiesJson);    		
    		$queryHolds->setSettings('timeLastRefresh',time());
    	}
    }
}