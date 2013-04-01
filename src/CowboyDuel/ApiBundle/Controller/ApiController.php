<?php

namespace CowboyDuel\ApiBundle\Controller;

use CowboyDuel\ApiBundle\Libraries\PushNotifications;

use CowboyDuel\ApiBundle\Entity\Users;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
	Symfony\Component\HttpFoundation\Response;

use CowboyDuel\ApiBundle\Helper\HelperQueryHolds,
	CowboyDuel\ApiBundle\Helper\HelperTransactionsHolds,
	CowboyDuel\ApiBundle\Helper\HelperMethod;

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
    	$em = $this->getDoctrine()->getEntityManager();
    	$queryHolds = new HelperQueryHolds($em);

        $user = $queryHolds->getUser('test_push');
        $pushNotifications = new PushNotifications($this->container);
        $pushNotifications->send($user->getDeviceToken(), 'Hello! Test push.');

        $pushNotifications->closeConnection();
    	
        return new Response("Api");
    }
    
    /**
     * @Route("/authorization", name="api_authorization")
     */
    public function authorizationAction()
    {
    	$request = $this->getRequest()->request;   	
    	$authen = $request->get('id');    	
    	$session_id = uniqid();
    	
    	$em = $this->getDoctrine()->getEntityManager();
    	$queryHolds = new HelperQueryHolds($em);
    	$helperMethod = new HelperMethod($this->container);
    	
    	if ($authen == null)
    	{
    		$responseDate['err_code'] = (int) - 4;
    		$responseDate['err_description'] = 'Invalid value';    		
    	}
    	else 
    	{    	
    		$queryHolds->update_session($authen, $session_id);
    		$onlineExist = $queryHolds->getAuthenOnline($authen);
    		
    		$helperMethod->sendPushUsersFavorites($authen, $queryHolds);
    	
    		if(empty($onlineExist))
    			$queryHolds->setAuthenOnline($authen, time());    		
    		 else
    			$queryHolds->updateAuthenOnline($authen, 'in', time(), 1);
    	    	
    		$responseDate = array("err_code" => (int) 1, "err_description" => 'Ok');
    		$responseDate['refresh_content'] = $queryHolds->getSettings('refresh_content')->getValue();
    		$responseDate['session_id'] = $session_id;
    		$responseDate['v_of_store_list'] =  $queryHolds->getSettings('versionListOfStoreItems')->getValue();
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
    	if ($request->get('authen_old')) $authen_old = $request->get('authen_old'); 
    	  else $authen_old = null;
    	      	
    	$auth_key = $request->get('auth_key');    	
    	$app_ver  = $request->get('app_ver');
    	$os 	  = $request->get('os');
    	
    	$device_token = $request->get('device_token');
    	$device_name  = $request->get('device_name');
    	$region 	  = $request->get('region');
    	
    	$current_language = $request->get('current_language');
    	$nickname 	= $request->get('nickname');
    	$avatar   	= $request->get('avatar');
    	$age 	    = $request->get('age');
    	$home_town 	= $request->get('home_town');
    	$friends   	= $request->get('friends');
    	$identifier = $request->get('identifier');
    	
    	$level 		= $request->get('level');
    	$points 	= $request->get('points');
    	$duels_win 	= $request->get('duels_win');
    	$duels_lost = $request->get('duels_lost');
    	$bigest_win = $request->get('bigest_win');
    	$remove_ads = $request->get('remove_ads');
    	
    	/*$money 		= $request->get('money');
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
    	
    	if(($word == 'F' ||  $word == 'E') && ($word_old == 'A' ))
    	{    			
    		$user_info = $queryHolds->getUserWithAuthenOld($authen, $authen_old);    		
    		if ($user_info != null && $authen_old != null)
    		{   			
    			$money 	= $user_info->getMoney();
				$points	= $user_info->getPoints();
				$level	= $user_info->getLevel();
    			
    			$duels_win 	= $user_info->getDuelsWin();
				$duels_lost = $user_info->getDuelsLost();
				$bigest_win = $user_info->getBigestWin();
				$device_token = $user_info->getDeviceToken();
    			
    			$type 	= $user_info->getType();
    			$region = $user_info->getRegion();;
    			
    			//update info
    			$snetwork = $word;
    			$queryHolds->setUserInfo($authen, $authen_old, $app_ver, $device_name, $device_token, $nickname, $type, $os,$region,
    								     $current_language, $level,$points, $money,$duels_win, $duels_lost, $bigest_win,
    								 	 $remove_ads, $avatar, $age,$home_town, $friends, $identifier, $snetwork);
    			//update session    			
    			$queryHolds->update_session($authen, $session_id);
    			
    			$responseDate = array('session_id' => $session_id, 'level' => $level, 'name' => $nickname, 'points' => $points,
    							      'money' => $money, 'duels_win' => $duels_win, 'duels_lost' => $duels_lost, 
    							      'bigest_win' => $bigest_win, 'remove_ads' => $remove_ads, 'avatar' => $avatar,
    		   					      'age' => $age, 'home_town' => $home_town, 'friends'=> $friends, 
    		   					  	  'identifier' => $identifier
    		   					 	 );  			
    			return new Response(json_encode($responseDate));
    		}
    		 else
    		{
    			if (isset($authen))	$authen_old = null;
    			$user_info = $queryHolds->getUserWithAuthenOld($authen, $authen_old);
    		}
    	}
    	 else
    	{
    		if (isset($authen))	$authen_old = null;
    		$user_info = $queryHolds->getUserWithAuthenOld($authen, $authen_old);
    	}
    	
    	if (!isset($session_id))
    	{
    		if (empty($user_info['session_id']))
    		{
    			$session_id = uniqid();
    		}
    		else
    		{
    			$session_id = $user_info['session_id'];    	
    		}    		
    	} 	
    	
    	if(empty($user_info))
    	{    			
    		$money = 200; $points = 0; $duels_win = 0; $duels_lost = 0; $bigest_win = 0;
    		$word = strtoupper($authen{0});
    		
    		if ($word == 'F' || $word == 'E' ) { $snetwork = $word;}
    		 else { $snetwork = '0'; }    	
    	
    		$queryHolds->setUser($authen, $app_ver, $device_name, $device_token, $nickname, $os, $region,
    		 					 $current_language, $level,$points, $money,$duels_win, $duels_lost, $bigest_win,
    		 					 $remove_ads, $avatar, $age,$home_town, $friends, $identifier, $snetwork);    	
    	}
    	else
    	{    	
    		$money 	= $user_info->getMoney();
			$points	= $user_info->getPoints();
			$level	= $user_info->getLevel();
			$duels_win 	= $user_info->getDuelsWin();
			$duels_lost = $user_info->getDuelsLost();
			$bigest_win = $user_info->getBigestWin();
			$device_token = $user_info->getDeviceToken();
			$device_name  = $user_info->getDeviceName();
			$app_ver = $user_info->getAppVer();
			$type 	 = $user_info->getType();
			$os 	 = $user_info->getOs();
			$region  = $user_info->getRegion();
			$current_language = $user_info->getCurrentLanguage();
			$nickname 	= $user_info->getNickname();
			$remove_ads = $user_info->getRemoveAds();
			$avatar 	= $user_info->getAge();
			$age 		= $user_info->getAge();
			$home_town  = $user_info->getHomeTown();
			$friends	= $user_info->getFriends();
			$identifier = $user_info->getIdentifier();
    		
    		if (isset($change_nick))
    		{
    			$authen = $request->get('authentification');
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
    			$identifier = $request->get('identifier');
    			 
    			$level 		= $request->get('level');
    			$points 	= $request->get('points');
    			$duels_win 	= $request->get('duels_win');
    			$duels_lost = $request->get('duels_lost');
    			$bigest_win = $request->get('bigest_win');
    			$remove_ads = $request->get('remove_ads');
    		
    			$word = strtoupper($authen{0});
    			if ($word == 'F' || $word == 'E' ) { $snetwork = $word;}
    		 	 else { $snetwork = '0'; }
    		
    			$queryHolds->setUserInfo($authen, $authen_old, $app_ver, $device_name, $device_token, $nickname, $type, $os,$region,
    			 						 $current_language, $level,$points, $money,$duels_win, $duels_lost, $bigest_win,
    			 						 $remove_ads, $avatar, $age,$home_town, $friends, $identifier, $snetwork);
    		}
    	
    	}
    	$queryHolds->update_session($authen, $session_id);
    	$responseDate = array("err_code" => (int) 1, "err_description" => 'Ok');    	
    	$responseDate += array('session_id' => $session_id, 'avatar' => $avatar, 'level' => $level, 'name' => $nickname,
    						  'points' => $points, 'money' => $money, 'duels_win' => $duels_win, 'duels_lost' => $duels_lost, 
    						  'bigest_win' => $bigest_win, 'remove_ads' => $remove_ads
    		   				 );    		
    	return new Response(json_encode($responseDate));
    }
    
    /**
     * @Route("/duels", name="api_duels")
     */
    public function duelsAction()
    {
    	$request = $this->getRequest()->request;
    	
    	$duels 		= $request->get('duels');
    	$authen 	= $request->get('authentification');
    	$app_ver 	= $request->get('app_ver');
    	$session_id = $request->get('session_id');    		
    	$device_name	= $request->get('device_name');
    	$system_name 	= $request->get('system_name');
    	$system_version = $request->get('system_version');
    	
    	$duels_obj = json_decode($duels);
    	
    	if ($authen == null)
    	{
    		$responseDate['err_code'] = (int) - 4;
    		$responseDate['err_description'] = 'Invalid value';
    		return new Response(json_encode($responseDate));
    	}
    	
    	$em = $this->getDoctrine()->getEntityManager();
    	$queryHolds = new HelperQueryHolds($em);
    	
    	$user_info = $queryHolds->getUser($authen);
    	$user_info = $user_info[0];
    	
    	print_r($duels_obj);
    	
    	if ($session_id == $user_info->getSessionId())
    	{
    		if(isset($duels_obj->{'duels'}))
    		{
    			foreach($duels_obj->{'duels'} as $duel)
    			{
    				if(isset($duel->{'duel'}))    					
    					$queryHolds->setDuels
    					(
    						$authen,
    						$device_name,
    						$system_name,
    						$system_version,
    						$duel->{'duel'}->{'rate_fire'},
    						$duel->{'duel'}->{'opponent'},
    						$duel->{'duel'}->{'GPS'},
    						$duel->{'duel'}->{'lat'},
    						$duel->{'duel'}->{'lon'},
    						$duel->{'duel'}->{'date'}
    					);
    			}
    		}
    		$responseData = array("err_code"=>(int)1,"err_desc"=>'Спасибо за письмо') ;
    	}
    	 else
    	{
    		$responseData = array("err_code" => (int)-1,"err_desc"=>'Сессия устарела. Авторизируйтесь') ;
    	}
    	
    	return new Response(json_encode($responseData));
    }
    
    /**
     * @Route("/transactions", name="api_transactions")
     */
    public function transactionsAction()
    {
    	$request = $this->getRequest()->request;
    	
    	$authen 	  	 = $request->get('authentification');
    	$session_id   	 = $request->get('session_id');    	
    	$transactions 	 = $request->get('transactions');
    	
    	if ($authen == null)
    	{
    		$responseDate['err_code'] = (int) - 4;
    		$responseDate['err_description'] = 'Invalid value';
    		return new Response(json_encode($responseDate));
    	}
    	
    	$secure_value = substr($session_id, 0, 2);
    	$s = array();
    	
    	for ($i = 0; $i < strlen($secure_value); $i++)
    	{
    		$s[] = ord($secure_value[$i]);
    	}
    	
    	$secure_value = implode('', $s);
    	settype($secure_value, "int");
    	
    	$transactions_obj = json_decode($transactions);
    	
    	$em = $this->getDoctrine()->getEntityManager();
    	$queryHolds = new HelperQueryHolds($em);
    	$transactionsHolds = new HelperTransactionsHolds($em);
    	
    	$user_info = $queryHolds->getUser($authen);
    	
    	if ($user_info == null)
    	{
    		$responseDate['err_code'] = (int) - 5;
    		$responseDate['err_description'] = 'Entity not found';
    		return new Response(json_encode($responseDate));
    	}
    	   
    	$sum = $user_info->getMoney();
    	settype($sum, "int");
    	
    	// echo $authen.'##'.$session_id.'##',$user_info['session_id']; die;
    	if(isset($transactions_obj->{'transactions'}))
    	{    			
    		foreach($transactions_obj->{'transactions'} as $transaction)
    		{
    			/*$transaction->{'transaction'}->{'description'} = $transaction->{'transaction'}->{'description'}^$secure_value;    				
    			$transaction->{'transaction'}->{'opponent_authen'} = $transaction->{'transaction'}->{'opponent_authen'}^$secure_value;
    			$transaction->{'transaction'}->{'local_id'} = $transaction->{'transaction'}->{'local_id'}^$secure_value;*/		
    				
    			if($session_id == $user_info->getSessionId() || $user_info->getSnetwork() == 'B' 
    			  || $transaction->{'transaction'}->{'description'} == 'Steal')
    			{
    				if(!isset($transaction->{'transaction'}->{'transaction_id'}))
    					$transaction->{'transaction'}->{'transaction_id'} = 0;
    				
    				$transaction->{'transaction'}->{'transaction_id'} = $transaction->{'transaction'}->{'transaction_id'}^$secure_value;
    					
    				 $transactionsHolds->setTransaction($authen, 
    											   $transaction->{'transaction'}->{'transaction_id'}, 
    											   $transaction->{'transaction'}->{'description'},
    											   $transaction->{'transaction'}->{'opponent_authen'},
    											   $transaction->{'transaction'}->{'local_id'});
    				 	
    				 $sum = $sum + $transaction->{'transaction'}->{'transaction_id'};
    			}
    			else
    			{
    				$responseData = array("err_code" => (int) - 1, "err_desc" => 'Сессия устарела. Авторизируйтесь');
    				return new Response(json_encode($responseData));
    			}				
    		}
    	}
    			
    	$queryHolds->setUserMoney($authen, $sum);
    		
    	if($user_info->getSnetwork() == 'B')
    	{    			
    			$helperMethod = new HelperMethod($this->container);    			 
    			$entitiesJson = $helperMethod->sendBotListToS3($em);
    	}
    		
    	$sum = $sum ^ $secure_value;
    	$responseData['money'] = $sum;
    	$responseData['user_id'] = $authen;
    		
    	return new Response(json_encode($responseData));
    }
    
    /**
     * @Route("/push", name="api_push")
     */
    public function pushAction()
    {
    	$request = $this->getRequest()->request;    	 
    	$authen	 = $request->get('authen');
    	$type    = $request->get('type');
    	$message = $request->get('message');
    	 
    	if ($authen == null)
    	{
    		$responseDate = array('err_code' => (int) 4, 'err_descriptionє' => 'Invalid value');
    		return new Response(json_encode($responseDate));
    	}
    	$em = $this->getDoctrine()->getEntityManager();
    	$queryHolds = new HelperQueryHolds($em);
    	
    	$user = $queryHolds->getUser($authen);
    	if($user == null)
    	{
    		$responseDate = array("err_code" => (int) 3, "err_description" => 'Not found entity');
    		return new Response(json_encode($responseDate));
    	}
    	
    	$pushNotifications = new PushNotifications($this->container);
    	
		$pushNotifications->send($user->getDeviceToken(), $message, $user->getNickname(), $authen, $type);    	
    	$pushNotifications->closeConnection();
    	
    	$responseDate = array("err_code" => (int) 1, "err_description" => 'Ok');    	 
    	return new Response(json_encode($responseDate));
    }
    
}
