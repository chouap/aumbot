<?php

namespace AUMBotBundle\Step;

abstract class AbstractStep implements StepInterface
{
    /**
     * @var Behat\Mink\Session
     */
    private $session;
    
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;
    
    /**
     * @var array
     */
    private $parameters;
    
    /**
     * @param \Behat\Mink\Session $session
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(\Behat\Mink\Session $session, \Psr\Log\LoggerInterface $logger)
    {
        $this->session = $session;
        $this->logger = $logger;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     */
    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * @return \AUMBotBundle\Step\Behat\Mink\Session
     */
    public function getSession()
    {
        return $this->session;
    }
    
    /**
     * @return \Psr\Log\LoggerInterface
     */
    public function getLogger()
    {
        return $this->logger;
    }
}