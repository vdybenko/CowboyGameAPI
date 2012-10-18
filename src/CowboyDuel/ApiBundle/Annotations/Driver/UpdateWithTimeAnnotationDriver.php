<?php
namespace CowboyDuel\ApiBundle\Annotations\Driver;

use Doctrine\Common\Annotations\Reader,
 	Symfony\Component\HttpKernel\Event\FilterControllerEvent,
 	CowboyDuel\ApiBundle\Annotations\UpdateWithTime, 	
	Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UpdateWithTimeAnnotationDriver
{

	private $reader;
	
	private static $timeUpdate;

	public function __construct($reader)
	{
		$this->reader = $reader;//Получаем читалку аннотаций
	}
	
	/**
	 * Это событие возникнет при вызове любого контроллера
	 */
	public function onKernelController(FilterControllerEvent $event)
	{

		if (!is_array($controller = $event->getController())) 
		{ //Выходим, если нет контроллера
			return;
		}

		$object = new \ReflectionObject($controller[0]); // Получаем контроллер
		$method = $object->getMethod($controller[1]); 	 // Получаем метод

		foreach ($this->reader->getMethodAnnotations($method) as $configuration) 
		{ //Начинаем читать аннотации
			if(isset($configuration->time))
			{//Если прочитанная аннотация наша, то выполняем код ниже
				
				if(self::$timeUpdate == null) self::$timeUpdate = time();
				
				throw new AccessDeniedHttpException("".self::$timeUpdate);
							
			}			
		}
	}
}