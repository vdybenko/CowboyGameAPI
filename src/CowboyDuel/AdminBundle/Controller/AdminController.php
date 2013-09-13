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
 * @Route("/admin")
 */
class AdminController extends Controller
{	
	/**
	 * @Route("/", name="admin_index")
	 * @Secure(roles="ROLE_ADMIN")
	 * @Template()
	 */
	public function indexAction()
	{
		$em = $this->getDoctrine()->getEntityManager();
		$queryHolds = new HelperQueryStatistic($em);
		
		$data = HelperMethod::setDataStatistic($em);          $logger = $this->container->get('CowboyDuel.Logger');
        $logger->info('[push] ');
		
		return array('data' => $data,
					 'location' => 'admin_index');
	}	
	
	/**
	 * @Route("/test_push")
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function test_push()
	{		
		$device_token = "d7428bbd1365961370c1424445f99f4ee3c43bef4e0d38a64dbe515b4d35b3e9";
		$payload['aps'] = array('alert' => "Hello!s", 'badge' => (int) 3, 'sound' => 'default');
		$payload_json = json_encode($payload);
		
		$pushNotifications = $this->container->get('CowboyDuel.PushNotifications');
		$pushNotifications->send($device_token, 'Привіт!');
				
		return new Response('Send ok:)');
	}
    
    /**
     * @Route("/duels_in_day", name="admin_duels_in_day")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function duelsInDayAction()
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	$queryHolds = new HelperQueryStatistic($em);   	
    	
    	$data = HelperMethod::setDataStatistic($em);
    	
    	$lastDay = $this->container->getParameter('showDataLastDay');
    	$data['duelsInDay_users_new']  = $queryHolds->getDuelsInDay(array('users' => 'new', 'lastDay' => $lastDay)); 
    	$data['duelsInDay_users_old']  = $queryHolds->getDuelsInDay(array('users' => 'old', 'lastDay' => $lastDay));    	
    	$data['duelsInDay_lastDay_10'] = $queryHolds->getDuelsInDay(array('lastDay' => $lastDay));
    	$data['duelsInDay_region'] 	   = $queryHolds->getDuelsInDay(array('region' => 1, 'lastDay' => $lastDay));
    	
    	return array('data' => $data,
    				 'location' => 'admin_duels_in_day');
    }   
     
    /**
     * @Route("/sales_of_goods", name="admin_sales_of_goods")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function salesOfGoodsAction()
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	$queryHolds = new HelperQueryStatistic($em);
    	 
    	$data = HelperMethod::setDataStatistic($em);
    	
    	$lastDay = $this->container->getParameter('showDataLastDay');    	
    	$data['sales_Of_Goods_buy_golds'] = $queryHolds->getSalesOfGoods(array('typeBuy' => 'golds', 'lastDay' => $lastDay));
    	$data['sales_Of_Goods_buy_inApp'] = $queryHolds->getSalesOfGoods(array('typeBuy' => 'inApp', 'lastDay' => $lastDay));
    	$data['sales_Of_Goods_region']    = $queryHolds->getSalesOfGoods(array('region'  => 1,'lastDay' => $lastDay));
    	
    	return array('data' => $data,
    				 'location' => 'admin_sales_of_goods');
    }
    
    /**
     * @Route("/registered_users_of_percentage", name="admin_registered_users_of_percentage")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     */
    public function registeredUsersOfPercentageAction()
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	$queryHolds = new HelperQueryStatistic($em);
    
    	$data = HelperMethod::setDataStatistic($em);    	 
    	$data['registered_Users_Of_Percentage'] = $queryHolds->getAllRegisteredUsersPercentage();
    	 
    	return array('data' => $data,
    				 'location' => 'admin_registered_users_of_percentages');
    }
}
