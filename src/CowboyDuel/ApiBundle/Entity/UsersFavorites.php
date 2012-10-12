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
     * @var integer $userId
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var integer $userFavorite
     *
     * @ORM\Column(name="user_favorite", type="integer", nullable=false)
     */
    private $userFavorite;



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
     * Set userId
     *
     * @param integer $userId
     * @return UsersFavorites
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    
        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set userFavorite
     *
     * @param integer $userFavorite
     * @return UsersFavorites
     */
    public function setUserFavorite($userFavorite)
    {
        $this->userFavorite = $userFavorite;
    
        return $this;
    }

    /**
     * Get userFavorite
     *
     * @return integer 
     */
    public function getUserFavorite()
    {
        return $this->userFavorite;
    }
}