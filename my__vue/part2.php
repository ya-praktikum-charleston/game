<?php include '../include/header.php'; ?>



<div class="linear" id="Hello">

    <h1>Хуки</h1>

    <pre class="brush: js;">
          new Vue({
        el: '.sample',
        data: {
            phone: ''
        },
        beforeCreate(){		//по сути вызывается еще до парсинга Vue и html элемента, Vue сделало только реактивность данных
            console.log('bc');
            console.log(this.$el);
        },
        created(){
            console.log('c');
            console.log(this.$el);
        },
        beforeMount(){      //перед рендером
            console.log('bm');
            console.log(this.$el.innerHTML);
        },
        mounted(){          //рендер
            console.log('m');
            console.log(this.$el.innerHTML);
        },
        beforeUpdate(){     //Vue заметил изменения
            /* пример не настоящий! */

            let pattern = /^[0-9]*$/;
            let pReplace = /[^0-9]/g;

            if(!pattern.test(this.phone)){
                this.phone = this.phone.replace(pReplace, '');
            }
        },
        updated(){          //Vue отредендерил изменения
            console.log('u');
        }
    });
    </pre>



</div>



<div class="linear" id="Hello">

    <h1>Хуки</h1>

    <pre class="brush: js;">
   
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
