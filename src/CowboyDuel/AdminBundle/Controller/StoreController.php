<?php

namespace CowboyDuel\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
	Symfony\Component\HttpFoundation\Response,
	JMS\SecurityExtraBundle\Annotation\Secure;

use CowboyDuel\ApiBundle\Entity\Store,
	CowboyDuel\ApiBundle\Form\StoreType,
	CowboyDuel\AdminBundle\Helper\HelperQueryStatistic,
	CowboyDuel\AdminBundle\Helper\HelperMethod;

/**
 * @Route("/store")
 */
class StoreController extends Controller
{
	
	/**
	 * @Route("/", name="store_index")
	 * @Secure(roles="ROLE_ADMIN")
	 * @Template()
	 */
	public function indexAction()
	{
		$em = $this->getDoctrine()->getEntityManager();
		
		$data = HelperMethod::setDataStatistic($em);		 
		$data['list_store'] = $em->getRepository('CowboyDuelApiBundle:Store')->findAll();
		
		return array('data' => $data,
					 'location' => 'store_index');
	}
    
    /**
     * @Route("/add_item", name="store_add_item")
     * @Secure(roles="ROLE_ADMIN")
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
       		
       		$thumbRetina 	= $form['thumbRetina']->getData();
       		$imgRetina 	= $form['imgRetina']->getData();
       		$bigImgRetina = $form['bigImgRetina']->getData();
       		
       		$sound 	= $form['sound']->getData();
       		$description = $form['description']->getData();
       		$inAppId = $form['inAppId']->getData();
       		
       		$entity->setThumb(is_null($thumb)?'':$thumb)
       			   ->setImg(is_null($img)?'':$img)
       			   ->setBigImg(is_null($bigImg)?'':$bigImg)
       			   
       			   ->setThumb(is_null($thumbRetina)?'':$thumbRetina)
       			   ->setImg(is_null($imgRetina)?'':$imgRetina)
       			   ->setBigImg(is_null($bigImgRetina)?'':$bigImgRetina)
       			   
       		       ->setSound(is_null($sound)?'':$sound)
       			   ->setDescription(is_null($description)?'':$description)
       			   ->setInappid(is_null($inAppId)?'0':$inAppId);
       		;

        	if ($form->isValid()) 
        	{
        		$em = $this->getDoctrine()->getEntityManager();
            	$em->persist($entity);
            	$em->flush();

            	return $this->redirect($this->generateUrl('admin_index'));            
        	}
    	}
 	
    	return array(
				'entity'   => $entity,
				'form'     => $form->createView(),
				'location' => 'store_add_item',
    			'data' 	   => HelperMethod::setDataStatistic($this->getDoctrine()->getEntityManager())
		);    	
    }

    
    /**
     * @Route("/{id}/edit", name="store_edit_item")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function editStoreItemAction($id)
    {
    	$em = $this->getDoctrine()->getEntityManager();
    		
    	$data = HelperMethod::setDataStatistic($em);
    	$entity = $em->getRepository('CowboyDuelApiBundle:Store')->find($id);
    
    	if (!$entity) {
    		throw $this->createNotFoundException('Unable to find entity.');
    	}
    
    	$editForm = $this->createForm(new StoreType(), $entity);
    	$request = $this->getRequest();
    	if ($request->getMethod() == 'POST')
    	{
    		$editForm->bindRequest($request);
    
    		if ($editForm->isValid())
    		{
    			$em->persist($entity);
    			$em->flush();
    
    			return $this->redirect($this->generateUrl('store_index'));
    		}
    	}
    		
    	return array('data' 	=> $data,
    				 'edit_form'=> $editForm->createView(),
    				 'entity' 	=> $entity,
    				 'location' => 'users_edit_user');
    }
}
