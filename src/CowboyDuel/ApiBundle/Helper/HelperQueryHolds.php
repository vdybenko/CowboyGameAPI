<?php
namespace CowboyDuel\ApiBundle\Helper;

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
	
	public function get_my_rank($authen)
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
	public function getUser($authen)
	{
		return $q = $this->em->createQuery('
				SELECT u
				FROM CowboyDuelApiBundle:Users u
				WHERE u.authen = :authen
				')->setParameter('authen', $authen)
				  ->setMaxResults(1)
				  ->getResult();
	}
	
	public function update_session($authen, $session_id)
	{
		$entity = getUser($authen);		
		$entity->setSessionId($session_id);		
		$em->persist($entity);
		$em->flush();		
	}
}
