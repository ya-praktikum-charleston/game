<?php include '../include/header.php'; ?>

<link rel="stylesheet" href="../media/css/font-awesome.min.css">



<div class="linear" id="Hello">

    <div class="sample">
        <form @submit.prevent="formSubmited = true" v-if="!formSubmited">
            <div class="progress">
                <div class="progress-bar" :style="progressWidth"></div>
            </div>
            <div>
                <div class="form-group" v-for="(item,index) in info">
                    <label>{{ item.name }}</label>
                    <span class="fa"
                          v-if="controls[index].activated"
                          :class="controls[index].error ?
									'fa-exclamation-circle text-danger' :
							  		 'fa-check-circle text-success'"
                    >
	                    </span>
                    <input type="text"
                           class="form-control"
                           v-bind:value="item.value"
                           v-on:input="onInput(index, $event.target.value)"
                    >
                </div>
            </div>
            <button class="btn btn-primary" :disabled="done < info.length">
                Send Data
            </button>
        </form>
        <div v-else>
            <table class="table table-bordered">
                <tr v-for="(item, index) in  info">
                    <td>{{ item.name }}</td>
                    <td>{{ item.value }}</td>
                </tr>
            </table>
        </div>
    </div>

    <script>

        new Vue({
            el: '.sample',
            data: {
                info: [
                    {
                        name: 'Name',
                        value: '',
                        pattern: /^[a-zA-Z ]{2,30}$/
                    },
                    {
                        name: 'Phone',
                        value: '',
                        pattern: /^[0-9]{7,14}$/
                    },
                    {
                        name: 'Email',
                        value: '',
                        pattern: /.+/
                    },
                    {
                        name: 'Some Field 1',
                        value: '',
                        pattern: /.+/
                    },
                    {
                        name: 'Some Field 2',
                        value: '',
                        pattern: /.+/
                    }
                ],
                controls: [],
                formSubmited: false
            },
            created(){
                for(let i = 0; i < this.info.length; i++){
                    this.controls.push({
                        error: !this.info[i].pattern.test(this.info[i].value),
                        activated: this.info[i].value != ''
                    });
                }
            },
            methods:{
                onInput(index,value){
                    let data = this.info[index];
                    let control = this.controls[index];

                    data.value = value;
                    control.error = !data.pattern.test(value);
                    control.activated = true;
                }
            },
            computed: {
                done(){
                    let done = 0;

                    for(let i = 0; i < this.controls.length; i++){
                        if(!this.controls[i].error){
                            done++;
                        }
                    }

                    return done;
                },
                progressWidth(){
                    return {
                        width: (this.done / this.info.length * 100) + '%'
                    }
                }
            }

        });
    </script>

</div>











<?php include '../include/footer.php'; ?>
