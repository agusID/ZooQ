$(window).on("load", function(e) {
    $(".preload").delay(2000).fadeOut("slow");
});

$(document).ready(function() {

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

    //scrollspy
    $('img').on("load", function() {
        $(this).css('background', 'none');
    });
    $(".scroll").click(function(event) { //SCroll Smooth
        event.preventDefault();
        $('html,body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
    });

    $.fullName = $("#txtFullName");
    $.email = $("#txtEmail");
    $.phone = $("#txtPhone");

    $.pob = $("#txtPlaceOfBirth");

    $.day = $("#BirthDay");
    $.month = $("#BirthMonth");
    $.year = $("#BirthYear");

    $.gender = $("#cmbGender");
    $.religion = $("#cmbReligion");
    $.address = $("#txtAddress");
    $.schoolFrom = $("#txtSchoolFrom");
    $.schoolAddress = $("#txtSchoolAddressFrom");
    $.sibling = $("#numSibling");

    // Parent Data
    $.parentName = $("#parent_name");
    $.parentJob = $("#cmbJob");
    $.parentAddress = $("#parent_address");
    $.phoneParent = $("#txtPhoneParent");



    $($.phoneParent).keypress(function(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $.phone.addClass('has-error');
            $('#ParentPhoneErrorMessage').html('Phone must be a number');
            setTimeout("$($.phoneParent).val('');", 1000);
        } else {
            $.phone.removeClass('has-error');
            $('#ParentPhoneErrorMessage').html('');
        }
    });
    $($.phone).keypress(function(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $.phone.addClass('has-error');
            $('#PhoneErrorMessage').html('Phone must be a number');
            setTimeout("$($.phone).val('');", 1000);
        } else {
            $.phone.removeClass('has-error');
            $('#PhoneErrorMessage').html('');
        }
    });
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
    $($.gender).change(function(e) {
        if ($.gender.val() == null) {
            $.gender.addClass('has-error');
            $('#genderErrorMessage').html('Gender must be selected.');
        } else {
            $.gender.removeClass('has-error');
            $('#genderErrorMessage').html('');
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
    $($.religion).change(function(e) {
        // religion
        if ($.religion.val() == null) {
            $.religion.addClass('has-error');
            $('#religionErrorMessage').html('Religion must be selected.');
        } else {
            $.religion.removeClass('has-error');
            $('#religionErrorMessage').html('');
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
            $('#siblingErrorMessage').html('Number of Siblings(s) must be filled.');
        } else {
            $.sibling.removeClass('has-error');
            $('#siblingErrorMessage').html('');
        }
    });
    $($.parentName).keyup(function(e) {
        if ($.parentName.val() == "") {
            $.parentName.addClass('has-error');
            $('#ParenNameErrorMessage').html('Parent Name must be filled.');
        } else {
            $.parentName.removeClass('has-error');
            $('#ParenNameErrorMessage').html('');
        }
    });

    $($.parentJob).keyup(function(e) {
        // parent job
        if ($.parentJob.val() == "") {
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
    //if user click btn register
    $("#btnRegister").click(function(e) {
        e.preventDefault();
        console.log("gender value : " + $.gender.val());
        var nameFlag = false,
            emailFlag = false,
            pobFlag = false,
            dobFlag = false,
            genderFlag = false,
            religionFlag = false,
            addressFlag = false,
            schoolFromFlag = false,
            schoolAddressFlag = false,
            phoneFlag = false,
            siblingFlag = false,

            parentNameFlag = false,
            parentJobFlag = false,
            parentAddressFlag = false,
            phoneParentFlag = false;


        if ($.fullName.val() == "") {
            $.fullName.focus();
            $.fullName.addClass('has-error');
            $('#NameErrorMessage').html('Name must be filled.');
            nameFlag = false;
        } else {
            $.fullName.removeClass('has-error');
            $('#NameErrorMessage').html('');
            nameFlag = true;
        }

        if ($.email.val() == "") {
            $.email.addClass('has-error');
            $('#EmailErrorMessage').html('Email must be filled');
            emailFlag = false;
        } else if (!validateEmail($.email.val()) && !IsEmail($.email.val())) {
            $.email.addClass('has-error');
            $('#EmailErrorMessage').html('Email must be a valid email address.');
            emailFlag = false;
        } else {
            $.email.removeClass('has-error');
            $('#EmailErrorMessage').html('');
            emailFlag = true;
        }
        // place of birth
        if ($.pob.val() == "") {
            $.pob.addClass('has-error');
            $('#pobErrorMessage').html('Place of Birth must be filled.');
            pobFlag = false;
        } else {
            $.pob.removeClass('has-error');
            $('#pobErrorMessage').html('');
            pobFlag = true;
        }
        // place of birth
        if ($.pob.val() == "") {
            $.pob.addClass('has-error');
            $('#pobErrorMessage').html('Place of Birth must be filled.');
            pobFlag = false;
        } else {
            $.pob.removeClass('has-error');
            $('#pobErrorMessage').html('');
            pobFlag = true;
        }
        // date of birth
        if ($.day.val() == "") {
            $.day.addClass('has-error');
            $.year.removeClass('has-error');
            $('#dobErrorMessage').html('Day must be filled.');
            dobFlag = false;
        } else if ($.year.val() == "") {
            $.day.removeClass('has-error');
            $.year.addClass('has-error');
            $('#dobErrorMessage').html('Year must be filled.');
            dobFlag = false;
        } else {
            $.day.removeClass('has-error');
            $.year.removeClass('has-error');
            $('#dobErrorMessage').html('');
            dobFlag = true;
        }
        // gender
        if ($.gender.val() == null) {
            $.gender.addClass('has-error');
            $('#genderErrorMessage').html('Gender must be selected.');
            genderFlag = false;
        } else {
            $.gender.removeClass('has-error');
            $('#genderErrorMessage').html('');
            genderFlag = true;
        }
        // religion
        if ($.religion.val() == null) {
            $.religion.addClass('has-error');
            $('#religionErrorMessage').html('Religion must be selected.');
            religionFlag = false;
        } else {
            $.religion.removeClass('has-error');
            $('#religionErrorMessage').html('');
            religionFlag = true;
        }
        // address
        if ($.address.val() == "") {
            $.address.addClass('has-error');
            $('#addressErrorMessage').html('Address must be filled.');
            addressFlag = false;
        } else {
            $.address.removeClass('has-error');
            $('#addressErrorMessage').html('');
            addressFlag = true;
        }

        // school from
        if ($.schoolFrom.val() == "") {
            $.schoolFrom.addClass('has-error');
            $('#schoolFromErrorMessage').html('School From must be filled.');
            schoolFromFlag = false;
        } else {
            $.schoolFrom.removeClass('has-error');
            $('#schoolFromErrorMessage').html('');
            schoolFromFlag = true;
        }
        // school address
        if ($.schoolAddress.val() == "") {
            $.schoolAddress.addClass('has-error');
            $('#schoolAddressErrorMessage').html('School Address must be filled.');
            schoolAddressFlag = false;
        } else {
            $.schoolAddress.removeClass('has-error');
            $('#schoolAddressErrorMessage').html('');
            schoolAddressFlag = true;
        }
        // phone
        if ($.phone.val() == "") {
            $.phone.addClass('has-error');
            $('#PhoneErrorMessage').html('Phone must be filled.');
            phoneFlag = false;
        } else {
            $.phone.removeClass('has-error');
            $('#PhoneErrorMessage').html('');
            phoneFlag = true;
        }
        // sibling
        if ($.sibling.val() == "") {
            $.sibling.addClass('has-error');
            $('#siblingErrorMessage').html('Number of Siblings(s) must be filled.');
            siblingFlag = false;
        } else {
            $.sibling.removeClass('has-error');
            $('#siblingErrorMessage').html('');
            siblingFlag = true;
        }

        // parent name
        if ($.parentName.val() == "") {
            $.parentName.addClass('has-error');
            $('#ParenNameErrorMessage').html('Parent Name must be filled.');
            parentNameFlag = false;
        } else {
            $.parentName.removeClass('has-error');
            $('#ParenNameErrorMessage').html('');
            parentNameFlag = true;
        }

        // parent job
        if ($.parentJob.val() == null) {
            $.parentJob.addClass('has-error');
            $('#ParentJobErrorMessage').html('Parent Job must be filled.');
            parentJobFlag = false;
        } else {
            $.parentJob.removeClass('has-error');
            $('#ParentJobErrorMessage').html('');
            parentJobFlag = true;
        }

        //parentAddress
        if ($.parentAddress.val() == "") {
            $.parentAddress.addClass('has-error');
            $('#ParentAddressErrorMessage').html('Parent Address must be filled.');
            parentAddressFlag = false;
        } else {
            $.parentAddress.removeClass('has-error');
            $('#ParentAddressErrorMessage').html('');
            parentAddressFlag = true;
        }

        //phoneParent
        if ($.phoneParent.val() == "") {
            $.phoneParent.addClass('has-error');
            $('#ParentPhoneErrorMessage').html('Phone parent must be filled.');
            phoneParentFlag = false;
        } else {
            $.phoneParent.removeClass('has-error');
            $('#ParentPhoneErrorMessage').html('');
            phoneParentFlag = true;
        }

        if (nameFlag == true && emailFlag == true && phoneFlag == true && parentNameFlag == true && parentJobFlag == true && parentAddressFlag == true && phoneParentFlag == true) {
            $("#box-loader").show();
            $("#btnRegister").addClass("opacity");

            var formData = $("#FormRegister").serialize();
            // console.log(formData);

            $.ajax({
                type: 'post',
                url: 'ppdb_register',
                data: formData, // Serialized Data
                dataType: 'json',
                beforeSend: function(xhr) {
                    // Function needed from Laravel because of the CSRF Middleware
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                success: function(data) {
                    // Check if the logic was successful or not
                    if (data.status == true) {
                        console.log('Data has been saved');
                        $.fullName.val('');
                        $.email.val('');
                        $.phone.val('');
                        $.pob.val('');
                        $.gender.val('');
                        $.religion.val('');
                        $.address.val('');
                        $.schoolFrom.val('');
                        $.schoolAddress.val('');
                        $.sibling.val('');

                        $.parentName.val('');
                        $.parentJob.val('');
                        $.parentAddress.val('');
                        $.phoneParent.val('');

                        $("#box-loader").hide();
                        $("#btnRegister").removeClass("opacity");
                        alert('Thank you for register, please check your inbox for an email verification.');
                        document.location.href = '/sekolah/';
                    } else if (data.status == false) {
                        console.log(data);
                        $('#ErrorMessage').html(data.msg);
                        $("#box-loader").hide();
                        $("#btnRegister").removeClass("opacity");
                    } else {
                        // console.log(data.msg);
                        $("#box-loader").hide();
                        $("#btnRegister").removeClass("opacity");
                    }
                },
                error: function(data) {
                    // Error while calling the controller (HTTP Response Code different as 200 OK
                    // console.log('Error:', data);
                }
            });
        }
    });
});

function validateEmail(str) {
    var index_at = str.indexOf('@')
    if (index_at === -1) return false;

    var name = str.substr(0, index_at);
    /* should test name for other invalids*/
    var domain = str.substr(index_at + 1);
    /* should check for extra "@" and any other checks that would invalidate an address of which there are likely many*/
    if (domain.indexOf('@') != -1) return false;
    /* dot can't be first character of domain*/
    return domain.indexOf('.') > 0;
}

function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test(email)) return false;
    return true;
}