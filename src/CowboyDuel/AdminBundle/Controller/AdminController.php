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
		
		$data = HelperMethod::setDataStatistic($em);
		
		return array('data' => $data,
					 'location' => 'admin_index');
	}
    
    /**
     * @Route("/add_store_item", name="admin_add_store_item")
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
       		$sound 	= $form['sound']->getData();
       		$description = $form['description']->getData();
       		$inAppId = $form['inAppId']->getData();
       		
       		$entity->setThumb(is_null($thumb)?'':$thumb)
       			   ->setImg(is_null($img)?'':$img)
       			   ->setBigImg(is_null($bigImg)?'':$bigImg)
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
				'location' => 'admin_add_store_item',
    			'data' 	   => HelperMethod::setDataStatistic($this->getDoctrine()->getEntityManager())
		);
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
    	$data['duelsInDay_region'] 	   = $queryHolds->getDuelsInDay(array('region' => 'ru_UA', 'lastDay' => $lastDay));
    	
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
