<?php

namespace AUMBotBundle\Step;

/**
 * Login
 */
class LoginStep extends AbstractStep
{
    /**
     * Run
     */
    public function process()
    {
        $this->getLogger()->info('Login');
        
        $this->getSession()->visit('https://www.adopteunmec.com');
        $page = $this->getSession()->getPage();
        
        $page->findField('mail')
            ->setValue($this->getParameters()['login']);
        
        $page->findField('password')
            ->setValue($this->getParameters()['password']);
        
        $page->findById('login')
            ->submit();
        
        sleep(3);
    }
    
    /**
     * @param array $parameters
     */
    public function setParameters(array $parameters)
    {
        parent::setParameters($parameters['step_login']);
    }

}

