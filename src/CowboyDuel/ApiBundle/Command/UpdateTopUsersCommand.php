<?php
namespace CowboyDuel\ApiBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand,
 	Symfony\Component\Console\Input\InputArgument,
 	Symfony\Component\Console\Input\InputInterface,
 	Symfony\Component\Console\Input\InputOption,
 	Symfony\Component\Console\Output\OutputInterface;

class UpdateTopUsersCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('update:store')
            ->setDescription('Update file on S3 top users')
            ->addArgument('name', InputArgument::OPTIONAL, 'Who do you want to greet?')
            ->addOption('time', null, InputOption::VALUE_NONE, 'Show time update')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        
        

        if ($input->getOption('time')) 
        {
            $text .= ' '.$time;
        }

        $output->writeln($text);
    }
}
/*
 namespace Acme\DemoBundle\Controller; 
 use Symfony\Component\DependencyInjection\ContainerInterface; // Сервис для управления состоянием задач
 
 class State 
 { 
 	private $container; 
 	public function __construct(ContainerInterface $container) 
 	{
 
		$this->container = $container;
	} 
public function update()
{
	$em = $this->container ->get('doctrine') ->getEntityManager(); 
	$currentDate = new \DateTime('now'); //запрос на все задачи 
	$query = $em->createQueryBuilder() 
	->select('t') 
	->from('AcmeDemoBundle:Task', 't') 
	->getQuery() ; 
	$tasks = $query->getResult();
	 if($tasks) { foreach($tasks as $task) 
	 { 
	 	$diff = $task->getPlan()->getTimestamp() - $currentDate->getTimestamp(); 
	 	if($diff > 0 && (($diff / 86400) > 1)) 
	 	{ //если просрочена планируемая дата, то ставим статус Не выполнено 
	 		$state = $em->getRepository('AcmeDemoBundle:State')->findOneByName('Не выполнено'); 
	 		if($state) { $task->setState($state); } } 
	 		else { $task->setState(null); } } 
	 		$em->flush(); 
	 } 
} 
}
	 }*/