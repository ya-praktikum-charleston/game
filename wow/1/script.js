/*
isEmpty(null); // => true
isEmpty(true); // => true
isEmpty(1); // => true
isEmpty([1, 2, 3]); // => false
isEmpty({ 'a': 1 }); // => false
isEmpty('123'); // => false
isEmpty(123); // => true
isEmpty(''); // => true
isEmpty(0); // => true
*/

function isEmpty(value) {

    if(
        typeof value == 'undefined' ||
        value == null ||
        typeof value == "boolean" ||
        value.length == 0 ||
        value == "" ||
        value === parseInt(value, 10)
    ){
        return true;
    }
    return false;


}

console.log("null",isEmpty(null));
console.log("true",isEmpty(true));
console.log("1",isEmpty(1));
console.log("[1, 2, 3]",isEmpty([1, 2, 3]));
console.log("{ 'a': 1 }",isEmpty({ 'a': 1 }));
console.log("123",isEmpty('123'));
console.log(123,isEmpty(123));
console.log("",isEmpty(''));
console.log("0",isEmpty(0));