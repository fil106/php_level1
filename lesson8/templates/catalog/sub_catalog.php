<!-- Правый блок -->
<div class="right">
  <div class="tovar_catalog">
    <div class="namecat">
      <h2 class="namecat">
        <?=$content['sub_catalog'][0]['name'] ?>
      </h2>
    </div>
    <? foreach ($content['sub_catalog'][0]['catalog'] as $item): ?>
    <div class="product"><a href="<?=URL ?>good/<?= $item['id_good'] ?>/"> <img src="<?=URL ?><?= $item['foto'] ?>">
      <div class="product_descript">
        <div class="naming">
          <h1>
            <?= $item['name'] ?>
          </h1>
        </div>
        <div class="short_description">
          <?= $item['short_description'] ?>
        </div>
        </a>
        <div class="price_basket"> <span class="pricem">€
          <?= $item['price'] ?>
          </span>
          <input type="button" id="i<?= $item['id_good'] ?>"  value="В КОРЗИНУ" onclick="add_basket_one('#i<?= $item['id_good'] ?>')" data-product-guid="<?=$item['ID_UUID'] ?>">
        </div>
      </div>
    </div>
    <? endforeach; ?>
  </div>
</div>


