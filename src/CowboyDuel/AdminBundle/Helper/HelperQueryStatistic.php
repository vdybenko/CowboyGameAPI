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
}