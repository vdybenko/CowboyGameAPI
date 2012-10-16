<?php
namespace CowboyDuel\ApiBundle\Form;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface;

class DuelsType extends AbstractType
{
	public $authentification;
	public $duels;
	/*
	 * @param FormBuilderInterface $builder The form builder
 	 * @param array                $options The options
 	*/	 
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder			
			//->add('duels')		
			//->add('authentification')
			->add('app_ver')
			//->add('session_id')			
			->add('device_name')
			->add('system_name')
			->add('system_version')
		;
	}

	public function getName()
	{
		return null;
	}
}