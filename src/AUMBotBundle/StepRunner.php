<?php

namespace AUMBotBundle;

class StepRunner
{
    /**
     * @var \Behat\Mink\Session
     */
    private $session;
    
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;
    
    /**
     * @var array
     */
    private $steps = [];
            
    /**
     * @param \Behat\Mink\Session $session
     * @param \Psr\Log\LoggerInterface $logger
     */
    function __construct(\Behat\Mink\Session $session,  \Psr\Log\LoggerInterface $logger)
    {
        $this->session = $session;
        $this->logger = $logger;
    }

    function addStep($step)
    {
        $this->steps[] = $step;
    }
    
    /**
     * Run all steps
     */
    public function run()
    {
        $this->session->start();
        
        foreach ($this->steps as $step) {
            $step->process();
        }
        
        $this->session->stop();
    }

}

