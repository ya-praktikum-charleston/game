<?php include '../../include/header.php'; ?>



<div class="linear" id="use_strict">

    <h2>4. Чистый React</h2>

    <p><b>Виртуальная DOM</b></p>

    <p>Чтобы работать с React в браузере, нужно включить две библиотеки: React и ReactDOM. Первая представляет собой библиотеку для создания представлений, а вторая — библиотеку для фактического отображения пользовательского интерфейса в браузере.</p>

    <p>API DOM представляет собой коллекцию объектов, которыми JavaScript может воспользоваться для взаимодействия в браузером с целью изменения DOM. (document.createElement или document.appendChild, значит, вы уже работали с API DOM)</p>

    <p>Виртуальной DOM или набор инструкций, применяемых React для построения пользовательского интерфейса и организации взаимодействия с браузером</p>

    <p><b>Элементы React</b></p>

    <p>Элементы React представляют собой инструкции того, как должна быть создана DOM браузера.</p>

    <p>Элемент <code>React</code> для представления <i>h1</i> можно создать, применив метод <code>React.createElement:</code></p>

    <pre class="brush: js;">
        React.createElement("h1",
            {id: "recipe-0", 'data-type': "title"},
            "Baked Salmon"
        )
    </pre>
    <pre class="brush: html;">
       <h1 data-reactroot id="recipe-0" data-type="title">Baked Salmon</h1>     <!-- data-reactroot показывает, что это корневой элемент React-компонента-->
    </pre>


    <p>Первый аргумент определяет тип элемента, который мы хотим создать. <br>
        Второй аргумент представляет свойства создаваемого элемента.<br>
        Третий аргумент представляет дочерние элементы создаваемого нами элемента, то есть любые узлы, вставляемые между открывающим и закрывающим тегами.
        </p>

    <p><b>ReactDOM</b></p>

    <p>Отобразить элемент <code>React</code>, включая его дочерние элементы, в <code>DOM</code> можно с помощью метода <code>ReactDOM.render</code>. Элемент, который нужно отобразить, передается как первый аргумент, а в качестве второго используется целевой узел. В нем должен отобразиться элемент: </p>

    <pre class="brush: js;">
        var dish = React.createElement("h1", null, "Baked Salmon")
        ReactDOM.render(dish, document.getElementById('react-container'))
    </pre>

    <p><b>Дочерние элементы</b></p>

    <p>React отображает дочерние элементы с помощью свойства <code>props.children</code>. </p>

    <p><b>Три различных способа создания компонентов:</b></p>

    <p><b><i>-1. React.createClass</i></b></p>
    <p><b><i>-2. React.Component</i></b></p>
    <p><b><i>-3. Функциональные компоненты, не имеющие состояния</i></b></p>
</div>

<div class="linear" id="react_JSX">

    <h2>5. React с JSX</h2>

    <p>В JSX тип элемента указывается с помощью тега. Его атрибуты представляют свойства. Дочерние элементы к создаваемому элементу могут добавляться между открывающим и закрывающим тегами.</p>

    <p>Метод <code>ReactDOM.render</code> вносит изменения, оставляя текущую <code>DOM</code> на месте и просто обновляя те элементы, которые в этом нуждаются</p>

    <p>Все импортируемые переменные носят локальный характер для кода файла <code>index.js</code>. Присваивание <code>window.React</code> значения React дает библиотеке <code>React</code> в браузере глобальную область видимости. Тем самым гарантируется работоспособность всех вызовов функции <code>React.createElement</code>.</p>

    <pre class="brush: js;">
        window.React = React
    </pre>

</div>

<!--

<div class="linear" id="use_strict">

    <h2>2222222222222222</h2>


    <p>3333333333333333333</p>

    <pre class="brush: js;">

    </pre>

</div>




    <div class="linear" id="use_strict">
        <h1>11111111111111111</h1>

        <h2>2222222222222222</h2>


        <p>3333333333333333333</p>

        <pre class="brush: js;">

        </pre>

        <ul class="ul_num">
            <li>44444444444444444444</li>

        </ul>

    </div>

-->



<?php include '../../include/footer.php'; ?>
