flatten([1, 'any [complex] string', null, function() {}, [1, 2, [3, '4'], 0], [], { a: 1 }]);
// возвращает
//      [1, 'any [complex] string', null, function() {}, 1, 2, 3, '4', 0, { a: 1 }]

function flatten(list) {
    let my = [];
    function s(arr){
        arr.map(elem => {
            if(elem instanceof Array){
                s(elem);
            }else{
                my.push(elem);
            }
        })
    }
    s(list);
  
    return my;
}