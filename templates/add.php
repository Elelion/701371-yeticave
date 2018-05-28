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

<!-- QUEST_6.2.3: ...а action формы указывать на add.php -->
  <form class="form form--add-lot container form--invalid" 
        action="add.php" 
        method="post" 
        enctype="multipart/form-data"> <!-- form--invalid -->

    <?php //foreach($data['product_list'] as $product) { ?>

    <h2>Добавление лота</h2>
    <div class="form__container-two">
      <div class="form__item"> <!-- form__item--invalid -->
        <label for="lot-name">Наименование</label>
        
        <input id="lot-name" type="text" 
                            name="lot-name"
                            placeholder="Введите наименование лота" 
                            value= ""
                            required>

        <span class="form__error">Введите наименование лота</span>
      </div>
      <div class="form__item">
        <label for="category">Категория</label>
        <select id="category" name="lot-category" >
          <option>Выберите категорию</option>

<!-- выводим категорию в ComboBox -->
          <?php foreach($data['category_list'] as $category) { ?>
            <option><?php print($category['name']); ?></option>
          <?php } ?>

        </select>
        <span class="form__error">Выберите категорию</span>
      </div>
    </div>

    <div class="form__item form__item--wide">
      <label for="message">Описание</label>
      <textarea id="message" 
                name="message" 
                placeholder="Напишите описание лота" 
                required>
      </textarea>
      <span class="form__error">Напишите описание лота</span>
    </div>

    <div class="form__item form__item--file"> <!-- form__item--uploaded -->
      <label>Изображение</label>
      <div class="preview">
        <button class="_preview__remove" 
               type="submit" 
               name="add_img" 
               value="Загрузить">x</button>

        <div class="preview__img">
          <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
        </div>
      </div>
      <div class="form__input-file">
        <input class="_visually-hidden" 
               type="file" 
               id="photo2" 
               value="" 
               name="load">

        <label for="photo2">
          <!-- <span>+ Добавить</span> -->
        </label>
      </div>
    </div>

    <div class="form__container-three">
      <div class="form__item form__item--small">
        <label for="lot-rate">Начальная цена</label>

        <!-- 
        QUEST_6.2.4: После отправки формы проверять, что были заполнены все поля, а также
        значения полей «начальная цена» и «шаг ставки»: туда можно вводить только цифры. 
       -->
        <input id="lot-rate" 
              type="number" 
              name="lot-rate" 
              placeholder="0" 
              pattern="\d [0-9]"
              required>
        <span class="form__error">Введите начальную цену</span>
      </div>
      <div class="form__item form__item--small">
        <label for="lot-step">Шаг ставки</label>

        <!-- 
        QUEST_6.2.4: После отправки формы проверять, что были заполнены все поля, а также
        значения полей «начальная цена» и «шаг ставки»: туда можно вводить только цифры. 
       -->
        <input id="lot-step" 
              type="number" 
              name="lot-step" 
              placeholder="0" 
              pattern="\d [0-9]"
              required>
        <span class="form__error">Введите шаг ставки</span>
      </div>
      <div class="form__item">
        <label for="lot-date">Дата окончания торгов</label>
        <input class="form__input-date" id="lot-date" type="date" name="lot-date" >
        <span class="form__error">Введите дату завершения торгов</span>
      </div>
    </div>
    <!--
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    -->

    <button type="submit" 
            class="button"
            name="add_lot">Добавить лот</button>

    <?php //} //foreach ?>

  </form>  
</main>
