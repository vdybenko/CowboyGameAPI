<?php
namespace CowboyDuel\AdminBundle\Helper;

class HelperQuery extends \CowboyDuel\ApiBundle\Helper\HelperAbstractDb
{
	public function getUsers($sort)
	{
		$orderBy = "";		
		if(!is_null($sort)) 
			$orderBy = "ORDER BY u.$sort DESC";
		
		$q = $this->em->createQuery("
				SELECT u
				FROM CowboyDuelApiBundle:Users u
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
}
