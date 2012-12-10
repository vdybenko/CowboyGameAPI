<?php

namespace CowboyDuel\ApiBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StoreControllerTest extends WebTestCase
{
    public function testBoughtIndex()
    {
        $client = static::createClient();
    	$client->request(
    			'POST', '/store/bought',
    			array("authentification" => "F:1sdsd",
    				  "itemId" => "4",
    				  "transactionsId" => ""),
    			array(),
    			array('X-Requested-With' => "XMLHttpRequest")
    	);
    	$this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
    public function testGetBuyItemsStoreIndex()
    {
    	$client = static::createClient();
    	$client->request(
    			'POST', '/store/get_buy_items_user',
    			array("authentification" => "F:1sdsd"),
    			array(),
    			array('X-Requested-With' => "XMLHttpRequest")
    	);
    	$this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
