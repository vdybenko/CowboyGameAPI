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
	
	public static function convertToFacebookId($authen)
	{
		return substr($authen, 2, strlen($authen) - 2);		
	}
	
	public static function getDuelsWithFriends($duels, $friends)
	{
		for($i = 0; $i < count($duels); $i++)
		{
			$idUser = self::convertToFacebookId($duels[$i]['authen']);
			foreach ($friends as $kj => $vj)						
			   if($vj['id'] == $idUser)
				{
					$duels[$i]['isFriend'] = 'Так';
					break;
				}
				else 
					$duels[$i]['isFriend'] = 'Ні';
		}
		return $duels;
	}
}
