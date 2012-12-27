<?php

error_reporting(E_ALL);

class pushNotifications
{
	private $apnsHost = 'gateway.sandbox.push.apple.com';
	//private $apnsHost = 'gateway.push.apple.com';	
	private $apnsPort = '2196';	
	private $sslPem = 'apns-dev.pem';	
	private $passPhrase = '1111';			
	
	private $apnsConnection;	
	
	function __construct()
	{		
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
}

// ================= Testing =======================
if (isset($_POST['submit']))
{          
    $device_token = $_POST['token'];
    $badge = $_POST['badge'];    
    $msg_body = $_POST['message'];
    $sound = $_POST['sound'];
    
    $payload_max_size = 219;
    $payload['aps'] = array('alert' => $msg_body, 'badge' => (int)$badge, 'sound' => $sound);    
    $payload_json = json_encode($payload);    
    
    // Push notification
    $pushNotifications = new pushNotifications();
    $pushNotifications->sendNotification($device_token, $payload_json); 
    $pushNotifications->closeConnection();
}
//phpinfo(); die;
// ===================== Form =======================
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />	
	<title>PUSH</title>
    <style type="text/css">
    body {font:Arial;}
    </style>
</head>

<body>

  <p>Token: bb472315da3cdccb718bc92b1f613fe2d8d0914ab8c0edc6b0307dcf5bde90ff</p>  
  
  <form method="post">
    <table>
      <tr>
        <td>Device token</td>
        <td><input type="text" name="token" value="bb472315da3cdccb718bc92b1f613fe2d8d0914ab8c0edc6b0307dcf5bde90ff" /></td>
      </tr>
      <tr>
        <td>Badge</td>
        <td><input type="text" name="badge" value="3" /></td>
      </tr>
      <tr>
        <td>Message</td>
        <td><input type="text" name="message" value="Hello world" /></td>
      </tr>      
      <tr>
        <td>Sound</td>
        <td><input type="text" name="sound" value="default" /></td>
      </tr>      
      <tr>
        <td><input type="submit" name="submit" value="Push!" /></td>
        <td><?php if (isset($_POST['submit'])) echo 'Push sent'; ?></td>
      </tr>
    </table>
  </form>
  
</body>
</html>
