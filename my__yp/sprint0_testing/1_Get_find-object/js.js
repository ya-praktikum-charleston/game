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
    e: 'f'
  }
};


console.log(get(obj, 'a.b'));							// { c : 'd' }
console.log(get(obj, 'a.b.c'));						// 'd'
console.log(get(obj, 'a.e'));							// 'f'
console.log(get(obj, 'a.x.e'));						// undefined
console.log(get(obj, 'a.x.e', true));					// true
console.log(get(obj, 'a.x.e', 'My default value'));	// My default value