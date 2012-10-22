<?php

namespace CowboyDuel\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CowboyDuel\ApiBundle\Entity\Buyitemsstore
 *
 * @ORM\Table(name="buyitemsstore")
 * @ORM\Entity
 */
class BuyItemsStore
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $authenuser
     *
     * @ORM\Column(name="authenUser", type="string", length=50, nullable=true)
     */
    private $authenuser;

    /**
     * @var integer $iditemstore
     *
     * @ORM\Column(name="idItemStore", type="integer", nullable=true)
     */
    private $iditemstore;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set authenuser
     *
     * @param string $authenuser
     * @return Buyitemsstore
     */
    public function setAuthenuser($authenuser)
    {
        $this->authenuser = $authenuser;
    
        return $this;
    }

    /**
     * Get authenuser
     *
     * @return string 
     */
    public function getAuthenuser()
    {
        return $this->authenuser;
    }

    /**
     * Set iditemstore
     *
     * @param integer $iditemstore
     * @return Buyitemsstore
     */
    public function setIditemstore($iditemstore)
    {
        $this->iditemstore = $iditemstore;
    
        return $this;
    }

    /**
     * Get iditemstore
     *
     * @return integer 
     */
    public function getIditemstore()
    {
        return $this->iditemstore;
    }
}