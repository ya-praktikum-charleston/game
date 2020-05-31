<?php include '../include/header.php'; ?>



<div class="linear" id="Hello">

    <p>Устанавливаем <code>Git</code> <a target="_blank" href="https://git-scm.com/downloads">ссылка на оф.сайт</a></p>
    <p>Заходим в папку с проектом, кликаем правой кнопкой <code>Git Bash Here</code></p>
    <p>В консоли пишем <code>git init</code></p>
    <p><code>git status</code> посмотреть статус файлов (если файлы красные, то надо добавить в отслеживание гитом)</p>

    <p><i>Добавление файлов для отслеживания</i></p>
    <p><code>git add *</code> добавить все файлы для отслеживания гитом <i>(теперь после <code>git status</code> файлу будут зелеными)</i></p>
    <p><code>git add script.js</code> добавление файлов по одному для отслеживания гитом <i>(теперь после <code>git status</code> файл будет зеленым)</i></p>

    <p><i>Коммит</i></p>
    <p><code>git commit -m "kommentary"</code> коммит (слепок), добавляем в репозиторий.</p>

    <p><i>Заливка в репозиторий на <b>GitHub</b></i></p>
    <p>Заходим на <code>GitHub</code> <a href="https://github.com/" target="_blank">ссылка на оф.сайт</a>. Создаём новый репозиторий</p>
    <p>Там будут указаны команды. Используя две последние для <b>push</b>. В процессе потребуется ввести логин и пароль для <b>Git</b></p>

    <br>
    <p><i>Стянуть проект из <b>Git</b></i></p>
    <p>Заходим по ссылке на репозиторий и жмен на зеленую кнопку <i><b>Clone or download</b></i>. Копируем ссылку</p>
    <p>На компьютере создаём рабочую папку для проекта. Заходим в папку с проектом, кликаем правой кнопкой <code>Git Bash Here</code>.</p>
    <p>Инициализируем <i><b>Git</b></i> командой <code>git init</code></p>
    <p>Связываем нашу папку с репозиторием командой <code>git remote add origin https://github.com/vit-vokhminov/node_site.git</code>. Здесь подставляем скопированную ссылку.</p>
    <p><code>git pull origin master</code> стягиваем проект</p>

    <br>
    <p><i>Внесение изменений в проект</i></p>
    <p>Смотрим <code>git status</code>. Измененные файлы будут красные.</p>
    <p><code>git add script.js</code> добавляем измененный файл в коммит</p>
    <p><code>git commit -m "koment"</code> делаем коммит.</p>
    <p><code>git push -u origin master</code> заливаем изменения.</p>

    <br>
    <p><i>Обновить проект (стянуть изменения)</i></p>
    <ul class="ul_num">
        <li>
            <p><i>Если стягивающий обновления программист ни чего не делал</i></p>
            <p><code>git pull origin master</code> стягиваем проект</p>
        </li>
        <li>
            <p><i>Если стягивающий обновления программист вносил изменения</i></p>
            <p><code>git pull origin master</code> стягиваем проект</p>
        </li>
    </ul>


    <pre class="brush: xml;">



    </pre>


</div>


<div class="linear" id="use_strict">

    <h2>IT-KAMASUTRA</h2>

    <pre class="brush: js;">

        // стянуть проект
        git clone https://github.com/it-kamasutra/react-way-of-samurai.git

        // откатится к определенному коммиту
        gitk --all&     (открыть графическую оболочку гита, чтобы позырить все коммиты)
        // выбираем нужный коммит и копируем SHAR1 ID
            ctrl + insert (копировать в буфер обмена)
            shift + insert (вставить из буфера обмена)
        git checkout commit-number (пример: git checkout 1f9623bc656e2b0bf8d393b93359a854d31ca5e3) (переключится на нужный коммит)

        // откатить изменения в определенном файле
        git checkout src/App.js         (src/App.js это путь откуда запустили git)
    </pre>


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
