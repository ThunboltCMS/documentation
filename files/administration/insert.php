<?php

namespace Inserts;

use Kdyby\Doctrine\EntityManager;
use Model\User;
use Thunbolt\Commands\ICommand;

class UserInsert implements ICommand {

	/** @var EntityManager */
	private $em;

	public function __construct(EntityManager $em) {
		$this->em = $em;
	}

	public function execute() {
		if ($this->em->getRepository(User::class)->countBy()) {
			return;
		}
		$user = new User();
		$user->setName('Admin');
		$user->setEmail('admin@example.com');
		$user->setPassword('admin');
		$user->setAdmin(TRUE);

		$this->em->persist($user);
		$this->em->flush();
	}

}
