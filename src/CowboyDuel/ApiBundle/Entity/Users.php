<?php

namespace CowboyDuel\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CowboyDuel\ApiBundle\Entity\Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class Users
{
	/**
	 * @var integer $userId
	 *
	 * @ORM\Column(name="user_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $userId;

	/**
	 * @var string $authen
	 *
	 * @ORM\Column(name="authen", type="string", length=50, nullable=false)
	 */
	private $authen;

	/**
	 * @var string $nickname
	 *
	 * @ORM\Column(name="nickname", type="string", length=255, nullable=false)
	 */
	private $nickname;

	/**
	 * @var string $deviceName
	 *
	 * @ORM\Column(name="device_name", type="string", length=10, nullable=false)
	 */
	private $deviceName;

	/**
	 * @var string $snetwork
	 *
	 * @ORM\Column(name="snetwork", type="string", length=1, nullable=false)
	 */
	private $snetwork;

	/**
	 * @var integer $lastLogin
	 *
	 * @ORM\Column(name="last_login", type="integer", nullable=false)
	 */
	private $lastLogin;

	/**
	 * @var integer $firstLogin
	 *
	 * @ORM\Column(name="first_login", type="integer", length=20, nullable=false)
	 */
	private $firstLogin;

	/**
	 * @var string $type
	 *
	 * @ORM\Column(name="type", type="string", length=10, nullable=false)
	 */
	private $type;

	/**
	 * @var string $region
	 *
	 * @ORM\Column(name="region", type="string", length=255, nullable=false)
	 */
	private $region;

	/**
	 * @var string $currentLanguage
	 *
	 * @ORM\Column(name="current_language", type="string", length=255, nullable=false)
	 */
	private $currentLanguage;

	/**
	 * @var string $os
	 *
	 * @ORM\Column(name="os", type="string", length=10, nullable=false)
	 */
	private $os;

	/**
	 * @var string $appVer
	 *
	 * @ORM\Column(name="app_ver", type="string", length=10, nullable=false)
	 */
	private $appVer;

	/**
	 * @var string $deviceToken
	 *
	 * @ORM\Column(name="device_token", type="string", length=100, nullable=false)
	 */
	private $deviceToken;

	/**
	 * @var integer $date
	 *
	 * @ORM\Column(name="date", type="integer", nullable=false)
	 */
	private $date;

	/**
	 * @var integer $money
	 *
	 * @ORM\Column(name="money", type="integer", nullable=false)
	 */
	private $money;

	/**
	 * @var string $sessionId
	 *
	 * @ORM\Column(name="session_id", type="string", length=50, nullable=false)
	 */
	private $sessionId;

	/**
	 * @var integer $level
	 *
	 * @ORM\Column(name="level", type="integer", nullable=false)
	 */
	private $level;

	/**
	 * @var integer $points
	 *
	 * @ORM\Column(name="points", type="integer", nullable=false)
	 */
	private $points;

	/**
	 * @var integer $duelsWin
	 *
	 * @ORM\Column(name="duels_win", type="integer", nullable=false)
	 */
	private $duelsWin;

	/**
	 * @var integer $duelsLost
	 *
	 * @ORM\Column(name="duels_lost", type="integer", nullable=false)
	 */
	private $duelsLost;

	/**
	 * @var integer $bigestWin
	 *
	 * @ORM\Column(name="bigest_win", type="integer", nullable=false)
	 */
	private $bigestWin;

	/**
	 * @var integer $removeAds
	 *
	 * @ORM\Column(name="remove_ads", type="integer", nullable=false)
	 */
	private $removeAds;

	/**
	 * @var string $avatar
	 *
	 * @ORM\Column(name="avatar", type="text", nullable=false)
	 */
	private $avatar;

	/**
	 * @var string $age
	 *
	 * @ORM\Column(name="age", type="text", nullable=false)
	 */
	private $age;

	/**
	 * @var string $homeTown
	 *
	 * @ORM\Column(name="home_town", type="string", length=256, nullable=false)
	 */
	private $homeTown;

	/**
	 * @var integer $friends
	 *
	 * @ORM\Column(name="friends", type="integer", nullable=false)
	 */
	private $friends;

	/**
	 * @var string $facebookName
	 *
	 * @ORM\Column(type="string", length=30, nullable=false)
	 */
	private $identifier;
	

	/**
	 * Get userId
	 *
	 * @return integer
	 */
	public function getUserId() {
		return $this->userId;
	}
	/**
	 * Set userId
	 *
	 * @param integer $userId
	 * @return Users
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	
		return $this;
	}

	/**
	 * Set authen
	 *
	 * @param string $authen
	 * @return Users
	 */
	public function setAuthen($authen) {
		$this->authen = $authen;

		return $this;
	}

	/**
	 * Get authen
	 *
	 * @return string
	 */
	public function getAuthen() {
		return $this->authen;
	}

	/**
	 * Set nickname
	 *
	 * @param string $nickname
	 * @return Users
	 */
	public function setNickname($nickname) {
		$this->nickname = $nickname;

		return $this;
	}

	/**
	 * Get nickname
	 *
	 * @return string
	 */
	public function getNickname() {
		return $this->nickname;
	}

	/**
	 * Set deviceName
	 *
	 * @param string $deviceName
	 * @return Users
	 */
	public function setDeviceName($deviceName) {
		$this->deviceName = $deviceName;

		return $this;
	}

	/**
	 * Get deviceName
	 *
	 * @return string
	 */
	public function getDeviceName() {
		return $this->deviceName;
	}

	/**
	 * Set snetwork
	 *
	 * @param string $snetwork
	 * @return Users
	 */
	public function setSnetwork($snetwork) {
		$this->snetwork = $snetwork;

		return $this;
	}

	/**
	 * Get snetwork
	 *
	 * @return string
	 */
	public function getSnetwork() {
		return $this->snetwork;
	}

	/**
	 * Set lastLogin
	 *
	 * @param integer $lastLogin
	 * @return Users
	 */
	public function setLastLogin($lastLogin) {
		$this->lastLogin = $lastLogin;

		return $this;
	}

	/**
	 * Get lastLogin
	 *
	 * @return integer
	 */
	public function getLastLogin() {
		return $this->lastLogin;
	}

	/**
	 * Set firstLogin
	 *
	 * @param integer $firstLogin
	 * @return Users
	 */
	public function setFirstLogin($firstLogin) {
		$this->firstLogin = $firstLogin;

		return $this;
	}

	/**
	 * Get firstLogin
	 *
	 * @return integer
	 */
	public function getFirstLogin() {
		return $this->firstLogin;
	}

	/**
	 * Set type
	 *
	 * @param string $type
	 * @return Users
	 */
	public function setType($type) {
		$this->type = $type;

		return $this;
	}

	/**
	 * Get type
	 *
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Set region
	 *
	 * @param string $region
	 * @return Users
	 */
	public function setRegion($region) {
		$this->region = $region;

		return $this;
	}

	/**
	 * Get region
	 *
	 * @return string
	 */
	public function getRegion() {
		return $this->region;
	}

	/**
	 * Set currentLanguage
	 *
	 * @param string $currentLanguage
	 * @return Users
	 */
	public function setCurrentLanguage($currentLanguage) {
		$this->currentLanguage = $currentLanguage;

		return $this;
	}

	/**
	 * Get currentLanguage
	 *
	 * @return string
	 */
	public function getCurrentLanguage() {
		return $this->currentLanguage;
	}

	/**
	 * Set os
	 *
	 * @param string $os
	 * @return Users
	 */
	public function setOs($os) {
		$this->os = $os;

		return $this;
	}

	/**
	 * Get os
	 *
	 * @return string
	 */
	public function getOs() {
		return $this->os;
	}

	/**
	 * Set appVer
	 *
	 * @param string $appVer
	 * @return Users
	 */
	public function setAppVer($appVer) {
		$this->appVer = $appVer;

		return $this;
	}

	/**
	 * Get appVer
	 *
	 * @return string
	 */
	public function getAppVer() {
		return $this->appVer;
	}

	/**
	 * Set deviceToken
	 *
	 * @param string $deviceToken
	 * @return Users
	 */
	public function setDeviceToken($deviceToken) {
		$this->deviceToken = $deviceToken;

		return $this;
	}

	/**
	 * Get deviceToken
	 *
	 * @return string
	 */
	public function getDeviceToken() {
		return $this->deviceToken;
	}

	/**
	 * Set date
	 *
	 * @param integer $date
	 * @return Users
	 */
	public function setDate($date) {
		$this->date = $date;

		return $this;
	}

	/**
	 * Get date
	 *
	 * @return integer
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * Set money
	 *
	 * @param integer $money
	 * @return Users
	 */
	public function setMoney($money) {
		$this->money = $money;

		return $this;
	}

	/**
	 * Get money
	 *
	 * @return integer
	 */
	public function getMoney() {
		return $this->money;
	}

	/**
	 * Set sessionId
	 *
	 * @param string $sessionId
	 * @return Users
	 */
	public function setSessionId($sessionId) {
		$this->sessionId = $sessionId;

		return $this;
	}

	/**
	 * Get sessionId
	 *
	 * @return string
	 */
	public function getSessionId() {
		return $this->sessionId;
	}

	/**
	 * Set level
	 *
	 * @param integer $level
	 * @return Users
	 */
	public function setLevel($level) {
		$this->level = $level;

		return $this;
	}

	/**
	 * Get level
	 *
	 * @return integer
	 */
	public function getLevel() {
		return $this->level;
	}

	/**
	 * Set points
	 *
	 * @param integer $points
	 * @return Users
	 */
	public function setPoints($points) {
		$this->points = $points;

		return $this;
	}

	/**
	 * Get points
	 *
	 * @return integer
	 */
	public function getPoints() {
		return $this->points;
	}

	/**
	 * Set duelsWin
	 *
	 * @param integer $duelsWin
	 * @return Users
	 */
	public function setDuelsWin($duelsWin) {
		$this->duelsWin = $duelsWin;

		return $this;
	}

	/**
	 * Get duelsWin
	 *
	 * @return integer
	 */
	public function getDuelsWin() {
		return $this->duelsWin;
	}

	/**
	 * Set duelsLost
	 *
	 * @param integer $duelsLost
	 * @return Users
	 */
	public function setDuelsLost($duelsLost) {
		$this->duelsLost = $duelsLost;

		return $this;
	}

	/**
	 * Get duelsLost
	 *
	 * @return integer
	 */
	public function getDuelsLost() {
		return $this->duelsLost;
	}

	/**
	 * Set bigestWin
	 *
	 * @param integer $bigestWin
	 * @return Users
	 */
	public function setBigestWin($bigestWin) {
		$this->bigestWin = $bigestWin;

		return $this;
	}

	/**
	 * Get bigestWin
	 *
	 * @return integer
	 */
	public function getBigestWin() {
		return $this->bigestWin;
	}

	/**
	 * Set removeAds
	 *
	 * @param integer $removeAds
	 * @return Users
	 */
	public function setRemoveAds($removeAds) {
		$this->removeAds = $removeAds;

		return $this;
	}

	/**
	 * Get removeAds
	 *
	 * @return integer
	 */
	public function getRemoveAds() {
		return $this->removeAds;
	}

	/**
	 * Set avatar
	 *
	 * @param string $avatar
	 * @return Users
	 */
	public function setAvatar($avatar) {
		$this->avatar = $avatar;

		return $this;
	}

	/**
	 * Get avatar
	 *
	 * @return string
	 */
	public function getAvatar() {
		return $this->avatar;
	}

	/**
	 * Set age
	 *
	 * @param string $age
	 * @return Users
	 */
	public function setAge($age) {
		$this->age = $age;

		return $this;
	}

	/**
	 * Get age
	 *
	 * @return string
	 */
	public function getAge() {
		return $this->age;
	}

	/**
	 * Set homeTown
	 *
	 * @param string $homeTown
	 * @return Users
	 */
	public function setHomeTown($homeTown) {
		$this->homeTown = $homeTown;

		return $this;
	}

	/**
	 * Get homeTown
	 *
	 * @return string
	 */
	public function getHomeTown() {
		return $this->homeTown;
	}

	/**
	 * Set friends
	 *
	 * @param integer $friends
	 * @return Users
	 */
	public function setFriends($friends) {
		$this->friends = $friends;

		return $this;
	}

	/**
	 * Get friends
	 *
	 * @return integer
	 */
	public function getFriends() {
		return $this->friends;
	}

	/**
	 * Set identifier
	 *
	 * @param string $identifier
	 * @return Users
	 */
	public function setIdentifier($identifier) {
		$this->identifier = $identifier;

		return $this;
	}
	/**
	 * Get identifier
	 *
	 * @return string
	 */
	public function getIdentifier() {
		return $this->identifier;
	}	
}
