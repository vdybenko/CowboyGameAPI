<?php
namespace CowboyDuel\ApiBundle\Helper;

use CowboyDuel\ApiBundle\Entity\BuyItemsStore;

class HelperQueryStore extends HelperAbstractDb
{
	public function getStoreItems($type)
	{
		$dStr = null;
		switch ($type)
		{
			case 'weapons':
				$dStr = 's.id, s.title, s.damageOrDefense AS damage, s.golds, s.inappid, s.thumb,
				s.img, s.bigImg, s.sound, s.description, s.levelLock,
				s.thumbRetina, s.imgRetina, s.bigImgRetina';
				break;
			case 'defenses':
				$dStr = 's.id, s.title, s.damageOrDefense AS defense, s.golds, s.inappid, s.thumb,
				s.img, s.description, s.levelLock, s.thumbRetina, s.imgRetina';
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
	public function getAllBuyItemsStore($authen)
	{
		$q = $this->em->createQuery("
				SELECT b.id
				FROM CowboyDuelApiBundle:BuyItemsStore b, CowboyDuelApiBundle:Store s
				WHERE b.authenuser='$authen' AND b.itemIdStore = s.id				
			");	
	
		return $q->getResult();
	}

}
