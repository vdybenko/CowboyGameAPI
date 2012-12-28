<?php

namespace CowboyDuel\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CowboyDuel\ApiBundle\Entity\UsersFavorites
 *
 * @ORM\Table(name="users_favorites")
 * @ORM\Entity
 */
class UsersFavorites
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
     * @var integer $userAuthen
     *
     * @ORM\Column(name="user_authen", type="string", nullable=false)
     */
    private $userAuthen;

    /**
     * @var integer $favoriteAuthen
     *
     * @ORM\Column(name="favorite_authen", type="string", nullable=false)
     */
    private $favoriteAuthen;

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
     * Set userAuthen
     *
     * @param string $userAuthen
     * @return UsersFavorites
     */
    public function setUserAuthen($userAuthen)
    {
        $this->userAuthen = $userAuthen;
    
        return $this;
    }

    /**
     * Get userAuthen
     *
     * @return string 
     */
    public function getUserAuthen()
    {
        return $this->userAuthen;
    }

    /**
     * Set favoriteAuthen
     *
     * @param string $favoriteAuthen
     * @return UsersFavorites
     */
    public function setFavoriteAuthen($favoriteAuthen)
    {
        $this->favoriteAuthen = $favoriteAuthen;
    
        return $this;
    }

    /**
     * Get favoriteAuthen
     *
     * @return string 
     */
    public function getFavoriteAuthen()
    {
        return $this->favoriteAuthen;
    }
}