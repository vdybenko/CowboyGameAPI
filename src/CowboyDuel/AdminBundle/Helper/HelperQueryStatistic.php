<?php

namespace CowboyDuel\AdminBundle\Helper;

class HelperQueryStatistic extends \CowboyDuel\ApiBundle\Helper\HelperAbstractDb
{
	public function getCountDuelsInDay($filters)
	{		
		$q = "SELECT COUNT(d.id) FROM CowboyDuelApiBundle:Duels d";
		
		if(!is_null($filters['users']) || !is_null($filters['region'])) 
			$q .= ", CowboyDuelApiBundle:Users u WHERE d.authen=u.authen AND ";
		 else
		 	$q .= " WHERE ";
		if(!is_null($filters['users'])) $q .= "d.authen=u.authen";
		
		if(!is_null($filters['region'])) $q .= "u.region='".$filters['region']."'";
		
		if(!is_null($filters['today'])) 
		{
			$datePrew = strtotime(date('Y-m-d'));
			$q .= "d.date BETWEEN $datePrew AND CURRENT_TIMESTAMP()";		
		}		
		
		$q = $this->em->createQuery($q)->getResult();
		return $q[0][1];
	}
	
	public function getCountRegisteredUsers($snetwork)
	{
		$q = "SELECT COUNT(u) FROM CowboyDuelApiBundle:Users u ";
		if(!is_null($snetwork)) $q .= "WHERE u.snetwork = 'F'";
		$q = $this->em->createQuery($q)->getResult();
		return  $q[0][1];
	}
	public function getCountUsersAttendedDuels()
	{		
		$q = $this->em->createQuery("SELECT COUNT(u) FROM CowboyDuelApiBundle:Users u WHERE u.points > 0");
		$q = $q->getResult();
		return  $q[0][1];
	}
	
	function createQuery($sql)
	{		
		$stmt = $this->em->getConnection()->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}
	
	public function getRatioUsersOfRolledQuantityDuels()
	{
		/*$count = $this->getCountUsersAttendedDuels();
		$q = $this->em->createQuery("
				SELECT COUNT(t)/$count
				FROM CowboyDuelApiBundle:Transactions t 
				WHERE t.value != 10");
		$q = $q->getResult();
		return  $q[0][1];*/
		
		$q = $this->createQuery("
				SELECT (COUNT(*)/(SELECT COUNT(*) FROM `users` WHERE points > 0)) AS r 
				FROM `transactions` 
				WHERE value != 10");
		return $q[0]['r'];
	}
	
	public function getDuelsInDay()
	{	
   		$q = $this->createQuery("
   			SELECT COUNT(`id`) AS `sum`,DAYOFYEAR(FROM_UNIXTIME(`date`, '%Y-%m-%d %H:%i:%s')) AS `MONTH`
			FROM `transactions`
			GROUP BY DAYOFYEAR(FROM_UNIXTIME(`date`, '%Y-%m-%d %H:%i:%s'))
   		");	
   		return $q;	
	}

}