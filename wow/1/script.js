/**
 * unzip([1, 2, 3], [4], [5, 6]); // => [[1, 4, 5], [2, undefined, 6], [3, undefined, undefined]]
 * unzip([1, 2, 3]); // => [[1], [2], [3]]
 * unzip([1], [1, 2, 3], [4, 6, 7, 8, 9]);
 * // => [[1, 1, 4], [undefined, 2, 6], [undefined, 3, 7], [undefined, undefined, 8], [undefined, undefined, 9]]
 * unzip({}); // => Error: [object Object] is not array
 */

class ValidationError extends Error {
    constructor(arg) {
        super(arg);
        this.name = `Error ${arg}`;
        this.message = `is not array`;
    }
}

function unzip() {

    let arr = [];
    for (var i = 0; i < arguments.length; i++) {
        if (!Array.isArray(arguments[i])) {
            throw new ValidationError(arguments[i]);
        }
        arr[i] = arguments[i];
    }

    let elements = arr.length;
    let len = 0;
    let final = [];

    for (let i = 0; i < elements; i++) {
        if (arr[i].length > len) len = arr[i].length;
    }

    for (var i = 0; i < len; i++) {
        var temp = [];
        for (var j = 0; j < elements; j++) {
            temp.push(arr[j][i]);
        }
        final.push(temp);
    }

    return final;
}


console.log(unzip([1, 2, 3], [4], [5, 6]))
console.log(unzip([1, 2, 3]))
console.log(unzip([1], [1, 2, 3], [4, 6, 7, 8, 9]))
console.log(unzip({}))

