'use strict';

/**
 * Метод устанавливает необходимые по условию атрибуты таблице
 * @param {Element} table
 */
function highlight(table) {
    const tbody = table.querySelector('tbody')
    const tr = tbody.querySelectorAll('tr')

    tr.forEach(elem => {
        const el = elem.querySelector('td:last-child');
        const gender = elem.querySelectorAll('td')[2].textContent;
        const age = elem.querySelectorAll('td')[1].textContent;

        // role
        if(el.dataset.role === "regular"){
            elem.classList.add("regular");
        }else if(el.dataset.role === "admin"){
            elem.classList.add("admin");
        }else{
            elem.setAttribute("hidden", "true");
        }
        // gender
        if(gender === "m"){
            elem.classList.add("male");
        }else if(gender === "f"){
            elem.classList.add("female");
        }
        // age
        if(age < 18){
            elem.style.textDecoration = 'line-through';
        }
    });
}

