<?php

namespace AUMBotBundle\Service;

class LinkService
{
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $em;
    
    /**
     * 
     * @param integer $id
     * @return array
     */
    public function getLinks()
    {
        $result = [];
        $links = $this->getEm()->getRepository('AUMBotBundle\Entity\Link')->findAll();
        foreach ($links as $link) {
            $result[$link->getLocation()] = $link;
        }
        return $result;
    }
    
    public function isLinkExist($url)
    {
        $links = $this->getEm()->getRepository('AUMBotBundle\Entity\Link')->findBy(['location' => $url]);
        
        return count($links) > 0;
    }
    
    /**
     * 
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getAvailableLinks()
    {
        return $this->getEm()->getRepository('AUMBotBundle\Entity\Link')->findBy(['isDeleted' => 0]);
    }
    
    /**
     * @param string $url
     */
    public function saveLink($url)
    {
        $link = new \AUMBotBundle\Entity\Link();
        $link->setLocation($url);
        $link->setVisitcount(0);
        $link->setIsDeleted(0);
        $link->setCreateAt(new \DateTime());
        
        $this->getEm()->persist($link);
        $this->getEm()->flush();
    }
    
    public function updateLink()
    {
        $this->getEm()->flush();
    }
    
    /**
     * @return \Doctrine\ORM\EntityManagerInterface
     */
    function getEm()
    {
        return $this->em;
    }

    /**
     * @param \Doctrine\ORM\EntityManagerInterface $em
     */
    function setEm(\Doctrine\ORM\EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    
}