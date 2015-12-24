<?php

namespace AUMBotBundle\Step;

/**
 * Search
 */
class SearchStep extends AbstractStep
{   
    /**
     * Run
     */
    public function process()
    {
        $this->getLogger()->info('Search');
        
        $this->getSession()->visit('https://www.adopteunmec.com/mySearch');
        
        $page = $this->getSession()->getPage();
        
        $page->findById('search-form')
            ->submit();
        
        sleep(3);
    }
}