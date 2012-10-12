<?php
namespace CowboyDuel\ApiBundle\Libraries;
/*
Info: http://blog.boxedice.com/2009/07/10/how-to-build-an-apple-push-notification-provider-server-tutorial/

============= Using the class ===============

$config = array('sound' => 'default', 'msg_sufix' => 'something');
$this->load->library('apns', $config);
$this->apns->connect();
$this->apns->send();
$this->apns->disconnect();

============= Message structure =============
Command  TokenLength  DeviceToken  PayloadLength  Payload
   1          2           32             2          219

*/

class apns
{
    private $payload_max_size = 219;
    private $apns_host = 'gateway.sandbox.push.apple.com'; // gateway.push.apple.com - production host     		
    private $ssl_pem = 'apns-dev.pem'; // apns-prod.pem - production certificate  	
    private $apns_port = '2195';
    private $pass_phrase = '';			
	private $apns_connection;    
    private $sound = 'default';
    private $msg_sufix = ' написал вам';
    private $msg_prefix = '';
	
    function __construct($props = array())
    {
        if (count($props) > 0)
		{
			$this->init($props);
		}
    }
    
    function init($config = array())
	{
		$defaults = array(
            'sound'       => 'default',
            'msg_sufix'   => ' написал вам',
            'msg_prefix'  => '',
            'apns_host'   => 'gateway.sandbox.push.apple.com',
            'ssl_pem'     => 'apns-dev.pem',
            'apns_port'   => '2195',
            'pass_phrase' => ''
        );
		
		foreach ($defaults as $key => $value)
		{
			 $this->$key = isset($config[$key]) ? $config[$key] : $value;
		}

	}
    
	function connect()
	{
		$stream_context = stream_context_create();
		stream_context_set_option($stream_context, 'ssl', 'local_cert', $this->ssl_pem);
		stream_context_set_option($stream_context, 'ssl', 'pass_phrase', $this->pass_phrase);

		$this->apns_connection = stream_socket_client('ssl://'.$this->apns_host.':'.$this->apns_port, $error, $error_string, 60, STREAM_CLIENT_CONNECT, $stream_context);
		if($this->apns_connection == false)
		{
			print "Failed to connect {$error} {$error_string}\n";
			$this->disconnect();
		}
	}		
	
	function send($device_token, $user_id, $badge, $msg)
	{
        $payload = $this->prepare_payload($user_id, $badge, $msg);
		$apns_message = chr(0) . chr(0) . chr(32) . pack('H*', str_replace(' ', '', $device_token)) . chr(0) . chr(strlen($payload)) . $payload;		
		fwrite($this->apns_connection, $apns_message);
	}
    
    private function prepare_payload($user_id, $badge, $msg)    
    {
        $payload['aps'] = array('alert' => $this->msg_prefix . $msg . $this->msg_sufix, 
                                'badge' => (int)$badge, 
                                'sound' => $this->sound);
        $payload['i'] = array('u' => (int)$user_id);
        $payload_json = json_encode($payload);
        
        // Cut the message if it is too long
        if (strlen($payload_json) > $this->payload_max_size)
        {
            $bytes_to_strip = strlen($payload_json) - $this->payload_max_size;    
            $symbols_to_strip = ceil($bytes_to_strip / 6);        
            $msg = mb_substr($msg, 0, (-1) * $symbols_to_strip, 'UTF-8') . '..';        
            $payload['aps']['alert'] = $this->msg_prefix . $msg . $this->msg_sufix;
            $payload_json = json_encode($payload);
        }
        
        return $payload_json;
    }
	
	function disconnect()
	{		
		fclose($this->apns_connection);     
	}
}

