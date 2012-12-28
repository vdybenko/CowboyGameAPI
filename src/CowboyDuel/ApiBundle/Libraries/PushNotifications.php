<?php
namespace CowboyDuel\ApiBundle\Libraries;

class PushNotifications 
{		
		private $apnsHost = 'gateway.sandbox.push.apple.com';
		//private $apnsHost = 'gateway.push.apple.com';
		private $apnsPort = '2195';
		private $sslPem = 'apns-dev.pem';
		private $passPhrase = '1111';
		
		private $apnsConnection;
	
		function __construct($container)
		{
			$this->sslPem = $container->get('kernel')->getRootdir().'/apns-dev.pem';		
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
		}
	
		function closeConnection()
		{
			fclose($this->apnsConnection);
		}
		
		public function send($device_token, $msg, $badge = 3)
		{
			$payload['aps'] = array('alert' => $msg, 'badge' => (int) $badge, 'sound' => 'default');
			$payload_json = json_encode($payload);
			
			$pushNotifications->sendNotification($device_token, $payload_json);
			$pushNotifications->closeConnection();
		}
	}
