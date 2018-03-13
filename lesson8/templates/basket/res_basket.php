<p>Корзина</p>    

<div class="basket" id="basket">
<p>Наименований товаров в корзине: <span id="basket_count"><?=$content['basket']['basket_count'] ?> </span><br>
Всего товаров: <span id="basket_count_good"><?=$content['basket']['basket_count_good'] ?></span><br>
на сумму: <span id="basket_price"><?=$content['basket']['basket_price'] ?></span> рубль</p>
<input type="button" id="clear_basket"  value="Очистить корзину" onclick="clear_basket()"></center>
</div> 

        <pre>
        <?php
		echo "корзина <br>";
		print_r($content['basket']);
		echo "сессии <br>";
		print_r($_SESSION['basket']);
		echo "post <br>";
		print_r($_POST);
		echo "post <br>";
		print_r($_COOKIE);		
		?>
        </pre>