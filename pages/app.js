// this script file is for custom js
// alert("Hello");

var getPwdView = false;

$(document).on('click', '#showPasslgn', function() {

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

$(document).on('click', '#showPassUser', function() {

    var password = $('#Upass');
    var password2 = $('#Upass2');

    if (getPwdView === false) {

        password.attr("type", "text");
        password2.attr("type", "text");
        getPwdView = true;
    }
    else if(getPwdView === true) {
        password.attr("type", "password");
        password2.attr("type", "password");
        getPwdView = false;
    }
    
});

