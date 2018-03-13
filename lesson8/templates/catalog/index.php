<? foreach ($content['catalog'] as $item): ?>
<div>
  <div class="h_stycky">
    <h2 class="namecat">
      <?=$item['name'] ?>
    </h2>
  </div>
  <div class="tovar_category">
    <? foreach ($item['sub_category'] as $item1): ?>
    <div class="product_category">
      <div>
        <h2>
          <?=$item1['name'] ?>
        </h2>
      </div>
      <a  href="<?=URL?>catalog/<?=$item['url'] ?>/<?=$item1['url']?>/"><img src="<?=URL?><?=$item1['foto_category']?>" style=""></a> 
      </div>
    <? endforeach; ?>
  </div>
</div>
<? endforeach; ?>
