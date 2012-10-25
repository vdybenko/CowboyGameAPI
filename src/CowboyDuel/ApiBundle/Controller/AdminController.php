<?php

namespace CowboyDuel\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
	Symfony\Component\HttpFoundation\Response;

use CowboyDuel\ApiBundle\Entity\Store,
	CowboyDuel\ApiBundle\Form\StoreType;

/**
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("/", name="admin")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
    
    /**
     * @Route("/add_store_item", name="admin_add_store_item")
     * @Template()
     */
    public function addStoreItemAction()
    {    	
    	$request = $this->getRequest(); 	    	    	
    	
    	$entity  = new Store();
    	$form = $this->createForm(new StoreType(), $entity);    	
    	
    	if ($request->getMethod() == 'POST')
    	{    		       	
       		$form->bindRequest($request);
       		
       		$thumb 	= $form['thumb']->getData();
       		$img 	= $form['img']->getData();
       		$bigImg = $form['bigImg']->getData();
       		$sound 	= $form['sound']->getData();
       		$description = $form['description']->getData();
       		
       		$entity->setThumb(is_null($thumb)?'':$thumb)
       			   ->setImg(is_null($img)?'':$img)
       			   ->setBigImg(is_null($bigImg)?'':$bigImg)
       		       ->setSound(is_null($sound)?'':$sound)
       			   ->setDescription(is_null($description)?'':$description)
       		;

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
