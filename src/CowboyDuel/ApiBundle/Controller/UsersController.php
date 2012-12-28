<?php

namespace CowboyDuel\ApiBundle\Controller;

use CowboyDuel\ApiBundle\Helper\HelperQueryHolds,
	CowboyDuel\ApiBundle\Helper\HelperQueryStore,
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
    	$helperMethod = new HelperMethod($this->container);
    	
    	$entitiesJson = $helperMethod->sendBotListToS3($em);
    	 
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
    		$queryHoldsStore = new HelperQueryStore($em);
    
    		$responseDate = $queryHolds->getUserData(array('authen' => $authen));    		

    		$responseDate['weapons'] = $queryHoldsStore->getLastBuyItemStore($authen, 'weapons');
    		$responseDate['defenses'] = $queryHoldsStore->getLastBuyItemStore($authen, 'defenses');
    	}
    
    	return new Response(json_encode($responseDate));   
    }
    
    /**
     * @Route("/set_user_data", name="user_user_data")
     */
    public function setUserDataAction()
    {
    	$request = $this->getRequest()->request;
    	$authen  = $request->get('authentification');
    	$level 	 = $request->get('level');
    	$points  = $request->get('points');
    	$duels_win 	= $request->get('duels_win');
    	$duels_lost = $request->get('duels_lost');
    	$bigest_win = $request->get('bigest_win');
    
    	if ($authen == null)
    	{
    		$responseDate = array("err_code" => (int) 4, "err_description" => 'Invalid value');
    	}
    	else
    	{
    		$em = $this->getDoctrine()->getEntityManager();
    		$queryHolds = new HelperQueryHolds($em);    		
    		
    		if($queryHolds == null) 
    			$responseDate = array("err_code" => (int) 4, "err_description" => 'Invalid value');
    		
    		$result = $queryHolds->setUserData($authen, $level, $points, $duels_win, $duels_lost, $bigest_win);    	

    		$responseDate = array("err_code" => (int) 1, "err_description" => 'Ok');
    	}
    
    	return new Response(json_encode($responseDate));
    }
    
    /**
     * @Route("/add_to_favorites", name="user_add_to_favorites")
     */
    public function addToFavoritesAction()
    {
    	$request 		 = $this->getRequest()->request;
    	$user_authen  		 = $request->get('user_authen');
    	$favorite_authen = $request->get('favorite_authen');
    	$session_id   	 = $request->get('session_id');
    	
    	if ($user_authen == null)
    	{
    		$responseDate = array("err_code" => (int) 4, "err_description" => 'Invalid value');
    	}
    	else
    	{
    		$em = $this->getDoctrine()->getEntityManager();
    		$queryHolds = new HelperQueryHolds($em);    		    		
    		
    		if($queryHolds == null)
    			$responseDate = array("err_code" => (int) 4, "err_description" => 'Not found entity');
    	
    		$result = $queryHolds->addToFavorites($user_authen, $favorite_authen);

    		$responseDate = array("err_code" => (int) 4, "err_description" => $e->getMessage());    		   		
    	}
    	
    	return new Response(json_encode($responseDate));    	
    }
}
