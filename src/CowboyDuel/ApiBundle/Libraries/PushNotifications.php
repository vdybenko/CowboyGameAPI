<?php
namespace CowboyDuel\ApiBundle\Libraries;

class PushNotifications 
{		
		//private $apnsHost = 'gateway.sandbox.push.apple.com';
		private $apnsHost = 'gateway.push.apple.com';
		private $apnsPort = '2195';
		private $sslPem = 'apns.pem';
		private $passPhrase = '1111';
		
		private $apnsConnection;

        private $container;
	
		function __construct($container)
		{
            $this->container = $container;
			$this->sslPem = $container->get('kernel')->getRootdir().'/apns.pem';		
			$this->connectToAPNS();
		}
	
		function connectToAPNS()
		{
			$streamContext = stream_context_create();
			stream_context_set_option($streamContext, 'ssl', 'local_cert', $this->sslPem);
			stream_context_set_option($streamContext, 'ssl', 'passphrase', $this->passPhrase);
	
			$this->apnsConnection = stream_socket_client('ssl://'.$this->apnsHost.':'.$this->apnsPort, $error, $errorString, 60, STREAM_CLIENT_CONNECT, $streamContext);
			if($this->apnsConnection == false)
			{
				print "Failed to connect {$error} {$errorString}\n";
				$this->closeConnection();
			}
		}
	
		function sendNotification($deviceToken, $message)
		{
			$apnsMessage = chr(0) . chr(0) . chr(32) . pack('H*', str_replace(' ', '', $deviceToken)) . chr(0) . chr(strlen($message)) . $message;
			fwrite($this->apnsConnection, $apnsMessage);

            $logger = $this->container->get('CowboyDuel.Logger');
            $logger->info('[push] '.$apnsMessage);
		}
	
		function closeConnection()
		{
			fclose($this->apnsConnection);
		}
		
		public function send($device_token, $msg, $name = '', $id = '', $type = 1)
		{
			if($device_token == '' || $device_token == null) return false;
			$payload['aps'] = array('alert' => $msg, 'badge' => (int) 1, 'sound' => 'default');
			$payload['i'] =  array('t' => $type, 'n' => $name, 'id' => $id);
			$payload_json = json_encode($payload);
			
			$this->sendNotification($device_token, $payload_json);
		}
	}
