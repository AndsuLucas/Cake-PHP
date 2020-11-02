<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

class UsersController extends AppController
{	
	protected $userTable;

	public function beforeFilter(Event $event): void
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['newUser', 'createUser']);
	}

	public function initialize()
	{
		$this->usersTable = TableRegistry::get('Users');
		parent::initialize();
	}

	public function newUser()
	{
		$newUser = $this->usersTable->newEntity();
		$this->set('user', $newUser);
	}

	public function createUser()
	{
		if (!$this->request->is('post')) {
			$this->redirect(['controller' => 'users', 'action' => 'newUser']);
			return;
		}

		$newUser = $this->usersTable->newEntity(
			$this->request->data()
		);
		
		if ($this->usersTable->save($newUser)) {
			$this->Flash->set("User successeful register");
			$this->redirect(['controller' => 'users', 'action' => 'login']);
			return;
		}

		$this->Flash->set("Occur an error on save process");
		$this->redirect(['controller' => 'users', 'action' => 'newUser']);
	}

	public function login()
	{
		if (!$this->request->is('post')) {
			return;
		}

		$user = $this->Auth->identify();
		if ($user) {
			$this->Auth->setUser($user);
			$this->Flash->set('Welcome, ' . $user['username']);
			return $this->redirect($this->Auth->redirectUrl());
		}

		$this->Flash->set('Invalid username or password', ['element' => 'error']);
	}

	public function logout()
	{
		$this->redirect($this->Auth->logout());
	}
}