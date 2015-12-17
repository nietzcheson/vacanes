<?php

namespace AppBundle\Command;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class WatcherPushCommand extends ContainerAwareCommand
{
    private $watcherNextService;

    protected function configure()
    {
        $this
            ->setName('petvalet:watcher:push')
            ->setDescription('Alerting watchers his next service')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->watcherNextService = $this->getContainer()->get('watcher_next_service')->execute();

        $output->writeln($this->watcherNextService);
    }
}
