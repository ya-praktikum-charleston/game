class MyArray {
    constructor(initialSize = 1) {
        if (Number(initialSize) !== initialSize || Math.round(initialSize) !== initialSize) {
            throw new Error('Длина массива должна быть целым числом');
        }

        if (!(initialSize > 0)) {
            throw new Error('Размер массива должен быть больше нуля');
        }

        this.size = initialSize;
        this.memory = allocate(initialSize);
        this.length = 0;
    }

    // Возвращает значение по индексу.
    // Если индекс за пределами — кидает ошибку.
    get(index){
        if(index > this.size){
            throw new Error('Размер массива меньше индекса');
        }
        return this.memory[index];
    }

    // Устанавливает значение по индексу.
    // Если индекс за пределами — кидает ошибку.
    set(index, value) {
        if(index && index > this.size){
            throw new Error('Размер массива меньше индекса');
        }
        if(index || index === 0){
            for(let i = this.length; i > index; i--){
                this.memory[i] = this.memory[i-1];
            }
            this.memory[index] = value;
            this.length++;
        }else{
            this.memory[this.length] = value;
            this.length++;
        }
    }

    // Добавляет новый элемент в массив.
    // Если index не определён — добавляет в конец массива.
    // В противном случае — добавляет по индексу со сдвигом
    // всех последующих элементов.
    // Если индекс за пределами - кидает ошибку.
    // Увеличивает выделенную память вдвое, если необходимо.
    // Возвращает новую длину массива.
    add(value, index) {

        if(index && index > this.size){
            throw new Error('Размер массива меньше индекса');
        }
        if(index || index === 0){
            for(let i = this.length; i > index; i--){
                this.memory[i] = this.memory[i-1];
            }
            this.memory[index] = value;
            this.length++;
        }else{
            this.memory[this.length] = value;
            this.length++;
        }

        let leng = this.length;

        if(this.size === this.length){
            for(let i = leng; i < leng * 2; i++){
                if(!index){
                    this.memory[i] = undefined;
                    this.size++;
                }else if(i !== index){
                    this.memory[i] = undefined;
                    this.size++;
                }
            }
        }
        console.log(this.length);
        console.log(this.size);
        console.log("memory",this.memory)
        return this.length;
    }

    // Удаляет элемент по индексу со сдвигом всех последующих элементов.
    // Если индекс за пределами - кидает ошибку.
    // Возвращает новую длину массива.
    delete(index) {
        if(index < 0 || index >= this.length){
            throw new Error('Размер массива меньше индекса');
        }

        for(let i = index; i <= this.length-1; i++){
            this.memory[i] = this.memory[i+1];
        }
        this.memory[this.length] = undefined;
        --this.length;

        return this.length;
    }
}


function allocate(size) {
    const memory = {};

    for (let i = 0; i < size; i++) {
        memory[i] = undefined;
    }

    return memory;
}

let arr = new MyArray;
arr.add('a');
arr.add('b');
arr.add('c');
arr.add('d');
arr.delete(3);
//arr.delete(1);
//arr.add('dddd');
//arr.delete(2);

/*arr.add(5,5);
arr.add(4);
arr.add(4);*/
/*console.log("arr",arr)
console.log("size",arr.size)
console.log("length",arr.length)*/
//console.log("memory",arr.memory)





/*var a=[1,2,3,45,8,9,7,10]
var k=3;//шаг
//for(i=0;i<k;i++) a.unshift(a.pop());

a.splice(3, 0, 777)

console.log(a);*/
