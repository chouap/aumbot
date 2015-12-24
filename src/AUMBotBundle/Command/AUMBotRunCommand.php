<?php

namespace AUMBotBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AUMBotRunCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('aumbot:run')
            ->setDescription('...')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $runner = $this->getContainer()->get('aum_bot.step_runner');
        $runner->run();
    }

}
