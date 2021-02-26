class DoublyLinkedList {
    constructor() {
        this.size = 0;
        this.head = null;
        this.tail = null;
    }

    // Добавляет элемент в список.
    // Если указан индекс - добавляет по индексу,
    // в противном случае добавляет в конец.
    // Если индекс за пределами — кидает ошибку.
    add(value, index) {
        const node = createNode(value);
        if (index < 0 || index > this.size) {
            throw new Error('Вне диапазона');
        }
        if (this.size) {
            if(index >= 0){
                let findElem = this.searchByIndex(index);
                node.next = findElem;
                node.prev = findElem.prev;
                findElem.prev = node;
                if(findElem === this.head){
                    this.head = node;
                }
            }else{
                this.tail.next = node;
                node.prev = this.tail;
                this.tail = node;
            }
        } else {
            this.head = node;
            this.tail = node;
        }

        this.size++;

        return node;

    }

    // Удаляет элемент из списка по значению.
    // Удаляет только первый найденный элемент.
    // Если элемент не найден, ничего делать не нужно.
    removeByValue(value) {
        let node = this.searchByValue(value);
        if(node){
            if(!node.prev){
                this.head.next.prev = null;
                this.head = this.head.next;
            }else if(node === this.tail){
                this.tail.prev.next = null;
                this.tail = this.tail.prev;
                this.head = this.tail;
            }else{
                this.head.prev.next = node.next;
                this.head.next.prev = node.prev;
                this.head = node.next;
            }
        }
    }

    // Удаляет элемент из списка по индексу.
    // Если индекс за пределами — кидает ошибку.
    removeByIndex(index) {
        let node = this.searchByIndex(index);console.log("node",node)
        this.removeByValue(node.value)

        /*let node = this.searchByIndex(index);
        if(node){
            if(!node.prev){
                this.head = this.head.next;
                this.head.prev = null;
            }else if(node === this.tail){
                this.tail.prev.next = null;
                this.tail = this.tail.prev;
                this.head = this.tail;
            }else{
                this.head.prev.next = node.next;
                this.head.next.prev = node.prev;
                this.head = node.next;
            }
        }*/
    }

    // Ищет элемент в списке по индексу.
    // Если индекс за пределами — кидает ошибку.
    searchByIndex(index) {
        if (index < 0 || index > this.size) {
            throw new Error('Вне диапазона');
        }
        let count = 0;
        while (count < index) {
            this.head = this.head.next;
            count++;
        }
        return this.head;
    }

    // Ищет элемент в списке по значению.
    // Возвращает первый найденный элемент.
    // Опционально можно указать индекс начала поиска.
    // Если индекс за пределами — кидает ошибку.
    // Если элемент не найден, нужно вернуть null.
    searchByValue(value, startIndex = 0) {
        if (startIndex < 0 || startIndex > this.size) {
            throw new Error('Вне диапазона');
        }
        let searchElem = null;

        while (startIndex < this.size) {
            if(this.head.value === value){
                searchElem = this.head;
                break;
            }else{
                this.head = this.head.next;
            }
            startIndex++;
        }
        return searchElem;
    }
}

// Создаёт новую ноду, где
// value — её значение,
// next — ссылка на следующую ноду,
// prev — ссылка на предыдущую ноду
function createNode(value) {
    return {
        value,
        next: null,
        prev: null,
    };
}


const list = new DoublyLinkedList();
list.add(0);
list.add(1);
list.add(2);
list.add(3);
list.add(4);
/*list.add(5);
list.add(6);
list.add(7);*/
//console.log(list.head);
//list.add(777,3);
//list.searchByValue(2);
//console.log(list.removeByIndex(4));
console.log(list.head);


/*
{
    value: 5,
        prev: null,
        next: {
            value: 3,
            prev: {Ссылка на элемент со значением 5},
            next: {
                value: -13,
                prev: {Ссылка на элемент со значением 3},
                next: null
            }
        }
}
*/
