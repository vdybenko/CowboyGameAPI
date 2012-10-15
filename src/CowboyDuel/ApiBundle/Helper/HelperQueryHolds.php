<?php
namespace CowboyDuel\ApiBundle\Helper;

use CowboyDuel\ApiBundle\Entity\Online,
	CowboyDuel\ApiBundle\Entity\Users;

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
		return $q = $this->em->createQuery('
				SELECT u
				FROM CowboyDuelApiBundle:Users u
				WHERE u.authen = :authen
				')->setParameter('authen', $authen)		
				  ->getResult();
	}	
	
	public function getUserWithAuthenOld($authen, $authen_old)
	{
		if (!$authen_old)  
			return getUser($authen);
		 else 
		 	return getUser($authen_old);	
	}
	
	public function setUser($authen, $device_token, $app_ver, $device_name, $nickname, $type, $os, $region, $current_language,
							$level, $points, $money, $duels_win, $duels_lost, $bigest_win, $remove_ads, $avatar, $age,$home_town,
							$friends, $facebook_name, $snetwork)
	{
		$user = new Users();
		
		$user
			 ->setAuthen($authen)
			 ->setNickname($nickname)
			 ->setDeviceToken($device_token)
			 ->setFirstLogin(time())
			 ->setMoney($money)
			 ->setType($type)
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
		;

		$this->em->persist($user);
		$this->em->flush();
	}
	
	public function get_refresh_content()
	{
		return $q = $this->em->createQuery('
				SELECT s
				FROM CowboyDuelApiBundle:Settings s			
				')->getResult();
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
			   ->setEnterTime($time)	
			   ->setExitTime(0);
		
		$this->em->persist($online);
		$this->em->flush();
	}
	
	public function updateAuthenOnline($authen, $field_time, $time, $flag)
	{
		$setStr = "";
		switch ($field_time)
		{
			case 'in' : $setStr .= "o.enterTime="; break;
			case 'out': $setStr .= "o.exitTime="; break;
		}	
		
		//$online->setOut(0);
	
		$q = $this->em->createQuery("
				UPDATE CowboyDuelApiBundle:Online o
				SET o.online=".$flag.", ".$setStr."'".$time."'
			    WHERE o.authen='".$authen."'"
		);
		
		return $q->getResult();
	}
}
