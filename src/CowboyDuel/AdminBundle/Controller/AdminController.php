<?php

namespace CowboyDuel\AdminBundle\Controller;

use CowboyDuel\AdminBundle\Helper\HelperQueryStatistic;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
	Symfony\Component\HttpFoundation\Response,
	JMS\SecurityExtraBundle\Annotation\Secure;

use CowboyDuel\ApiBundle\Entity\Store,
	CowboyDuel\ApiBundle\Form\StoreType;

/**
 * @Route("/admin")
 */
class AdminController extends Controller
{
	function setDataStatistic($q)
	{
		$data['countDuelsInDay'] = $q->getCountDuelsInDay(array(
				'today' => 1,
				'users' => null,
				'region' => null)
		);		
		$data['countRegisteredUsers'] =  $q->getCountRegisteredUsers(null);
		$data['countRegisteredUsersFromFacebook'] =  $q->getCountRegisteredUsers('F');
		$data['countUsersAttendedDuels'] =  $q->getCountUsersAttendedDuels();
		$data['ratioUsersOfRolledQuantityDuel'] = $q->getRatioUsersOfRolledQuantityDuels();
		
		return $data;
	}
	/**
	 * @Route("/", name="admin_index")
	 * @Secure(roles="ROLE_ADMIN")
	 * @Template()
	 */
	public function indexAction()
	{
		$em = $this->getDoctrine()->getEntityManager();
		$queryHolds = new HelperQueryStatistic($em);
		
		$data = $this->setDataStatistic($queryHolds);		
		print_r($data);
		
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
    	
  
    	$queryHolds = new HelperQueryStatistic($this->getDoctrine()->getEntityManager());   	
    	return array(
				'entity'   => $entity,
				'form'     => $form->createView(),
				'location' => 'admin_add_store_item',
    			'data' 	   => $this->setDataStatistic($queryHolds)
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
    	
    	$data = $this->setDataStatistic($queryHolds);
    	
    	$data['duelsInDay_users_new'] = $queryHolds->getDuelsInDay(array('users' => 'new')); 
    	$data['duelsInDay_users_old'] = $queryHolds->getDuelsInDay(array('users' => 'old'));
    	
    	$data['duelsInDay_lastDay_10'] = $queryHolds->getDuelsInDay(array('lastDay' => 10));
    	$data['duelsInDay_region'] = $queryHolds->getDuelsInDay(array('region' => 'ru_UA'));
    	

    	print_r($data);
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
    	 
    	$data = $this->setDataStatistic($queryHolds);
    	
    	$data['sales_Of_Goods_buy_golds'] = $queryHolds->getSalesOfGoods(array('typeBuy' => 'golds'));
    	$data['sales_Of_Goods_buy_inApp'] = $queryHolds->getSalesOfGoods(array('typeBuy' => 'inApp'));
    	$data['sales_Of_Goods_region'] = $queryHolds->getSalesOfGoods(array('typeBuy' => 'region'));
    	
    	print_r($data);
    	
    	return array('data' => $data,
    				 'location' => 'admin_sales_of_goods');
    }
}
