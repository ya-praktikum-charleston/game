/**
 * @description error codes
 * @type {string}
 */
const TYPE_ERROR = 'Unsupported input value type';
const RANGE_ERROR = 'Input value must be [1; 3999]';
const UNKNOWN_SYMBOLS = 'Unknown input symbols';

var lookup = {M: 1000, CM: 900, D: 500, CD: 400, C: 100, XC: 90, L: 50, XL: 40, X: 10, IX: 9, V: 5, IV: 4, I: 1};

/**
 * @description validate input values and determinate needed convert solution
 * @param {string|number} number
 * @returns {string|number}
 */
const roman = (num) => {
    if (+num) {
        console.log('число', +num, +num)
    }
    if (typeof num === "string") {
        let numObj = num.split('');
        let strRoman = 0;
        numObj.forEach(elem => {
            if(elem in lookup){
                strRoman += lookup[elem];
                console.log(elem);
            }else{
                throw new Error(UNKNOWN_SYMBOLS)
            }
        })
        console.log('strRoman', strRoman)
        console.log('строка', str)
    }
    return num;
};


//console.log(roman(1904)) // MCMIV
console.log(roman('MCMXC')) // 1990
//console.log(roman('2017')) // MMXVII
//console.log(isNaN(roman('xxxxx'))) // true
//console.log(isNaN(roman('iiii'))) // true
console.log(roman('19a04')) // true

// try {
//     roman('19a04')
// } catch (err) {
//     console.log(err) // Error { "Unknown input symbols" }
// }
//
// try {
//     roman(true)
// } catch (err) {
//     console.log(err) // Error { "Unsupported input value type" }
// }
//
// try {
//     roman(0)
// } catch (err) {
//     console.log(err) // Error { "Input value must be [1; 3999]" }
// }
