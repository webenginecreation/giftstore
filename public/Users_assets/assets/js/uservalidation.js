$(document).ready(function() {
    $("#userLoginForm").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "Please Enter Your Register email",
                email: "Please Enter Correct Format For Email"
            },
            password: {
                required: "Please Enter Password",
            },
        }
    });
    var value = $("#password").val();
    $.validator.addMethod("checklower", function(value) {
        return /[a-z]/.test(value);
    });
    $.validator.addMethod("checkupper", function(value) {
        return /[A-Z]/.test(value);
    });
    $.validator.addMethod("checkdigit", function(value) {
        return /[0-9]/.test(value);
    });
    $.validator.addMethod("pwcheck", function(value) {
        return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) && /[a-z]/.test(value) && /\d/.test(value) && /[A-Z]/.test(value);
    });
    $("#userSignUp").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
            },
            mobile: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            email: {
                required: true,
                email: true
            },
            password: {
                minlength: 7,
                maxlength: 30,
                required: true,
                pwcheck: true,
                checklower: true,
                checkupper: true,
                checkdigit: true
            },
            password_confirmation: {
                equalTo: "#password",
            },
        },
        messages: {
            name: {
                required: "Please Enter Your Sweet Name",
                minlength: "Please Minimum 3 length",
            },
            email: {
                required: "Please Enter Your Register email",
                email: "Please Enter Correct Format For Email"
            },
            password: {
                pwcheck: "Password is not strong enough",
                required: "Please Enter Password",
                minlength: "Please Minimum 7 length",
                maxlength: "Please Maximum 30 length",
                checklower: "Please Enter At least 1 lower Case",
                checkupper: "Please Enter At least 1 Upper Case",
                checkdigit: "Please Enter At least 1 Digit",
            },
            mobile: {
                required: "Please Enter Your 10 Digits Mobile No",
                digits: "Please Enter Only Digits",
                minlength: "Minimum 10 Digits",
                maxlength: "Maximum 10 Digits",
            },
        }
    });
    //User chekout page validation
    $("#userCheckout").validate({
        rules: {
            order_name: {
                required: true,
            },
            order_lastname: {
                required: true,
            },
            order_address: {
                required: true,
                minlength: 5,
                maxlength: 50,
            },
            order_address2: {
                required: true,
                minlength: 5,
                maxlength: 50,
            },
            state: {
                required: true,
            },
            city: {
                required: true,
                minlength: 3,
                maxlength: 50,
            },
            order_zip: {
                required: true,
                minlength: 6,
                maxlength: 6,
                digits: true,
            },
            order_phone: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            order_notes: {
                minlength: 7,
                maxlength: 150
            },
            email: {
                required: true,
                email: true
            },
        },
        messages: {
            order_name: {
                required: "Please Enter Your Name",
            },
            order_lastname: {
                required: "Please Enter Your Last Name",
            },
            order_address: {
                required: "Please Enter Your Address",
                minlength: "Please Minimum 5 length",
                maxlength: "Please Maximum 50 length",
            },
            order_address2: {
                required: "Please Enter Your Address line 2",
                minlength: "Please Minimum 5 length",
                maxlength: "Please Maximum 50 length",
            },
            state: {
                required: "Please Select State",
            },
            city: {
                required: "Please Enter Your Address",
                minlength: "Please Minimum 7 length",
                maxlength: "Please Maximum 10 length",
            },
            order_zip: {
                required: "Please Enter Your City/Town Postal Code",
                minlength: "Please Minimum 6 length",
                maxlength: "Please Maximum 6 length",
                digits: "Please Enter Only 6 Digits",
            },
            order_phone: {
                required: "Please Enter Your 10 Digits Mobile No",
                digits: "Please Enter Only Digits",
                minlength: "Minimum 10 Digits",
                maxlength: "No Add More Than 10 Digits",
            },
            order_notes: {
                minlength: "Minimum 7 Words Needed",
                maxlength: "No Add More Than 200 Words",
            },
            email: {
                required: "Please Enter Your Register email",
            },
        }
    });
    //End 
    //User Billing & Shipping Address validation
    $("#userBillingAddress").validate({
        rules: {
            address_1: {
                required: true,
                minlength: 7,
                maxlength: 150,
            },
            address_line_2: {
                minlength: 7,
                maxlength: 150,
            },
            state: {
                required: true,
            },
            city: {
                required: true,
                minlength: 3,
                maxlength: 50,
            },
            zip: {
                required: true,
                minlength: 6,
                maxlength: 6,
                digits: true,
            },
        },
        messages: {
            address_1: {
                required: "Please Enter Your Address",
                minlength: "Please Minimum 7 length",
                maxlength: "Please Maximum 150 length",
            },
            address_line_2: {
                minlength: "Please Minimum 7 length",
                maxlength: "Please Maximum 150 length",
            },
            state: {
                required: "Please Select State",
            },
            city: {
                required: "Please Enter Your Address",
                minlength: "Please Minimum 7 length",
                maxlength: "Please Maximum 10 length",
            },
            zip: {
                required: "Please Enter Your City/Town Postal Code",
                minlength: "Please Minimum 6 length",
                maxlength: "Please Maximum 6 length",
                digits: "Please Enter Only 6 Digits",
            },
        }
    });
    //Shipping
    $("#userShipingAddress").validate({
        rules: {
            shipping_address_1: {
                required: true,
                minlength: 7,
                maxlength: 150,
            },
            shipping_address_2: {
                minlength: 7,
                maxlength: 150,
            },
            shipping_state: {
                required: true,
            },
            shipping_city: {
                required: true,
                minlength: 3,
                maxlength: 50,
            },
            shipping_zip: {
                required: true,
                minlength: 6,
                maxlength: 6,
                digits: true,
            },
        },
        messages: {
            shipping_address_1: {
                required: "Please Enter Your Address",
                minlength: "Please Minimum 7 length",
                maxlength: "Please Maximum 150 length",
            },
            shipping_address_2: {
                minlength: "Please Minimum 7 length",
                maxlength: "Please Maximum 150 length",
            },
            shipping_state: {
                required: "Please Select State",
            },
            shipping_city: {
                required: "Please Enter Your Address",
                minlength: "Please Minimum 7 length",
                maxlength: "Please Maximum 10 length",
            },
            shipping_zip: {
                required: "Please Enter Your City/Town Postal Code",
                minlength: "Please Minimum 6 length",
                maxlength: "Please Maximum 6 length",
                digits: "Please Enter Only 6 Digits",
            },
        }
    });
    //End
    //User Account Details Validation
    $("#UseraccountDetailsValidation").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
            },
            last_name: {
                required: true,
                minlength: 3,
            },
            email: {
                required: true,
                email: true
            },
        },
        messages: {
            name: {
                required: "Please Enter Your Name",
                minlength: "Please Minimum 3 length",
            },
            last_name: {
                required: "Please Enter Your Last Name",
                minlength: "Please Minimum 3 length",
            },
            email: {
                required: "Please Enter Your Email",
            },
        }
    });
    //Change Password Validation
    var value = $("#new_password").val();
    $.validator.addMethod("checklower", function(value) {
        return /[a-z]/.test(value);
    });
    $.validator.addMethod("checkupper", function(value) {
        return /[A-Z]/.test(value);
    });
    $.validator.addMethod("checkdigit", function(value) {
        return /[0-9]/.test(value);
    });
    $.validator.addMethod("pwcheck", function(value) {
        return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) && /[a-z]/.test(value) && /\d/.test(value) && /[A-Z]/.test(value);
    });
    $("#UserChangePasswordValidation").validate({
        rules: {
            old_password: {
                required: true,
            },
            new_password: {
                minlength: 7,
                maxlength: 30,
                required: true,
                pwcheck: true,
                checklower: true,
                checkupper: true,
                checkdigit: true
            },
            confirm_password: {
                equalTo: "#new_password",
            },
        },
        messages: {
            old_password: {
                required: "Please Enter Your Old Password",
            },
            new_password: {
                pwcheck: "Password is not strong enough",
                required: "Please Enter Password",
                minlength: "Please Minimum 7 length",
                maxlength: "Please Maximum 30 length",
                checklower: "Please Enter At least 1 lower Case",
                checkupper: "Please Enter At least 1 Upper Case",
                checkdigit: "Please Enter At least 1 Digit",
            },
        }
    });
    //End
});