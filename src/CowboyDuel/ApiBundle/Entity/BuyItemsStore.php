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
     * @ORM\Column(name="authenUser", type="string", length=50, nullable=false)
     */
    private $authenuser;

    /**
     * @var integer $itemIdStore
     *
     * @ORM\Column(type="integer", nullable=false)
     */
    private $itemIdStore;
    
    /**
     * @var integer $transactionsId
     *
     * @ORM\Column(type="integer", nullable=false)
     */
    private $transactionsId;
    
    /**
     * @var integer $date
     *
     * @ORM\Column(type="integer", nullable=false)
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
     * Set itemIdStore
     *
     * @param integer $itemIdStore
     * @return Buyitemsstore
     */
    public function setItemIdStore($itemIdStore)
    {
        $this->itemIdStore = $itemIdStore;
    
        return $this;
    }
    /**
     * Get itemIdStore
     *
     * @return integer 
     */
    public function getItemIdStore()
    {
        return $this->itemIdStore;
    }
    
    /**
     * Set transactionsId
     *
     * @param integer $transactionsId
     * @return Buyitemsstore
     */
    public function setTransactionsId($transactionsId)
    {
    	$this->transactionsId = $transactionsId;
    
    	return $this;
    }
    /**
     * Get transactionsId
     *
     * @return integer
     */
    public function getTransactionsId()
    {
    	return $this->transactionsId;
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