// this script file is for custom js
var getPwdView = false;

// script for showing the password in login

$(document).on("click", "#showPasslgn", function () {
  var password = $("#password");

  if (getPwdView === false) {
    password.attr("type", "text");
    getPwdView = true;
  } else if (getPwdView === true) {
    password.attr("type", "password");
    getPwdView = false;
  }
});

// script for showing the password in adding new user

$(document).on("click", "#showPassUser", function () {
  var password = $("#Upass");
  var password2 = $("#Upass2");

  if (getPwdView === false) {
    password.attr("type", "text");
    password2.attr("type", "text");
    getPwdView = true;
  } else if (getPwdView === true) {
    password.attr("type", "password");
    password2.attr("type", "password");
    getPwdView = false;
  }
});
function lgnERROR(){
  Swal.fire("Login Failed!", "Invalid Username/Password", "error")
}
function loadinglgn() {
  $('#lgnLogin').addClass('loading');
  $('#lgnLogin').html("<span class='icon'>&#8635;</span> Logging In....");

}
// * scripting for users page start here !
function validateOR_Upload() {
$.ajax({

  url: "check_OR.php",
  data: "OR_number_verify=" + $("#OR_number").val(),
  type: "POST",
  success: function (data) {
    $("#OR_status").html(data);
  },
  error: function () {},
});


}
function checkValidationUsers() {
  var A_name = $("#A_name").val();
  var Uname = $("#Uname").val();
  var Upass = $("#Upass").val();
  var Upass2 = $("#Upass2").val();
  
  $("#lblA_name").html("");
  $("#lblUsername").html("");
  $("#lblpwd").html("");
  $("#lblpwd2").html("");
  $("#check-username").html("");
  
  
  $.ajax({
    url: "check_availability.php",
    data: "username=" + $("#Uname").val(),
    type: "POST",
    success: function (data) {
      $("#check-username").html(data);
    },
    error: function () {},
  });


  if (A_name == "") {
    $("#addUser").prop("disabled", true);
    $("#lblA_name").html("* Please fill out this field ");
  }
  if (Uname == "") {
    $("#addUser").prop("disabled", true);
    $("#lblUsername").html("* Please fill out this field ");
  }
  if (Upass == "") {
    $("#addUser").prop("disabled", true);
    $("#lblpwd").html("* Please fill out this field ");
    $("#lblpassnote").html("Use atleast 6 characters");
  
  }
  if (Upass2 == "") {
    $("#addUser").prop("disabled", true);
    $("#lblpwd2").html("* Please fill out this field ");
    $("#lblpassnote2").html("Use atleast 6 characters");
  }
  
  // second validation
  else if (A_name == "") {
    $("#addUser").prop("disabled", true);
    $("#lblA_name").html("* Please fill out this field ");
  } else if (Uname == "") {
    $("#addUser").prop("disabled", true);
    $("#lblUsername").html("* Please fill out this field ");
  } else if (Upass == "") {
    $("#addUser").prop("disabled", true);
    $("#lblpwd").html("* Please fill out this field ");
  } else if (Upass2 == "") {
    $("#addUser").prop("disabled", true);
    $("#lblpwd2").html("* Please fill out this field ");
  } else if (Upass.length < 6) {
    $("#addUser").prop("disabled", true);
    $("#lblpwd").html("* must be at least 6 characters");
  } else if (Upass2.length < 6) {
    $("#addUser").prop("disabled", true);
    $("#lblpwd2").html("* must be at least 6 characters");
  } else if (Uname.length < 4) {
    $("#addUser").prop("disabled", true);
    $("#lblUsername").html("* must be at least 4 characters");
  } else if (Upass != Upass2) {
    $("#addUser").prop("disabled", true);
    $("#lblpwd2").html("* Confirm Password is not match ");
  } else {
    $("#lblA_name").html("");
    $("#lblUsername").html("");
    $("#lblpwd").html("");
    $("#lblpwd2").html("");
    $("#check-username").html("");
    $("#lblpassnote").html("");
    $("#lblpassnote2").html("");

    $("#addUser").prop("disabled", false);
  }
}

// this function is for adding new user to database

$(document).ready(function () {
  $(document).on("click", "#addUser", function () {
    
    var A_name = $("#A_name").val();
    var Uname = $("#Uname").val();
    var Upass = $("#Upass").val();
    var Upass2 = $("#Upass2").val();
    
    $("#lblA_name").html("");
    $("#lblUsername").html("");
    $("#lblpwd").html("");
    $("#lblpwd2").html("");
    
    if (A_name == "") {
      $("#lblA_name").html("* Please fill out this field ");
    }
    if (Uname == "") {
      $("#lblUsername").html("* Please fill out this field ");
    }
    if (Upass == "") {
      $("#lblpwd").html("* Please fill out this field ");
    }
    if (Upass2 == "") {
      $("#lblpwd2").html("* Please fill out this field ");
    }

    if (Uname.length < 4) {
      $("#addUser").prop("disabled", true);
      $("#lblUsername").html("* must be at least 4 characters");
    }

    // second validation
    else if (Upass != Upass2) {
      $("#addUser").prop("disabled", true);
      $("#lblpwd2").html("* Confirm Password is not match ");
    } 
    else if (A_name == "") {
      $("#addUser").prop("disabled", true);
      $("#lblA_name").html("* Please fill out this field ");
    } else if (Uname == "") {
      $("#addUser").prop("disabled", true);
      $("#lblUsername").html("* Please fill out this field ");
    } else if (Upass == "") {
      $("#addUser").prop("disabled", true);
      $("#lblpwd").html("* Please fill out this field ");
    } else if (Upass2 == "") {
      $("#addUser").prop("disabled", true);
      $("#lblpwd2").html("* Please fill out this field ");
    } else if (Upass.length < 6) {
      $("#addUser").prop("disabled", true);
      $("#lblpwd").html("* must be at least 6 characters");
    } else if (Upass2.length < 6) {
      $("#addUser").prop("disabled", true);
      $("#lblpwd2").html("* must be at least 6 characters");
    } else {
      $("#lblA_name").html("");
      $("#lblUsername").html("");
      $("#lblpwd").html("");
      $("#lblpwd2").html("");
      $("#addUser").prop("disabled", false);

        var NewUname = Uname.toLowerCase();

      $.ajax({
        url: "addUser.php",
        type: "post",
        data: {
          A_name: A_name,
          Uname: NewUname,
          Upass: Upass,
        },
        success: function (data) {
          $("#AddUserDetails").modal("hide");
          // location.reload();

          Swal.fire("Congratulations!", "Successfully Added!", "success");
          setTimeout(() => {
            window.location.reload(true);
          }, 2000);
        },
      });
    }
  });
});

//  deleting users from database

function DeleteUser(deleteID) {
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "delete.php",
        type: "post",
        data: {
          deleteSend: deleteID,
        },
        success: function (data, status) {
          Swal.fire("Deleted!", "User has been deleted.", "success");
          setTimeout(() => {
            window.location.reload(true);
          }, 2000);
        },
      });
    }
  });
}

// getting users data in to view in modal
function ViewUser(viewID) {
  // alert(viewID);

  $("#hiddenUserData").val(viewID);

  $.post(
    "view_data.php",
    {
      viewID: viewID,
    },
    function (data, status) {
      var userID = JSON.parse(data);
      $("#view_Name").html(userID.name);
      $("#view_uname").html(userID.username);
      $("#view_pass").html(userID.password);
    }
  );
}

// get user for updating data
function GetUser(viewID) {
  // alert(viewID);

  $("#hiddenUserData").val(viewID);

  $.post(
    "view_data.php",
    {
      viewID: viewID,
    },
    function (data, status) {
      var userID = JSON.parse(data);

      $("#UpName").val(userID.name);
      $("#UpUser").val(userID.username);
      $("#UPass1").val(userID.password);
      $("#UPass2").val(userID.password);
    }
  );
}

// for showing password textfields in users 

$(document).on("click", "#UPshowPassUser", function () {
  var password = $("#UPass1");
  var password2 = $("#UPass2");

  if (getPwdView === false) {
    password.attr("type", "text");
    password2.attr("type", "text");
    getPwdView = true;
  } else if (getPwdView === true) {
    password.attr("type", "password");
    password2.attr("type", "password");
    getPwdView = false;
  }
});

// for updating data of users

$(document).ready(function () {
  $(document).on("click", "#UpdateUserData", function () {
    var UpName = $("#UpName").val();
    var UpUser = $("#UpUser").val();
    var UPass1 = $("#UPass1").val();
    var UPass2 = $("#UPass2").val();
    var hiddenUserData = $("#hiddenUserData").val();

    $("#lblUpdateName").html("");
    $("#lblxUser").html("");
    $("#lblUpwd").html("");
    $("#lblUpwd2").html("");

    if (UpName == "") {
      $("#lblUpdateName").html("* Please fill out this field ");
    }
    if (UpUser == "") {
      $("#lblxUser").html("* Please fill out this field ");
    }
    if (UPass1 == "") {
      $("#lblUpwd").html("* Please fill out this field ");
    }
    if (UPass2 == "") {
      $("#lblUpwd2").html("* Please fill out this field ");
    }
    if (UpUser.length < 6) {
      $("#addUser").prop("disabled", true);
      $("#lblxUser").html("* must be at least 6 characters");
    }

    else if (UPass1 != UPass2) {
      $("#lblUpwd2").html("* Confirm Password is not match ");
    } else if (UpName == "") {
      $("#lblUpdateName").html("* Please fill out this field ");
    } else if (UpUser == "") {
      $("#lblxUser").html("* Please fill out this field ");
    }
    else if (UPass1.length < 6) {
      $("#addUser").prop("disabled", true);
      $("#lblUpwd").html("* must be at least 6 characters");
    } else if (UPass2.length < 6) {
      $("#addUser").prop("disabled", true);
      $("#lblUpwd2").html("* must be at least 6 characters");
    }  
    else if (UPass1 == "") {
      $("#lblUpwd").html("* Please fill out this field ");
    } else if (UPass2 == "") {
      $("#lblUpwd2").html("* Please fill out this field ");
    } else {
      $("#lblUpdateName").html("");
      $("#lblxUser").html("");
      $("#lblUpwd").html("");
      $("#lblUpwd2").html("");

      var NewUname = UpUser.toLowerCase();

      $.post(
        "update.php",
        {
          //  var for Send:Var from declare

          UpName: UpName,
          NewUname: NewUname,
          UPass1: UPass1,
          hiddenUserData: hiddenUserData,
        },
        function (data, status) {
          $("#UpdateUsers").modal("hide");
          Swal.fire("Congratulations!", "Updated Successfully!", "success");
          setTimeout(() => {
            window.location.reload(true);
          }, 2000);
        }
      );
    }
  });
});

// ! scripting for users page end here !

// * scripting in financial records start here !

// for interactive showing currency inputs

function checkValidationFinancial() {
  var FRI_amount = $(".FRI_amount").val();
  var U_amount = $(".U_amount").val();

  var FRI_name = $("#FRI_name").val();
  var FRI_OR = $("#FRI_OR").val();

  var currency1 = parseFloat(FRI_amount);
  var currency3 = parseFloat(U_amount);

  
  $("#addIncoming").prop("disabled", true);

  $.ajax({
    url: "check_OR.php",
    data: "FRI_OR=" + $("#FRI_OR").val(),
    type: "POST",
    success: function (data) {
      $("#lblFRI_OR").html(data);
    },
    error: function () {},
  });


  

  $("#lblFRI_name").html("");
  $("#lblFRI_OR").html("");
  $("#lblFRI_amount").html("");

  $("#lblFRI_currency").html(""); 
  $("#lblFRI_currency3").html("");
  
  
  if(FRI_amount != ""){
    $("#lblFRI_currency").html("₱ " + currency1.toLocaleString());
  }
  if(U_amount != ""){
    $("#lblFRI_currency3").html("₱ " + currency3.toLocaleString());
  }

  // display error no input
  if (FRI_name == "") {
    $("#lblFRI_name").html("* Please fill out this field ");
    $("#addIncoming").prop("disabled", true);
  }
  if (FRI_OR == "") {
    $("#lblFRI_OR").html("* Please fill out this field ");
    $("#addIncoming").prop("disabled", true);
  }
  if (FRI_amount == "") {
    $("#lblFRI_amount").html("* Please fill out this field ");
    $("#addIncoming").prop("disabled", true);
  }

  // validation for before submit
  
  else if (FRI_name == "") {
    $("#lblFRI_name").html("* Please fill out this field ");
    $("#addIncoming").prop("disabled", true);
  } else if (FRI_OR == "") {
    $("#lblFRI_OR").html("* Please fill out this field ");
    $("#addIncoming").prop("disabled", true);
  } else if (FRI_amount == "") {
    $("#lblFRI_amount").html("* Please fill out this field ");
    $("#addIncoming").prop("disabled", true);
   
  } 
  else {
    $("#lblFRI_name").html("");
    $("#lblFRI_OR").html("");
    $("#lblFRI_amount").html("");
    $("#addIncoming").prop("disabled", false);

  }
}

function checkValidationFinancial2() {
  
  var FRO_amount = $(".FRO_amount").val();
  var FRO_name = $("#FRO_name").val();
  var FRO_OR = $("#FRO_OR").val();
  
  var currency2 = parseFloat(FRO_amount);

  $("#lblFRO_name").html("");
  $("#lblFRO_OR").html("");  
  $("#lblFRO_amount").html(""); 
 
  $("#lblFRI_currency2").html("");


  $.ajax({
    url: "check_OR.php",
    data: "FRO_OR=" + $("#FRO_OR").val(),
    type: "POST",
    success: function (data) {
      $("#lblFRO_OR").html(data);
    },
    error: function () {},
  });
  
  
  if(FRO_amount != ""){
    $("#lblFRI_currency2").html("₱ " + currency2.toLocaleString());
  }
  
  // display error no input
  if (FRO_name == "") {
    $("#lblFRO_name").html("* Please fill out this field ");
    $("#addOutgoing").prop("disabled", true);
  }
  if (FRO_OR == "") {
    $("#lblFRO_OR").html("* Please fill out this field ");
    $("#addOutgoing").prop("disabled", true);
    
  }
  if (FRO_amount == "") {
    $("#lblFRO_amount").html("* Please fill out this field ");
    $("#addOutgoing").prop("disabled", true);
    
  } 

  // validation for befroe submit
  else if (FRO_name == "") {
    $("#lblFRO_name").html("* Please fill out this field ");
    $("#addOutgoing").prop("disabled", true);
    
  } else if (FRO_OR == "") {
    $("#lblFRO_OR").html("* Please fill out this field ");
    $("#addOutgoing").prop("disabled", true);
  } else if (FRO_amount == "") {
    $("#lblFRO_amount").html("* Please fill out this field ");
    $("#addOutgoing").prop("disabled", true);
  }
   else {
    $("#lblFRO_name").html("");
    $("#lblFRO_OR").html("");  
    $("#lblFRO_amount").html(""); 
    $("#addOutgoing").prop("disabled", false);
  }
}

//  for number only inputs
$(document).ready(function () {
  $("#txtNumeric").keydown(function (e) {
    if (
      (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
      (e.keyCode >= 35 && e.keyCode <= 40) ||
      $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1
    ) 
    {
      return;
    }
    if (
      (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) &&
      (e.keyCode < 96 || e.keyCode > 105)
    ) {
      e.preventDefault();
    }
  });
});

//  for number only inputs

$(document).ready(function () {
  $("#txtNumeric2").keydown(function (e) {
    if (
      (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
      (e.keyCode >= 35 && e.keyCode <= 40) ||
      $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1
    ) {
      return;
    }
    if (
      (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) &&
      (e.keyCode < 96 || e.keyCode > 105)
    ) {
      e.preventDefault();
    }
  });
});

// for add new incoming record

$(document).ready(function () {
  $(document).on("click", "#addIncoming", function () {
    var FRI_name = $("#FRI_name").val();
    var FRI_date = $("#FRI_date").val();
    var FRI_purpose = $("#FRI_purpose").val();
    var FRI_OR = $("#FRI_OR").val();
    var FRI_amount = $(".FRI_amount").val();
    var FRI_month = $("#FRI_month").val();
    var FRI_encoded = $("#FRI_encoded").val();
    var FRI_year = $("#FRI_year").val();

    $("#lblFRI_name").html("");
    $("#lblFRI_OR").html("");
    $("#lblFRI_amount").html("");

    // display error no input
    if (FRI_name == "") {
      $("#lblFRI_name").html("* Please fill out this field ");
    }
    if (FRI_OR == "") {
      $("#lblFRI_OR").html("* Please fill out this field ");
    }
    if (FRI_amount == "") {
      $("#lblFRI_amount").html("* Please fill out this field ");
    }

    // validation for befroe submit
    else if (FRI_name == "") {
      $("#lblFRI_name").html("* Please fill out this field ");
    } else if (FRI_OR == "") {
      $("#lblFRI_OR").html("* Please fill out this field ");
    } else if (FRI_amount == "") {
      $("#lblFRI_amount").html("* Please fill out this field ");
    } else {
      $("#lblFRI_name").html("");
      $("#lblFRI_OR").html("");
      $("#lblFRI_amount").html("");

      $.ajax({
        url: "add_incoming.php",
        type: "post",
        data: {
          FRI_nameSend: FRI_name,
          FRI_dateSend: FRI_date,
          FRI_purposeSend: FRI_purpose,
          FRI_ORSend: FRI_OR,
          FRI_amountSend: FRI_amount,
          FRI_monthSend: FRI_month,
          FRI_encodedSend: FRI_encoded,
          FRI_yearSend: FRI_year,
        },

        success: function (data) {
          //alert("Success");
          $("#add-Incoming").modal("hide");
          // location.reload();
          Swal.fire("Congratulations!", "Successfully Added!", "success");
          setTimeout(() => {
            window.location.reload(true);
          }, 2000);
        },
      });
    }
  });
});

// for add new outgoing record

$(document).ready(function () {
  $(document).on("click", "#addOutgoing", function () {
    var FRO_name = $("#FRO_name").val();
    var FRO_date = $("#FRO_date").val();
    var FRO_purpose = $("#FRO_purpose").val();
    var FRO_OR = $("#FRO_OR").val();
    var FRO_amount = $(".FRO_amount").val();
    var FRO_month = $("#FRO_month").val();
    var FRO_encoded = $("#FRO_encoded").val();
    var FRO_year = $("#FRO_year").val();

    var FRO_name = $("#FRO_name").val();
    var FRO_amount = $(".FRO_amount").val();
    var FRO_OR = $("#FRO_OR").val();

    $("#lblFRO_name").html("");
    $("#lblFRO_OR").html("");
    
    $("#lblFRO_amount").html("");

    if (FRO_name == "") {
      $("#lblFRO_name").html("* Please fill out this field ");
    }
    if (FRO_OR == "") {
      $("#lblFRO_OR").html("* Please fill out this field ");
    }
    if (FRO_amount == "") {
      $("#lblFRO_amount").html("* Please fill out this field ");
    } else if (FRO_name == "") {
      $("#lblFRO_name").html("* Please fill out this field ");
    } else if (FRO_OR == "") {
      $("#lblFRO_OR").html("* Please fill out this field ");
    } else if (FRO_amount == "") {
      $("#lblFRO_amount").html("* Please fill out this field ");
    } else {
      $("#lblFRO_name").html("");
      $("#lblFRO_OR").html("");
      $("#lblFRO_amount").html("");

      // alert("Hello");

      $.ajax({
        url: "add_outgoing.php",
        type: "post",
        data: {
          FRO_nameSend: FRO_name,
          FRO_dateSend: FRO_date,
          FRO_purposeSend: FRO_purpose,
          FRO_ORSend: FRO_OR,
          FRO_amountSend: FRO_amount,
          FRO_monthSend: FRO_month,
          FRO_yearSend: FRO_year,
          FRO_encodedSend: FRO_encoded,
        },

        success: function (data) {
          //alert("Success");
          $("#add-Outgoing").modal("hide");
          // location.reload();
          Swal.fire("Congratulations!", "Successfully Added!", "success");
          setTimeout(() => {
            window.location.reload(true);
          }, 2000);
        },
      });
    }
  });
});

// for deleting financial record data

function DeleteRecord(deleteID) {
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "delete.php",
        type: "post",
        data: {
          deleteSend: deleteID,
        },
        success: function (data, status) {
          Swal.fire("Deleted!", "Record has been deleted.", "success");
          setTimeout(() => {
            window.location.reload(true);
          }, 2000);
        },
      });
    }
  });
}

// getting financial data from database

function GetData(updateID) {
  // alert(updateID);

  $("#hiddenData").val(updateID);

  $.post(
    "update.php",
    {
      updateID: updateID,
    },
    function (data, status) {
      var userID = JSON.parse(data);

      $("#U_name").val(userID.cname);
      // $('#U_date').val(userID.date_set);
      $("#U_purpose").val(userID.purpose);
      $("#U_OR").val(userID.or_number);
      $(".U_amount").val(userID.amount);

      // $('#U_month').val(userID.month_date);
      // $('#U_encoded').val(userID.encoded_by);
    }
  );
}

// for updating financial 

$(document).ready(function () {
  $(document).on("click", "#Up_Financial", function () {
    
    var U_name = $("#U_name").val();
    var U_date = $("#U_date").val();
    var U_purpose = $("#U_purpose").val();
    var U_OR = $("#U_OR").val();
    var U_amount = $(".U_amount").val();
    var U_month = $("#U_month").val();
    var U_year = $("#U_year").val();
    var U_encoded = $("#U_encoded").val();
    var hiddenData = $("#hiddenData").val();

    $("#lblU_name").html("");
    $("#lblU_OR").html("");
    $("#lblU_amount").html("");

    if (U_name == "") {
      $("#lblU_name").html("Enter Remarks");
    } else if (U_OR == "") {
      $("#lblU_OR").html("Enter OR Number");
    } else if (U_amount == "") {
      $("#lblU_amount").html("Enter Amount");
    } else {
      $("#lblU_name").html("");
      $("#lblU_OR").html("");
      $("#lblU_amount").html("");

      $.post(
        "update.php",
        {
          //  var for Send:Var from declare

          U_name: U_name,
          U_date: U_date,
          U_purpose: U_purpose,
          U_OR: U_OR,
          U_amount: U_amount,
          U_month: U_month,
          U_year: U_year,
          U_encoded: U_encoded,
          hiddenData: hiddenData,
        },
        function (data, status) {
          $("#UpdateFinancial").modal("hide");
          Swal.fire("Congratulations!", "Updated Successfully!", "success");
          setTimeout(() => {
            window.location.reload(true);
          }, 2000);
        }
      );
    }
  });
});

// for viewing financial

function ViewData(viewID) {
  // alert(viewID);

  $("#hiddenViewData").val(viewID);

  $.post(
    "view_data.php",
    {
      viewID: viewID,
    },
    function (data, status) {
      var userID = JSON.parse(data);
      // var vamount = $("#viewfr_Amount");
      var currency = parseFloat(userID.amount);

      $("#viewfr_Name").html(userID.cname);
      $("#viewfr_date").html(userID.date_set);
      $("#viewfr_purpose").html(userID.purpose);
      $("#viewfr_OR").html(userID.or_number);
      $("#viewfr_Amount").html("P " + currency.toLocaleString());
      // $('#U_month').val(userID.month_date);
      $("#viewfr_encoded").html(userID.encoded_by);
    }
  );
}

// ! scripting in financial records end here !

// * scripting in tugboat renting start here !

// $(document).ready(function () {
//   setTimeout(function () {
//     location.href = '../tugboat_renting/';

//   },2000);
// });

// setTimeout (() => {
//       location.href = '../tugboat_renting/';
//     }, 3000);

// $(document).on('click','#updateDetails', function() {

// })

// for deleting rent

function DeleteRent(deleteID) {
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "process.php",
        type: "post",
        data: {
          deleteSend: deleteID,
        },
        success: function (data, status) {
          Swal.fire("Deleted!", "Record has been deleted.", "success");
          // setTimeout ( () => {
          // location.href = '../users';
          // }, 2000);
          setTimeout(() => {
            window.location.reload(true);
          }, 2000);
        },
      });
    }
  });
}

// for viewing rent

function ViewRent(viewID) {
  // alert(viewID);

  $("#hiddenViewData").val(viewID);

  $.post(
    "process.php",
    {
      viewID: viewID,
    },
    function (data, status) {
      var userID = JSON.parse(data);

      $("#view_Name").html(userID.name);
      $("#view_DOR1").html(userID.dateofRent);
      $("#view_DOR2").html(userID.dateofReturn);
    }
  );
  $("#ViewRent").modal("show");
}

// ! scripting in tugboat renting end here !

function DeleteFaculty(deleteID) {
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "code.php",
        type: "post",
        data: {
          deleteSend: deleteID,
        },
        success: function (data, status) {
          Swal.fire("Deleted!", "Faculty has been deleted.", "success");
          setTimeout(() => {
            window.location.reload(true);
          }, 2000);
        },
      });
    }
  });
}

function DeleteDryDock(deleteID) {
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "process.php",
        type: "post",
        data: {
          deleteSend: deleteID,
        },
        success: function (data, status) {
          Swal.fire("Deleted!", "Drydock has been deleted.", "success");
          setTimeout(() => {
            window.location.reload(true);
          }, 2000);
        },
      });
    }
  });
}

$(document).ready(function () {
 
$(document).on("click", "#view_drydock_image", function () {
var userID = $(this).data('id');
// alert(userID);
  $.ajax({
    url: 'process.php',
    type: 'post',
    data: {userID : userID},
    success: function(response){
      $('#drydock_image_preview').html(response);
      $('#drydock_image_modal').modal('show');
    }

  });

});
})

function validateFileType(){
  var drydock_image = document.getElementById("drydock_image").value;
  var idxDot = drydock_image.lastIndexOf(".") + 1;
  var extFile = drydock_image.substr(idxDot, drydock_image.length).toLowerCase();
  if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
      //TO DO
  }else{
      alert("Only jpg/jpeg and png files are allowed!");
      location.href = '../drydock/';
      
  }   
}

function validateFileType2(){
  var or_image = document.getElementById("or_image").value;
  var idxDot = or_image.lastIndexOf(".") + 1;
  var extFile = or_image.substr(idxDot, drydock_image.length).toLowerCase();
  if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
      //TO DO
  }else{
      alert("Only jpg/jpeg and png files are allowed!");
      location.href = '../financial_record/';
      
  }   
}

function ViewDrydock(viewID) {
  // alert(viewID);

  $("#hiddenDryDockID").val(viewID);

  $.post(
    "process.php",
    {
      viewID: viewID,
    },
    function (data, status) {
      var userID = JSON.parse(data);

      $("#view_CompanyName").html(userID.Company_Name	);
      $("#view_ShipName").html(userID.Ship_Name);
      $("#view_LotNumber").html(userID.Lot_Num);
      $("#view_DrydockDate").html(userID.Drydock_date);
      $("#view_ExpectedDeparture").html(userID.Exp_Departure	);
    }
  );
  $("#ViewDryDockDetails").modal("show");
}

$(document).ready(function () {
  // 
$(document).on("click", "#viewOR_image", function () {
var userID = $(this).data('id');
// alert(userID);
  $.ajax({
    url: 'check_OR.php',
    type: 'post',
    data: {userID : userID},
    success: function(response){
      $('#OR_image_preview').html(response);
      $('#OR_image_modal').modal('show');
    }

  });

});
})

function GetORNUMBER(updateID) {
  // alert(updateID);
  $("#OR_msg").html("<span style='color:green' id='OR_msg'> * <b>OR NUMBER verified successfully.</b></span>");
  // $("#hiddenData").val(updateID);

  $.post(
    "update.php",
    {
      updateID: updateID,
    },
    function (data, status) {
      var userID = JSON.parse(data);

      
      $("#OR_number").val(userID.or_number);
      $("#OR_msg").html("<span style='color:green' id='OR_msg'> * <b>OR NUMBER verified successfully.</b></span>");
      $('#Add_OR_image').prop('disabled',false);
      
      // $('#U_month').val(userID.month_date);
      // $('#U_encoded').val(userID.encoded_by);
    }
  );
}

$('#view_year_only').hide();
    $('#view_MY_only').hide();
    $(document).ready(function() {
      $(document).on("click", "#custom_year_submit", function() {
        $('#view_year_only').show();
        $('#view_MY_only').hide();
      });

      $(document).on("click", "#custom_MY_submit", function() {
        $('#view_MY_only').show();
        $('#view_year_only').hide()
      });

    });