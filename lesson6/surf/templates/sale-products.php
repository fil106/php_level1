<div class="sale_products">

	<h1>Sale products</h1>

	<div class="catalog">

		<? foreach ($content['sale_product'] as $item): ?>

			<div class="item">
				<img src="<?= $item['foto'] ?>" alt="<?= $item['name'] ?>">
				<span class="item_name"><?= $item['name'] ?></span>
				<span class="item_price">€ <?= $item['price'] ?></span>
			</div>

		<? endforeach; ?>

	</div>

</div>