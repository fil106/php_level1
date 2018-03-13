    <div class="kroshki">
    <? foreach ($content['bread_crumbs'] as $key=>$value): ?>
    	&raquo; <a href="<?=$key ?>"><?=$value ?></a> 
    <? endforeach; ?>
    </div>