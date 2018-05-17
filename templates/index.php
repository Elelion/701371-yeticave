<main class="container">
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">            

            <!-- QUEST_5.4: переделываем для вывода -->
            <?php foreach($data['category_list'] as $category) { ?>
                <li class="promo__item promo__item--<?php print($category['css_class']) ?>">                    
                    <a class="promo__link" href="all-lots.html"><?php print($category['name']); ?></a>
                </li>
            <?php } ?>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">              
            <?php foreach($data['product_list'] as $product) { ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?= $product['url']; ?>" width="350" height="260" alt="Сноуборд">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?= $product['category']; ?></span>
                    <h3 class="lot__title"><a class="text-link" href="lot.html"><?= $product['name']; ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            
                            <span class="lot__cost"><?= number_format($product['price'], 0, ',' , ' ' ); ?><b class="rub">р</b></span>                            
                            <!-- <span class="lot__cost"> //$product['price']; <b class="rub">р</b></span> -->
                        </div>
                        <div class="lot__timer timer">
                            <!-- QUEST_3.2.3: Полученные часы и минуты в формате “Ч:М” показать в блоке под ценой лота div.lot__timer -->
                            <?php print ElapsedTime(); ?>
                        </div>
                    </div>
                </div>
            </li>
          <?php } ?>
        </ul>
    </section>
</main>