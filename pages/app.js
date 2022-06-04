// this script file is for custom js
var getPwdView = false;
$(document).on('click', '#showPass', function() {

    var password = $('#password');

    if (getPwdView === false) {

        password.attr("type", "text");
        getPwdView = true;
    }
    else if(getPwdView === true) {
        password.attr("type", "password");
        getPwdView = false;
    }
    
});
