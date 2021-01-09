const templator = function(context){
    console.log(context)
    return `<p>${context.text}</p><span>${context.nomer}</span>`;
}

const element = document.createElement('div');
element.innerHTML = templator({
    text: 'Hello, Templator!',
    nomer: '777777!'
});

console.log(element)

document.querySelector('body').append(element);















































/*
function get(obj, path, defaultValue) {
    const newObj = path.split('.');
    let my = obj;
    for (const elem of newObj) {
        if(my[elem]){
            my = my[elem];
        }else{
            my = undefined;
            break;
        }
    }
    return my === undefined ? defaultValue : my;
}

const obj = {
    a: {
        b: {
            c: 'd'
        },
        e: 'f',
        z: false,
    }
};


console.log(
    get(obj, 'a.b'),   // { c : 'd' }
    get(obj, 'a.b.c'), // 'd'
    get(obj, 'a.e'),   // 'f'
    get(obj, 'a.x.e'), // undefined
    get(obj, 'a.z'), // false
    get(obj, 'a.x.e', true), // true
    get(obj, 'a.x.e', 'My default value')
)*/
