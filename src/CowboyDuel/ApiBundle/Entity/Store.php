<?php

namespace CowboyDuel\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CowboyDuel\ApiBundle\Entity\Store
 *
 * @ORM\Table(name="store")
 * @ORM\Entity
 */
class Store
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
     * @var string $type
     *
     * @ORM\Column(name="type", type="string", length=20)
     */
    private $type;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=50)
     */
    private $title;

    /**
     * @var integer $damagedefense
     *
     * @ORM\Column(type="integer")
     */
    private $damageOrDefense = 0;
    
    /**
     * @var float $frequently
     *
     * @ORM\Column(type="float")
     */
    private $frequently;

    /**
     * @var integer $golds
     *
     * @ORM\Column(name="golds", type="integer")
     */
    private $golds = 0;

    /**
     * @var integer $inappid
     *
     * @ORM\Column(name="inAppId", type="string")
     */
    private $inappid = "";

    /**
     * @var string $thumb
     *
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $thumb = "";
    
    /**
     * @var string $thumbRetina
     *
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $thumbRetina = "";

    /**
     * @var string $img
     *
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $img = "";
    
    /**
     * @var string $imgRetina
     *
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $imgRetina = "";

    /**
     * @var string $bigImg
     *
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $bigImg = "";
    
    /**
     * @var string $bigImgRetina
     *
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $bigImgRetina = "";
    
    /**
     * @var string $sound
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $sound = "";    
    
    /**
     * @var string $description
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $description = "";

    /**
     * @var integer $levelLock
     *
     * @ORM\Column(type="integer")
     */
    private $levelLock = 0;



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
     * Set type
     *
     * @param string $type
     * @return Store
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Store
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set damageOrDefense
     *
     * @param integer $damageOrDefense
     * @return Store
     */
    public function setDamageOrDefense($damageOrDefense)
    {
        $this->damageOrDefense = $damageOrDefense;
    
        return $this;
    }
    /**
     * Get damageOrDefense
     *
     * @return integer 
     */
    public function getDamageOrDefense()
    {
        return $this->damageOrDefense;
    }
    
    /**
     * Set frequently
     *
     * @param float $frequently
     * @return Store
     */
    public function setFrequently($frequently)
    {
    	$this->frequently = $frequently;
    
    	return $this;
    }
    /**
     * Get frequently
     *
     * @return float
     */
    public function getFrequently()
    {
    	return $this->frequently;
    }

    /**
     * Set golds
     *
     * @param integer $golds
     * @return Store
     */
    public function setGolds($golds)
    {
        $this->golds = $golds;
    
        return $this;
    }

    /**
     * Get golds
     *
     * @return integer 
     */
    public function getGolds()
    {
        return $this->golds;
    }
    /**
     * Set inappid
     *
     * @param string $inappid
     * @return Store
     */
    public function setInappid($inappid)
    {
        $this->inappid = $inappid;
    
        return $this;
    }

    /**
     * Get inappid
     *
     * @return string 
     */
    public function getInappid()
    {
        return $this->inappid;
    }

    /**
     * Set thumb
     *
     * @param string $thumb
     * @return Store
     */
    public function setThumb($thumb)
    {
        $this->thumb = $thumb;
    
        return $this;
    }
    /**
     * Get thumb
     *
     * @return string 
     */
    public function getThumb()
    {
        return $this->thumb;
    }
    
    /**
     * Set thumbRetina
     *
     * @param string $thumbRetina
     * @return Store
     */
    public function setThumbRetina($thumbRetina)
    {
    	$this->thumbRetina = $thumbRetina;
    
    	return $this;
    }
    /**
     * Get thumbRetina
     *
     * @return string
     */
    public function getThumbRetina()
    {
    	return $this->thumbRetina;
    }

    /**
     * Set img
     *
     * @param string $img
     * @return Store
     */
    public function setImg($img)
    {
        $this->img = $img;
    
        return $this;
    }
    /**
     * Get img
     *
     * @return string 
     */
    public function getImg()
    {
        return $this->img;
    }
    
    /**
     * Set imgRetina
     *
     * @param string $imgRetina
     * @return Store
     */
    public function setImgRetina($imgRetina)
    {
    	$this->imgRetina = $imgRetina;
    
    	return $this;
    }
    /**
     * Get imgRetina
     *
     * @return string
     */
    public function getImgRetina()
    {
    	return $this->imgRetina;
    }    

    /**
     * Set bigImg
     *
     * @param string $bigImg
     * @return Store
     */
    public function setBigImg($bigImg)
    {
    	$this->bigImg = $bigImg;
    
    	return $this;
    }
    /**
     * Get bigImg
     *
     * @return string
     */
    public function getBigImg()
    {
    	return $this->bigImg;
    }
    
    /**
     * Set bigImgRetina
     *
     * @param string $bigImgRetina
     * @return Store
     */
    public function setBigImgRetina($bigImgRetina)
    {
    	$this->bigImgRetina = $bigImgRetina;
    
    	return $this;
    }
    /**
     * Get bigImgRetina
     *
     * @return string
     */
    public function getBigImgRetina()
    {
    	return $this->bigImgRetina;
    }
    
    /**
     * Set sound
     *
     * @param string $sound
     * @return Store
     */
    public function setSound($sound)
    {
    	$this->sound = $sound;
    
    	return $this;
    }
    /**
     * Get sound
     *
     * @return string
     */
    public function getSound()
    {
    	return $this->sound;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Store
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }
    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set levelLock
     *
     * @param integer $levelLock
     * @return Store
     */
    public function setLevelLock($levelLock)
    {
        $this->levelLock = $levelLock;
    
        return $this;
    }

    /**
     * Get levelLock
     *
     * @return integer 
     */
    public function getLevelLock()
    {
        return $this->levelLock;
    }
}