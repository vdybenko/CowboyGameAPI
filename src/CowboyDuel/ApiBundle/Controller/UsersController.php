<?php

namespace CowboyDuel\ApiBundle\Controller;

use CowboyDuel\ApiBundle\Helper\HelperQueryHolds,
	CowboyDuel\ApiBundle\Helper\HelperMethod;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
	Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/users")
 */
class UsersController extends Controller
{
    /**
     * @Route("/")
     * 
     */
    public function indexAction()
    {
        return new Response("Users");
    }
    
    /**
     * @Route("/top_board.json", name="users_top_board_json")
     */
    public function top_boardAction()
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	$queryHolds = new HelperQueryHolds($em);
        	
    	$entitiesJson = json_encode($queryHolds->get_top_users());    
    	
    	$helperMethod = new HelperMethod($this->container);
    	$helperMethod->sendStatS3($this->container->getParameter('S3_topBoard_file_upload'),
    							  $this->container->getParameter('S3_topBoard_uri')
    							  .$this->container->getParameter('S3_type_file'),
    							  $entitiesJson);   		
    	$queryHolds->setSettings('timeLastRefresh',time());
    	
    	return new Response($entitiesJson);
    }
    
    /**
     * @Route("/bot.json", name="users_bot_json")
     */
    public function botJsonAction()
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	$queryHolds = new HelperQueryHolds($em);
    	 
    	$entitiesJson = json_encode($queryHolds->getBot());
    	 
    	$helperMethod = new HelperMethod($this->container);
    	$helperMethod->sendStatS3($this->container->getParameter('S3_bot_file_upload'),
    							  $this->container->getParameter('S3_bot_uri')
    							  .$this->container->getParameter('S3_type_file'),
    							  $entitiesJson);
    	
    	//$queryHolds->setSettings('timeLastRefresh',time());
    	 
    	return new Response($entitiesJson);
    }
    
    /**
     * @Route("/top_rank_on_interspace", name="users_top_rank_on_interspace")
     */
    public function topRankOnInterspaceAction()
    {
    	$request = $this->getRequest()->request;
    	$em = $this->getDoctrine()->getEntityManager();
    	$queryHolds = new HelperQueryHolds($em);    	   	
    	
    	$authen = $request->get('authentification');    	
    	$entities = $queryHolds->get_my_rank_on_interspace($authen);
    	
    	if ($entities == null)
    	{
    		$responseDate['err_code'] = (int) - 4;
    		$responseDate['err_description'] = 'Invalid value';    	
    	}
    	 else { $responseDate = $entities; }    	
    	    	
    	return new Response(json_encode($responseDate));
    }
    
    /**
     * @Route("/get_user_data", name="user_get_data")
     */
    public function getUserDataAction()
    {
    	$request = $this->getRequest()->request;
    	$authen = $request->get('authentification');
    
    	if ($authen == null)
    	{
    		$responseDate['err_code'] = (int) - 4;
    		$responseDate['err_description'] = 'Invalid value';
    	}
    	else
    	{
    		$em = $this->getDoctrine()->getEntityManager();
    		$queryHolds = new HelperQueryHolds($em);
    
    		$responseDate = $queryHolds->getUserData($authen);  

    		$responseDate['weapons'] = $queryHolds->getLastBuyItemStore($authen, 'weapons');
    		$responseDate['defenses'] = $queryHolds->getLastBuyItemStore($authen, 'defenses');
    	}
    
    	return new Response(json_encode($responseDate));
    
    }
}
