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
	CowboyDuel\ApiBundle\Libraries\Facebook\Facebook,
	CowboyDuel\ApiBundle\Form\UserType;
    
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
			
		$userFriends = null;
		$entityInfo['posts_On_Wall'] = null;
		if($entity->getSnetwork() == 'F')
		{
			$facebook = new Facebook(array(
					'appId'  => $this->container->getParameter('facebook_appId'),
					'secret' => $this->container->getParameter('facebook_secret'),
			));
			
			$idAuthenFacebook = HelperMethod::convertToFacebookId($entity->getAuthen());
			
		  	$userFriends = $facebook->api("/$idAuthenFacebook/friends");
		  	$userFriends = $userFriends['data'];
		  	
		  	$entityInfo['posts_On_Wall'] = $facebook->api("/$idAuthenFacebook/feed");
		  	$entityInfo['posts_On_Wall'] = $entityInfo['posts_On_Wall']['data'];
		}	
				
		$entityInfo['buy_items_store'] = $queryHolds->getBuyItemsStoreOfUser($id);
		$entityInfo['duels'] = HelperMethod::getDuelsWithFriends($queryHolds->getDuelsUser($id), $userFriends);		
					
		return array('data' 	=> $data,
					 'entity' 	=> $entity,
					 'entityInfo' => $entityInfo,
					 'location' => 'users_show_user');
	}
	
	/**
	 * @Route("/{id}/edit", name="users_edit_user")
	 * @Secure(roles="ROLE_ADMIN")
	 * @Template()
	 */
	public function editUserAction($id)
	{
		$em = $this->getDoctrine()->getEntityManager();
			
		$data = HelperMethod::setDataStatistic($em);
		$entity = $em->getRepository('CowboyDuelApiBundle:Users')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find entity.');
		}
		
		$editForm = $this->createForm(new UserType(), $entity);		
		$request = $this->getRequest();
		if ($request->getMethod() == 'POST')
		{
			$editForm->bindRequest($request);
		
			if ($editForm->isValid())
			{
				$em->persist($entity);
				$em->flush();
		
				return $this->redirect($this->generateUrl('users_show_user', array('id' => $entity->getUserId())));
			}
		}
			
		return array('data' 	=> $data,
					 'edit_form'=> $editForm->createView(),
					 'entity' 	=> $entity,
					 'location' => 'users_edit_user');
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
	
	/**
	 * @Route("/frozen", name="users_getFrozen")
	 * @Secure(roles="ROLE_ADMIN")
	 * @Template()
	 */
	public function getFrozenAction()
	{
		$em = $this->getDoctrine()->getEntityManager();
		$queryHolds = new HelperQuery($em);
	
		$query = $this->getRequest()->query;
		$sort = $query->get('sort');
			
		$data = HelperMethod::setDataStatistic($em);
		$data['list_frozen'] = $queryHolds->getUsers(array('sort' => $sort, 'frozen' => 1));
		$data['list_frozen_count'] = count($data['list_frozen']);
	
		return array('data' 	=> $data,
					 'location' => 'users_getFrozen');
	}
}
