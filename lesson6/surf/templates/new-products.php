<div class="new_products">

	<h1>New products</h1>

	<div class="catalog">

		<?php foreach ($content['new_product'] as $item): ?>

			<div class="item">
				<span class="item_new"></span>
				<img src="<?= $item['foto'] ?>" alt="<?= $item['name'] ?>">
				<span class="item_name"><?= $item['name'] ?></span>
				<span class="item_price">€ <?= $item['price'] ?></span>
			</div>

		<?php endforeach; ?>

	</div>

</div>