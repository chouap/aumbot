<?php
namespace AUMBotBundle\Step;

/**
 * Visit profiles
 */
class VisitStep extends AbstractStep
{
    /**
     * @var \AUMBotBundle\Service\LinkService
     */
    private $linkService;
      
    public function process()
    {
        $this->getLogger()->info('Visit step');
        $links = $this->getLinkService()->getAvailableLinks();
        
        foreach ($links as $link) {
            $visitNb = $link->getVisitcount();
            while ($visitNb < $this->getParameters()['max_visit']) {
                $this->getLogger()->info('Visit: ' . $link->getLocation());
                $this->getSession()->visit($link->getLocation());
                sleep($this->getParameters()['waiting_second']);
                
                $elements = $this->getSession()->getPage()->findAll('xpath', '//div[@class="last-cnx"]');
                
                if (0 === count($elements) || 'EN LIGNE' !== strtoupper(trim($elements[0]->getText()))) {
                    break;
                }
                $visitNb++;
            }
            $link->setVisitCount($visitNb);
            $link->setIsDeleted(1);
            $this->getLinkService()->updateLink();
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
    
    public function setParameters(array $parameters)
    {
        parent::setParameters($parameters['step_visit']);
    }
}