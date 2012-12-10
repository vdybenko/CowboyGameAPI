<?php

namespace CowboyDuel\ApiBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'index.php/api');

        $this->assertTrue($crawler->filter('html:contains("Api")')->count() > 0);
        
        $this->assertGreaterThan(
        		0,
        		$crawler->filter('html:contains("Api")')->count()
        );       
    }
    
    public function testAuthorizationAction()
    {
    	$client = static::createClient();

    	$client->request(
        	'POST', '/api/authorization', 
        	array('id' => 'F:1sdsd'), /* request params */ 
        	array(), /* files */
        	array('X-Requested-With' => "XMLHttpRequest")
    	);
    	$this->assertEquals(200, $client->getResponse()->getStatusCode());  
    }
    
    public function testRegistrationAction()
    {
    	$client = static::createClient();    
    	$client->request(
    			'POST', '/api/registration',
    			  array("age" => "10/26/1987",
    				    "app_ver" => "2.2",
    				    "auth_key" => 12345,
    				    "authen_old" => "F:1sdsd",
    					"authentification" => "F:1sdsd",
    					"avatar" => "sd",
    					"bigest_win" => 0,
    					"current_language" => "ru",
    					"device_name" => "iPod3",
    					"device_token" => "",
    					"duels_lost" => 0,
    					"duels_win" => 0,
    					"facebook_name" => "Sergij Sobol",
    					"friends" => 0,
    					"home_town" => "",
    					"identifier" => "F:100002141165315",
    					"level" => 0,
    					"nickname" => "Sergij Sobol",
    					"os" => "5.1.1",
    					"points" => 0,
    					"region" => "ru_UA",
    					"remove_ads" => 0
    				   ),
    			array(),
    			array('X-Requested-With' => "XMLHttpRequest")
    	);
    	$this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
    
    public function testTransactionsAction()
    {
    	$client = static::createClient();
    	$client->request(
    			'POST', '/api/transactions',
    			array("authentification" => "F:1sdsd",
    					"session_id" => "50c0aa3c9dcf8",
    					"transactions" => "",),
    			array(),
    			array('X-Requested-With' => "XMLHttpRequest")
    	);
    	$this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

}
