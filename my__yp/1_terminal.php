<?php include '../include/header.php'; ?>



<div class="linear" id="Hello">

    <p>В этой шпаргалке собрали основные команды терминала, которые пригодятся в ближайших уроках. Чтобы использовать их в Windows, необходимо установить
        <a href="https://git-scm.com/download/win">Git Bash</a>, поскольку встроенный терминал эти команды не поддерживает.</p>

    <br>

    <p><b>Навигация по файловой системе</b></p>

    <p><code>pwd</code> — покажи в какой я папке;</p>
    <p><code>ls</code> — покажи файлы в текущей папке;</p>
    <p><code>cd first-project</code> — перейди в папку first-project;</p>
    <p><code>cd first-project/html</code> — перейди в папку html, находящуюся в папке first-project;</p>
    <p><code>cd ..</code> — перейди на уровень выше, в родительскую папку;</p>
    <p><code>cd ~</code> — перейди в домашнюю папку;</p>
    <p><code>cd -</code> — вернись в директорию, где были до последнего cd.</p>

    <br>
    <p><b>Работа с файлами</b></p>

    <p><code>mkdir second-project</code> — создай в текущей директории папку с именем second-project;</p>
    <p><code>rm about.html</code> — удали файл about.html;</p>
    <p><code>rmdir images</code> — удали папку images;</p>
    <p><code>rm -r second-project</code> — удали папку second-project и всё, что она содержит;</p>
    <p><code>touch index.html</code> — создай файл index.html в текущей папке;</p>
    <p><code>touch index.html style.css script.js</code> — создай три файла в текущей папке;</p>
    <p><code>cp index.html index.html.backup</code> — создай копию файла index.html с именем index.html.backup;</p>
    <p><code>mv index.html first-project</code> — перенеси файл index.html в папку first-project;</p>
    <p><code>cat ./path/to/filename.extension</code> — отобрази содержимое файла;</p>
    <p><code>head filename или tail filename</code> — покажи начало или конец файла (для длинных файлов, например, логов).</p>

    <br>
    <p><b>Работа с сетью</b></p>

    <p><code>ping ya.ru</code> — проверь соединение с интернетом. Чаще всего проверяют на упрощенной странице Яндекса, просто потому что мало букв и удобно;</p>
    <p><code>ipconfig или ifconfig</code> в зависимости от системы — покажи IP-адреса различных интерфейсов. Можно увидеть не только IPv4, но и IPv6 адреса. Можно посмотреть список подключенных интерфейсов;</p>
    <p><code>curl host</code> — самая мощная утилита для отправки запросов из консоли. Может отправлять запросы с любыми заголовками и любыми методами. СURL-формат очень популярен и принимается многими GUI-платформами для отправки запросов.</p>

    <br>
    <p><b>Ссылки со списками полезных утилит:</b></p>

    <p><a target="_blank" href="https://docs.altlinux.org/ru-RU/archive/2.3/html-single/junior/alt-docs-extras-linuxnovice/ch02s04.html">Обзор основных команд системы UNIX;</a></p>
    <p><a target="_blank" href="https://unix-tut.blogspot.com/2008/08/unix.html">Краткий список утилит с объяснениями «своими словами»;</a></p>
    <p><a target="_blank" href="https://linuxvsem.ru/commands/komandy-filtratsii-v-linux">Список полезных команд в Linux;</a></p>
    <p><a target="_blank" href="https://habr.com/ru/post/229501/">Что такое grep и с чем его едят.</a></p>


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
