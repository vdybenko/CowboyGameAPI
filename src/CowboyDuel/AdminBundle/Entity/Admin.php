<?php
namespace CowboyDuel\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM,
    Symfony\Component\Security\Core\User\UserInterface;

/**
 * CowboyDuel\AadminBundle\Entity\Admin
 *
 * @ORM\Table(name="admin")
 * @ORM\Entity
 */
class Admin extends AbstractEntity implements UserInterface {
	/**
	 * @var string $name
	 *
	 * @ORM\Column(type="string")
	 */
	private $name;

	/**
	 * @var string $email
	 *
	 * @ORM\Column(type="string")
	 */
	private $email;

	/**
	 * @var string $password
	 *
	 * @ORM\Column(type="string")
	 */
	private $password;

	/**
	 * Set name
	 *
	 * @param string $name
	 * @return Admin
	 */
	public function setName($name) {
		$this->name = $name;

		return $this;
	}

	/**
	 * Get name
	 *
	 * @return string 
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Set email
	 *
	 * @param string $email
	 * @return Admin
	 */
	public function setEmail($email) {
		$this->email = $email;

		return $this;
	}

	/**
	 * Get email
	 *
	 * @return string 
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Set password
	 *
	 * @param string $password
	 * @return Admin
	 */
	public function setPassword($password) {
		$this->password = $password;

		return $this;
	}

	/**
	 * Get password
	 *
	 * @return string 
	 */
	public function getPassword() {
		return $this->password;
	}
	
	public function getRoles() 
	{
		return array('ROLE_ADMIN');
	}
	
	public function getSalt() 
	{
		return '';
	}
	
	public function getUsername() 
	{
		return $this->name;
	}
	
	public function eraseCredentials() {}

}
