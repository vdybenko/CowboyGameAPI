<?php
namespace CowboyDuel\AdminBundle\Helper;

class HelperQuery extends \CowboyDuel\ApiBundle\Helper\HelperAbstractDb
{
	public function getUsers($filters)
	{
		$where = "WHERE ";
		$orderBy = "";		
		if(isset($filters['sort'])) 
			$orderBy = "ORDER BY u.".$filters['sort']." DESC";
		
		if(isset($filters['snetwork']))
		    $where .= "u.snetwork='".$filters['snetwork']."' AND";
		
		if(isset($filters['snetwork_not']))
			$where .= "u.snetwork<>'".$filters['snetwork_not']."' AND";		
		
		if(isset($filters['frozen']))
		{
			$datePrew = strtotime(date('Y-m-d')) - 604800;
			$where .= "u.lastLogin < $datePrew AND";
		}
		
		$q = $this->em->createQuery("
				SELECT u
				FROM CowboyDuelApiBundle:Users u
				$where 1=1
				$orderBy
		");
		return $q->getResult();
	}
	
	public function getBuyItemsStoreOfUser($id)
	{
		$q = $this->createQuery("
   			SELECT s.title, s.type, bu.date, s.damageOrDefense, s.levelLock, s.golds, s.inAppId
			FROM `buyitemsstore` bu INNER JOIN `store` s ON bu.itemIdStore = s.id
			WHERE bu.authenUser = (SELECT authen FROM `users` u WHERE u.user_id = $id)
			ORDER BY bu.date DESC
   		");	
		return  $q;
	}
	
	public function getDuelsUser($id)
	{
		$q = $this->createQuery("
				SELECT t.date, u.nickname, u.user_id AS userId, u.authen
				FROM `transactions` t INNER JOIN `users` u ON t.opponent_authen = u.authen
				WHERE t.authen = (SELECT authen FROM `users` u WHERE u.user_id = $id) AND t.description = 'Duel'
				ORDER BY t.date DESC
			");
		return  $q;
	}
}
