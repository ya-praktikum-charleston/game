<?php include '../include/header.php'; ?>



<div class="linear" id="Hello">

    <p><b>Настройка Netlify</b></p>

    <br>
    <p>После авторизации на <a href="https://www.netlify.com/">Netlify</a> пользователь видит пустой личный кабинет:</p>
    <img src="img/S3_03_04_1596143762.png" alt="">
    <p>Создадим новое приложение, нажав на кнопку “New site from Git”:</p>
    <img src="img/S3_03_05_1596143820.png" alt="">
    <p>На первом шаге выберем “Continuous Deployment GitHub”. Сервис запросит доступ к аккаунту на GitHub:</p>
    <img src="img/S3_03_06_1596144050.png" alt="">
    <p>Скорее всего, Netlify не получит доступ к нужному репозиторию при первой авторизации. Тогда понадобятся дополнительные настройки:</p>
    <img src="img/S3_03_07_1596144081.png" alt="">
    <p>Опасно выдавать права на все репозитории. Достаточно выбрать только тот, что мы тестируем:</p>
    <img src="img/S3_03_08_v02_1611660711.png" alt="">
    <p>GitHub попросит подтвердить решение вводом пароля. Тогда в списке Netlify появится новый репозиторий:</p>
    <img src="img/S3_03_09_1596144121.png" alt="">
    <p>В следующей форме не нужно ничего менять, можно просто оставить ветку мастер. Остаётся нажать “Submit” в последней форме.
        В корне репозитория создадим конфигурационный файл <code>netlify.toml</code>. По нему Netlify поймёт, откуда брать файлы:</p>
    <p>
        <code>
            # Global settings applied to the whole site. <br>
            # <br>
            # “base” is the directory to change to before starting build. If you set base:<br>
            #        that is where we will look for package.json/.nvmrc/etc, not repo root!<br>
            # “command” is your build command. <br>
            # “publish” is the directory to publish (relative to the root of your repo). <br>
            <br>
            [build]<br>
            publish = "dist"<br>
        </code>
    </p>

    <br>
    <p><b>Деплой</b></p>
    <p>Теперь при каждом новом «пуше» в репозиторий Netlify опубликует изменения. Чтобы это проверить, найдите домен вашего сайта в личном кабинете:</p>
    <img src="img/S3_03_10_1596144165.png" alt="">
    <p>Заново опубликовать содержимое репозитория можно и без «пуша». Для этого в личном кабинете служит вкладка “Deploys”. Наш
        <a href="https://github.com/vit-vokhminov/netify-example/tree/main/dist">тестовый репозиторий</a> задеплоен и доступен по этому
        <a href="https://blissful-pike-d97e92.netlify.app/">адресу</a>.</p>
    <p>Осталась одна проблема. Открывать пользователям основную ветку на GitHub — слишком отважный поступок. Обычно разработчики публикуют стабильную ветку кода. Об этом — в следующем уроке.</p>

    <br>
    <p><b>Настраиваем автодеплой</b></p>

    <br>
    <p>Мы разделим репозиторий на две ветки:</p>
    <ul class="marker">
        <li><code>master</code> — для разработки новых функций,</li>
        <li><code>deploy</code> — для публикации стабильных версий сайта.</li>
    </ul>

    <p>При «мёрдже» (от англ. merge, слияние) из <code>master</code> в <code>deploy</code>, используя WebHooks, Netlify уведомляется по событию мёрджа и запускает процессы внутри себя для деплоя.
        При этом он может исполнить произвольный код из
        конфигурационного файла — например, запустить сборку проекта. Для этого в файле <code>netlify.toml</code> достаточно в блоке <code>[build]</code> указать <code>command = "npm run <some>"</code>.</p>

    <br>
    <p><b>Создание ветки deploy</b></p>

    <p>Чтобы создать ветку <code>deploy</code>, применим интерфейс командной строки и <code>git</code>. Для этого нужно быть в ветке <code>master</code> и закоммитить всё, что не успели залить на Git.</p>
    <p><code>git checkout -f master</code> -f сотрёт все незакоммиченные данные! Это важно, так как вы можете потерять весь код, который писали и не закоммитили.</p>
    <p><code>git checkout -b deploy</code> создаём ветку с названием деплой</p>
    <p><code>git push -u origin deploy</code> связываем ветку с origin и пушим её на сервер</p>

    <br>
    <p>Теперь можно перейти на сайт GitHub в ваш репозиторий и выбрать ветку <code>deploy</code>, она появилась на удалённом сервере.</p>

    <br>
    <p><b>Настройка Netlify</b></p>

    <p>Netlify до сих пор наблюдает за веткой <code>master</code>. Научим сервис отслеживать ветку <code>deploy</code>.</p>
    <p>Обратимся к настройкам:</p>

    <img src="img/S3_03_13_1596144510.png" alt="">
    <br>
    <p>Там понадобится раздел “Build & deploy”, секция “Continuous Deployment”. Укажем ветку <code>deploy</code> в графе “Production branch”:</p>

    <img src="img/S3_03_14_1596144532.png" alt="">
    <br>

    <p>Готово: «пуш» или «мёрдж» в ветке <code>deploy</code> запустят публикацию проекта.</p>
    <p>На вкладке “Deploy” у проекта можно смотреть историю выкладок и кто был инициатором: Вы или триггер в GitHub.</p>

    <img src="img/S3_03_15_1596144558.png" alt="">

    <p>Развивать и тестировать проект вы можете в своей стандартной ветке, например, <code>master</code>, а стабильный код переносить в ветку <code>deploy</code> или <code>stable</code>.</p>
</div>









<!--


v&ndash;                тире

&quot;                  двойная кавычка

-->


<!--

<div class="linear" id="use_strict">
    <h1>Строгий режим — "use strict"</h1>

    <h2>«use strict»</h2>


    <p>Например:</p>

    <pre class="brush: js;">
            "use strict";

            // этот код работает в современном режиме
            ...
        </pre>


    <p>На данный момент достаточно иметь общее понимание об этом режиме:</p>
    <ul class="ul_num">
        <li><code>111111</code> 2222222222222222</li>

    </ul>

</div>

-->



<?php include '../include/footer.php'; ?>
