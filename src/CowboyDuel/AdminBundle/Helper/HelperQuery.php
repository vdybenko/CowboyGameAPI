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
				$orderBy"
		);
		return $q->getResult();
	}
}
