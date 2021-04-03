<?php include '../../include/header.php'; ?>



<div class="linear" id="Hello">

    <h2>Безопасность веб-приложений</h2>

    <p><b>Задача 1: XSS-01-воспроизведение</b></p>

    <pre class="brush: html;">
        &lt;form id=&quot;form&quot;&gt;
          Search: &lt;input type=&quot;text&quot; name=&quot;p1&quot; size=&quot;60&quot; value=&quot;&quot;&gt;
          &lt;input type=&quot;submit&quot; value=&quot;Search&quot;&gt;
        &lt;/form&gt;
        &lt;div id=&quot;result&quot;&gt;&lt;/div&gt;
    </pre>

    <pre class="brush: js;">
        form.addEventListener('submit', event => {
            event.preventDefault();
            result.innerHTML = event.srcElement[0].value;
        });
    </pre>

    <p>Круто! Теперь вы знаете, как пользователи могут пострадать от уязвимого кода. Конечно, злоумышленники не будут вызывать <code>alert</code>. Скорее они сделают <code>fetch-запрос</code>, где отправят на свой сервер <code>document.cookie</code> пользователя или другую важную информацию.</p>

    <br>
    <p><b>Задача 2: XSS-01-устранение</b></p>

    <p>Исправьте код, чтобы устранить XSS-уязвимость.</p>

    <pre class="brush: html;">
        &lt;form id=&quot;form&quot;&gt;
          Search: &lt;input type=&quot;text&quot; name=&quot;p1&quot; size=&quot;60&quot; value=&quot;&quot;&gt;
          &lt;input type=&quot;submit&quot; value=&quot;Search&quot;&gt;
        &lt;/form&gt;
        &lt;div id=&quot;result&quot;&gt;&lt;/div&gt;
    </pre>

    <pre class="brush: js;">
          function escape(string) {
              var htmlEscapes = {
                  '&': '&amp;',
                  '<': '&lt;',
                  '>': '&gt;',
                  '"': '&quot;',
                  "'": '&#39;'
              };

              return string.replace(/[&<>"']/g, function(match) {
                  return htmlEscapes[match];
              });
          };
          form.addEventListener('submit', event => {
              event.preventDefault();
              result.innerHTML = escape(event.srcElement[0].value);
          });
    </pre>



</div>



<!--
<pre class="brush: js;">

</pre>

<ul class="marker">
    <li></li>
</ul>

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



<?php include '../../include/footer.php'; ?>
