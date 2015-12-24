<?php

namespace AUMBotBundle\Step;

/**
 * Browse and save profiles
 */
class ResultStep extends AbstractStep
{  
    /**
     * @var \AUMBotBundle\Service\LinkService
     */
    private $linkService;
    
    /**
     * Run
     */
    public function process()
    {
        $this->getLogger()->info('Load profile');
        
        $scrollLength = 1000;
        $currentScroll = 0;
        $continue = true;
        $OldElementsNb = 0;
        while ($continue) {
            $this->getSession()->getDriver()->executeScript('scroll(0, ' . ($currentScroll += $scrollLength) . ');');
            sleep(1.5);
            $page = $this->getSession()->getPage();
            $elements = $page->findById('user-grid')->findAll('xpath', '//a[starts-with(@href, "https://www.adopteunmec.com/profile")]');
            if ($OldElementsNb === count($elements)) {
                $continue = false;
            }
            $OldElementsNb = count($elements);
        }
        $this->saveElements($elements);
    }
    
    /**
     * @param array $elements
     */
    protected function saveElements(array $elements)
    {
        $this->getLogger()->info('Save links');
        
        $links = $this->getLinkService()->getLinks();
        
        foreach ($elements as $link) {
            $url = $link->getAttribute('href');
            if (!isset($links[$url])) {
                $this->getLinkService()->saveLink($url);
            }
        }
    }

    /**
     * @return \AUMBotBundle\Service\LinkService
     */
    function getLinkService()
    {
        return $this->linkService;
    }

    /**
     * @param \AUMBotBundle\Service\LinkService $linkService
     */
    function setLinkService(\AUMBotBundle\Service\LinkService $linkService)
    {
        $this->linkService = $linkService;
    }

}