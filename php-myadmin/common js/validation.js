

export default class validation {

    constructor() {

    }

    // email validation - with regex - 
    validateEmail = (email) => {
        return String(email)
          .toLowerCase()
          .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
          );
    };

    // alpha numeric but not only numbers validation -

    validateUsername(name) {
        var regEx = /^(?![0-9]*$)[._*?[a-zA-Z0-9]{3,}$/;
        return regEx.test(name);
    }

    validateFullname(fname){
        var regEx = /^[a-zA-Z ]{3,}$/;
        return regEx.test(fname);
    }

    // regex for address
    validateAddress(name) {
        var regEx = /^(\.*\d+)(\s*?)(-*?)(?=.[a-zA-Z]).{3,}$/;
        return regEx.test(name);
    }

    validatePhone(phone){
        var regEx = /^(\.*\d{10})$/;
        return regEx.test(phone);
    }
}


