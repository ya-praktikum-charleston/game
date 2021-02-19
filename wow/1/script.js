const delay = timeout => new Promise(resolve => setTimeout(resolve, timeout));

const promises = [
    delay(65).then(() => 10),
    delay(100).then(() => { throw 'my error'; })
];

function allSettled(promises) {

    return Promise.all(promises.map(elem => {

        return new Promise((resolve) => {
            return resolve(elem)
        })
        .then(resolve=>{
            return {"status": "resolved", "value": resolve}
        }).catch(reject=>{
            return {"status": "rejected", "reason": reject}
        });
    }))
        .then((value) => {
            console.log(value);
            return value;
        }).catch(reason => {
            console.log(reason)
    });



    // return Promise.resolve([{"status": "resolved", "value": 10}, {"status": "rejected", "reason": "my error"}]);
}



console.log(allSettled(promises))



