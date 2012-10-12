<?php

namespace CowboyDuel\ApiBundle\Controller;

use CowboyDuel\ApiBundle\Entity\Users;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
	Symfony\Component\HttpFoundation\Response;

use CowboyDuel\ApiBundle\Helper\HelperQueryHolds;

/**
 * @Route("/api")
 */
class ApiController extends Controller
{
    /**
     * @Route("/")
     * 
     */
    public function indexAction()
    {
       return new Response("Api");
    }
    
    /**
     * @Route("/in")
     */
    public function inAction()
    {
    	$request = $this->getRequest()->request;   	
    	$authen = $request->get('id');    	
    	$session_id = uniqid();
    	
    	$em = $this->getDoctrine()->getEntityManager();
    	$queryHolds = new HelperQueryHolds($em);    	 
    	 
    	$entity = $queryHolds->getUser($authen); 	
    	
    	if ($authen == null || $entity == null)
    	{
    		$responseDate['err_code'] = (int) - 4;
    		$responseDate['err_description'] = 'Invalid value';
    		return new Response(json_encode($responseDate));
    	}
    	
    	//Update session
    	$entity[0]->setSessionId($session_id);
    	$em->persist($entity[0]);
    	$em->flush();
    	    	
    	$responseDate = array("err_code" => (int) 1, "err_description" => 'Ok') ;
    	$refresh_content = $queryHolds->get_refresh_content();
    	$responseDate['refresh_content'] = $refresh_content[0]->getRefreshContent();
    	$responseDate['session_id'] = $session_id;
    	
    	return new Response(json_encode($responseDate));
    }
}
