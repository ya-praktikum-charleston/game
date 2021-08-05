<?php include '../../include/header.php'; ?>



<div class="linear" id="Hello">

    <h2>Практика</h2>

    <p><b>Подгружаем данные</b></p>

    <pre class="brush: js;">
        import React, { PureComponent } from &quot;react&quot;;

        export default class App extends PureComponent {
          state = {
            data: null
          };
          static userName = &quot;vladpereskokov&quot;; // Здесь вытаскиывать у студента нейм

          componentDidMount() {
            fetch(&#x60;https://api.github.com/users/${App.userName}/repos&#x60;, {
              method: &quot;GET&quot;
            })
              .then(response =&gt; response.json())
              .then(data =&gt; {
                this.setState({ data });
                return data;
              });
          }

          render() {
            return (
              &lt;React.Fragment&gt;
                &lt;pre&gt;{JSON.stringify(this.state)}&lt;/pre&gt;
              &lt;/React.Fragment&gt;
            );
          }
        }
    </pre>


</div>

<div class="linear" id="use_strict">

    <h2>Рубрика мастерим сами</h2>

    <p><b>Debounce</b></p>

    <p>Результатом декоратора debounce(f, ms) должна быть обёртка, которая передаёт вызов f не более одного раза в ms миллисекунд. Другими словами, когда мы вызываем debounce, это гарантирует, что все остальные вызовы будут игнорироваться в течение ms.</p>

    <pre class="brush: js;">
        function debounce(callback, ms) {
            let isCooldown = false;

            return function() {
                if (isCooldown) {
                    return;
                }

                callback.apply(this, arguments);
                isCooldown = true;
                setTimeout(() => isCooldown = false, ms);
            };
        }
    </pre>

    <br>
    <p><b>Throttle</b></p>

    <p>Необходимо реализовать функцию throttle , которая будет выполнять обработчик не чаще одного раза за указанный интервал времени. У данной функции есть важное и существенное отличие от debounce: если игнорируемый вызов оказался последним, то есть после него до окончания задержки ничего нет — то он выполнится.</p>

    <pre class="brush: js;">
        const someCalc = function(a) {
            console.log(a + this.b )
        };

        function throttle(callback, delay, context = this) {

            let isThrottled = false,
                savedArgs,
                savedThis;

            function wrapper() {

                if (isThrottled) {
                    // запоминаем последние аргументы для вызова после задержки
                    savedArgs = arguments;
                    savedThis = context;
                    return;
                }

                // в противном случае переходим в состояние задержки
                callback.apply(context, arguments);

                isThrottled = true;

                // настройка сброса isThrottled после задержки
                setTimeout(function() {
                    isThrottled = false;
                    if (savedArgs) {
                        // если были вызовы, savedThis/savedArgs хранят последний из них
                        // рекурсивный вызов запускает функцию и снова устанавливает время задержки
                        wrapper.apply(savedThis, savedArgs);
                        savedArgs = savedThis = null;
                    }
                }, delay);
            }

            return wrapper;
        }

        // затормозить функцию до одного раза в 1000 мс
        const f1000 = throttle(someCalc, 1000, {b: ' call'});
        f1000(1); // выведет 1 call
        f1000(2); // (тормозим, не прошло 1000 мс)
        f1000(3); // (тормозим, не прошло 1000 мс)

        // когда пройдёт 1000 мс...
        // выведет 3 call, промежуточное значение 2 call игнорируется
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
