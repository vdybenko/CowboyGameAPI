<?php

namespace CowboyDuel\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/Api")
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
    	$app_ver= $request->get('app_ver');    	
    	$session_id = uniqid();
    	/*
    	//$this->load->library('validation');
    	$rules['id'] = "required";
    	//$this->validation->set_rules($rules);
    	if ($this->validation->run() == false)
    	{
    		$response['err_code'] = (int) - 4;
    		$response['err_description'] = 'Invalid value';
    		echo json_encode($response);
    		die;
    	}
    	
    	$this->load->model('musers');
    	$this->musers->update_session($authen,$session_id);
    	
    	$exist = $this->musers->get_a($authen);
    	if( empty($exist))
    	{
    		$this->musers->set_a($authen,time());
    	}else{
    		$this->musers->updin_a($authen,'in',time(),1);
    		if (isset($authen))	$authen_old = null;
    		if (!isset($app_ver))
    		{
    			if (isset($exist['app_ver']))
    			{
    				$version=$exist['app_ver'];
    				$version = substr($version,0,3);
    				if($version<1.4)
    				{
    					$response =array("err_code"=>(int)1,"err_desc"=>'Ok') ;
    					$refresh_content=$this->musers->get_refresh_content();
    					$response['refresh_content']=$refresh_content['refresh_content'];
    					$response['session_id']=$session_id;
    					echo json_encode($response);
    					die;
    				}
    			}
    		}else{
    			$app_ver2=substr($app_ver,0,3);
    			if($app_ver2<1.4)
    			{
    				$response =array("err_code"=>(int)1,"err_desc"=>'Ok') ;
    				$refresh_content=$this->musers->get_refresh_content();
    				$response['refresh_content']=$refresh_content['refresh_content'];
    				$response['session_id']=$session_id;
    				echo json_encode($response);
    				die;
    			}
    		}
    	};
    	
    	$response =array("err_code"=>(int)1,"err_desc"=>'Ok') ;
    	$refresh_content=$this->musers->get_refresh_content();
    	$response['refresh_content']=$refresh_content['refresh_content'];
    	$response['session_id']=$session_id;
    	echo json_encode($response);*/
    }
}
