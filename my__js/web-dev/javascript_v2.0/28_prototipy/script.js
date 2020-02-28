let user = {
    username: 'Ivan',
    _password: 'qwerty',
    set password(pass) {
        this._password = pass.trim();
    },
    get password() {
        return this._password;
    }
}

let user2 = {};
user2.__proto__ = user;


console.log(user2.username);

user2.images = 'картинка.jpg';

console.log(user2);
console.log(user2.images);

user2.password = "  1234"

console.log(user2.password);

console.log(user2.__proto__.password);