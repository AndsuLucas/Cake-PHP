<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;

class ProductsController extends AppController
{	
	private $productsTable;

	public function initialize() 
	{	
		$this->productsTable = TableRegistry::get('Products');
		parent::initialize();
	}

	public function index() 
	{	
		$products = $this->productsTable->find('all');
		$this->set('productInfo', $products);
	}

	public function new()
	{
		$product = $this->productsTable->newEntity();
		$this->set('product', $product);
	}

	public function create()
	{
		if ($this->request->is('get')) {
			$this->redirect(['controller' => 'products', 'action' => 'new']);	
		}

		$data = $this->request->data();
		$newProduct = $this->productsTable->newEntity(
			$data
		);
		
		if ($this->request->is('put')) {
			$this->redirect(['controller' => 'products', 'action' => 'index']);	
		}

		$msg = $this->productsTable->save($newProduct) ? "Produto salvo com sucesso" : "Error";
		$this->Flash->set($msg);
		$this->redirect(['controller' => 'products', 'action' => 'new']);
	}

	public function edit($id)
	{	
		$product = $this->productsTable->get($id);
		$this->set('product', $product);
		$this->render('new');
	}

	public function delete($id)
	{
		$product = $this->productsTable->get($id);
		$msg = $this->productsTable->delete($product) ? "Produto deletado" : "Error";
		$this->Flash->set($msg);
		$this->redirect(['controller' => 'products', 'action' => 'index']);
	}
}