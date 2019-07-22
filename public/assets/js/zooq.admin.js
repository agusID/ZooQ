$(document).keyup(function(e) {
    if (e.keyCode == 27) { // escape key maps to keycode `27`
        $('.modal-backdrop').fadeOut();
        $('#backdrop').html('');
    }
});
$(document).ready(function() {
    $('.item-nav').unbind( "click");
    $('.item-nav').click(function(event) {
        event.preventDefault(); // Avoid the link click from loading a new page
        var link = $(this).attr('href');
        var link_replaced = $(this).attr('href').replace("view_", "");
        window.history.pushState("", "", link_replaced);
        // Load the content from the link's href attribute
        $('.loading').fadeIn();
        $.ajax({
            type: "GET",
            url: link,
            contentType: false,
            success: function(data) {
                $(".content").hide().html(data).fadeIn();
                $('.loading').fadeOut();
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    });

    $(".browse-button input:file").change(function() {
        $("input[name='file_upload']").each(function() {
            var fileName = $(this).val().split('/').pop().split('\\').pop();
            $(".filename").html(fileName);
            $(".browse-button-text").html('<i class="fa fa-sync-alt"></i> Change');
        });
    });
    $('#PasswordField').hide();
    $('#cmbPosition').change(function(){
        if($(this).val() == 2){
            $('#PasswordField').slideDown();
        }else{
            $('#PasswordField').slideUp();
        }
    })
    $(".browse-button-favicon input:file").change(function() {
        $("input[name='file_upload_favicon']").each(function() {
            var fileNameFavicon = $(this).val().split('/').pop().split('\\').pop();
            $(".filenamefavicon").html(fileNameFavicon);
            $(".browse-button-favicon-text").html('<i class="fa fa-sync-alt"></i> Change');
        });

    });

    var inputQuantity = [];
    $(".number-format").each(function(i) {
        inputQuantity[i] = this.defaultValue;
        $(this).data("idx", i); // save this field's index to access later
    });
    $(".number-format").on("keyup", function(e) {
        var $field = $(this),
            val = this.value,
            $thisIndex = parseInt($field.data("idx"), 10); // retrieve the index
        if (this.validity && this.validity.badInput || isNaN(val) || $field.is(":invalid")) {
            this.value = inputQuantity[$thisIndex];
            return;
        }
        if (val.length > Number($field.attr("maxlength"))) {
            val = val.slice(0, 5);
            $field.val(val);
        }
        inputQuantity[$thisIndex] = val;
    });
    $.fullName = $("#name");
    $.email = $("#email");
    $.phone = $("#telp");

    $.pob = $("#txtPlaceOfBirth");
    $.day = $("#BirthDay");
    $.month = $("#BirthMonth");
    $.year = $("#BirthYear");
    $.address = $("#txtAddress");
    $.schoolFrom = $("#txtSchoolFrom");
    $.schoolAddress = $("#txtSchoolAddressFrom");
    $.sibling = $("#number_of_sibling");

    // Parent Data
    $.parentName = $("#parent_name");
    $.parentJob = $("#cmbJob");
    $.parentAddress = $("#parent_address");
    $.phoneParent = $("#txtPhoneParent");

    // validation
    // $($.phone).keypress(function(e) {
    //     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
    //         $.phone.addClass('has-error');
    //         $('#PhoneErrorMessage').html('Phone must be a number');
    //         setTimeout("$($.phone).val('');", 1000);
    //     } else {
    //         $.phone.removeClass('has-error');
    //         // $('#PhoneErrorMessage').html('');
    //     }
    // });
    $($.fullName).keyup(function(e) {
        if ($.fullName.val() == "") {
            $.fullName.addClass('has-error');
            $('#NameErrorMessage').html('Name must be filled.');
        } else {
            $.fullName.removeClass('has-error');
            $('#NameErrorMessage').html('');
        }
    });
    $($.email).keyup(function(e) {
        if ($.email.val() == "") {
            $.email.addClass('has-error');
            $('#EmailErrorMessage').html('Email must be filled.');
        } else {
            $.email.removeClass('has-error');
            $('#EmailErrorMessage').html('');
        }
    });
    // place of birth on keypress
    $($.pob).keyup(function(e) {
        if ($.pob.val() == "") {
            $.pob.addClass('has-error');
            $('#pobErrorMessage').html('Place of Birth must be filled.');
        } else {
            $.pob.removeClass('has-error');
            $('#pobErrorMessage').html('');
        }
    });
    $($.phone).keyup(function(e) {
        //phoneParent
        if ($.phone.val() == "") {
            $.phone.addClass('has-error');
            $('#PhoneErrorMessage').html('Phone must be filled.');
        } else {
            $.phone.removeClass('has-error');
            $('#PhoneErrorMessage').html('');
        }
    });
    $($.day).keyup(function(e) {
        // place of birth
        if ($.day.val() == "") {
            $.day.addClass('has-error');
            $('#dobErrorMessage').html('Day must be filled.');
        } else {
            $.day.removeClass('has-error');
            $('#dobErrorMessage').html('');
        }
    });
    $($.year).keyup(function(e) {
        // place of birth
        if ($.year.val() == "") {
            $.year.addClass('has-error');
            $('#dobErrorMessage').html('Year must be filled.');
        } else {
            $.year.removeClass('has-error');
            $('#dobErrorMessage').html('');
        }
    });
    $($.address).keyup(function(e) {
        // place of birth
        if ($.address.val() == "") {
            $.address.addClass('has-error');
            $('#addressErrorMessage').html('Address must be filled.');
        } else {
            $.address.removeClass('has-error');
            $('#addressErrorMessage').html('');
        }
    });
    $($.schoolFrom).keyup(function(e) {
        // school from
        if ($.schoolFrom.val() == "") {
            $.schoolFrom.addClass('has-error');
            $('#schoolFromErrorMessage').html('School From must be filled.');
        } else {
            $.schoolFrom.removeClass('has-error');
            $('#schoolFromErrorMessage').html('');
        }
    });
    $($.schoolAddress).keyup(function(e) {
        // school address
        if ($.schoolAddress.val() == "") {
            $.schoolAddress.addClass('has-error');
            $('#schoolAddressErrorMessage').html('School Address must be filled.');
        } else {
            $.schoolAddress.removeClass('has-error');
            $('#schoolAddressErrorMessage').html('');
        }
    });
    $($.sibling).keyup(function(e) {
        // sibling
        if ($.sibling.val() == "") {
            $.sibling.addClass('has-error');
            $('#NumberofSiblingErrorMessage').html('Number of Siblings(s) must be filled.');
        } else {
            $.sibling.removeClass('has-error');
            $('#NumberofSiblingErrorMessage').html('');
        }
    });
    $($.parentName).keyup(function(e) {
        if ($.parentName.val() == "") {
            $.parentName.addClass('has-error');
            $('#ParentNameErrorMessage').html('Parent Name must be filled.');
        } else {
            $.parentName.removeClass('has-error');
            $('#ParentNameErrorMessage').html('');
        }
    });
    $($.parentJob).change(function(e) {
        // parent job
        if ($.parentJob.val() == null) {
            $.parentJob.addClass('has-error');
            $('#ParentJobErrorMessage').html('Parent Job must be filled.');
        } else {
            $.parentJob.removeClass('has-error');
            $('#ParentJobErrorMessage').html('');
        }
    });
    $($.parentAddress).keyup(function(e) {
        //parentAddress
        if ($.parentAddress.val() == "") {
            $.parentAddress.addClass('has-error');
            $('#ParentAddressErrorMessage').html('Parent Address must be filled.');
        } else {
            $.parentAddress.removeClass('has-error');
            $('#ParentAddressErrorMessage').html('');
        }
    });
    $($.phoneParent).keyup(function(e) {
        //phoneParent
        if ($.phoneParent.val() == "") {
            $.phoneParent.addClass('has-error');
            $('#ParentPhoneErrorMessage').html('Phone parent must be filled.');
        } else {
            $.phoneParent.removeClass('has-error');
            $('#ParentPhoneErrorMessage').html('');
        }
    });

    var duration = 'slow';
    var flag = true;
    $('.pagination .page-item:first-child .page-link').html('prev');
    $('.pagination .page-item:last-child .page-link').html('next');
    $('#sidebar ul').fadeIn(800);
    $('.mainContent').css({ "margin-left": "240px", "width": "calc(100% - 240px)", "transition": "all 0.3s ease-out" });

    $('.close').click(function() {
        $('.alert').fadeOut();
    });
    $.wait = function(callback, seconds) {
        return window.setTimeout(callback, seconds * 1000);
    }
    $.wait(function() { $('.alert').fadeOut(); }, 5);

    $('#nav-toggle').click(function() {

        $('#sidebar').animate({ width: 'toggle' }, 300);
        if (flag == true) {
            $('.mainContent').css({ "margin-left": "0px", "width": "100%", "transition": "all 0.3s ease-out" });
            flag = false;
            $('#sidebar ul').fadeOut(100);
            $('#sidebar .brandLogo').css({ "opacity": "0", "transition": "all 0.3s ease-out" })
            $('#nav-toggle').addClass('disable');
        } else {
            $('#sidebar ul').fadeIn(500);
            $('#sidebar .brandLogo').css({ "opacity": "1", "transition": "all 1s ease-out" });
            $('.mainContent').css({ "margin-left": "240px", "width": "calc(100% - 240px)", "transition": "all 0.3s ease-out" });
            $('#nav-toggle').removeClass('disable');
            flag = true;
        }
    });

    $('#fileDialog').on('change', function() {
        $('#FormUploadCover').trigger('submit');
        var formData = $("#FormUploadCover").serialize();

    });
    $("#txtEmail").focusin(
        function() {
            $(".fa-user").css({ "border-color": "#007bff", "color": "#2c3e50" });
        }).focusout(
        function() {
            $(".fa-user").css({ "border-color": "#e1e5eb", "color": "#7f8c8d" });
        });
    $("#txtPassword").focusin(
        function() {
            $(".fa-lock").css({ "border-color": "#007bff", "color": "#2c3e50" });
        }).focusout(
        function() {
            $(".fa-lock").css({ "border-color": "#e1e5eb", "color": "#7f8c8d" });
        });

    $(".navLink").click(function(e){
        e.preventDefault();
        playAudio('notif');
        $('#Modal').css({'display':'block'});
        $('#Modal').show().addClass('bounceIn');
        $('#Modal .btn-ok').attr("href", $(this).attr('href'));
        $('#Modal .ModalLabel').html($(this).attr('data-title'));
        $('#Modal .modal-body').html($(this).attr('data-msg'));
        $('#backdrop').html('<div class="modal-backdrop"></div>');
    });

    $("#Modal .close, #Modal .btn-cancel").click(function(){
        $('#Modal').fadeOut();
        $('.modal-backdrop').fadeOut();
        $('#backdrop').html('');
    });

    $(".navDeleteLink").click(function(e){
        e.preventDefault();
        $('#ModalDelete').css({'display':'block'});
        $('#ModalDelete').show().addClass('fadeInDown');
        $('#ModalDelete #delete-form').attr("action", $(this).attr('href'));
        $('#ModalDelete .ModalLabel').html($(this).attr('data-title'));
        $('#ModalDelete .modal-body').html($(this).attr('data-msg'));
        $('#backdrop').html('<div class="modal-backdrop"></div>');
    });

    $("#ModalDelete .close, #ModalDelete .btn-cancel").click(function(){
        $('#ModalDelete').fadeOut();
        $('.modal-backdrop').fadeOut();
        $('#backdrop').html('');
    });

    $("#btnLogin").click(function(e) {
        e.preventDefault();
        var formData = $("#FormLogin").serialize();
        $.email = $("#txtEmail");
        $.password = $("#txtPassword");
        $.ajax({
            type: 'post',
            url: 'doLogin',
            data: formData,
            dataType: 'json',
            beforeSend: function(xhr) {
                $("#box-loader").fadeIn();
                $("#btnLogin").addClass("opacity")
                var token = $('meta[name="csrf_token"]').attr('content');
                if (token) return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            },
            success: function(data) {
                // Check if the logic was successful or not
                if (data.status == true) {
                    $.email.val('');
                    $.password.val('');

                    $("#btnRegister").removeClass("opacity");
                    $("#box-loader").fadeIn();
                    $("#Message").hide().html(
                        '<div class="success-message" id="SuccessMessage">' + data.msg + '<i class="fas fa-exclamation-circle icon"></i></div>'
                    ).fadeIn('slow');
                    $(".form-login-body").css({ "opacity": "0", "transition": "all 1s ease-out" });
                    $.wait = function(callback, seconds) {
                        return window.setTimeout(callback, seconds * 1000);
                    }
                    $.wait(function() { document.location = '/dashboard' }, 2);

                } else if (data.status == false) {
                    $("#Message").hide().html(
                        '<div class="error-message" id="ErrorMessage">' + data.msg + '<i class="fas fa-exclamation-circle icon"></i></div>'
                    ).fadeIn('slow');
                    $("#box-loader").fadeOut();
                    $("#btnLogin").removeClass("opacity");
                }
            },
            error: function(data) {
                // Error while calling the controller (HTTP Response Code different as 200 OK
            }
        });
    });

    $("#btnRegister").click(function(e) {
        e.preventDefault();
        var formData = $("#FormRegister").serialize();
        $.email = $("#txtEmail");
        $.password = $("#txtPassword");
        $.ajax({
            type: 'post',
            url: 'doRegister',
            data: formData,
            dataType: 'json',
            beforeSend: function(xhr) {
                $("#box-loader").fadeIn();
                $("#btnLogin").addClass("opacity")
                var token = $('meta[name="csrf_token"]').attr('content');
                if (token) return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            },
            success: function(data) {
                // Check if the logic was successful or not
                if (data.status == true) {
                    $.email.val('');
                    $.password.val('');

                    $("#btnRegister").removeClass("opacity");
                    $("#box-loader").fadeIn();
                    $("#Message").hide().html(
                        '<div class="success-message" id="SuccessMessage">' + data.msg + '<i class="fas fa-exclamation-circle icon"></i></div>'
                    ).fadeIn('slow');
                    $(".form-login-body").css({ "opacity": "0", "transition": "all 1s ease-out" });
                    $.wait = function(callback, seconds) {
                        return window.setTimeout(callback, seconds * 1000);
                    }
                    $.wait(function() { document.location = '/login' }, 2);

                } else if (data.status == false) {
                    $("#Message").hide().html(
                        '<div class="error-message" id="ErrorMessage">' + data.msg + '<i class="fas fa-exclamation-circle icon"></i></div>'
                    ).fadeIn('slow');
                    $("#box-loader").fadeOut();
                    $("#btnRegister").removeClass("opacity");
                }
                console.log(data);
            },
            error: function(data) {
                console.log(data);
                // Error while calling the controller (HTTP Response Code different as 200 OK
            }
        });
    });    
});