class Queue {
    constructor() {
        this.size = 0;
        this.head = null;
        this.tail = null;
    }

    // Ставит элемент в очередь.
    // Возвращает новый размер очереди.
    enqueue(value) {
        const node = { value, next: null, prev: null };
        node.prev = this.tail;

        if(this.tail){
            this.tail.next = node;
            this.tail = node;
        }else{
            this.head = this.tail = node;
        }

        this.size++;
        return this.size;
    }

    // Убирает элемент из очереди.
    // Если очередь пустая, кидает ошибку.
    // Возвращает удалённый элемент.
    dequeue() {
        if (this.isEmpty()) {
            throw new Error('Стек пуст');
        }
        let node = this.head;

        if(this.head === this.tail){
            this.tail = this.head = null;
        }else{
            this.head = node.next;
            this.head.prev = null;
        }

        this.size--;
        return node;
    }

    // Возвращает элемент в начале очереди.
    peek() {
        return this.head;
    }

    // Если очередь пустая, возвращает true. В противном случае –– false.
    isEmpty() {
        if (this.size === 0) {
            return true;
        }else{
            return false;
        }
    }
}
let www = new Queue();
www.enqueue(1);
www.enqueue(2);
www.enqueue(3);
www.dequeue();
www.dequeue();
www.dequeue();
console.log(www);




/*
Input: 1->2->3->4->5->NULL
Output: 5->4->3->2->1->NULL
*/

/**
 * function ListNode(val, next) {
 *     this.value = (value===undefined ? 0 : value)
 *     this.next = (next===undefined ? null : next)
 * }
 */
/**
 * @param {ListNode} head
 * @return {ListNode}
 */

// function reverse(head) {
//     let node = head;
//     let previous = null;
//
//     while(node) {
//         // save next or you lose it!!!
//         let save = node.next;
//         // reverse pointer
//         node.next = previous;
//         // increment previous to current node
//         previous = node;
//         // increment node to next node or null at end of list
//         node = save;
//     }
//     return previous;
//
// }
