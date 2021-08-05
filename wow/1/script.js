const someCalc = function(a) {
    console.log(a + this.b )
};

function throttle(callback, delay, context = this) {

    let isThrottled = false,
        savedArgs,
        savedThis;

    function wrapper() {

        if (isThrottled) {
            // запоминаем последние аргументы для вызова после задержки
            savedArgs = arguments;
            savedThis = context;
            return;
        }

        // в противном случае переходим в состояние задержки
        callback.apply(context, arguments);

        isThrottled = true;

        // настройка сброса isThrottled после задержки
        setTimeout(function() {
            isThrottled = false;
            if (savedArgs) {
                // если были вызовы, savedThis/savedArgs хранят последний из них
                // рекурсивный вызов запускает функцию и снова устанавливает время задержки
                wrapper.apply(savedThis, savedArgs);
                savedArgs = savedThis = null;
            }
        }, delay);
    }

    return wrapper;
}

// затормозить функцию до одного раза в 1000 мс
const f1000 = throttle(someCalc, 1000, {b: ' call'});
f1000(1); // выведет 1 call
f1000(2); // (тормозим, не прошло 1000 мс)
f1000(3); // (тормозим, не прошло 1000 мс)

// когда пройдёт 1000 мс...
// выведет 3 call, промежуточное значение 2 call игнорируется
