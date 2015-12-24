<?php

namespace AUMBotBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Link
 *
 * @ORM\Table(name="link")
 * @ORM\Entity
 */
class Link
{
    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=100, nullable=false)
     */
    private $location;

    /**
     * @var integer
     *
     * @ORM\Column(name="visit_count", type="integer", nullable=false)
     */
    private $visitcount;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="is_deleted", type="integer", nullable=false)
     */
    private $isDeleted;
    
    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="create_at", type="datetime", nullable=false)
     */
    private $createAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set location
     *
     * @param string $location
     *
     * @return Link
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set visitcount
     *
     * @param integer $visitcount
     *
     * @return Link
     */
    public function setVisitcount($visitcount)
    {
        $this->visitcount = $visitcount;

        return $this;
    }

    /**
     * Get visitcount
     *
     * @return integer
     */
    public function getVisitcount()
    {
        return $this->visitcount;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    
    function getIsDeleted()
    {
        return $this->isDeleted;
    }

    function getCreateAt()
    {
        return $this->createAt;
    }

    function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;
    }

    function setCreateAt(\DateTime $createAt)
    {
        $this->createAt = $createAt;
    }


}
