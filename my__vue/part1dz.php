<?php include '../include/header.php'; ?>


<style>input.form-control {width: 500px;}</style>

<div class="linear" id="Hello">


    <div class="sample">

        <form v-if="!formSubmited" @submit.prevent="formSubmited = true">
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" v-model="email">
            </div>
            <div class="form-group">
                <label>Имя</label>
                <input type="text" class="form-control" v-model="firstName">
            </div>
            <div class="form-group">
                <label>Фамилия</label>
                <input type="text" class="form-control" v-model="lastName">
            </div>
            <div class="form-group">
                <label>Телефон</label>
                <input type="text" class="form-control" v-model="phone">
            </div>
            <div class="form-group">
                <label>Гости</label>
                <input type="button"
                       class="btn btn-primary"
                       value="+"
                       @click="addGuest"
                >
            </div>
            <div>
                <div class="form-group" v-for="(guest, index) in guests">
                    <label @dblclick="deleteGuest(index)">
                        Гость {{ index + 1 }}
                    </label>
                    <input type="text" class="form-control" v-model="guests[index]">
                </div>
            </div>
            <hr>
            <button class="btn btn-success">Отправить</button>
        </form>

        <div v-else>
            <h2>Все готово!</h2>
            <table class="table table-bordered">
                <tr>
                    <td>Email</td>
                    <td>{{ email }}</td>
                </tr>
                <tr>
                    <td>Имя</td>
                    <td>{{ fullName }}</td>
                </tr>
                <tr>
                    <td>Телефон</td>
                    <td>{{ phone }}</td>
                </tr>
                <tr>
                    <td>Гости</td>
                    <td>
                        <ul class="list-group">
                            <li class="list-group-item"
                                v-for="(guest, index) in guests">
                                {{ guest }}
                            </li>
                        </ul>
                    </td>
                </tr>
            </table>
        </div>

    </div>

<script>
    new Vue({
        el: '.sample',
        data: {
            formSubmited: false,
            email: '',
            firstName: '',
            lastName: '',
            phone: '',
            guests: []
        },
        computed: {
            fullName(){
                return this.firstName + ' ' + this.lastName;
            }
        },
        methods: {
            addGuest(){
                this.guests.push('');
            },
            deleteGuest(index){
                this.guests.splice(index, 1);
            }
        }
    });
</script>














<pre class="brush: xml;">



</pre>

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
