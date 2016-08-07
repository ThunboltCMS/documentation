<?php

namespace Model;

use Thunbolt\User\Interfaces\IRepository;

class UserRepository extends RepositoryContainer implements IRepository {

	/**
	 * @param int $id
	 * @return User
	 */
	public function getUserById($id) {
		if (!$id || !is_numeric($id)) {
			return NULL;
		}

		return $this->find($id);
	}

	/**
	 * @param int $value
	 * @return User
	 */
	public function login($value) {
		return $this->findOneBy(['email' => $value]);
	}

}
