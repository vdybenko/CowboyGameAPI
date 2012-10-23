<?php
namespace CowboyDuel\ApiBundle\Helper;

use CowboyDuel\ApiBundle\Entity\Online,
	CowboyDuel\ApiBundle\Entity\Users,
	CowboyDuel\ApiBundle\Entity\Duels,
	CowboyDuel\ApiBundle\Entity\BuyItemsStore;

class HelperQueryHolds
{
	private $em;
	
	public function __construct($em)
	{
		$this->em = $em;
	}
	
	public function get_top_users()
	{		
		return $q = $this->em->createQuery('
				SELECT u.authen, u.nickname, u.money, u.level, u.points, u.avatar
				FROM CowboyDuelApiBundle:Users u
				ORDER BY u.money DESC				
			 ')->setMaxResults(100)
			   ->getResult();
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
	    
		return  $e[0];
	}	
	
	public function getUserData($authen)
	{
		$q = $this->em->createQuery("
				SELECT u.userId AS user_id, u.nickname, u.money, u.sessionId AS session_id, u.level, u.points, 
					   u.duelsWin AS duels_win, u.duelsLost AS duels_lost, u.bigestWin AS bigest_win, 
				       u.removeAds AS remove_ads, u.avatar, u.age, u.homeTown AS home_town, u.friends, 
					   u.facebookName AS facebook_name				
				FROM CowboyDuelApiBundle:Users u
				WHERE u.authen='$authen'"
		);
		$e = $q->getResult();
		 
		return  $e[0];	
	}
	
	public function getUserWithAuthenOld($authen, $authen_old)
	{
		if (!$authen_old)  
			return getUser($authen);
		 else 
		 	return getUser($authen_old);	
	}
	
	public function setUser($authen, $app_ver, $device_name, $nickname, $os, $region, $current_language,
							$level, $points, $money, $duels_win, $duels_lost, $bigest_win, $remove_ads, $avatar, $age,$home_town,
							$friends, $facebook_name, $snetwork)
	{
		$user = new Users();
		
		$user
			 ->setAuthen($authen)
			 ->setNickname($nickname)
			 //->setDeviceToken($device_token)
			 ->setAppVer($app_ver)
			 ->setDeviceName($device_name)
			 ->setFirstLogin(time())
			 ->setMoney($money)
			 //->setType($type)		
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
			 ->setFacebookName($facebook_name)
			 ->setSnetwork($snetwork)
			 
			 ->setLastLogin(0)
			 ->setType(0)
			 ->setDeviceToken("")
			 ->setDate(0)
			 ->setSessionId("")
		;

		$this->em->persist($user);
		$this->em->flush();
	}
	
	public function setUserInfo($authen, $app_ver, $device_name, $nickname, $type, $os, $region,
								$current_language, $level, $points, $money, $duels_win, $duels_lost, $bigest_win, 
								$remove_ads, $avatar, $age, $home_town, $friends, $facebook_name)
	{
		$user = new Users();
	
		if($authen) $user->setAuthen($authen);
		if($nickname) $user->setNickname($nickname);
		if($app_ver) $user->setAppVer($app_ver);
		if($device_name) $user->setDeviceName($device_name);
		$user->setFirstLogin(time());
		//if($device_token) $this->db->set('session_id',$session_id);
		if($money) $user->setMoney($money);
		if($type) $user->setType($type);
		if($os) $user->setOs($os);
		if($region) $user->setRegion($region);
		if($current_language) $user->setCurrentLanguage($current_language);
		if($level) $user->setLevel($level);
		if($points) $user->setPoints($points);
		if($duels_win) $user->setDuelsWin($duels_win);
		if($duels_lost) $user->setDuelsLost($duels_lost);
		if($bigest_win) $user->setBigestWin($bigest_win);
		if($remove_ads) $user->setRemoveAds($remove_ads);
		if($avatar) $user->setAvatar($avatar);
		if($age) $user->setAge($age);
		if($home_town) $user->setHomeTown($home_town);
		if($friends) $user->setFriends($friends);
		if($facebook_name) $user->setFacebookName($facebook_name);
	
		$this->em->persist($user);
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
	
	public function setDuels($authen, $device_name, $system_name, $system_version, $rate_fire, $opponent,
							 $gps, $lat, $lon, $date)
	{
		$duels = new Duels();
		
		$duels
			  ->setAuthen($authen)
			  ->setDeviceName($device_name)
			  ->setSystemName($system_name)
			  ->setSystemVersion($system_version)
			  ->setRateFire($rate_fire)
			  ->setOpponent($opponent)
			  ->setGps($gps)
			  ->setLat($lat)
			  ->setLon($lon)
			  ->setDate($date)
		;
		
		$this->em->persist($duels);
		$this->em->flush();
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
		
		return $e[0];
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
				SET u.sessionId='".$session_id."'
			    WHERE u.authen='".$authen."'"
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
	
	public function getStoreItems($type)
	{
		$dStr = null;
		switch ($type)
		{
			case 'weapons': 
				  $dStr = 's.id, s.title, s.damageOrDefense AS damage, s.golds, s.inappid, s.thumb, 
				           s.img, s.bigImg, s.sound, s.description, s.levelLock'; 
			  break;
			case 'defenses': 
				  $dStr = 's.id, s.title, s.damageOrDefense AS defense, s.golds, s.inappid, s.thumb, 
				           s.img, s.description, s.levelLock'; 
			  break;
		}		
		$q = $this->em->createQuery("
				SELECT $dStr
				FROM CowboyDuelApiBundle:Store s
				WHERE s.type='$type'"
		);		
		return $q->getResult();
	}
	
	public function setBuyItemStore($authenUser, $itemIdStore, $transactionsId)
	{
		$itemStore = new BuyItemsStore();
		
		$itemStore->setAuthenuser($authenUser)
				  ->setItemIdStore($itemIdStore)
				  ->setTransactionsId($transactionsId)
				  ->setDate(time());
		
		$this->em->persist($itemStore);
		$this->em->flush();
	}
	
	public function getLastBuyItemStore($authen, $type)
	{
		$q = $this->em->createQuery("				
			 	SELECT b.id
				FROM CowboyDuelApiBundle:BuyItemsStore b, CowboyDuelApiBundle:Store s
				WHERE b.authenuser='$authen' AND s.type='$type' AND b.itemIdStore = s.id			
			    ORDER BY b.date DESC"
		);
		$e = $q->getResult();
		
		return $e[0];
	}
}
