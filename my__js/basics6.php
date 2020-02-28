<?php include '../include/header.php'; ?>

<div class="linear" id="prototype-inheritance">
    <h1>Прототипное наследование</h1>

    <pre class="brush: js;">
        let animal = {
            eats: true
        };
        let rabbit = {
            jumps: true
        };

        rabbit.__proto__ = animal; // (*)

            // теперь мы можем найти оба свойства в rabbit:
        alert( rabbit.eats ); // true (**)
        alert( rabbit.jumps ); // true
    </pre>

    <p>Если у <codde>animal</codde> много полезных свойств и методов, то они автоматически становятся доступными у <code>rabbit</code>. Такие свойства называются «унаследованными».</p>

    <p>Если у нас есть метод в <code>animal</code>, он может быть вызван на <code>rabbit</code>:</p>

    <pre class="brush: js;">
        let animal = {
            eats: true,
            walk() {
                alert("Animal walk");
            }
        };

        let rabbit = {
            jumps: true,
            __proto__: animal
        };

            // walk взят из прототипа
        rabbit.walk();      // Animal walk
    </pre>

    <h2>Операция записи не использует прототип</h2>




</div>



<!--

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



<?php include '../include/footer.php'; ?>
