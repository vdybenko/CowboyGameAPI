<?php
switch (getenv('APPLICATION_ENV'))
{
	case 'development':
			$nameSpace = "dev";
		break;
	case 'jura':
			$nameSpace = "jura";
		break;
    case 'tepalenko':
                $nameSpace = "tepalenko";
            break;

	case 'testing':
			$nameSpace = "test";
		break;
	case 'production':
			$nameSpace = "prod";
		break;
	default:
		exit('The application environment is not set correctly.');
}

require_once __DIR__.'/../app/bootstrap.php.cache';
require_once __DIR__.'/../app/AppKernel.php';
require_once __DIR__.'/../app/AppCache.php';

use Symfony\Component\HttpFoundation\Request;

$kernel = new AppKernel($nameSpace, true);
$kernel->loadClassCache();
// wrap the default AppKernel with the AppCache one
$kernel = new AppCache($kernel);
$kernel->handle(Request::createFromGlobals())->send();