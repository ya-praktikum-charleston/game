/*flatten([1, 'any [complex] string', null, function() {}, [1, 2, [3, '4'], 0], [], { a: 1 , b: 2 }]);
// возвращает
//      [1, 'any [complex] string', null, function() {}, 1, 2, 3, '4', 0, { a: 1 }]

function flatten(list) {



    var allbooks = list.reduce(function( accumulator,  elem) {
        if(Array.isArray(elem)){
            let elem = [elem, ... elem]
            return [...accumulator, elem]
        }else{
            return [...accumulator, elem]
        }

    }, []);

    console.log( ...list  )

}*/





