<?php
namespace CowboyDuel\ApiBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand,
 	Symfony\Component\Console\Input\InputArgument,
 	Symfony\Component\Console\Input\InputInterface,
 	Symfony\Component\Console\Input\InputOption,
 	Symfony\Component\Console\Output\OutputInterface;

ini_set("memory_limit","64M");

class UpdateTopUsersCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('update:ListTopUsers')
            ->setDescription('Update file on S3: List Top Users')
            ->addOption('time', null, InputOption::VALUE_NONE, 'Show time update')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {        
        $listTopUsers = $this->getContainer()->get('CowboyDuel.UpdateListTopUsers'); 
        $listTopUsers->update();
        
        $text = '';
        if ($input->getOption('time')) 
        	$text .= ' Updating time: '.time();        

        $output->writeln($text);
    }
}