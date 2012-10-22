<?php

namespace CowboyDuel\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
	Symfony\Component\HttpFoundation\Response;

use CowboyDuel\ApiBundle\Helper\HelperQueryHolds,
	CowboyDuel\ApiBundle\Helper\HelperMethod;

class StoreController extends Controller
{
    /**
     * @Route("/store")
     */
    public function indexAction()
    {
        return new Response("Store");
    }
    
    /**
     * @Route("/listOfStoreItems.json", name="store_list_items")
     */
    public function listOfStoreItemsAction()
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	$queryHolds = new HelperQueryHolds($em);
    	
    	$store['w'] = $queryHolds->getStoreItems("weapons");
    	$store['d'] = $queryHolds->getStoreItems("defenses");
    	
    	$storeJson = json_encode($store);
    	 
    	$helperMethod = new HelperMethod($this->container);
    	$helperMethod->sendStatS3($this->container->getParameter('S3_listOfStoreItems_file_upload'),
    							  $this->container->getParameter('S3_listOfStoreItems_uri'),
    							  $storeJson);
    	
    	return new Response($storeJson);
    }
}
