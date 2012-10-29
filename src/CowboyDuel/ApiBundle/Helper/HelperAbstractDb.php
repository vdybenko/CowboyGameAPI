<?php
namespace CowboyDuel\ApiBundle\Helper;

class HelperAbstractDb 
{
	protected $em;
	
	public function __construct($em)
	{
		$this->em = $em;
	}
	
	protected function createQuery($sql)
	{
		$stmt = $this->em->getConnection()->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}
}
