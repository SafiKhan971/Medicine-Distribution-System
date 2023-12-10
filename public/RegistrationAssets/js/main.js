(function ($) {

    var form = $("#signup-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
        rules: {
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            user_name: {
                required: true,
            },
            password: {
                required: true,
            },
            email: {
                required: true,
            },
            phone: {
                required: true,
            },
            address: {
                required: true,
            },
            employee_id: {
                required: true,
            },
            designation: {
                required: true,
            },
            department: {
                required: true,
            },
            work_hours: {
                required: true,
            },
            bank_name: {
                required: true,
            },
            holder_name: {
                required: true,
            },
            card_number: {
                required: true,
                number: true,
            },
            cvc: {
                required: true,
            },
        },
        onfocusout: function (element) {
            $(element).valid();
        },
        highlight: function (element, errorClass, validClass) {
            $(element.form).find('.actions').addClass('form-error');
            $(element).removeClass('valid');
            $(element).addClass('error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element.form).find('.actions').removeClass('form-error');
            $(element).removeClass('error');
            $(element).addClass('valid');
        }
    });
    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        labels: {
            previous: 'Previous',
            next: 'Next',
            finish: 'Submit',
            current: ''
        },
        titleTemplate: '<span class="title">#title#</span>',
        onStepChanging: function (event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex) {
            // // Serialize the form data except for file inputs
            // var formData = form.find(':input:not(:file)').serialize();

            // // Extract file names and append them to the serialized data
            // var profilePictureInput = $('#profile_picture')[0];
            // var profilePicture = profilePictureInput.files[0];

            // if (profilePicture) {
            //     formData += '&' + $.param({ 'profile_picture': profilePicture.name, 'profile_picture_file': profilePicture });
            // }

            // var medicalLicensePictureInput = $('#medical_license_picture')[0];
            // var medicalLicensePicture = medicalLicensePictureInput.files[0];

            // if (medicalLicensePicture) {
            //     formData += '&' + $.param({ 'medical_license_picture': medicalLicensePicture.name, 'medical_license_picture': medicalLicensePicture });
            // }

            // Create a new FormData object
            var formData = new FormData();

            // Specify the input names to retrieve values
            var inputNames = [
                'full_name', 'email', 'phone_no', 'nationality', 'birth_date', 'birth_month', 'birth_year', 'Gender',
                'medical_license_no', 'specialization', 'experience', 'board_certifications',
                'clinic_name', 'clinic_email', 'clinic_phone', 'clinic_address',
                'days_week', 'start_time', 'end_time'
            ];

            // Loop through the input names and append values to the FormData object
            inputNames.forEach(function (inputName) {
                formData.append(inputName, $('#' + inputName).val());
            });

            // Append the profile picture file to the FormData object
            var profilePictureInput = $('#profile_picture')[0];
            var profilePicture = profilePictureInput.files[0];

            if (profilePicture) {
                formData.append('profile_picture', profilePicture, profilePicture.name);
            }

            // Append the medical license picture file to the FormData object
            var medicalLicensePictureInput = $('#medical_license_picture')[0];
            var medicalLicensePicture = medicalLicensePictureInput.files[0];

            if (medicalLicensePicture) {
                formData.append('medical_license_picture', medicalLicensePicture, medicalLicensePicture.name);
            }

            // Display the FormData content
            // for (var pair of formData.entries()) {
            //     console.log("formData.append('" + pair[0] + "', '" + pair[1] + "');");
            // }

            toastr.options = {
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-bottom-right',
            };

            // alert(formData);

            // Perform AJAX request
            $.ajax({
                type: 'POST',
                url: 'registration', // Replace with your actual URL
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    // Handle success, e.g., show a success message
                    // alert('Form submitted successfully!');
                    toastr.success(response.message);
                    setTimeout(function () {
                        location.href = "register";
                    }, 5000)
                },
                error: function (xhr, status, error) {
                    // Handle errors, e.g., show an error message
                    // console.error('Error submitting form: ' + error);
                    toastr.error('Error submitting form: ' + error);
                }
            });
        },
        // onInit : function (event, currentIndex) {
        //     event.append('demo');
        // }
    });

    jQuery.extend(jQuery.validator.messages, {
        required: "",
        remote: "",
        email: "",
        url: "",
        date: "",
        dateISO: "",
        number: "",
        digits: "",
        creditcard: "",
        equalTo: ""
    });

    $('#gender').parent().append('<ul class="list-item" id="newgender" name="gender"></ul>');
    $('#gender option').each(function () {
        $('#newgender').append('<li value="' + $(this).val() + '">' + $(this).text() + '</li>');
    });
    $('#gender').remove();
    $('#newgender').attr('id', 'gender');
    $('#gender li').first().addClass('init');
    $("#gender").on("click", ".init", function () {
        $(this).closest("#gender").children('li:not(.init)').toggle();
    });

    var allOptions = $("#gender").children('li:not(.init)');
    $("#gender").on("click", "li:not(.init)", function () {
        allOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#gender").children('.init').html($(this).html());
        allOptions.toggle();
    });

    $('#country').parent().append('<ul class="list-item" id="newcountry" name="country"></ul>');
    $('#country option').each(function () {
        $('#newcountry').append('<li value="' + $(this).val() + '">' + $(this).text() + '</li>');
    });
    $('#country').remove();
    $('#newcountry').attr('id', 'country');
    $('#country li').first().addClass('init');
    $("#country").on("click", ".init", function () {
        $(this).closest("#country").children('li:not(.init)').toggle();
    });

    var CountryOptions = $("#country").children('li:not(.init)');
    $("#country").on("click", "li:not(.init)", function () {
        CountryOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#country").children('.init').html($(this).html());
        CountryOptions.toggle();
    });

    $('#payment_type').parent().append('<ul  class="list-item" id="newpayment_type" name="payment_type"></ul>');
    $('#payment_type option').each(function () {
        $('#newpayment_type').append('<li value="' + $(this).val() + '">' + $(this).text() + '</li>');
    });
    $('#payment_type').remove();
    $('#newpayment_type').attr('id', 'payment_type');
    $('#payment_type li').first().addClass('init');
    $("#payment_type").on("click", ".init", function () {
        $(this).closest("#payment_type").children('li:not(.init)').toggle();
    });

    var PaymentsOptions = $("#payment_type").children('li:not(.init)');
    $("#payment_type").on("click", "li:not(.init)", function () {
        PaymentsOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#payment_type").children('.init').html($(this).html());
        PaymentsOptions.toggle();
    });

    $.dobPicker({
        daySelector: '#birth_date',
        monthSelector: '#birth_month',
        yearSelector: '#birth_year',
        dayDefault: 'Day',
        monthDefault: 'Month',
        yearDefault: 'Year',
        minimumAge: 0,
        maximumAge: 120
    });

    $.dobPicker({
        daySelector: '#expiry_date',
        monthSelector: '#expiry_month',
        yearSelector: '#expiry_year',
        dayDefault: 'Day',
        monthDefault: 'Month',
        yearDefault: 'Year',
        minimumAge: 0,
        maximumAge: 120
    });

})(jQuery);
