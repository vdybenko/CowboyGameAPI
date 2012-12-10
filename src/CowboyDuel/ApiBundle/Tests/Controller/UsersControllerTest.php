<?php

namespace CowboyDuel\ApiBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UsersControllerTest extends WebTestCase
{
    public function testTopRankOnInterspaceAction()
    {
        $client = static::createClient();
    	$client->request(
    			'POST', '/users/top_rank_on_interspace',
    			array("authentification" => "F:1sdsd"),
    			array(),
    			array('X-Requested-With' => "XMLHttpRequest")
    	);
    	$this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
    public function testGetUserDataAction()
    {
    	$client = static::createClient();
    	$client->request(
    			'POST', '/users/get_user_data',
    			array("authentification" => "F:1sdsd"),
    			array(),
    			array('X-Requested-With' => "XMLHttpRequest")
    	);
    	$this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
    public function testSet_user_dataAction()
    {
    	$client = static::createClient();
    	$client->request(
    			'POST', '/users/set_user_data',
    			array("authentification" => "F:1sdsd",
    				  "level" => 0,
    				  "points" => 10,
    				  "duels_win" => 10,
    				  "duels_lost" => 0,
    				  "bigest_win" => 10
    				 ),
    			array(),
    			array('X-Requested-With' => "XMLHttpRequest")
    	);
    	$this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
