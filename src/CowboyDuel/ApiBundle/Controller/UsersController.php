<?php

namespace CowboyDuel\ApiBundle\Controller;

use CowboyDuel\ApiBundle\Libraries\S3;

use CowboyDuel\ApiBundle\Helper\HelperQueryHolds,
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
     * @Route("/top.json")
     */
    public function top_boardAction()
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	$queryHolds = new HelperQueryHolds($em);
        	
    	$entitiesJson = json_encode($queryHolds->get_top_users());    
    	
    	file_put_contents('bundles/cowboyduelapi/uploads/scriptJson.txt', $entitiesJson, FILE_APPEND);  
    	$this->_send_stat_s3();    	
     
    	return new Response($entitiesJson);
    }
    
    /**
     * @Route("/_send_stat_s3")
     */
    function _send_stat_s3()
    {   	
    	S3::$use_ssl = $this->container->getParameter('S3_use_ssl');
    	S3::setAuth($this->container->getParameter('S3_access_key'), $this->container->getParameter('S3_secret_key'));
    	
    	// List Buckets
    	//var_dump($this->s3->listBuckets());
    	$file = "bundles/cowboyduelapi/uploads/scriptJson.txt";
    	$bucket = "bidoncd";
    	$uri = "top.scriptJson";
    	var_dump(S3::putObject(S3::inputFile($file), $bucket, $uri, S3::ACL_PUBLIC_READ));
    }
    
    /**
     * @Route("/top_rank")
     */
    public function top_rankAction()
    {
    	$request = $this->getRequest()->request;
    	$em = $this->getDoctrine()->getEntityManager();
    	$queryHolds = new HelperQueryHolds($em);    	   	
    	
    	$authen = $request->get('authentification');    	
    	$entities = $queryHolds->get_my_rank($authen);
    	
    	if ($entities == null)
    	{
    		$responseDate['err_code'] = (int) - 4;
    		$responseDate['err_description'] = 'Invalid value';    	
    	}
    	 else { $responseDate = $entities; }    	
    	    	
    	return new Response(json_encode($responseDate));
    }
}
