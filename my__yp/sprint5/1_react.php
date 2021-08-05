<?php include '../../include/header.php'; ?>



<div class="linear" id="Hello">

    <h2>Практика</h2>

    <p><b>Задача 1 - Render Props</b></p>

    <pre class="brush: js;">
        import React, { Component }  from 'react';
        import { Cookie, Muffin } from './clickers';

        class Counter extends Component {
            constructor(props) {
                super(props);
                this.state = { count: 0 };
            }

            addClick = (value) => {
                this.setState(prevState => ({ ...prevState, count: prevState.count + value }));
            }

            render() {
                return <>
                    &lt;div id=&quot;result&quot;&gt;Count {this.state.count}&lt;/div&gt;
                    {this.props.children(this.addClick)}
                </>;
            }
            }

            export default class App extends Component {
            render() {
                return &lt;Counter&gt;
                {
                    addClick =&gt; &lt;&gt;
                    &lt;Cookie onClick={addClick} /&gt;
                    &lt;Muffin handleClick={addClick}/&gt;
                    &lt;/&gt;
                }
                &lt;/Counter&gt;;
            }
        }
    </pre>

    <br>
    <p><b>Компонент кнопки</b></p>

    <pre class="brush: js;">
        import React from 'react';

        export class Button extends React.Component {
            constructor(props) {
                super(props);
            }
            render() {
                return (
                    &lt;button&gt;
                        {this.props.children}
                    &lt;/button&gt;
                );
            }
        }
    </pre>

    <br>
    <p><b>Число ререндеров</b></p>

    <pre class="brush: js;">
        import React, { Component, PureComponent  }  from 'react';

        class MySuperComponent extends Component  {
            render() {
                const { name } = this.props;
                console.log(`Имя: ${name}`);

                return &lt;h1&gt;{name}&lt;/h1&gt;;
            }
        }

        export default class App extends PureComponent {
            state = {
                name: "Пупа",
                dummy: false
            };

            toggleMessage = () => {
                const { name } = this.state;

                this.setState({ name: name === "Пупа" ? "Лупа" : "Пупа" });
            };

            toggleDummy = () => {
                this.setState({ dummy: !this.state.dummy });
            };

            render() {
                const { name } = this.state;

                console.log("Рендер App");

                return (
                    &lt;React.Fragment&gt;
                        &lt;MySuperComponent name={name}/&gt;

                        &lt;button onClick={this.toggleMessage}&gt;Изменить сообщение&lt;/button&gt;
                        &lt;button onClick={this.toggleDummy}&gt;Сделать пустое изменение&lt;/button&gt;
                    &lt;/React.Fragment&gt;
                );
            }
        }
    </pre>

    <br>
    <p><b>Биндинг методов</b></p>

    <pre class="brush: js;">
        import React, { Component, memo } from "react";

        const Children = memo(({ name, handleClick }) => {
            console.log(`Имя: ${name}`);

            return (
                 &lt;h1 onClick={handleClick}&gt;
                    {name}
                &lt;/h1&gt;
            );
        });

        export default class App extends Component {
            constructor(props){
                super(props);
                this.state = {
                    name: "Пупа",
                    dummy: false
                };
                this.toggleMessage = this.toggleMessage.bind(this);
                this.toggleDummy = this.toggleDummy.bind(this);
                this.showDummy = this.showDummy.bind(this);
            }

            toggleMessage() {
                const { name } = this.state;

                this.setState({ name: name === "Пупа" ? "Лупа" : "Пупа" });
            }

            toggleDummy() {
                this.setState({ dummy: !this.state.dummy });
            }

            showDummy() {
                console.log(this.state.dummy);
            }

            render() {
                const { name } = this.state;

                console.log("Рендер App");

                return (
                    &lt;React.Fragment&gt;
                    &lt;Children name={name} handleClick={this.showDummy}/&gt;

                    &lt;button onClick={this.toggleMessage}&gt;Изменить сообщение&lt;/button&gt;
                    &lt;button onClick={this.toggleDummy}&gt;Сделать пустое изменение&lt;/button&gt;
                    &lt;/React.Fragment&gt;
                );
            }
        }
    </pre>

    <br>
    <p><b>Работаем со стейтом</b></p>

    <pre class="brush: js;">
        import React, { Component, PureComponent, memo } from "react";

        const Close = memo(({setClear}) => {
            return &lt;button onClick={setClear} style={{ marginLeft: 16 }}&gt;Очистить&lt;/button&gt;;
        });

        class Input extends PureComponent {
            render() {
                const { value, setValue, setClear } = this.props;
                return (
                    &lt;label&gt;
                        &lt;input value={value} onChange={setValue} /&gt;
                        &lt;Close setClear={setClear} /&gt;
                    &lt;/label&gt;
                );
            }
        }

        export default class App extends Component {
            state = {
                value: ""
            };
            setValue = (e) => {
                this.setState({value: e.target.value})
            }
            setClear = () => {
                this.setState({value: ''})
            }
            render() {
                const { value } = this.state;

                return (
                    &lt;React.Fragment&gt;
                        &lt;h1&gt;Value is [{value}]&lt;/h1&gt;
                        &lt;Input value={value} setValue={this.setValue} setClear={this.setClear} /&gt;
                    &lt;/React.Fragment&gt;
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
