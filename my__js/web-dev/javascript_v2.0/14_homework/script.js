
function loadWeather(valSity,valDay,cloneElem,$main) {
    fetch(`http://api.openweathermap.org/data/2.5/forecast?id=${valSity}&appid=9b46a32e02362554ac486e7cbbc5ae45`)
        .then(function (resp) { return resp.json() })
        .then(function (data) {
            //console.log(data);

            for (let i = 0; i <= valDay-1; i++) {

                let newElem = cloneElem.cloneNode(true);
                newElem.classList.remove('clone');

                newElem.querySelector('.weekday').textContent = weekday(i);
                newElem.querySelector('.data').textContent = funkDate(i);

                newElem.querySelector('.package-name').textContent = data.city.name;
                newElem.querySelector('.price').innerHTML = Math.round(data.list[i].main.temp - 273) + '&deg;';
                newElem.querySelector('.disclaimer').textContent = data.list[i].weather[0]['description'];
                newElem.querySelector('.features li').innerHTML = `<img src="https://openweathermap.org/img/wn/${data.list[i].weather[0]['icon']}@2x.png">`;

                $main.append(newElem);

            }

        })
        .catch(function () {
            // catch any errors
        });
}


function showWeather() {

    let valSity = document.querySelector('#sity').value;
    let valDay = +document.querySelector('#day').value;

    let cloneElem = document.querySelector('.clone');

    let $main = document.querySelector('.pricing-table');
    $main.innerHTML = '';

    loadWeather(valSity,valDay,cloneElem,$main);
}


function weekday(i) {
    let days = [
        'Воскресенье',
        'Понедельник',
        'Вторник',
        'Среда',
        'Четверг',
        'Пятница',
        'Суббота'
    ];

    let day = new Date();
    day.setDate(new Date().getDate() + i);
    return days[day.getDay()];
}


function funkDate(i){
    let Data = new Date();
    Data.setDate(new Date().getDate() + i);

    //let Year = Data.getFullYear();
    let Month = Data.getMonth();
    let Day = Data.getDate();

    switch (Month){
        case 0: fMonth="января"; break;
        case 1: fMonth="февраля"; break;
        case 2: fMonth="марта"; break;
        case 3: fMonth="апреля"; break;
        case 4: fMonth="мае"; break;
        case 5: fMonth="июня"; break;
        case 6: fMonth="июля"; break;
        case 7: fMonth="августа"; break;
        case 8: fMonth="сентября"; break;
        case 9: fMonth="октября"; break;
        case 10: fMonth="ноября"; break;
        case 11: fMonth="декабря"; break;
    }

    return Day + ' ' + fMonth;
}


//Наполнение select днями
function selectDay() {
    let station = document.querySelector('#day');
    for (let i = 1; i <= 30; i++) {
        station.append(new Option(i, i));
    }
}



let $select = document.querySelectorAll('select');

for(let i = 0; i < $select.length;i++){
    $select[i].onchange = showWeather;
}

selectDay();
showWeather();




