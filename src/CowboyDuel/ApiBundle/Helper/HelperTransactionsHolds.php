<?php
namespace CowboyDuel\ApiBundle\Helper;

use CowboyDuel\ApiBundle\Entity\Transactions;

class HelperTransactionsHolds 
{
	private $em;
	
	public function __construct($em)
	{
		$this->em = $em;
	}
	
	public function setTransaction($authen, $value, $description)
	{
		$transaction = new Transactions();
		
		$transaction
					->setAuthen($authen)
					->setValue($value)
					->setDescription($description)
					->setDate(time())
		;
		
		$this->em->persist($online);
		$this->em->flush();
	}
}
