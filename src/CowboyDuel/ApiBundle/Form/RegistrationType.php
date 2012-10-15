<?php
namespace CowboyDuel\ApiBundle\Form;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
	/*
	 * @param FormBuilderInterface $builder The form builder
 	 * @param array                $options The options
 	*/	 
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('authen')
			//->add('authenOld')
			//->add('authKey')
			->add('appVer')
			->add('os')
			->add('deviceName')
			->add('region')
			->add('currentLanguage')
			->add('nickname')
			->add('avatar')
			->add('age')
			->add('homeTown')
			->add('friends')
			->add('facebookName')
			->add('level')
			->add('points')
			->add('duelsWin')
			->add('duelsLost')
			->add('bigestWin')
			->add('removeAds')
		;
	}

	public function getName()
	{
		return null;
	}
}