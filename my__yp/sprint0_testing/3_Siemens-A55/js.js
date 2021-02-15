function mobileRemote(text) {
    let obj = [
        [
            ['1'], ['2', 'a', 'b', 'c'], ['3', 'd', 'e', 'f']
        ],
        [
            ['4', 'g', 'h', 'i'], ['5', 'j', 'k', 'l'], ['6', 'm', 'n', 'o']
        ],
        [
            ['7', 'p', 'q', 'r', 's'], ['8', 't', 'u', 'v'], ['9', 'w', 'x', 'y', 'z']
        ],
        [
            ['*'], ['0'], ['#']
        ],
    ];

    const arr = [...text];
    let sum = 0;
    let start = {row:0,mass:0,key:0};
    let finish = {};
    let click = 1;

    function enumeration(simbol){
        simbol = simbol.toLowerCase();
        obj.forEach( (elemRow,row) => {
            elemRow.forEach( (arrElem,i) => {
                for (var k = 0; k < arrElem.length; k++) {
                    if (arrElem[k] === simbol) {
                        finish.row = row;
                        finish.mass = i;
                        finish.key = k;
                        let offsetMass = 0;
                        start.mass === finish.mass ? offsetMass = 0 : offsetMass = 1;
                        let offsetRow = 0;
                        if(start.row === 0 && finish.row === 3 || start.row === 3 && finish.row === 0){
                            offsetRow = 1;
                        }else{
                            offsetRow = Math.abs(start.row - row);
                        }
                        //console.log(offsetRow + offsetMass + click + k + click + simbol)
                        sum += offsetRow + offsetMass + click + k + click;
                        start = {row:row,mass:i,key:k}
                    }
                }
            })
        })
    }

    arr.forEach((simbol,i)=>{
        if(!Number(simbol)){
            if(simbol.toUpperCase() === simbol){
                enumeration('*');
            }
            enumeration(simbol);
        }else{
            enumeration(simbol);
        }
    });

    return sum;
}

console.log('12345  ',mobileRemote('12345')); // 15
console.log('C  ',mobileRemote('C')); // 10
console.log('yandex  ',mobileRemote('yandex')); // 34
console.log('MobileRemote  ',mobileRemote('MobileRemote')); // 77
console.log('Yandex  ',mobileRemote('Yandex')); // 77