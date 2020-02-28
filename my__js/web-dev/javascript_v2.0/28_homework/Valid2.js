/**
 *   div
 *   email
 *   password
 *   isValid
 *   emaiError
 *   passwordError
 */
class Valid2 extends Valid {
    constructor(email, password, isValid, emaiError, passwordError ) {
        super(email, password, isValid);
        this.emaiError = emaiError;
        this.passwordError = passwordError;
    }
    validate() {
        if( this.password.length >= 6 ){
            this.isValid = true;
        }else{
            this.passwordError = 'min length 6';
        }

        if( this.email != '' ){
            this.isValid = true;

        }else{
            this.isValid = false;
            this.emaiError = 'email empty';

        }

        return [this.isValid,this.passwordError,this.emaiError];
        //document.querySelector(this.div).innerHTML =  this.isValid;
    }

}
