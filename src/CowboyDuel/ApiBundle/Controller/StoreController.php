<?php

namespace CowboyDuel\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
	Symfony\Component\HttpFoundation\Response;

use CowboyDuel\ApiBundle\Helper\HelperQueryHolds,
	CowboyDuel\ApiBundle\Helper\HelperTransactionsHolds,
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
    	
    	$v_of_store_list = $queryHolds->getSettings('versionListOfStoreItems')->getValue();
    	
    	$store['weapons'] = $queryHolds->getStoreItems("weapons");
    	$store['defenses'] = $queryHolds->getStoreItems("defenses");
    	
    	$storeJson = json_encode($store);
    	 
    	$helperMethod = new HelperMethod($this->container);
    	$helperMethod->sendStatS3($this->container->getParameter('S3_listOfStoreItems_file_upload'),
    							  'v_'.$v_of_store_list.'_'.$this->container->getParameter('S3_listOfStoreItems_uri'),
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
    		$queryHolds = new HelperQueryHolds($em);    		
    		$transactionsHolds = new HelperTransactionsHolds($em);
    	
    		$queryHolds->setBuyItemStore($authen, $itemId, $transactionsId);
    		    		
    		$responseDate = array("err_code" => (int) 1, "err_description" => 'Ok');
    	}
    	
    	return new Response(json_encode($responseDate));
    }    
}
