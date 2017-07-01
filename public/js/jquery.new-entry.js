$(function() {
    var af = ascendForm('Entry');
    af.formCreate();

    $('#formSubmit').disable(true);

    $("#inputPhone").mask("(999) 999 9999");
    $("#inputPhoneAlt").mask("(999) 999 9999");
    $('#inputConfirmation').mask("99/99/9999 99:99 aa");

    $('.form-control').on('keyup', function() {
        $('#confirm').prop('checked', false);
    });

    $('#confirm').on('change', function() {
        var cnt = 0;
        if ($('#inputFirstName').val().length > 0) {
            cnt++;
            $('#inputFirstName').parent().removeClass('has-error');
        } else {
            $('#inputFirstName').parent().addClass('has-error');
        }
        if ($('#inputLastName').val().length > 0) {
            cnt++;
            $('#inputLastName').parent().removeClass('has-error');
        } else {
            $('#inputLastName').parent().addClass('has-error');
        }
        if (isPhone($('#inputPhone').val())) {
            cnt++;
            $('#inputPhone').parent().removeClass('has-error');
        } else {
            $('#inputPhone').parent().addClass('has-error');
        }
        if (isEmail($('#inputEmail').val())){
            cnt++;
            $('#inputEmail').parent().removeClass('has-error');
        } else {
            $('#inputEmail').parent().addClass('has-error');
        }
        if ($('#notes').val().length > 0) {
            cnt++;
            $('#notes').parent().removeClass('has-error');
        } else {
            $('#notes').parent().addClass('has-error');
        }
        if ($('#confirm').val().length > 0) {
            cnt++;
            $('#confirm').parent().removeClass('has-error');
        } else {
            $('#confirm').parent().addClass('has-error');
        }
        if (cnt == 6) {
            $('#formSubmit').disable(false);
        } else {
            $('#formSubmit').disable(true);
        }
    });

    $('#formReset').on('click', function() {
        if (confirm('Are you sure you want to rest?') == true) {
            $('#formAdd').trigger('reset');
        }
    });

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    });
    
    $('#gobackbutton').on('click', function() {
        if (confirm('Are you sure you want to leave?') == true) {
            $('#formAdd').trigger('reset');
        }
    });


    $('#modalSave').on('click', function() {
        // modalLocationTimeId
        var locationTimeId = $('#modalLocationTimeId :selected').val();
        $('[name=location_time_id]').val(locationTimeId);
    });
});

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,20})+$/;
    return regex.test(email);
}
function isPhone(phone) {
    var regex = /^\(([0-9]{3})\) ([0-9]{3}) ([0-9]{4})$/;
    return regex.test(phone);
}
