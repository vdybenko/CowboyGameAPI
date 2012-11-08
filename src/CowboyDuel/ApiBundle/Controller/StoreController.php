<?php

namespace CowboyDuel\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
	Symfony\Component\HttpFoundation\Response,
	JMS\SecurityExtraBundle\Annotation\Secure;

use CowboyDuel\ApiBundle\Helper\HelperQueryHolds,
	CowboyDuel\ApiBundle\Helper\HelperQueryStore,
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
     * @Route("/listOfStoreItems.json", name="store_list_items_json")
     */
    public function listOfStoreItemsAction()
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	$queryHolds = new HelperQueryHolds($em);
    	$queryStore = new HelperQueryStore($em);
    	$helperMethod = new HelperMethod($this->container);
    	
    	$program_version = $queryHolds->getSettings('program_version')->getValue();
    	
    	$storeRetina['weapons'] = $store['weapons']  = $queryStore->getStoreItems("weapons");
    	$storeRetina['defenses'] = $store['defenses'] = $queryStore->getStoreItems("defenses");
    	    	
    	
    	$store['weapons'] = $helperMethod->deleteElmInMas($store['weapons'],
    						 array(0 => 'thumbRetina',
    							   1 => 'imgRetina',
    							   2 => 'bigImgRetina' ));
    	$store['defenses'] = $helperMethod->deleteElmInMas($store['weapons'],
    						  array(0 => 'thumbRetina',
    							    1 => 'imgRetina',));
    	
    	$storeRetina['weapons'] = $helperMethod->deleteElmInMas($storeRetina['weapons'],
    								array(0 => 'thumb',
    									  1 => 'img',
    									  2 => 'bigImg' ));
    	$storeRetina['defenses'] = $helperMethod->deleteElmInMas($storeRetina['weapons'],
    								array(0 => 'thumb',
    									  1 => 'img',));
    	
    	$storeJson = json_encode($store);    	
    	$storeRetinaJson = json_encode($storeRetina);    	    	
    	
    	$helperMethod->sendStatS3($this->container->getParameter('S3_listOfStoreItems_file_upload'),
    							  $this->container->getParameter('S3_listOfStoreItems_uri')
    							  .'_v'.$program_version.$this->container->getParameter('S3_type_file'),
    							  $storeJson);
    	$helperMethod->sendStatS3($this->container->getParameter('S3_listOfStoreItemsRetina_file_upload'),
    							  $this->container->getParameter('S3_listOfStoreItemsRetina_uri')
    							  .'_v'.$program_version.$this->container->getParameter('S3_type_file'),
    							  $storeRetinaJson);
    	
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
