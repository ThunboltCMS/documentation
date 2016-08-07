<?php

namespace Model;

use Doctrine\ORM\Mapping as ORM;
use Kdyby\Doctrine\Entities\Attributes\Identifier;
use Nette\Security\Passwords;
use Thunbolt\Doctrine\Timestamp;
use Thunbolt\User\Interfaces\IUser;

/**
 * @ORM\Entity(repositoryClass="UserRepository")
 * @ORM\Table(name="users")
 */
class User extends EntityContainer implements IUser {

	use Identifier;
	use Timestamp;

	/**
	 * @var string
	 * @ORM\Column(type="string", length=120)
	 */
	protected $email;

	/**
	 * @var string
	 * @ORM\Column(type="string", length=60)
	 */
	protected $password;

	/**
	 * @var string
	 * @ORM\Column(type="string", length=40)
	 */
	protected $name;

	/**
	 * @var string
	 * @ORM\Column(type="string", length=150, nullable=true)
	 */
	protected $avatar;

	/**
	 * @var bool
	 * @ORM\Column(type="boolean")
	 */
	protected $isAdmin = FALSE; // Move to role entity

	/**
	 * @param string $password
	 * @return string
	 */
	public function setPassword($password) {
		$this->password = Passwords::hash($password);

		return $this->password;
	}

	public function getPassword() {
		return $this->password;
	}

	public function getRole() {
		return NULL;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return bool
	 */
	public function isMonitoring() {
		return FALSE;
	}

	/**
	 * @return string
	 */
	public function getAvatar() {
		return $this->avatar;
	}

	/**
	 * @param string $avatar
	 */
	public function setAvatar($avatar) {
		$this->avatar = $avatar;
	}

	/**
	 * @return bool
	 */
	public function isAdmin() {
		return $this->isAdmin;
	}

	/**
	 * @param bool $isAdmin
	 */
	public function setAdmin($isAdmin = FALSE) {
		$this->isAdmin = $isAdmin;
	}

	/**
	 * @return \DateTime
	 */
	public function getRegistrationDate() {
		return $this->created;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param string $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

}
