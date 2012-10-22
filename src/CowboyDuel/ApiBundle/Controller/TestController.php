<?php

namespace CowboyDuel\ApiBundle\Controller;

use CowboyDuel\ApiBundle\Form\DuelsType,
	CowboyDuel\ApiBundle\Form\RegistrationType;

use CowboyDuel\ApiBundle\Entity\Users,
	CowboyDuel\ApiBundle\Entity\Duels;

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
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
    
    /**
     * @Route("/registration", name="test_registration")
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
    
    /**
     * @Route("/duels", name="test_duels")
     * @Template()
     */
    public function duelsAction()
    {
    	$entity = new Duels();
    	$form   = $this->createForm(new DuelsType(), $entity);
    	 
    	return array(
    			'entity'   => $entity,
    			'form'     => $form->createView(),
    	);
    	return array();
    }
    
    /**
     * @Route("/transactions", name="test_transactions")
     * @Template()
     */
    public function transactionsAction()
    {
    	return array();
    }
    
    /**
     * @Route("/top_rank_on_interspace", name="test_top_rank_on_interspace")
     * @Template()
     */
    public function topRankOnInterspaceAction()
    {
    	return array();
    }
    
    /**
     * @Route("/authorization", name="test_authorization")
     * @Template()
     */
    public function authorizationAction()
    {
    	return array();
    }
    
    /**
     * @Route("/store/bought", name="test_store_bought")
     * @Template()
     */
    public function storeBoughtAction()
    {
    	return array();
    }
}
