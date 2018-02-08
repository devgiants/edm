<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 08/02/17
 * Time: 08:43
 */

namespace App\Entity\Behavior;

use App\Entity\User;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trait Userable
 * @package App\Behavior
 */
trait Userable {
	/**
	 * @ORM\ManyToOne(targetEntity="App\Entity\User")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $user;

	/**
	 * @param AdvancedUserInterface $user
	 *
	 * @return $this
	 */
	public function setUser( AdvancedUserInterface $user ) {
		$this->user = $user;

		return $this;
	}

	/**
	 * @return User
	 */
	public function getUser() {
		return $this->user;
	}
}