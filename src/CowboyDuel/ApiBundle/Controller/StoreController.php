<?php

namespace CowboyDuel\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
	Symfony\Component\HttpFoundation\Response,
	JMS\SecurityExtraBundle\Annotation\Secure;

use CowboyDuel\ApiBundle\Helper\HelperQueryHolds,
	CowboyDuel\AdminBundle\Helper\HelperQueryStore,
	CowboyDuel\ApiBundle\Helper\HelperMethod;

/**
 * @Route("/store")
 */
class StoreController extends Controller
{
    /**
     * @Route("/")
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
    	$queryStore = new HelperQueryStore($em);
    	
    	$program_version = $queryHolds->getSettings('program_version')->getValue();
    	
    	$store['weapons'] = $queryStore->getStoreItems("weapons");
    	$store['defenses'] = $queryStore->getStoreItems("defenses");
    	
    	$storeJson = json_encode($store);
    	
    	$helperMethod = new HelperMethod($this->container);
    	$helperMethod->sendStatS3($this->container->getParameter('S3_listOfStoreItems_file_upload'),
    							  $this->container->getParameter('S3_listOfStoreItems_uri')
    							  .'_v'.$program_version.$this->container->getParameter('S3_type_file'),
    							  $storeJson);
    	
    	return new Response($storeJson);
    }
    
    /**
     * @Route("/bought", name="store_bought")
     */
    public function boughtAction()
    {
    	$request = $this->getRequest()->request;
    	$authen = $request->get('authentification');
    	$itemId = $request->get('itemId');    	
    	$transactionsId = $request->get('transactionsId');
    	    	
    	if ($authen == null || $itemId == null || $transactionsId == null)
    	{
    		$responseDate['err_code'] = (int) - 4;
    		$responseDate['err_description'] = 'Invalid value';
    	}
    	else 
    	{    	
    		$em = $this->getDoctrine()->getEntityManager();
    		$queryStore = new HelperQueryStore($em);    		
    	
    		$queryHolds->setBuyItemStore($authen, $itemId, $transactionsId);
    		    		
    		$responseDate = array("err_code" => (int) 1, "err_description" => 'Ok');
    	}
    	
    	return new Response(json_encode($responseDate));
    }    
}
