<?php
namespace CowboyDuel\ApiBundle\Helper;

use CowboyDuel\ApiBundle\Entity\Online,
	CowboyDuel\ApiBundle\Entity\Users,
	CowboyDuel\ApiBundle\Entity\UsersFavorites;

class HelperQueryHolds extends HelperAbstractDb
{
	public function get_top_users()
	{		
		return $q = $this->em->createQuery('
				SELECT u.authen, u.nickname, u.money, u.level, u.points, u.avatar
				FROM CowboyDuelApiBundle:Users u
				ORDER BY u.money DESC				
			 ')->setMaxResults(100)
			   ->getResult();
	}
	
	/**
	 * Get bots
	 * @return CowboyDuel\ApiBundle\Entity\Users
	 */
	public function getBots()
	{		
		$q = $this->em->createQuery("
				SELECT u.authen AS authentification
				FROM CowboyDuelApiBundle:Users u
				WHERE u.snetwork = 'B'
			");
		return $q->getResult();
	}
	public function get_my_rank_on_interspace($authen)
	{
		if($authen == null) return null;
		$q = $this->em->createQuery('
			 SELECT u.authen, u.nickname, u.money, u.level, u.points, u.avatar
			 FROM CowboyDuelApiBundle:Users u								
			 ORDER BY u.money DESC			 
		 ')->getResult();
		
		foreach ($q as $key => $value) 
		{
			if($value['authen'] == $authen)
			{
				$my_id = $key;
				break;
			}
		}
		
		foreach ($q as $key => $value) 
		{
			if($key > $my_id - 10 && $key < $my_id + 10)
			{
				$value["rank"] = $key+1;
				$rank[] = $value;
			}
		}
		
		return $rank;
	}
	
	/**
	 * Get user
	 * @return CowboyDuel\ApiBundle\Entity\Users
	 */
	public function getUser($authen)
	{
		$q = $this->em->createQuery("
				SELECT u
				FROM CowboyDuelApiBundle:Users u
				WHERE u.authen='$authen'"
		);			
	    $e = $q->getResult();

		return  (isset($e[0]))? $e[0]: null;
	}
	
	public function getUserData($filters)
	{
		$select = "";
		$where = "";
		
		if(isset($filters['authen']))
			$where = "WHERE u.authen='".$filters['authen']."'";
		 else 
			$select = "u.authen,";		
		if(isset($filters['snetwork']))
			$where = "WHERE u.snetwork='".$filters['snetwork']."'";
					
		$q = $this->em->createQuery("
				SELECT $select u.userId AS user_id, u.nickname, u.money, u.sessionId AS session_id, u.level, u.points, 
					   u.duelsWin AS duels_win, u.duelsLost AS duels_lost, u.bigestWin AS bigest_win,
				       u.removeAds AS remove_ads, u.avatar, u.age, u.homeTown AS home_town, u.friends, 
					   u.identifier AS identifier, u.cap, u.head, u.body, u.lengths, u.shoes
				FROM CowboyDuelApiBundle:Users u
				$where"
		);
		$e = $q->getResult();
		 
		return (isset($e[0]) && isset($filters['authen']))? $e[0]: $e;	
	}
	
	public function setUserData($authen, $level, $points, $duels_win, $duels_lost, $bigest_win, $cap, $head, $body, $legs, $shoes)
	{
		$user = $this->getUser($authen);
		if($user == null) return 0;
		
		$user->setLevel($level)
			 ->setPoints($points)
			 ->setDuelsWin($duels_win)
			 ->setDuelsLost($duels_lost)
			 ->setBigestWin($bigest_win)
             ->setCap($cap)
             ->setHead($head)
             ->setBody($body)
             ->setLegs($legs)
             ->setShoes($shoes)
		;
		
		$this->em->persist($user);
		$this->em->flush();
		return 1;
	}
	
	public function getUserWithAuthenOld($authen, $authen_old)
	{
		if ($authen_old == null)  
			return $this->getUser($authen);
		 else 
		 	return $this->getUser($authen_old);	
	}
	
	public function setUser($authen, $app_ver, $device_name, $device_token, $nickname, $os, $region, $current_language,
							$level, $points, $money, $duels_win, $duels_lost, $bigest_win, $remove_ads, $avatar, $age,$home_town,
							$friends, $identifier, $snetwork, $cap, $head, $body, $legs, $shoes)
	{
		$user = new Users();
		
		$user
			 ->setAuthen($authen)
			 ->setNickname($nickname)
			 ->setAppVer($app_ver)
			 ->setDeviceName($device_name)
			 ->setDeviceToken($device_token)
			 ->setFirstLogin(time())
			 ->setMoney($money)
			 ->setOs($os)
			 ->setRegion($region)
			 ->setCurrentLanguage($current_language)
			 ->setLevel($level)
			 ->setPoints($points)
			 ->setDuelsWin($duels_win)
			 ->setDuelsLost($duels_lost)
			 ->setBigestWin($bigest_win)
			 ->setRemoveAds($remove_ads)
			 ->setAvatar($avatar)
			 ->setAge($age)
			 ->setHomeTown($home_town)
			 ->setFriends($friends)
			 ->setidentifier($identifier)
			 ->setSnetwork($snetwork)

             ->setCap($cap)
             ->setHead($head)
             ->setBody($body)
             ->setLegs($legs)
             ->setShoes($shoes)
			 
			 ->setLastLogin(time())
			 ->setType(0)
			 ->setDate(0)
			 ->setSessionId("")
		;

		$this->em->persist($user);
		$this->em->flush();
	}
	
	public function setUserInfo($authen, $authen_old, $app_ver, $device_name, $device_token, $nickname, $type, $os, $region,
								$current_language, $level, $points, $money, $duels_win, $duels_lost, $bigest_win, 
								$remove_ads, $avatar, $age, $home_town, $friends, $identifier, $snetwork, $cap, $head, $body, $legs, $shoes)
	{
		$user = $this->getUserWithAuthenOld($authen, $authen_old);
		
		if(!is_null($authen)) $user->setAuthen($authen);
		if(!is_null($nickname)) $user->setNickname($nickname);
		if(!is_null($app_ver)) $user->setAppVer($app_ver);
		if(!is_null($device_name)) $user->setDeviceName($device_name);
		$user->setLastLogin(time());
		if(!is_null($device_token)) $user->setDeviceToken($device_token);
		if(!is_null($money)) $user->setMoney($money);
		if(!is_null($type)) $user->setType($type);
		if(!is_null($os)) $user->setOs($os);
		if(!is_null($region)) $user->setRegion($region);
		if(!is_null($current_language)) $user->setCurrentLanguage($current_language);
		if(!is_null($level)) $user->setLevel($level);
		if(!is_null($points)) $user->setPoints($points);
		if(!is_null($duels_win)) $user->setDuelsWin($duels_win);
		if(!is_null($duels_lost)) $user->setDuelsLost($duels_lost);
		if(!is_null($bigest_win)) $user->setBigestWin($bigest_win);
		if(!is_null($remove_ads)) $user->setRemoveAds($remove_ads);
		if(!is_null($avatar)) $user->setAvatar($avatar);
		if(!is_null($age)) $user->setAge($age);
		if(!is_null($home_town)) $user->setHomeTown($home_town);
		if(!is_null($friends)) $user->setFriends($friends);
		if(!is_null($identifier)) $user->setIdentifier($identifier);

        if(!is_null($cap)) $user->setCap($cap);
        if(!is_null($head)) $user->setHead($head);
        if(!is_null($body)) $user->setBody($body);
        if(!is_null($legs)) $user->setLegs($legs);
        if(!is_null($shoes)) $user->setShoes($shoes);
	
		$this->em->merge($user);
		$this->em->flush();
	}
	
	public function setUserMoney($authen, $money)
	{
		$q = $this->em->createQuery("
				UPDATE CowboyDuelApiBundle:Users u
				SET u.money=$money
				WHERE u.authen='$authen'"
		);
	
		return $q->getResult();
	}
	
	/**
	 * Get settings
	 * @return CowboyDuel\ApiBundle\Entity\Settings
	 */
	public function getSettings($name)
	{
		$q = $this->em->createQuery("
				SELECT s
				FROM CowboyDuelApiBundle:Settings s
				WHERE s.name='$name'"
		);
		$e = $q->getResult();
		
		return (isset($e[0]))? $e[0]: null;
	}
	public function setSettings($name, $value)
	{
		$q = $this->em->createQuery("
				UPDATE CowboyDuelApiBundle:Settings s
				SET s.value=$value
				WHERE s.name='$name'"
		);	
		return $q->getResult();
	}
	
	public function update_session($authen, $session_id)
	{
		$q = $this->em->createQuery("
				UPDATE CowboyDuelApiBundle:Users u
				SET u.sessionId='$session_id'
			    WHERE u.authen='$authen'"
		);
		
		return $q->getResult();
	}
	public function getAuthenOnline($authen)
	{
		$q = $this->em->createQuery('
				SELECT o
				FROM CowboyDuelApiBundle:Online o
				WHERE o.authen = :authen
				')->setParameter('authen', $authen);
		
		return $q->getResult();
	}
	public function setAuthenOnline($authen, $time)
	{
		$online = new Online();
		
		$online->setAuthen($authen)
			   ->setOnline(1)
			   ->setEntertime($time)	
			   ->setExittime(0);
		
		$this->em->persist($online);
		$this->em->flush();
	}
	
	public function updateAuthenOnline($authen, $field_time, $time, $flag)
	{
		$setStr = "";
		switch ($field_time)
		{
			case 'in' : $setStr .= "o.entertime="; break;
			case 'out': $setStr .= "o.exittime="; break;
		}	
		
		//$online->setOut(0);
	
		$q = $this->em->createQuery("
				UPDATE CowboyDuelApiBundle:Online o
				SET o.online=".$flag.", ".$setStr."'".$time."'
			    WHERE o.authen='".$authen."'"
		);
		
		return $q->getResult();
	}
	
	public function addToFavorites($user_authen, $favorite_authen)
	{
		$uf = new UsersFavorites();
				
		$uf->setUserAuthen($user_authen)
		   ->setFavoriteAuthen($favorite_authen);
		
		$this->em->persist($uf);
		$this->em->flush();
	}
	public function deleteFavorites($user_authen, $favorite_authen)
	{
		$q = $this->em->createQuery("
				DELETE FROM CowboyDuelApiBundle:UsersFavorites uf
				WHERE uf.userAuthen='$user_authen' AND uf.favoriteAuthen='$favorite_authen'");
		return $q->getResult();
	}
	public function getFavorites($user_authen)
	{
		$q = $this->createQuery("
				SELECT u.authen, u.nickname, u.money, u.level, u.points, u.avatar
				FROM `users_favorites` uf INNER JOIN `users` u ON uf.favorite_authen = u.authen
				WHERE uf.user_authen='$user_authen'
			");
		return $q;
	}
	public function getIsFavorites($user_authen, $favorite_authen)
	{
		$q = $this->em->createQuery("
				SELECT uf
				FROM CowboyDuelApiBundle:UsersFavorites uf
				WHERE uf.userAuthen='$user_authen' AND uf.favoriteAuthen='$favorite_authen'");
		return $q->getResult();
	}
	
	public function getUserToPushNotifications($authen)
	{
		$q = $this->em->createQuery("
				SELECT u.authen, u.nickname, u.deviceToken, uf.userAuthen, (SELECT us.nickname FROM CowboyDuelApiBundle:Users us WHERE us.authen='$authen') AS nn_user_on
				FROM CowboyDuelApiBundle:UsersFavorites uf, CowboyDuelApiBundle:Users u
				WHERE uf.favoriteAuthen='$authen' AND uf.userAuthen=u.authen
			");
		
		return $q->getResult();
	}
}
