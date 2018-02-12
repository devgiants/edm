<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 07/02/18
 * Time: 11:13
 */

namespace App\Entity;


use App\Entity\Behavior\Userable;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Blameable\Blameable;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Product
 * @ORM\Table
 * @ORM\Entity
 */
class Document {
	use Timestampable,
		Blameable
		;

	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string $name the tag name
	 * @ORM\Column(name="name", type="string", length=255, nullable=false)
	 */
	private $name;


	/**
	 * @ORM\Column(type="string", nullable=true)
	 * @Assert\File(mimeTypes={ "application/pdf" })
	 */
	private $file;

	/**
	 * @return mixed
	 */
	public function getFile() {
		return $this->file;
	}

	/**
	 * @param mixed $file
	 *
	 * @return Document
	 */
	public function setFile( $file ) {
		$this->file = $file;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 *
	 * @return Document
	 */
	public function setName( $name ) {
		$this->name = $name;

		return $this;
	}
}