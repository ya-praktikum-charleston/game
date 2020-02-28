/**
 *   div   - div
 *   name   - названием товара
 *   amount - цена
 *   image  - картинка
 *   count  - количество на складе.
 */
class Goods2 extends Goods {
    constructor(div, name, amount, image, count, sale ) {
        super(div, name, amount, image, count);
        this.sale = sale;
    }
    draw() {
        let sale = '';
        if( this.sale ){
            sale = 'Распродажа<br>'
        }
        let img = `<img src="img/${this.image}" alt="">`;
        document.querySelector(this.div).innerHTML = `${sale + this.name}<br>${img}<br>${this.amount}<br>${this.count}<br>`;
    }

}
