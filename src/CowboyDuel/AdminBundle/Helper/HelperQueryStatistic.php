<?php

namespace CowboyDuel\AdminBundle\Helper;

class HelperQueryStatistic extends \CowboyDuel\ApiBundle\Helper\HelperAbstractDb
{
	public function getCountRegisteredUsers($snetwork)
	{
		$q = "SELECT COUNT(u) FROM CowboyDuelApiBundle:Users u ";		
		if(!is_null($snetwork)) $q .= "WHERE u.snetwork = '$snetwork'";
		
		$q = $this->em->createQuery($q)->getResult();
		return  $q[0][1];
	}
	public function getAllRegisteredUsersPercentage()
	{
		$q = $this->createQuery("
   			SELECT u.snetwork AS `key`, (COUNT(u.user_id) * 100 / (SELECT COUNT(*) FROM `users`)) AS `percentage`
			FROM `users` u
			GROUP BY u.snetwork
   		");	
		return  $q;
	}
	
	public function getCountUsersAttendedDuels()
	{		
		$q = $this->em->createQuery("SELECT COUNT(u) FROM CowboyDuelApiBundle:Users u WHERE u.points > 0");
		$q = $q->getResult();
		return  $q[0][1];
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
				WHERE description = 'Duel'");
		return $q[0]['r'];
	}
	
	function convertDataRegion($q)
	{
		$tmpRegion = array();
        $tmpData = array();
        $isAdd = true;

        foreach ($q as $ki => $vi)
            $tmpRegion[] = $vi['region'];
        $tmpRegion = array_unique($tmpRegion);

        $index = 1;
        $tmpR = array();
        foreach ($tmpRegion as $ki => $vi)
        {
            $tmpR[$index] = $vi;
            $index++;
        }
        $tmpRegion = $tmpR;

        //Транспонування
        foreach ($q as $ki => $vi)
        {
            $tmpCount = array();
            foreach ($q as $kj => $vj)
               if($vi['day'] == $vj['day'] && $vi['region'] == $vj['region'])
                {
                    $key = array_search($vj['region'], $tmpRegion);
                    if(isset($tmpCount[$key - 1]) && $tmpCount[$key - 1] == 0
                                                  && count($tmpRegion) > count($tmpCount))
                        $tmpCount[] = 0;
                    $tmpCount[$key - 1] = $vj['count'];
                }
                else
                  if(count($tmpRegion) > $kj)
                    $tmpCount[] = 0;

                $tmpData[] = array('day' => \DateTime::createFromFormat('z', $vi['day']),'count' => $tmpCount);
        }
        //Видалення рядків і ущільнення
        foreach ($tmpData as $ki => &$vi)
        {
            for($j = $ki + 1; $j <= count($tmpData); $j++)
            {
                if(isset($tmpData[$j]) && $vi['day'] == $tmpData[$j]['day'])
                {
                    foreach ($vi['count'] as $kij => &$vij)
                    {
                        if($vij == 0)
                        {
                            $tmpData[$ki]['count'][$kij] = $tmpData[$j]['count'][$kij];
                        }
                    }
                    unset($tmpData[$j]);
                    break;
                }
            }
        }

        $result['region'] = $tmpRegion;
        $result['data']   = $tmpData;

        return $result;
	}
	
	function convertZDataToNorm($data)
	{
		for($i = 0; $i < count($data); $i++)
        	$data[$i]['day'] = \DateTime::createFromFormat('z', $data[$i]['day'])->getTimestamp();
		
		return $data;
	}
	
	public function getDuelsInDay($filters)
	{	
		$select = "";
		$from = "";
		$where = "";
		$groupBy = "";
		
		if(isset($filters['region']) || isset($filters['users'])) 
			$from = " INNER JOIN `users` u ON t.authen = u.authen";
		
		if(isset($filters['lastDay'])) 
		{
			$datePrew = strtotime(date('Y-m-d')) - $filters['lastDay'] * 43200;			
			$where .= " AND t.date BETWEEN $datePrew AND CURRENT_TIMESTAMP()";
		}
		
		if(isset($filters['region'])) 
		{
			$select = "u.region, ";
			$groupBy = ", u.region";
		}
		
		if(isset($filters['users']))
		{			
			$data = strtotime(date('Y-m-d'));
		 	switch($filters['users'])
		 	{
				case 'new': $where .= " AND u.first_login BETWEEN $data AND CURRENT_TIMESTAMP()"; break;	
				case 'old': $where .= " AND u.first_login NOT BETWEEN $data AND CURRENT_TIMESTAMP()"; break;
		 	}
		}
			
   		$q = $this->createQuery("
   			SELECT $select COUNT(t.id) AS `count`, DAYOFYEAR(FROM_UNIXTIME(t.date, '%Y-%m-%d %H:%i:%s')) AS `day`
			FROM `transactions` t $from
   			WHERE t.description = 'Duel' $where
			GROUP BY DAYOFYEAR(FROM_UNIXTIME(t.date, '%Y-%m-%d %H:%i:%s')) $groupBy
   		");	
   		
   		if(isset($filters['region']))
   			return $this->convertDataRegion($q);
   		
   		return $this->convertZDataToNorm($q);	
	}
	
	public function getSalesOfGoods($filters)
	{		
		$select = "s.type AS `key`,";
		$where = "";
		$groupBy = ", s.type";
		
		if(isset($filters['lastDay']))
		{
			$datePrew = strtotime(date('Y-m-d')) - $filters['lastDay'] * 86400;
			$where .= " AND bu.date BETWEEN $datePrew AND CURRENT_TIMESTAMP()";
		}
		
		if(isset($filters['typeBuy']))
		{			
		 	switch($filters['typeBuy'])
		 	{
				case 'golds': $where .= " AND s.golds != 0"; break;	
				case 'inApp': $where .= " AND s.inAppId != '0'"; break;
		 	}
		}
		
		if(isset($filters['region'])) 
		{
			$select = "u.region, ";
			$groupBy = ", u.region";
		}
					
		$q = $this->createQuery("
			SELECT $select COUNT(bu.id) AS `count`, DAYOFYEAR(FROM_UNIXTIME(bu.date, '%Y-%m-%d %H:%i:%s')) AS `day`
			FROM `buyitemsstore` bu, `store` s, `users` u
   			WHERE bu.itemIdStore = s.id AND bu.authenUser = u.authen $where
			GROUP BY DAYOFYEAR(FROM_UNIXTIME(bu.date, '%Y-%m-%d %H:%i:%s')) $groupBy
		");
	    
		if(isset($filters['region']))
			return $this->convertDataRegion($q);
		
		return $this->convertZDataToNorm($q);
	}

}