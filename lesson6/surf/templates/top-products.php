<div class="top_products">

	<h1>Top products</h1>

	<div class="catalog">

		<?php foreach ($content['top_product'] as $item): ?>

			<div class="item">
				<img src="<?= $item['foto'] ?>" alt="<?= $item['name'] ?>">
				<span class="item_name"><?= $item['name'] ?></span>
				<span class="item_price">€ <?= $item['price'] ?></span>
			</div>

		<?php endforeach; ?>

	</div>

</div>