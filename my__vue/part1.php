<?php include '../include/header.php'; ?>



<div class="linear" id="Hello">

    <div class="sample">
        <input class="form-control" type="text" v-model="name">
        <hr>
        <h4>Hello, {{ name }}</h4>
        <h4>Hello, {{ $data.name }}</h4>
    </div>
    <script>
        let sample = new Vue({
            el: '.sample',
            data: {
                name: 'Виталий'
            }
        });
    </script>

    <pre class="brush: xml;">

            <input class="form-control" type="text" v-model="name">
            <hr>
            <h2>Hello, {{ name }}</h2>
            <h2>Hello, {{ $data.name }}</h2>

    </pre>
    <pre class="brush: js;">
         let sample = new Vue({
            el: '.sample',
            data: {
                name: 'Виталий'
            }
        });
    </pre>

    <p><code>data</code> - в этом объекте хранятся все базовые поля которые мы хотим использовать</p>
    <p><code>name</code> и <code>$data.name</code> - это две формы записи получения значения</p>
    <p><code>v-model</code> - директива</p>

</div>




<div class="linear" id="Hello">

    <h1>Директивы</h1>

    <div class="sample1">

        <p><code>v-on:input="name = $event.target.value"</code> - так можно получить значение данного инпута</p>

        <input class="form-control" type="text" v-on:input="name2 = $event.target.value">
        <input class="form-control" type="text" v-on:change="name2 = $event.target.value">
        <hr>
        <h4>Hello, {{ name2 }}</h4>

        <pre class="brush: xml;">
            <input class="form-control" type="text" v_on:input="name2 = $event.target.value">

            <input class="form-control" type="text" v_on:change="name2 = $event.target.value">
        </pre>

        <pre class="brush: js;">
            data: {
                name2: 'Виталий'
            }
        </pre>
        <hr>
        <h2>Условие</h2>
        <h4 v-if="showName">Hello, {{ name2 }}</h4>

        <p>если <code>showName</code> <code>true</code> то показываем</p>

        <pre class="brush: xml;">
            <h4 v_if="showName">Hello, {{ name2 }}</h4>
        </pre>

        <pre class="brush: js;">
            data: {
                showName: false
            }
        </pre>

        <hr>


        <h2>Изменение видимости</h2>

        <h2 v-show="showName2">v-show, {{ name2 }}</h2>

        <button class="btn btn-success" v-on:click="showName2 = !showName2">Изменение видимости №1</button>

        <button class="btn btn-success" v-on:click="toggleName">Изменение видимости №2</button>


        <pre class="brush: xml;">
            <h2 v_show="showName2">Hello, {{ name2 }}</h2>

            <button class="btn btn-success" v_on:click="showName2 = !showName2">Изменение видимости №1</button>

            <button class="btn btn-success" v_on:click="toggleName">Изменение видимости №2</button>
        </pre>

        <pre class="brush: js;">
            data: {
                showName2: true
            },
            methods: {
                toggleName(){
                    this.showName2 = !this.showName2;
                }
            }
        </pre>

        <hr>

        <h2>Условие if else</h2>
        <h4 v-if="showName3">v-if, {{ name2 }}</h4>
        <h4 v-else>v-else (Name is hidden)</h4>
        <button class="btn btn-success" v-on:click="showName3 = !showName3">Изменение видимости №3</button>

        <pre class="brush: xml;">
            <h4 v_if="showName3">v-if, {{ name2 }}</h4>
            <h4 v_else>v-else (Name is hidden)</h4>
            <button class="btn btn-success" v_on:click="showName3 = !showName3">Изменение видимости №3</button>
        </pre>

        <pre class="brush: js;">
            data: {
                showName3: true
            }
        </pre>


        <hr>
        <h2>Короткая запись</h2>

        <p><code>v-on</code> меняем на <code>@</code></p>
        <p><code>v-bind</code> меняем на <code>:</code></p>


    </div>
    <script>
        let sample1 = new Vue({
            el: '.sample1',
            data: {
                name2: 'Виталий',
                showName: true,
                showName2: true,
                showName3: true
            },
            methods: {
                toggleName(){
                    this.showName2 = !this.showName2;
                }
            }
        });
    </script>
</div>




<div class="linear" id="Hello">

    <h1>Console.log</h1>

    <div class="sample3">

        <input class="form-control" type="text"
               v-on:input="name3 = $event.target.value"
               v-on:change="onChange"
               v-bind:value="name3"
        >
        <hr>
        <h4>Hello, {{ name3 }}</h4>
    </div>


    <pre class="brush: xml;">
        <input class="form-control" type="text"
               v-on:input="name3 = $event.target.value"
               v-on:change="onChange"
               v-bind:value="name"
        >
    </pre>
    <pre class="brush: js;">
        methods: {
            onChange(e){
                console.log(this);
                console.log(e);
            }
        }
    </pre>

    <p><code>v-bind:</code>- по сути эмуляция v-model</p>

    <script>
        let sample3 = new Vue({
            el: '.sample3',
            data: {
                name3: 'Виталий'
            },
            methods: {
                onChange(e){
                    console.log(this);
                    console.log(e);
                }
            }
        });
    </script>

</div>



<div class="linear" id="Hello">

    <h1>methods и computed</h1>

    <div class="sample4">

        <input class="form-control" type="text" v-model="firstName">
        <br>
        <input class="form-control" type="text" v-model="lastName">

        <h2>methods, {{ fullName1() }}</h2>
        <h2>computed, {{ fullName2 }}</h2>

        <button class="btn btn-success" @click="showText = !showText">
            смотри в консоли
        </button>
        <br>
        <div v-show="showText">Some text</div>

        <br>
        <p><code>methods</code> вызывается при каждом изменение в шаблоне и пересобирает весь шаблон</p>
        <p><code>computed</code> отрабатывает только тот элемент который изменился или обрабатыватся, но весь шаблон не пересобирается</p>

        <pre class="brush: js;">
            methods: {

            },
            computed: {

            },
        </pre>

    </div>



    <script>
        let sample4 = new Vue({
            el: '.sample4',
            data: {
                firstName: '',
                lastName: '',
                showText: false
            },
            methods: {
                fullName1(){
                    console.log('render fullname');
                    return this.firstName + ' ' + this.lastName;
                }
            },
            computed: {
                fullName2(){
                    console.log('render fullname');
                    return this.firstName + ' ' + this.lastName;
                }
            }
        });
    </script>

</div>


<div class="linear" id="Hello">

    <h1>VueW3CValid</h1>


    <pre class="brush: xml;">
        <input type="text" data-v-model="firstName">

        <input type="text" data-v-model="lastName">

        <button class="btn btn-success" data-v-on_click="showText = !showText">ToggleText </button>


        <script src="https://unpkg.com/vue-w3c-valid/dist/simple.js"></script>
    </pre>

    <pre class="brush: js;">
        <script>
            new VueW3CValid({
            el: '.sample'
        });

        let sample = new Vue({
            el: '.sample',
            data: {
                firstName: '',
                ....
            }
        });
        </script>
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
