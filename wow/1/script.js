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

function reverse(head) {
    let node = head;
    let previous = null;

    while(node) {
        // save next or you lose it!!!
        let save = node.next;
        // reverse pointer
        node.next = previous;
        // increment previous to current node
        previous = node;
        // increment node to next node or null at end of list
        node = save;
    }
    return previous;
}