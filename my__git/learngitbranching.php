<?php include '../include/header.php'; ?>



<div class="linear" id="Hello">

    <p><a target="_blank" href="https://learngitbranching.js.org/?locale=ru_RU">ссылка на оф.сайт</a></p>

    <ul>
        <li>commit</li>
        <li>branch</li>
        <li>checkout</li>
        <li>cherry-pick</li>
        <li>reset</li>
        <li>revert</li>
        <li>rebase</li>
        <li>merge</li>
    </ul>
    <br>
    <p><b>Создание веток</b></p>
    <p><code>git branch newImage</code> - Cоздать новую ветку с именем newImage</p>
    <p><code>git checkout [yourbranchname];</code> - Эта команда перенесёт нас на новую ветку в момент, когда мы ещё не коммитили изменения</p>
    <p><code>git checkout -b [yourbranchname]</code> - Можно создать новую ветку и переключиться на неё с помощью одной команды</p>
    <br>
    <p><b>Слияния веток в Git</b></p>
    <p><code>git merge</code> - слияние или просто мердж</p>
    <p><code>git merge [yourbranchname]</code> - слияние или просто мердж</p>
    <br>
    <p><b>Git Rebase</b></p>
    <p><code>rebasing</code> - Второй способ объединения изменений в ветках - это rebasing. При ребейзе Git по сути копирует набор коммитов и переносит их в другое место.</p>
    <p>Хочется сдвинуть наши изменения из bugFix прямо на вершину ветки main. Благодаря этому всё будет выглядеть, как будто эти изменения делались последовательно, хотя на самом деле - параллельно.
        <br>
        Применим git rebase. <code> git rebase main </code></p>

    <div class="div_svg_main">
        <div class="div_svg">
            <?php echo file_get_contents("svg/1rebasing.svg"); ?>
        </div>
        <div class="div_svg">
            <?php echo file_get_contents("svg/2rebasing.svg"); ?>
        </div>
    </div>

    <p>Вот мы выбрали ветку main. Вперёд - сделаем rebase на bugFix. <code> git rebase bugFix </code></p>

    <div class="div_svg_main">
        <div class="div_svg">
            <?php echo file_get_contents("svg/3rebasing.svg"); ?>
        </div>
    </div>

    <p>Так как main был предком bugFix, git просто сдвинул ссылку на main вперёд.</p>

    <br>
    <p><b>Прогулка по Git</b> <i>различные способы перемещения по дереву коммитов вашего проекта.</i></p>
    <p><code>HEAD</code> - это символическое имя текущего выбранного коммита — это, по сути, тот коммит, над которым мы в данным момент работаем.</p>

    <p>Посмотрим, как это работает. Обратите внимание на то, где находится HEAD до и после коммита.</p>
    <p><code> git checkout C1; git checkout main; git commit; git checkout C2 </code></p>

    <div class="div_svg_main">
        <div class="div_svg">
            <?php echo file_get_contents("svg/4head.svg"); ?>
        </div>
        <div class="div_svg">
            <?php echo file_get_contents("svg/5head.svg"); ?>
        </div>
    </div>

    <p>Вот! HEAD всё это время скрывался за веткой main. Отделение (detaching) HEAD означает лишь присвоение его не ветке, а конкретному коммиту.</p>

    <br>
    <p><b>Относительные ссылки (^)</b></p>
    <p>Относительные ссылки - мощный инструмент, но мы покажем два простых способа использования:</p>
    <ul class="marker">
        <li>Перемещение на один коммит назад <code>^</code></li>
        <li>Перемещение на коммитов назад <code>~<num></code></li>
    </ul>

    <p>Для начала рассмотрим оператор каретки (<code>^</code>). Когда мы добавляем его к имени ссылки, Git воспринимает это как указание найти родителя указанного коммита.</p>
    <p>Так что <code>main^</code> означает "первый родитель ветки main".</p>
    <p><code>main^^</code> означает прародитель (родитель родителя) main</p>
    <p>Давайте переключимся на коммит Выше main</p>
    <p><code> git checkout main^ </code></p>

    <div class="div_svg_main">
        <div class="div_svg">
            <?php echo file_get_contents("svg/6arrow.svg"); ?>
        </div>
        <div class="div_svg">
            <?php echo file_get_contents("svg/7arrow.svg"); ?>
        </div>
    </div>

    <p>Можно также использовать HEAD как относительную ссылку. Попробуем пройти несколько раз назад по дереву коммитов</p>
    <p><code> git checkout C3; git checkout HEAD^; git checkout HEAD^; git checkout HEAD^ </code></p>

    <div class="div_svg_main">
        <div class="div_svg">
            <?php echo file_get_contents("svg/8arrow.svg"); ?>
        </div>
        <div class="div_svg">
            <?php echo file_get_contents("svg/9arrow.svg"); ?>
        </div>
    </div>

    <p><b>Оператор "~"</b></p>
    <p>Предположим, нужно переместиться на много шагов назад по дереву. Было бы неудобно печатать <code>^</code> несколько раз (или несколько десятков раз), так что Git поддерживает также оператор тильда (<code>~</code>).</p>
    <p>Укажем после <code>~</code> число коммитов, через которые надо пройти.</p>
    <p><code> git checkout HEAD~4 </code></p>

    <div class="div_svg_main">
        <div class="div_svg">
            <?php echo file_get_contents("svg/10arrow.svg"); ?>
        </div>
        <div class="div_svg">
            <?php echo file_get_contents("svg/11arrow.svg"); ?>
        </div>
    </div>

    <p><b>Перемещение ветки (branch forcing)</b></p>
    <p>Теперь мы разбираемся в относительных ссылках, так что можно реально использовать их для дела.</p>
    <p>Одна из наиболее распространённых целей, для которых используются относительные ссылки - это перемещение веток. Можно напрямую прикрепить ветку к коммиту при помощи опции -f. Например, команда:</p>
    <p><code>git branch -f main HEAD~3</code></p>
    <p>Переместит (принудительно) ветку main на три родителя назад от HEAD.</p>

    <div class="div_svg_main">
        <div class="div_svg">
            <?php echo file_get_contents("svg/12arrow.svg"); ?>
        </div>
        <div class="div_svg">
            <?php echo file_get_contents("svg/13arrow.svg"); ?>
        </div>
    </div>

    <p>Относительная ссылка дала нам возможность просто сослаться на C1, а branch forcing (<code>-f</code>) позволил быстро переместить указатель ветки на этот коммит.</p>

    <h4>Отмена изменений в Git</h4>
    <p>Есть два основных способа отмены изменений в Git: первый - это <code>git reset</code>, а второй - <code>git revert</code>.</p>

    <p><code>git reset</code> отменяет изменения, перенося ссылку на ветку назад, на более старый коммит. Это своего рода "переписывание истории"; <code>git reset</code> перенесёт ветку назад, как будто некоторых коммитов вовсе и не было.</p>
    <p><code> git reset HEAD~1 </code></p>

    <div class="div_svg_main">
        <div class="div_svg">
            <?php echo file_get_contents("svg/14reset.svg"); ?>
        </div>
        <div class="div_svg">
            <?php echo file_get_contents("svg/15reset.svg"); ?>
        </div>
    </div>

    <p><code>Git Revert</code></p>
    <p>Reset отлично работает на локальных ветках, в локальных репозиториях. Но этот метод переписывания истории не сработает на удалённых ветках, которые используют другие пользователи.</p>
    <p>Чтобы отменить изменения и поделиться отменёнными изменениями с остальными, надо использовать git revert. Посмотрим, как это работает</p>
    <p><code> git revert HEAD </code></p>

    <div class="div_svg_main">
        <div class="div_svg">
            <?php echo file_get_contents("svg/16reset.svg"); ?>
        </div>
        <div class="div_svg">
            <?php echo file_get_contents("svg/17reset.svg"); ?>
        </div>
    </div>

    <h3>Введение в Cherry-pick <i>Поперемещаем изменения</i></h3>
    <p><code>git cherry-pick <Commit1> <Commit2> <...></code></p>
    <p>Это очень простой и прямолинейный способ сказать, что ты хочешь копировать несколько коммитов на место, где сейчас находишься (HEAD).</p>

    <p>Вот репозиторий, где есть некие изменения в ветке side, которые мы хотим применить и в ветку main. Мы можем сделать это при помощи команды rebase, которую мы уже прошли, но давай посмотрим, как cherry-pick справится с этой задачей.</p>
    <p><code> git cherry-pick C2 C4 </code></p>

    <div class="div_svg_main">
        <div class="div_svg">
            <?php echo file_get_contents("svg/18cherry.svg"); ?>
        </div>
        <div class="div_svg">
            <?php echo file_get_contents("svg/19cherry.svg"); ?>
        </div>
    </div>

    <p>Мы хотели перенести коммиты C2 и C4, Git дал нам их там, где они нужны.</p>

    <h4>Введение в интерактивный Rebase</h4>
    <p>Git cherry-pick прекрасен, когда точно известно, какие коммиты нужны (и известны их точные хеши)</p>
    <p>Но как быть в случае, когда точно не известно какие коммиты нужны? К счастью, Git позаботился о таких ситуациях! Можно использовать интерактивный rebase для этого - лучший способ отобрать набор коммитов для rebase.</p>
    <p>Всё, что нужно для интерактивного rebase - это опция <code>-i</code></p>
    <p>Если добавить эту опцию, Git откроет интерфейс просмотра того, какие коммиты готовы к копированию на цель rebase (target). Также показываются хеши коммитов и комментарии к ним, так что можно легко понять что к чему.</p>

    <p>После открытия окна интерактивного rebase есть три варианта для каждого коммита:</p>
    <ul class="marker">
        <li>Можно сменить положение коммита по порядку, переставив строчку с ним в редакторе (у нас в окошке строку с коммитом можно перенести просто мышкой).</li>
        <li>Можно "выкинуть" коммит из ребейза. Для этого есть pick - переключение его означает, что нужно выкинуть коммит.</li>
        <li>Наконец, можно соединить коммиты. В этом уровне игры у нас не реализована эта возможность, но, вкратце, при помощи этой функции можно объединять изменения двух коммитов.</li>
    </ul>
    <p><code> git rebase -i HEAD~4 </code></p>

    <div class="div_svg_main">
        <div class="div_svg">
            <?php echo file_get_contents("svg/20cherry.svg"); ?>
        </div>
        <div class="div_svg">
            <?php echo file_get_contents("svg/21cherry.svg"); ?>
        </div>
    </div>


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
