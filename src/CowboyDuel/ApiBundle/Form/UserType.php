<?php
namespace CowboyDuel\ApiBundle\Form;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType
{
	/*
	 * @param FormBuilderInterface $builder The form builder
 	 * @param array                $options The options
 	*/	 
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder			
			->add('authen')	
			->add('nickname')
			->add('age','date', array('years' => range(date('Y') - 40, date('Y'))))
			->add('region')
			->add('homeTown')
			->add('level')
			->add('currentLanguage')
			->add('app_ver')
			->add('deviceName')
			->add('os')
			->add('points')
			->add('money')
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