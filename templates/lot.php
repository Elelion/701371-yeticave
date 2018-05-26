<main>
  <nav class="nav">
    <ul class="nav__list container">

    <?php                        
      foreach($data['category_list'] as $category) { ?>
        <li class="nav__item">
          <a href="all-lots.html"><?php print($category['name']); ?></a>
        </li>
      <?php } ?>
        
    </ul>
  </nav>
      <?php
        foreach($data['product_list'] as $product) {            
      ?>
  <section class="lot-item container">
    <h2><?= $product['name']; ?></h2>
    <div class="lot-item__content">
        <div class="lot-item__left">

          <div class="lot-item__image">
            <img src="<?= $product['url']; ?>" width="730" height="548" alt="Сноуборд">
          </div>

          <p class="lot-item__category">Категория: <span>Доски и лыжи</span></p>
          <p class="lot-item__description">
            <?= $product['descr']; ?>
          </p>
        </div>
        <div class="lot-item__right">
          <div class="lot-item__state">
            <div class="lot-item__timer timer">
              <?= elapsedTime('%H:%M:%S'); ?>
            </div>
            <div class="lot-item__cost-state">
              <div class="lot-item__rate">
                <span class="lot-item__amount">Текущая цена</span>                
                <span class="lot-item__cost">
                  <?= number_format($product['price'], 0, ',' , ' ' ); ?>
                <b class="rub">р</b></span>
              </div>
              <div class="lot-item__min-cost">
                Мин. ставка <span>                  
                  <?= 
                    number_format(sumPrice($product['price'], $product['StepPrice']), 
                                  0, ',' , ' ' ); 
                  ?>
                р</span>
              </div>
            </div>
            
            <form class="lot-item__form" action="add.php" method="post">
              <p class="lot-item__form-item">
                <label for="cost">Ваша ставка</label>
                <input id="cost" type="number" name="cost" placeholder="
                  <?= sumPrice($product['price'], $product['StepPrice']); ?>
                ">
              </p>

<!-- передаем наше значение -->
              <input type="hidden" name="lot_name_pass" value= "<?= $product['name']; ?>" >
              <button type="submit" class="button" name="add_done">Сделать ставку</button>
            </form>

          </div>
          
          <div class="history">
            <h3>История ставок (<span><?= count($data['rate_list']); ?></span>)</h3>
            <table class="history__list">
              <?php foreach($data['rate_list'] as $rate) { ?>              
                <tr class="history__item">                                  
                  <td class="history__name"><?php print($rate['username']) ?></td>                  
                  <td class="history__price"><?php print($rate['amount']) ?> р </td>                  
                  <td class="history__time">
                    <?php                                                                          
                      $date = date('d.m.y', strtotime($rate['date_create'])); 
                      $time = date('H:i', strtotime($rate['time_create']));                    
                      print($date . "в " . $time);
                    ?>
                  </td>
                </tr>
                <?php } //foreach ?>
            </table>
          </div>          
        </div>
      <?php } //foreach ?>
    </div>
  </section>
</main>
