<?php include '../include/header.php'; ?>



<div class="linear" id="use_strict">

	<h1>Новый синтаксис Java Script</h1>
	<h2>Деструктивное присваивание</h2>

    <p>Область видимости для локального применения</p>
	<pre class="brush: js;">
		var sandwich =  {
            bread: "1111111",
            meat: "222222" qwqw
        }
        var {bread, meat} = sandwich
        console.log(bread, meat)        // 1111111 222222
	</pre>


    <p>Деструктуризация значений для извлечения из элемента</p>

    <pre class="brush: js;">
        var lordify = ({firstname}) =>
            console.log(`${firstname} of canterbury`)

        var regularPerson = {
            firstname: "Dale",
            lastname: "Smith"
        }
        lordify(regularPerson)          // Dale of canterbury
    </pre>

    <p>Деструктуризация из массива</p>

    <pre class="brush: js;">
        var arr = ["Kirkwood", "Squaw", "Alpine"];
        var [one] = arr
        var [,two] = arr
        var [,,tree] = arr

        console.log(one)     // Kirkwood
        console.log(two)     // Squaw
        console.log(tree)     // Alpine
    </pre>


    <p>Расширение объектных литералов</p>
    <p><code>Литерал объекта</code> - это <code>{}</code></p>

    <pre class="brush: js;">
    var name = "Tallac"
    var elevation = 9738
    var print = function() {
      console.log(`Mt. ${this.name} is ${this.elevation} feet tall`)
    }

    var funHike = { name,elevation,print }

    funHike.print()
    </pre>

</div>


<div class="linear" id="use_strict">
    <h2>Оператор распространения <code>...</code></h2>

    <pre class="brush: js;">
        var peaks = ["Tallac", "Ralston", "Rose"]
        var canyons = ["Ward", "Blackwood"]
        var tahoe = [...peaks, ...canyons]

        console.log(tahoe.join(', '))       // Tallac, Ralston, Rose, Ward, Blackwood
    </pre>

    <p>Оператор распространения может использоваться и для получения некоторых выбранных или остальных элементов массива</p>

    <pre class="brush: js;">
        var lakes = ["11111", "22222", "33333", "44444"]

        var [first_elem,, ...rest] = lakes
        var [last_elem] = [...lakes].reverse()
        var  new_arr= [...lakes].reverse()

        console.log(first_elem)                 // 11111
        console.log(last_elem)                  // 44444
        console.log(new_arr)                    // ["11111", "22222", "33333", "44444"]
        console.log(rest.join(", "))            // 33333, 44444
    </pre>


    <p>Оператор распространения точно так же копирует объекты</p>

    <pre class="brush: js;">
        var morning = {
            breakfast: "11111",
            lunch: "22222"
        }

        var dinner = "33333"

        var backpackingMeals = {
            ...morning,
            dinner
        }

        console.log(backpackingMeals)       //    {
                                            //      breakfast: "11111"
                                            //      dinner: "33333"
                                            //      lunch: "22222"
                                            //    }
        </pre>

</div>

<div class="linear" id="use_strict">

    <h2>Промисы</h2>

    <p>Представляю способ разобраться в асинхронном поведении</p>

    <pre class="brush: js;">
        const getFakeMembers = count => new Promise((resolves, rejects) => {
            const api = `https://api.randomuser.me/?nat=US&results=${count}`
            const request = new XMLHttpRequest()
            request.open('GET', api)
            request.onload = () =>
                (request.status === 200) ?
                    resolves(JSON.parse(request.response).results) :
                    rejects(Error(request.statusText))
            request.onerror = (err) => rejects(err)
            request.send()
        })

        getFakeMembers(5).then( members => console.log(members) )
    </pre>

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
