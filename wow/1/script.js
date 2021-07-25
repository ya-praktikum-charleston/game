 Function.prototype.bind = function(ctx) {
     let func = this;
     return function () {
         func.call(ctx);
     };
 }
 Function.prototype.bind = function(ctx){
     var fn = this;
     var args = Array.prototype.slice.call(arguments, 1);

     if (typeof(fn) !== 'function') {
         throw new TypeError('Function.prototype.bind - context must be a valid function');
     }

     return function () {
         return fn.apply(ctx, args.concat(Array.prototype.slice.call(arguments)));
     };
}


var F = function() {
    console.log('fooT is', this.foo);
}
var F1 = F.bind({ foo: 'barT' })

F()               // foo is undefined
F1()              // foo is bar

var f = new F()   // foo is undefined
var f1 = new F1() // foo is bar

console.log(f instanceof F)    // true
console.log(f1 instanceof F)   // false
