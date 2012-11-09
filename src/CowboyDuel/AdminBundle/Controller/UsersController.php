<?php
namespace CowboyDuel\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
	Symfony\Component\HttpFoundation\Response,
	JMS\SecurityExtraBundle\Annotation\Secure;

use CowboyDuel\AdminBundle\Helper\HelperQuery,
	CowboyDuel\AdminBundle\Helper\HelperMethod,
	CowboyDuel\AdminBundle\Helper\HelperQueryStatistic,
	CowboyDuel\ApiBundle\Libraries\Facebook\Facebook;
/**
 * @Route("/users")
 */
class UsersController extends Controller
{
	/**
	 * @Route("/", name="users_index")
	 * @Secure(roles="ROLE_ADMIN")
	 * @Template()
	 */
	public function indexAction()
	{
		$em = $this->getDoctrine()->getEntityManager();
		$queryHolds = new HelperQuery($em);	
		
		$query = $this->getRequest()->query;
		$sort = $query->get('sort');
		 
		$data = HelperMethod::setDataStatistic($em);		 
		$data['list_users'] = $queryHolds->getUsers(array('sort' => $sort, 'snetwork_not' => 'B'));
	
		return array('data' 	=> $data,
					 'location' => 'users_index');
	}
	
	/**
	 * @Route("/{id}/show", name="users_show_user")
	 * @Secure(roles="ROLE_ADMIN")
	 * @Template()
	 */
	public function showUserAction($id)
	{
		$em = $this->getDoctrine()->getEntityManager();
		$queryHolds = new HelperQuery($em);	
		 
		$data = HelperMethod::setDataStatistic($em);		 
		$entity = $em->getRepository('CowboyDuelApiBundle:Users')->find($id);
		
		$entityInfo['buy_items_store'] = $queryHolds->getBuyItemsStoreOfUser($id);
		$entityInfo['duels'] = $queryHolds->getDuelsUser($id);
	
		$facebook = new Facebook(array(
				'appId'  => $this->container->getParameter('facebook_appId'),
				'secret' => $this->container->getParameter('facebook_secret'),
		));
		
		$user = $facebook->getUser("AAACEdEose0cBAAHwFd8NhiD4554KYjuZCQi4o2XUhuEvx4tyCgI8thM4T4BXZAYEkIqqTzQZCMWFGZAaDyFcMJibNPdHBBOgivZCA3GmEGCFUVJITO0nA");
		
		print_r($user);
		
		return array('data' 	=> $data,
					 'entity' 	=> $entity,
					 'entityInfo' => $entityInfo,
					 'location' => 'users_show_user');
	}
	
	/**
	 * @Route("/bot", name="users_getAllBot")
	 * @Secure(roles="ROLE_ADMIN")
	 * @Template()
	 */
	public function getAllBotAction()
	{
		$em = $this->getDoctrine()->getEntityManager();
		$queryHolds = new HelperQuery($em);
	
		$query = $this->getRequest()->query;
		$sort = $query->get('sort');
			
		$data = HelperMethod::setDataStatistic($em);
		$data['list_bot'] = $queryHolds->getUsers(array('sort' => $sort, 'snetwork' => 'B'));
	
		return array('data' 	=> $data,
				'location' => 'users_getAllBot');
	}
}
