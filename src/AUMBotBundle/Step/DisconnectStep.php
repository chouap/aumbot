<?php

namespace AUMBotBundle\Step;

/**
 * Disconnect
 */
class DisconnectStep extends AbstractStep
{
    public function process()
    {
        $this->getLogger()->info('Disconection');
        $this->getSession()->visit('https://www.adopteunmec.com/auth/logout');
    }
}