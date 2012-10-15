<?php

namespace CowboyDuel\ApiBundle\Controller;

use CowboyDuel\ApiBundle\Entity\Users;

use CowboyDuel\ApiBundle\Form\RegistrationType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/test")
 */
class TestController extends Controller
{
    /**
     * @Route("/")
     * 
     */
    public function indexAction()
    {
        return new Response("Test");
    }
    
    /**
     * @Route("/registration")
     * @Template()
     */
    public function registrationAction()
    {
    	$entity = new Users();
    	$form   = $this->createForm(new RegistrationType(), $entity);
    	
    	return array(
				'entity'   => $entity,
				'form'     => $form->createView(),
		);	
    }
}
