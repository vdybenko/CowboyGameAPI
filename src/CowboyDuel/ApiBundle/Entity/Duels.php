<?php

namespace CowboyDuel\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CowboyDuel\ApiBundle\Entity\Duels
 *
 * @ORM\Table(name="duels")
 * @ORM\Entity
 */
class Duels
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
     * @var string $opponent
     *
     * @ORM\Column(name="opponent", type="string", length=255, nullable=false)
     */
    private $opponent;

    /**
     * @var string $rateFire
     *
     * @ORM\Column(name="rate_fire", type="string", length=255, nullable=false)
     */
    private $rateFire;

    /**
     * @var string $deviceName
     *
     * @ORM\Column(name="device_name", type="string", length=25, nullable=false)
     */
    private $deviceName;

    /**
     * @var string $appVer
     *
     * @ORM\Column(name="app_ver", type="string", length=10, nullable=false)
     */
    private $appVer;

    /**
     * @var string $authen
     *
     * @ORM\Column(name="authen", type="string", length=50, nullable=false)
     */
    private $authen;

    /**
     * @var string $date
     *
     * @ORM\Column(name="date", type="string", length=20, nullable=false)
     */
    private $date;

    /**
     * @var string $systemName
     *
     * @ORM\Column(name="system_name", type="string", length=50, nullable=false)
     */
    private $systemName;

    /**
     * @var string $systemVersion
     *
     * @ORM\Column(name="system_version", type="string", length=50, nullable=false)
     */
    private $systemVersion;

    /**
     * @var string $uniqueIdentifier
     *
     * @ORM\Column(name="unique_identifier", type="string", length=255, nullable=false)
     */
    private $uniqueIdentifier;

    /**
     * @var string $lat
     *
     * @ORM\Column(name="lat", type="string", length=255, nullable=false)
     */
    private $lat;

    /**
     * @var string $lon
     *
     * @ORM\Column(name="lon", type="string", length=255, nullable=false)
     */
    private $lon;

    /**
     * @var string $gps
     *
     * @ORM\Column(name="GPS", type="string", length=10, nullable=false)
     */
    private $gps;



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
     * Set opponent
     *
     * @param string $opponent
     * @return Duels
     */
    public function setOpponent($opponent)
    {
        $this->opponent = $opponent;
    
        return $this;
    }

    /**
     * Get opponent
     *
     * @return string 
     */
    public function getOpponent()
    {
        return $this->opponent;
    }

    /**
     * Set rateFire
     *
     * @param string $rateFire
     * @return Duels
     */
    public function setRateFire($rateFire)
    {
        $this->rateFire = $rateFire;
    
        return $this;
    }

    /**
     * Get rateFire
     *
     * @return string 
     */
    public function getRateFire()
    {
        return $this->rateFire;
    }

    /**
     * Set deviceName
     *
     * @param string $deviceName
     * @return Duels
     */
    public function setDeviceName($deviceName)
    {
        $this->deviceName = $deviceName;
    
        return $this;
    }

    /**
     * Get deviceName
     *
     * @return string 
     */
    public function getDeviceName()
    {
        return $this->deviceName;
    }

    /**
     * Set appVer
     *
     * @param string $appVer
     * @return Duels
     */
    public function setAppVer($appVer)
    {
        $this->appVer = $appVer;
    
        return $this;
    }

    /**
     * Get appVer
     *
     * @return string 
     */
    public function getAppVer()
    {
        return $this->appVer;
    }

    /**
     * Set authen
     *
     * @param string $authen
     * @return Duels
     */
    public function setAuthen($authen)
    {
        $this->authen = $authen;
    
        return $this;
    }

    /**
     * Get authen
     *
     * @return string 
     */
    public function getAuthen()
    {
        return $this->authen;
    }

    /**
     * Set date
     *
     * @param string $date
     * @return Duels
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return string 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set systemName
     *
     * @param string $systemName
     * @return Duels
     */
    public function setSystemName($systemName)
    {
        $this->systemName = $systemName;
    
        return $this;
    }

    /**
     * Get systemName
     *
     * @return string 
     */
    public function getSystemName()
    {
        return $this->systemName;
    }

    /**
     * Set systemVersion
     *
     * @param string $systemVersion
     * @return Duels
     */
    public function setSystemVersion($systemVersion)
    {
        $this->systemVersion = $systemVersion;
    
        return $this;
    }

    /**
     * Get systemVersion
     *
     * @return string 
     */
    public function getSystemVersion()
    {
        return $this->systemVersion;
    }

    /**
     * Set uniqueIdentifier
     *
     * @param string $uniqueIdentifier
     * @return Duels
     */
    public function setUniqueIdentifier($uniqueIdentifier)
    {
        $this->uniqueIdentifier = $uniqueIdentifier;
    
        return $this;
    }

    /**
     * Get uniqueIdentifier
     *
     * @return string 
     */
    public function getUniqueIdentifier()
    {
        return $this->uniqueIdentifier;
    }

    /**
     * Set lat
     *
     * @param string $lat
     * @return Duels
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    
        return $this;
    }

    /**
     * Get lat
     *
     * @return string 
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lon
     *
     * @param string $lon
     * @return Duels
     */
    public function setLon($lon)
    {
        $this->lon = $lon;
    
        return $this;
    }

    /**
     * Get lon
     *
     * @return string 
     */
    public function getLon()
    {
        return $this->lon;
    }

    /**
     * Set gps
     *
     * @param string $gps
     * @return Duels
     */
    public function setGps($gps)
    {
        $this->gps = $gps;
    
        return $this;
    }

    /**
     * Get gps
     *
     * @return string 
     */
    public function getGps()
    {
        return $this->gps;
    }
}