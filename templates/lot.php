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
        if($_GET['id'] > countCategory())
        {
          header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found"); //Сообщаем 404 ошибку
          exit();
        }
        else {
          foreach($data['product_list'] as $product) {            
        ?>

<!-- QUEST_6.5: Покажите информацию о лоте на странице (см. ниже) -->
  <section class="lot-item container">
    <h2><?= $product['name']; ?></h2>
    <div class="lot-item__content">
        <div class="lot-item__left">

          <div class="lot-item__image">
            <img src="<?= $product['url']; ?>" width="730" height="548" alt="Сноуборд">
          </div>

          <p class="lot-item__category">Категория: <span>Доски и лыжи</span></p>
          <p class="lot-item__description">

            <!-- QUEST_6: выводим наше описание -->
            <?= $product['descr']; ?>
          </p>
        </div>
        <div class="lot-item__right">
          <div class="lot-item__state">
            <div class="lot-item__timer timer">
              10:54:12
            </div>
            <div class="lot-item__cost-state">
              <div class="lot-item__rate">
                <span class="lot-item__amount">Текущая цена</span>

                <!-- QUEST_6: выводим нашу цену -->
                <span class="lot-item__cost">
                  <?= number_format($product['price'], 0, ',' , ' ' ); ?>
                <b class="rub">р</b></span>
              </div>
              <div class="lot-item__min-cost">
                Мин. ставка <span>12 000 р</span>
              </div>
            </div>
            <form class="lot-item__form" action="https://echo.htmlacademy.ru" method="post">
              <p class="lot-item__form-item">
                <label for="cost">Ваша ставка</label>
                <input id="cost" type="number" name="cost" placeholder="12 000">
              </p>
              <button type="submit" class="button">Сделать ставку</button>
            </form>
          </div>
          <div class="history">
            <h3>История ставок (<span>10</span>)</h3>
            <table class="history__list">
              <tr class="history__item">
                <td class="history__name">Иван</td>
                <td class="history__price">10 999 р</td>
                <td class="history__time">5 минут назад</td>
              </tr>
              <tr class="history__item">
                <td class="history__name">Константин</td>
                <td class="history__price">10 999 р</td>
                <td class="history__time">20 минут назад</td>
              </tr>
              <tr class="history__item">
                <td class="history__name">Евгений</td>
                <td class="history__price">10 999 р</td>
                <td class="history__time">Час назад</td>
              </tr>
              <tr class="history__item">
                <td class="history__name">Игорь</td>
                <td class="history__price">10 999 р</td>
                <td class="history__time">19.03.17 в 08:21</td>
              </tr>
              <tr class="history__item">
                <td class="history__name">Енакентий</td>
                <td class="history__price">10 999 р</td>
                <td class="history__time">19.03.17 в 13:20</td>
              </tr>
              <tr class="history__item">
                <td class="history__name">Семён</td>
                <td class="history__price">10 999 р</td>
                <td class="history__time">19.03.17 в 12:20</td>
              </tr>
              <tr class="history__item">
                <td class="history__name">Илья</td>
                <td class="history__price">10 999 р</td>
                <td class="history__time">19.03.17 в 10:20</td>
              </tr>
              <tr class="history__item">
                <td class="history__name">Енакентий</td>
                <td class="history__price">10 999 р</td>
                <td class="history__time">19.03.17 в 13:20</td>
              </tr>
              <tr class="history__item">
                <td class="history__name">Семён</td>
                <td class="history__price">10 999 р</td>
                <td class="history__time">19.03.17 в 12:20</td>
              </tr>
              <tr class="history__item">
                <td class="history__name">Илья</td>
                <td class="history__price">10 999 р</td>
                <td class="history__time">19.03.17 в 10:20</td>
              </tr>
            </table>
          </div>
        </div>
      <?php } } ?>
    </div>
  </section>
</main>
