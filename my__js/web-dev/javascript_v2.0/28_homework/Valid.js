/**
 *   div
 *   email
 *   password
 *   isValid
 */
class Valid {
    constructor(email, password, isValid ) {
        this.email = email;
        this.password = password;
        this.isValid = isValid;
    }
    validate() {
        if( this.password.length >= 6 ){
            this.isValid = true;
        }
        return this.isValid;
        //document.querySelector(this.div).innerHTML =  this.isValid;
    }

}
