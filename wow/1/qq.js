const objects = [
    { foo: 5, bar: 6 },
    { foo: 13, baz: -1 } // foo - повторяющийся ключ
];

function zip(...args) {

    const mass = {};

    args.map(arr=>{
        Object.keys(arr).map(key => {
            if(!(key in mass)){
                mass[key] = arr[key];
            }
        });
    })

    return mass;
}

zip(...objects); // { foo: 5, bar: 6, baz: -1 }