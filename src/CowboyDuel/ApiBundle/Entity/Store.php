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
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $type
     *
     * @ORM\Column(name="type", type="string", length=20, nullable=false)
     */
    private $type;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=50, nullable=true)
     */
    private $title;

    /**
     * @var integer $damageordefense
     *
     * @ORM\Column(name="damageOrDefense", type="integer", nullable=true)
     */
    private $damageordefense;

    /**
     * @var integer $levellock
     *
     * @ORM\Column(name="levelLock", type="integer", nullable=true)
     */
    private $levellock;

    /**
     * @var integer $golds
     *
     * @ORM\Column(name="golds", type="integer", nullable=true)
     */
    private $golds;

    /**
     * @var string $inappid
     *
     * @ORM\Column(name="inAppId", type="string", length=40, nullable=true)
     */
    private $inappid;

    /**
     * @var string $thumb
     *
     * @ORM\Column(name="thumb", type="string", length=70, nullable=true)
     */
    private $thumb;

    /**
     * @var string $thumbretina
     *
     * @ORM\Column(name="thumbRetina", type="string", length=70, nullable=true)
     */
    private $thumbretina;

    /**
     * @var string $img
     *
     * @ORM\Column(name="img", type="string", length=70, nullable=true)
     */
    private $img;

    /**
     * @var string $imgretina
     *
     * @ORM\Column(name="imgRetina", type="string", length=70, nullable=true)
     */
    private $imgretina;

    /**
     * @var string $sound
     *
     * @ORM\Column(name="sound", type="string", length=70, nullable=true)
     */
    private $sound;

    /**
     * @var string $bigimg
     *
     * @ORM\Column(name="bigImg", type="string", length=70, nullable=true)
     */
    private $bigimg;

    /**
     * @var string $bigimgretina
     *
     * @ORM\Column(name="bigImgRetina", type="string", length=70, nullable=true)
     */
    private $bigimgretina;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="string", length=100, nullable=true)
     */
    private $description;

    /**
     * @var float $frequently
     *
     * @ORM\Column(name="frequently", type="float", nullable=false)
     */
    private $frequently;



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
     * Set damageordefense
     *
     * @param integer $damageordefense
     * @return Store
     */
    public function setDamageordefense($damageordefense)
    {
        $this->damageordefense = $damageordefense;
    
        return $this;
    }

    /**
     * Get damageordefense
     *
     * @return integer 
     */
    public function getDamageordefense()
    {
        return $this->damageordefense;
    }

    /**
     * Set levellock
     *
     * @param integer $levellock
     * @return Store
     */
    public function setLevellock($levellock)
    {
        $this->levellock = $levellock;
    
        return $this;
    }

    /**
     * Get levellock
     *
     * @return integer 
     */
    public function getLevellock()
    {
        return $this->levellock;
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
     * Set thumbretina
     *
     * @param string $thumbretina
     * @return Store
     */
    public function setThumbretina($thumbretina)
    {
        $this->thumbretina = $thumbretina;
    
        return $this;
    }

    /**
     * Get thumbretina
     *
     * @return string 
     */
    public function getThumbretina()
    {
        return $this->thumbretina;
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
     * Set imgretina
     *
     * @param string $imgretina
     * @return Store
     */
    public function setImgretina($imgretina)
    {
        $this->imgretina = $imgretina;
    
        return $this;
    }

    /**
     * Get imgretina
     *
     * @return string 
     */
    public function getImgretina()
    {
        return $this->imgretina;
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
     * Set bigimg
     *
     * @param string $bigimg
     * @return Store
     */
    public function setBigimg($bigimg)
    {
        $this->bigimg = $bigimg;
    
        return $this;
    }

    /**
     * Get bigimg
     *
     * @return string 
     */
    public function getBigimg()
    {
        return $this->bigimg;
    }

    /**
     * Set bigimgretina
     *
     * @param string $bigimgretina
     * @return Store
     */
    public function setBigimgretina($bigimgretina)
    {
        $this->bigimgretina = $bigimgretina;
    
        return $this;
    }

    /**
     * Get bigimgretina
     *
     * @return string 
     */
    public function getBigimgretina()
    {
        return $this->bigimgretina;
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
}