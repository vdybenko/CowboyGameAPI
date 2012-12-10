<?php
namespace CowboyDuel\ApiBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UsersModelTest extends WebTestCase
{
	/**
	 * @var EntityManager
	 */
	private $_em;

	protected function setUp()
	{
		$kernel = static::createKernel();
		$kernel->boot();
		$this->_em = $kernel->getContainer()->get('doctrine.orm.entity_manager');
		$this->_em->beginTransaction();
	}

	/**
	 * Rollback changes.
	 */
	public function tearDown()
	{
		$this->_em->rollback();
	}

	public function testUsersFindOne()
	{
		$user = $this->_em->getRepository('CowboyDuelApiBundle:Users')->find(1);
	}
}