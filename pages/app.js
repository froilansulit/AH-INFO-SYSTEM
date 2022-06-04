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

$(document).ready(function() {
    $("#txtNumeric").keydown(function(e) {
      if ((e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
        (e.keyCode >= 35 && e.keyCode <= 40) ||
        $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1) {
        return;
      }
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) &&
        (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
      }
    });
  });

  $(document).ready(function() {
    $("#txtNumeric2").keydown(function(e) {
      if ((e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
        (e.keyCode >= 35 && e.keyCode <= 40) ||
        $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1) {
        return;
      }
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) &&
        (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
      }
    });
  });

  $(document).ready(function() {
    $(document).on('click', '#addIncoming', function() {
      var FRI_name = $('#FRI_name').val();
      var FRI_date = $('#FRI_date').val();
      var FRI_purpose = $('#FRI_purpose').val();
      var FRI_OR = $('#FRI_OR').val();
      var FRI_amount = $('.FRI_amount').val();
      var FRI_month = $('#FRI_month').val();
      var FRI_encoded = $('#FRI_encoded').val();
      var FRI_year = $('#FRI_year').val();
             

      $("#lblFRI_name").html("");
      $("#lblFRI_OR").html("");
      $("#lblFRI_amount").html("");

      if (FRI_name == "") {
        $("#lblFRI_name").html("Enter Remarks");
      } else if (FRI_OR == "") {
        $("#lblFRI_OR").html("Enter OR Number");
      } else if (FRI_amount == "") {
        $("#lblFRI_amount").html("Enter Amount");
      } else {
        $("#lblFRI_name").html("");
        $("#lblFRI_OR").html("");
        $("#lblFRI_amount").html("");



        $.ajax({
          url: "add_incoming.php",
          type: 'post',
          data: {
            FRI_nameSend: FRI_name,
            FRI_dateSend: FRI_date,
            FRI_purposeSend: FRI_purpose,
            FRI_ORSend: FRI_OR,
            FRI_amountSend: FRI_amount,
            FRI_monthSend: FRI_month,
            FRI_encodedSend: FRI_encoded,
            FRI_yearSend : FRI_year
          },
          
          success: function(data) {
            //alert("Success");
            // $('#add-Product').modal('hide');
            // location.reload();
            Swal.fire(
              'Congratulations!',
              'Successfully Added!',
              'success'
            )
            location.reload();
          }
        });
      }
    })
  });

  $(document).ready(function() {
    $(document).on('click', '#addOutgoing', function() {

      var FRO_name = $('#FRO_name').val();
      var FRO_date = $('#FRO_date').val();
      var FRO_purpose = $('#FRO_purpose').val();
      var FRO_OR = $('#FRO_OR').val();
      var FRO_amount = $('.FRO_amount').val();
      var FRO_month = $('#FRO_month').val();
      var FRO_encoded = $('#FRO_encoded').val();
      var FRO_year = $('#FRO_year').val();


      $("#lblFRO_name").html("");
      $("#lblFRO_OR").html("");
      $("#lblFRO_amount").html("");

      if (FRO_name == "") {
        $("#lblFRO_name").html("Enter Remarks");
      } else if (FRO_OR == "") {
        $("#lblFRO_OR").html("Enter OR Number");
      } else if (FRO_amount == "") {
        $("#lblFRO_amount").html("Enter Amount");
      } else {
        $("#lblFRO_name").html("");
        $("#lblFRO_OR").html("");
        $("#lblFRO_amount").html("");

        // alert("Hello");


        $.ajax({
          url: "add_outgoing.php",
          type: 'post',
          data: {
            FRO_nameSend: FRO_name,
            FRO_dateSend: FRO_date,
            FRO_purposeSend: FRO_purpose,
            FRO_ORSend: FRO_OR,
            FRO_amountSend: FRO_amount,
            FRO_monthSend: FRO_month,
            FRO_yearSend : FRO_year,
            FRO_encodedSend: FRO_encoded
          },

          success: function(data) {
            //alert("Success");
            // $('#add-Product').modal('hide');
            // location.reload();
            Swal.fire(
              'Congratulations!',
              'Successfully Added!',
              'success'
            )
            location.reload();
          }
        });
      }
    })
  });