<?php include '../../include/header.php'; ?>



<div class="linear" id="Hello">

    <h2>Практика</h2>

    <p><b>Задача 1 - Простой React Router</b></p>

    <pre class="brush: js;">
        import React, { PureComponent, Component, memo } from &quot;react&quot;;
        import {
          BrowserRouter as Router,
          Switch,
          Route,
          Link,
          RouteComponentProps
        } from &quot;react-router-dom&quot;;

        function About() {
          return &lt;h2&gt;About&lt;/h2&gt;;
        }

        function Users(props) {
          console.log({ props });

          // Для бест-практис: колбеки внутри FC надо оборачивать в React.useCallback
          const goToAbout = () =&gt; {
            props.history.push(&quot;/about&quot;);
          };

          return (
            &lt;div&gt;
              &lt;h2&gt;Users&lt;/h2&gt;
              &lt;p onClick={goToAbout}&gt;Перейти в эбаут по пушу (кликни меня)&lt;/p&gt;
            &lt;/div&gt;
          );
        }

        export default class App extends PureComponent {
          render() {
            return (
              &lt;div className=&quot;app&quot;&gt;
                &lt;Router&gt;
                  &lt;div&gt;
                    &lt;nav&gt;
                      &lt;ul&gt;
                        &lt;li&gt;
                          &lt;Link to=&quot;/&quot;&gt;Home&lt;/Link&gt;
                        &lt;/li&gt;
                        &lt;li&gt;
                          &lt;Link to=&quot;/about&quot;&gt;About&lt;/Link&gt;
                        &lt;/li&gt;
                        &lt;li&gt;
                          &lt;Link to=&quot;/users&quot;&gt;Users&lt;/Link&gt;
                        &lt;/li&gt;
                      &lt;/ul&gt;
                    &lt;/nav&gt;

                    &lt;Switch&gt;
                      &lt;Route path=&quot;/about&quot;&gt;
                        &lt;About /&gt;
                      &lt;/Route&gt;

                      &lt;Route path=&quot;/users&quot; exact component={Users} /&gt;

                      &lt;Route path=&quot;/&quot;&gt;
                        {props =&gt; {
                          return (
                            &lt;span&gt;
                              Домашняя{&quot; &quot;}
                              &lt;a
                                style={{ color: &quot;blue&quot;, cursor: &quot;pointer&quot; }}
                                onClick={() =&gt; props.history.push(&quot;/about&quot;)}
                              &gt;
                                (кликни на меня и перейдешь на эбаут)
                              &lt;/a&gt;
                            &lt;/span&gt;
                          );
                        }}
                      &lt;/Route&gt;
                    &lt;/Switch&gt;
                  &lt;/div&gt;
                &lt;/Router&gt;
              &lt;/div&gt;
            );
          }
        }
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
