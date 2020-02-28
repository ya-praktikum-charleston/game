/**
 *   div   - div
 *   name   - названием товара
 *   amount - цена
 *   image  - картинка
 *   count  - количество на складе.
 */
class Goods {
    constructor(div, name, amount, image, count ) {
        this.div = div;
        this.name = name;
        this.amount = amount;
        this.image = image;
        this.count = count;
    }
    draw() {
        let img = `<img src="img/${this.image}" alt="">`;
        document.querySelector(this.div).innerHTML = `${this.name}<br>${img}<br>${this.amount}<br>${this.count}<br>`;
    }

}
