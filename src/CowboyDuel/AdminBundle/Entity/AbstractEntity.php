<?php
namespace CowboyDuel\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class AbstractEntity 
{
	/**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	protected $id;
	
	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}
}
