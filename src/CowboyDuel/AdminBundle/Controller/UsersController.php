<?php
namespace CowboyDuel\AdminBundle\Controller;

use CowboyDuel\ApiBundle\Entity\Users;

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
        $idAuthenFacebook = '';
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
					
		return array('idAuthenFacebook' => $idAuthenFacebook,
                     'data' 	        => $data,
					 'entity' 	        => $entity,
					 'entityInfo'       => $entityInfo,
					 'location'         => 'users_show_user');
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
			//$editForm->bindRequest($request);
			
			$entity
				->setAuthen($request->get('authen'))
				->setNickname($request->get('nickname'))
				->setAvatar($request->get('avatar'))
				->setAge($request->get('age_year').'-'
						.$request->get('age_month').'-'
						.$request->get('age_day')) 
				->setRegion($request->get('region'))
				->setHomeTown($request->get('homeTown'))
				->setCurrentLanguage($request->get('currentLanguage'))
				->setDeviceName($request->get('deviceName'))
				->setSnetwork($request->get('snetwork'))
				->setOs($request->get('os'))
				->setPoints($request->get('points'))
				->setMoney($request->get('money'))
				->setSessionId($request->get('session_id'))
				->setDuelsWin($request->get('duelsWin'))
				->setDuelsLost($request->get('duelsLost'))
				->setRemoveAds($request->get('removeAds'))				
				->setSnetwork($request->get('friends'))
				->setSnetwork($request->get('identifier'))	
				->setAppVer($request->get('app_ver'))
				->setLevel($request->get('level'))
				->setBigestWin($request->get('bigestWin'))
				->setFriends($request->get('friends'))
				->setIdentifier($request->get('identifier'))				
			;		
			$em->persist($entity);
			$em->flush();
		
			return $this->redirect($this->generateUrl('users_show_user', array('id' => $entity->getUserId())));
		}
			
		return array('data' 	=> $data,
					 'edit_form'=> $editForm->createView(),
					 'entity' 	=> $entity,
					 'location' => 'users_edit_user');
	}
	
	/**
	 * @Route("/add", name="users_add_user")
	 * @Secure(roles="ROLE_ADMIN")
	 * @Template()
	 */
	public function addUserAction()
	{
		$em = $this->getDoctrine()->getEntityManager();			
		$data = HelperMethod::setDataStatistic($em);
		
		$entity = new Users();		
		$snetwork = $this->getRequest()->query->get('snetwork');
		if(!empty($snetwork))
		{
			$entity
				->setSnetwork($snetwork)
				->setAuthen($snetwork.":")
				->setIdentifier($snetwork.":")
				->setDataAge("now")
				->setMoney(200)
				->setLevel(0)
				->setPoints(0)
				->setDuelsWin(0)
				->setDuelsLost(0)
				->setBigestWin(0)
				->setFriends(0)
			;
		}		
		$addForm = $this->createForm(new UserType(), $entity);
		$request = $this->getRequest();
		if ($request->getMethod() == 'POST')
		{			
			$entity
				->setAuthen($request->get('authen'))
				->setNickname($request->get('nickname'))
				->setAvatar($request->get('avatar'))
				->setAge($request->get('age_year').'-'
						.$request->get('age_month').'-'
						.$request->get('age_day')) 
				->setRegion($request->get('region'))
				->setHomeTown($request->get('homeTown'))
				->setCurrentLanguage($request->get('currentLanguage'))
				->setDeviceName($request->get('deviceName'))
				->setSnetwork($request->get('snetwork'))
				->setOs($request->get('os'))
				->setPoints($request->get('points'))
				->setMoney($request->get('money'))
				->setSessionId($request->get('session_id'))
				->setDuelsWin($request->get('duelsWin'))
				->setDuelsLost($request->get('duelsLost'))
				->setRemoveAds($request->get('removeAds'))				
				->setSnetwork($request->get('friends'))
				->setSnetwork($request->get('identifier'))	
				->setAppVer($request->get('app_ver'))
				->setLevel($request->get('level'))
				->setBigestWin($request->get('bigestWin'))
				->setFriends($request->get('friends'))
				->setIdentifier($request->get('identifier'))				
				->setLastLogin(0)
				->setFirstLogin(0)				
				->setType("")
				->setDeviceToken("")
				->setDate(time());
			;
				
			$em->persist($entity);
			$em->flush();
	
			return $this->redirect($this->generateUrl('users_show_user', array('id' => $entity->getUserId())));
		}			
		return array('data' 	=> $data,
					 'add_form' => $addForm->createView(),
					 'entity' 	=> $entity,
					 'location' => 'users_add_user');
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
