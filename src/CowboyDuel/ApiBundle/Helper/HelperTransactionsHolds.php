<?php
namespace CowboyDuel\ApiBundle\Helper;

use CowboyDuel\ApiBundle\Entity\Transactions;

class HelperTransactionsHolds extends HelperAbstractDb
{
	public function setTransaction($authen, $value, $description, $opponentAuthen)
	{
		$transaction = new Transactions();
		
		$transaction
					->setAuthen($authen)
					->setValue($value)
					->setDescription($description)
					->setDate(time())
					->setOpponentAuthen($opponentAuthen)
		;
		
		$this->em->persist($online);
		$this->em->flush();
	}
}
