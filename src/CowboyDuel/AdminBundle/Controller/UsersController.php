<?php
namespace CowboyDuel\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
	Symfony\Component\HttpFoundation\Response,
	JMS\SecurityExtraBundle\Annotation\Secure;

use CowboyDuel\AdminBundle\Helper\HelperQuery,
	CowboyDuel\AdminBundle\Helper\HelperMethod,
	CowboyDuel\AdminBundle\Helper\HelperQueryStatistic;
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
		$data['list_users'] = $queryHolds->getUsers($sort);
	
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
	
		return array('data' 	=> $data,
					 'entity' 	=> $entity,
					 'entityInfo' => $entityInfo,
					 'location' => 'users_show_user');
	}
	

}
