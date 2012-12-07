<?php
namespace CowboyDuel\ApiBundle\Form;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType
{	
	public 
		$age_day,
		$age_month,
		$age_year;
	/*
	 * @param FormBuilderInterface $builder The form builder
 	 * @param array                $options The options
 	*/	 
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder			
			->add('authen')	
			->add('nickname')
			->add('avatar')		
			->add('region')
			->add('homeTown')
			->add('level')
			->add('currentLanguage')
			->add('app_ver')
			->add('deviceName')
			->add('snetwork')			
			->add('os')
			->add('points')
			->add('money')
			->add('session_id')			
			->add('duelsWin')
			->add('duelsLost')
			->add('bigestWin')
			->add('removeAds')			
			->add('friends')
			->add('identifier')			
		;		
	}

	public function getName()
	{
		return null;
	}
}