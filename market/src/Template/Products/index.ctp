<table class="table">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Price</th>
			<th>Discount</th>
			<th>Description</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($productInfo as $product): ?>
			<tr class="productsRow">
				<td><?= $product['id'] ?></td>
				<td><?= $product['name'] ?></td>
				<td><?= $this->Money->format($product['price']) ?></td>
				<td><?= $this->Money->format($product->getDiscount()) ?></td>
				<td><?= $product['description'] ?></td>	
				<td>
					<span>
						<?= 
							$this->Html->link(
								'Edit', [
									'controller' => 'products', 
									'action' => 'edit',
									$product['id']
								]
							)
						?>
					</span>
					<span>
						<?=
							$this->Form->postLink(
								'delete', 
								[
									'controller' => 'products', 
									'action' => 'delete', $product['id']
								],
								[
									'method' => 'delete',
									'confirm' => 'Deseja remover o produto: ' . $product['name'] . ' ?'
								]
							)
						?>	
					</span>	
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<td class="productsAction">
				<span>
					<?=
						$this->Html->Link(
							'New Product', 
							['controller' => 'products', 'action' => 'new']
						)
					?>
				</span>
				<span style="margin-left: 5px;">
					<?= 
						$this->Html->Link(
							'Logout', 
							['controller' => 'users', 'action' => 'logout']
						)
					?>
				</span>
			</td>
		</tr>
	</tfoot>
</table>
<script>
	(function(){
		const action = document.querySelector('.productsAction');
		const productsRow = document.querySelector('.productsRow');

		const columns = productsRow.querySelectorAll('td');
		action.setAttribute('colspan', columns.length);
	})();
</script>