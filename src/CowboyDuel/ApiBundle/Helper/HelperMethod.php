<?php
namespace CowboyDuel\ApiBundle\Helper;

use CowboyDuel\ApiBundle\Libraries\S3;

class HelperMethod 
{
	public function sendStatS3($container)
	{	
		S3::$use_ssl = $container->getParameter('S3_use_ssl');
		S3::setAuth($container->getParameter('S3_access_key'), $container->getParameter('S3_secret_key'));
		
		// List Buckets
		//var_dump($this->s3->listBuckets());
		$bucket = "bidoncd";
		S3::putObject(S3::inputFile($container->getParameter('S3_file_upload')), 
					  $bucket, 
					  $container->getParameter('S3_uri'), S3::ACL_PUBLIC_READ);
	}
}
