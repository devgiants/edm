<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 08/02/18
 * Time: 08:44
 */

namespace App\Entity\Behavior;


namespace App\Entity\Behavior;

use Doctrine\ORM\Mapping as ORM;

/**
 * Timestampable Trait
 * @package App\Behavior
 * @ORM\HasLifecycleCallbacks()
 */
trait Timestampable {
	/**
	 * @var \DateTime the event date
	 * @ORM\Column(type="datetime")
	 */
	protected $createdAt;
	/**
	 * @var \DateTime the event date
	 * @ORM\Column(type="datetime")
	 */
	protected $updatedAt;

	/**
	 * Returns createdAt value.
	 *
	 * @return \DateTime
	 */
	public function getCreatedAt() {
		return $this->createdAt;
	}

	/**
	 * Returns updatedAt value.
	 *
	 * @return \DateTime
	 */
	public function getUpdatedAt() {
		return $this->updatedAt;
	}

	/**
	 * @param \DateTime $createdAt
	 *
	 * @return $this
	 */
	public function setCreatedAt( \DateTime $createdAt ) {
		$this->createdAt = $createdAt;

		return $this;
	}

	/**
	 * @param \DateTime $updatedAt
	 *
	 * @return $this
	 */
	public function setUpdatedAt( \DateTime $updatedAt ) {
		$this->updatedAt = $updatedAt;

		return $this;
	}

	/** @ORM\PrePersist */
	public function created() {
		$dateTime = \DateTime::createFromFormat( 'U.u', sprintf( '%.6F', microtime( true ) ) );
		$dateTime->setTimezone( new \DateTimeZone( date_default_timezone_get() ) );
		$this->createdAt = $dateTime;
		$this->updatedAt = $dateTime;
	}

	/** @ORM\PreUpdate */
	public function updated() {
		$dateTime = \DateTime::createFromFormat( 'U.u', sprintf( '%.6F', microtime( true ) ) );
		$dateTime->setTimezone( new \DateTimeZone( date_default_timezone_get() ) );
		$this->updatedAt = $dateTime;
	}
}