<?php
namespace CowboyDuel\AdminBundle\Helper;

class HelperMethod 
{
	public static function setDataStatistic($em)
	{
		$q = new HelperQueryStatistic($em);
		
		$data['countDuelsInDay'] = $q->getCountDuelsInDay(array(
				'today' => 1,
				'users' => null,
				'region' => null)
		);		
		$data['countRegisteredUsers'] =  $q->getCountRegisteredUsers(null);
		$data['countRegisteredUsersFromFacebook'] =  $q->getCountRegisteredUsers('F');
		$data['countUsersAttendedDuels'] =  $q->getCountUsersAttendedDuels();
		$data['ratioUsersOfRolledQuantityDuel'] = $q->getRatioUsersOfRolledQuantityDuels();
		
		return $data;
	}
}
