// this script file is for custom js
// alert("Hello");

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

// * scripting for users page start here !

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
  }
  if (Upass2 == "") {
    $("#addUser").prop("disabled", true);
    $("#lblpwd2").html("* Please fill out this field ");
  }

  if (Upass2 == "") {
    $("#addUser").prop("disabled", true);
    $("#lblpwd2").html("* Please fill out this field ");
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

// getting users data in modal
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

function checkValidationFinancial() {
  var FRI_amount = $(".FRI_amount").val();
  var FRO_amount = $(".FRO_amount").val();
  var U_amount = $(".U_amount").val();

    
  var currency1 = parseFloat(FRI_amount);
  var currency2 = parseFloat(FRO_amount);
  var currency3 = parseFloat(U_amount);

  $("#lblFRI_currency").html("");
  $("#lblFRI_currency2").html("");
  $("#lblFRI_currency3").html("");
  
  if(FRI_amount != ""){
    $("#lblFRI_currency").html("₱ " + currency1.toLocaleString());
  }
  if(FRO_amount != ""){
    $("#lblFRI_currency2").html("₱ " + currency2.toLocaleString());
  }
  if(U_amount != ""){
    $("#lblFRI_currency3").html("₱ " + currency3.toLocaleString());
  }
}


// script for number only
$(document).ready(function () {
  $("#txtNumeric").keydown(function (e) {
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

// script for number only

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

// for deleting record

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

$(document).ready(function () {
  $(document).on("click", "#Up_Financial", function () {
    // alert("hello");
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
