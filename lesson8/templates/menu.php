        <div class="menu">
            <p>Menu</p>
            <ul>
                <li><a href="<?=URL ?>">Главная</a></li>
                <li><a href="<?=URL ?>catalog/">Каталог</a></li>
                <li><a href="<?=URL ?>article/">Статьи</a></li>                
                <li><a href="<?=URL ?>contact/">Контакты</a></li>
                <li><a href="<?=URL ?>feedback/">Отзывы</a></li>
            </ul>
        </div>
        
        <div class="open">
        <div id="autorize">
            <?php include 'auth.php' ?>
        </div>
        <br> 
   
        <div class="basket" id="basket">
        <?php include '../templates/basket/res_basket.php' ?>

        </div>
        </div>
        
