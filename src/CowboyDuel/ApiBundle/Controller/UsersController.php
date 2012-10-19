<?php

namespace CowboyDuel\ApiBundle\Controller;

use CowboyDuel\ApiBundle\Helper\HelperQueryHolds,
	CowboyDuel\ApiBundle\Helper\HelperMethod,
	CowboyDuel\ApiBundle\Libraries;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
	Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/users")
 */
class UsersController extends Controller
{
    /**
     * @Route("/")
     * 
     */
    public function indexAction()
    {
        return new Response("Users");
    }
    
    /**
     * @Route("/top.json", name="users_top_board")
     */
    public function top_boardAction()
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	$queryHolds = new HelperQueryHolds($em);
        	
    	$entitiesJson = json_encode($queryHolds->get_top_users());    
    	
    	file_put_contents($this->container->getParameter('S3_file_upload'), $entitiesJson, FILE_APPEND);  
    	$this->_send_stat_s3();    
    		
    	$queryHolds->setSettings_timeLastRefresh(time());
    	
    	return new Response($entitiesJson);
    }
    
    /**
     * @Route("/_send_stat_s3", name="users_send_stat_s3")
     */
    public function _send_stat_s3()
    {   	
    	$helperMethod = new HelperMethod();
    	$helperMethod->sendStatS3($this->container);
    }
    
    /**
     * @Route("/top_rank_on_interspace", name="users_top_rank_on_interspace")
     */
    public function topRankOnInterspaceAction()
    {
    	$request = $this->getRequest()->request;
    	$em = $this->getDoctrine()->getEntityManager();
    	$queryHolds = new HelperQueryHolds($em);    	   	
    	
    	$authen = $request->get('authentification');    	
    	$entities = $queryHolds->get_my_rank_on_interspace($authen);
    	
    	if ($entities == null)
    	{
    		$responseDate['err_code'] = (int) - 4;
    		$responseDate['err_description'] = 'Invalid value';    	
    	}
    	 else { $responseDate = $entities; }    	
    	    	
    	return new Response(json_encode($responseDate));
    }
}
