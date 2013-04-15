<?php

namespace CowboyDuel\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CowboyDuel\ApiBundle\Entity\Buyitemsstore
 *
 * @ORM\Table(name="buyitemsstore")
 * @ORM\Entity
 */
class Buyitemsstore
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $authenuser
     *
     * @ORM\Column(name="authenUser", type="string", length=50, nullable=false)
     */
    private $authenuser;

    /**
     * @var integer $itemidstore
     *
     * @ORM\Column(name="itemIdStore", type="integer", nullable=false)
     */
    private $itemidstore;

    /**
     * @var integer $transactionsid
     *
     * @ORM\Column(name="transactionsId", type="integer", nullable=false)
     */
    private $transactionsid;

    /**
     * @var integer $date
     *
     * @ORM\Column(name="date", type="integer", nullable=false)
     */
    private $date;



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
     * Set itemidstore
     *
     * @param integer $itemidstore
     * @return Buyitemsstore
     */
    public function setItemidstore($itemidstore)
    {
        $this->itemidstore = $itemidstore;
    
        return $this;
    }

    /**
     * Get itemidstore
     *
     * @return integer 
     */
    public function getItemidstore()
    {
        return $this->itemidstore;
    }

    /**
     * Set transactionsid
     *
     * @param integer $transactionsid
     * @return Buyitemsstore
     */
    public function setTransactionsid($transactionsid)
    {
        $this->transactionsid = $transactionsid;
    
        return $this;
    }

    /**
     * Get transactionsid
     *
     * @return integer 
     */
    public function getTransactionsid()
    {
        return $this->transactionsid;
    }

    /**
     * Set date
     *
     * @param integer $date
     * @return Buyitemsstore
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return integer 
     */
    public function getDate()
    {
        return $this->date;
    }
}