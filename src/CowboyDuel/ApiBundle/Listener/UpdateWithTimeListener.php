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
    	$content = $query[0];
    	
    	if($content->getTimeLastRefresh() + $content->getRefreshContent() * 3600 < time())
    	{
    		$entitiesJson = json_encode($queryHolds->get_top_users());
    		 
    		file_put_contents($this->container->getParameter('S3_file_upload'), $entitiesJson, FILE_APPEND);
    		
    		$helperMethod = new HelperMethod();
    		$helperMethod->sendStatS3($this->container);
    		
    		$queryHolds->setSettings_timeLastRefresh(time());
    	}
    }
}