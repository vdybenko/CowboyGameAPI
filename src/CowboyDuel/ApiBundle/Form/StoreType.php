<?php
namespace CowboyDuel\ApiBundle\Form;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface;

class StoreType extends AbstractType
{
	/*
	 * @param FormBuilderInterface $builder The form builder
 	 * @param array                $options The options
 	*/	 
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder			
			->add('type','choice', array('choices' => array('weapons' => 'weapons', 'defenses' => 'defenses')))	
			->add('title')
			->add('damageOrDefense')
			->add('frequently')
			->add('golds')
			->add('inAppId')
			->add('thumb')
			->add('thumbRetina', null, array('label' => 'thumb Retina'))
			->add('img')
			->add('imgRetina', null, array('label' => 'img Retina'))
			->add('bigImg')
			->add('bigImgRetina', null, array('label' => 'bigImg Retina'))
			->add('sound')
			->add('description')
			->add('levelLock')
		;
	}

	public function getName()
	{
		return null;
	}
}