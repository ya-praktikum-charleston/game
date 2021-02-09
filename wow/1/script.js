function foo(callback) {
    setTimeout(function() {
        callback('A');
    }, Math.random()*100);
}

function bar(callback) {
    setTimeout(function() {
        callback('B');
    }, Math.random()*100);
}

function baz(callback) {
    setTimeout(function() {
        callback('C');
    }, Math.random()*100);
}


foo((callback)=> {
    console.log(callback);
    bar((callback)=> {
        console.log(callback);
        baz((callback)=> {
            console.log(callback);
        });
    });
});

Promise.resolve().then(function() {
    foo((callback)=> {
        console.log(callback);
    });
}).then(function() {
    bar((callback)=> {
        console.log(callback);
    });
}).then(function() {
    baz((callback)=> {
        console.log(callback);
    });
})

