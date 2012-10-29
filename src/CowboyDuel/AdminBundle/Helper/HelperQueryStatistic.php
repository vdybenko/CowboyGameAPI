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
	public function getRatioUsersOfRolledQuantityDuels()
	{
		$count = $this->getCountUsersAttendedDuels();
		$q = $this->em->createQuery("
				SELECT COUNT(t)/$count
				FROM CowboyDuelApiBundle:Transactions t 
				WHERE t.value != 10");
		$q = $q->getResult();
		return  $q[0][1];
	}

}