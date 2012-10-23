<?php

namespace CowboyDuel\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
	Symfony\Component\HttpFoundation\Response;

use CowboyDuel\ApiBundle\Entity\Store;

/**
 * @Route("/admin", name="admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return new Response("Admin");
    }
    
    /**
     * @Route("/add_store_item", name="admin_add_store_item")
     * @Template()
     */
    public function addStoreItemAction()
    {    	
    	$request = $this->getRequest(); 	    	    	
    	
    	$entity  = new Store();
    	$form = $this->createForm(new RecipeType($cheeseAll), $entity);    	
    	
    	if ($request->getMethod() == 'POST')
    	{    		       	
       		$form->bindRequest($request);

        	if ($form->isValid()) 
        	{
        		$em = $this->getDoctrine()->getEntityManager();
            	$em->persist($entity);
            	$em->flush();

            	return $this->redirect($this->generateUrl('admin'));            
        	}
    	}
    	
    	return array(
				'entity'   => $entity,
				'form'     => $form->createView(),
		);
    }
}
