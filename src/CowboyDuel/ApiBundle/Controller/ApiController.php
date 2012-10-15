<?php

namespace CowboyDuel\ApiBundle\Controller;

use CowboyDuel\ApiBundle\Entity\Users;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
	Symfony\Component\HttpFoundation\Response;

use CowboyDuel\ApiBundle\Helper\HelperQueryHolds;

/**
 * @Route("/api")
 */
class ApiController extends Controller
{
    /**
     * @Route("/")
     * 
     */
    public function indexAction()
    {
       return new Response("Api");
    }
    
    /**
     * @Route("/authorization")
     */
    public function authorizationAction()
    {
    	$request = $this->getRequest()->request;   	
    	$authen = $request->get('id');    	
    	$session_id = uniqid();
    	
    	$em = $this->getDoctrine()->getEntityManager();
    	$queryHolds = new HelperQueryHolds($em);    	 
    	
    	if ($authen == null)
    	{
    		$responseDate['err_code'] = (int) - 4;
    		$responseDate['err_description'] = 'Invalid value';    		
    	}
    	else 
    	{    	
    		$queryHolds->update_session($authen, $session_id);
    		$onlineExist = $queryHolds->getAuthenOnline($authen);
    	
    		if(empty($onlineExist))
    		{
    			$queryHolds->setAuthenOnline($authen, time());    			
    		}
    		 else
    		{
    			$queryHolds->updateAuthenOnline($authen, 'in', time(), 1);
    		}
    	    	
    		$responseDate = array("err_code" => (int) 1, "err_description" => 'Ok') ;
    		$refresh_content = $queryHolds->get_refresh_content();
    		$responseDate['refresh_content'] = $refresh_content[0]->getRefreshContent();
    		$responseDate['session_id'] = $session_id;
    	}
    	
    	return new Response(json_encode($responseDate));
    }
    
    /**
     * @Route("/registration", name="api_registration")
     */
    public function registrationAction()
    {
    	$request = $this->getRequest()->request;
    	
    	$authen = $request->get('authentification');    	
    	if ($request->get('authen_old')) $authen_old = $this->post('authen_old'); 
    	  else $authen_old = null;
    	      	
    	$auth_key = $request->get('auth_key');    	
    	$app_ver  = $request->get('app_ver');
    	$os 	  = $request->get('os');
    	
    	$device_name = $request->get('device_name');
    	$region 	 = $request->get('region');
    	
    	$current_language = $request->get('current_language');
    	$nickname 	= $request->get('nickname');
    	$avatar   	= $request->get('avatar');
    	$age 	    = $request->get('age');
    	$home_town 	= $request->get('home_town');
    	$friends   	= $request->get('friends');
    	$facebook_name = $request->get('facebook_name');
    	
    	$level 		= $request->get('level');
    	$points 	= $request->get('points');
    	$duels_win 	= $request->get('duels_win');
    	$duels_lost = $request->get('duels_lost');
    	$bigest_win = $request->get('bigest_win');
    	$remove_ads = $request->get('remove_ads');
    	
    	/*$money 		= $request->get('money'); 
    	$device_token 	= $request->get('device_token');
    	$type 	= $request->get('type');*/
    	
    	if ($authen == null)
    	{
    		$responseDate['err_code'] = (int) - 4;
    		$responseDate['err_description'] = 'Invalid value';
    		return new Response(json_encode($responseDate));
    	}
    	
    	$em = $this->getDoctrine()->getEntityManager();
    	$queryHolds = new HelperQueryHolds($em);
    	
    	$session_id = uniqid();
    	
    	if($authen_old == $authen) $change_nick = true;
    	
    	$word = strtoupper($authen{0});
    	$word_old = strtoupper($authen_old{0});
    	
    	if(($word == 'F' ) && ($word_old == 'A' ))
    	{    			
    		$user_info = $queryHolds->getUserWithAuthenOld($authen, null);
    		
    		if (empty($user_info['session_id']) && (!empty($authen_old)))
    		{    			
    			$user_info = $queryHolds->getUserWithAuthenOld($authen, $authen_old);
    			
    			$money 	= $user_info['money'];
    			$points = $user_info['points'];
    			$level	= $user_info['level'];
    			
    			$duels_win	= $user_info['duels_win'];
    			$duels_lost = $user_info['duels_lost'];
    			$bigest_win	= $user_info['bigest_win'];    				
    			$device_token = $user_info['device_token'];
    			
    			$type 	= $user_info['type'];
    			$region = $user_info['region'];
    			
    			//update info
    			$snetwork='F';
    			$queryHolds->setUser($authen, $device_token, $app_ver, $device_name, $nickname, $type, $os,$region,
    								 $current_language, $level,$points, $money,$duels_win, $duels_lost, $bigest_win,
    								 $remove_ads, $avatar, $age,$home_town, $friends, $facebook_name, $snetwork);
    			//update session    			
    			$queryHolds->update_session($authen, $session_id);
    			
    			$user_achivments = $this->musers->get_achivments($authen);
    			foreach($user_achivments as $achivment)
    			{
    				$response['achivments'][] =$achivment['achivment_id'];
    			}
    				
    			//перевірить чи можливо потім прибрати
    			$responseDate = array('session_id' => $session_id, 'level' => $level, 'name' => $nickname, 'points' => $points,
    							      'money' => $money, 'duels_win' => $duels_win, 'duels_lost' => $duels_lost, 
    							      'bigest_win' => $bigest_win, 'remove_ads' => $remove_ads, 'avatar' => $avatar,
    		   					      'age' => $age, 'home_town' => $home_town, 'friends'=> $friends, 
    		   					  	  'facebook_name' => $facebook_name
    		   					 	 );
    			
    			return new Response(json_encode($responseDate));
    		}
    		 else
    		{
    			if (isset($authen))	$authen_old = null;
    			$user_info = $queryHolds->getUser($authen, $authen_old);
    		}
    	}
    	 else
    	{
    		if (isset($authen))	$authen_old = null;
    		$user_info = $queryHolds->getUser($authen, $authen_old);
    	}
    	
    	$responseDate = array('session_id' => $session_id, 'level' => $level, 'name' => $nickname, 'points' => $points,
    						  'money' => $money, 'duels_win' => $duels_win, 'duels_lost' => $duels_lost, 
    						  'bigest_win' => $bigest_win, 'remove_ads' => $remove_ads, 'avatar' => $avatar,
    		   				  'age' => $age, 'home_town' => $home_town, 'friends'=> $friends, 
    		   				  'facebook_name' => $facebook_name
    		   				 );
    	
    	
    		
    	return new Response(json_encode($responseDate));
    }
    
}
