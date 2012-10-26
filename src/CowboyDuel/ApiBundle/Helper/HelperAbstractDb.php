<?php
namespace CowboyDuel\ApiBundle\Helper;

class HelperAbstractDb 
{
	protected $em;
	
	public function __construct($em)
	{
		$this->em = $em;
	}
}
