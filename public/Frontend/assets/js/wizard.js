searchVisible = 0;
transparent = true;

$(document).ready(function() {
    /*  Activate the tooltips      */
    $('[rel="tooltip"]').tooltip();

    $('.wizard-card').bootstrapWizard({
        'tabClass': 'nav nav-pills',
        'nextSelector': '.btn-next',
        'previousSelector': '.btn-previous',
        onInit: function(tab, navigation, index) {

            //check number of tabs and fill the entire row
            var $total = navigation.find('li').length;
            $width = 100 / $total;

            $display_width = $(document).width();

            if ($display_width < 600 && $total > 3) {
                $width = 50;
            }

            navigation.find('li').css('width', $width + '%');

        },
        onNext: function(tab, navigation, index) {
            var item_title = document.getElementById('item_title').value;
            var item_condition = document.getElementById('item_condition').value;
            var item_category = document.getElementById('item_category').value;
            var item_sub_category = document.getElementById('item_sub_category').value;
            var item_sale_type = document.getElementById('item_sale_type').value;


            if (index == 1) {
                // return validateFirstStep();
                // var fileInput = document.getElementById('thumbnail');
                // var files = fileInput.files;

                // if (files.length > 0) {

                // } else {
                //     toastrError('Select Thumbnail For Ad.', 'Required');
                //     return false;
                // }

                if (item_title == '') {
                    toastrError('Item Title Required', 'Required');
                    return false;
                }

                if (item_condition == '') {
                    toastrError('Select Item Condition', 'Required');
                    return false;
                }

                // if (item_category == '') {
                //     toastrError('Select Item Category', 'Required');
                //     return false;
                // }

                // if (item_sub_category == '') {
                //     toastrError('Select Item SubCategory', 'Required');
                //     return false;
                // }

                if (item_sale_type == '') {
                    toastrError('Select Item Sale Format', 'Required');
                    return false;
                }

                if (item_condition != 'new') {
                    document.getElementById('item_condition_description').style.display = 'block';
                } else {
                    document.getElementById('item_condition_description').style.display = 'none';
                }



                if (item_sale_type == 'auction') {
                    document.getElementById('quantity').readOnly = true;

                    document.getElementById('auction_bidding_price').style.display = 'block';

                    document.getElementById('auction_bidding_duration').style.display = 'block';
                }

                if (item_sale_type == 'buy_it_now') {
                    document.getElementById('quantity').readOnly = false;

                    document.getElementById('auction_bidding_price').style.display = 'none';

                    document.getElementById('auction_bidding_duration').style.display = 'none';
                }

                return validateFirstStep();
            } else if (index == 2) {
                // return validateSecondStep();
                if (item_condition != 'new') {
                    var condition_description = document.getElementById('condition_description').value;

                    if (condition_description == '') {
                        toastrError('Enter Condition Description', 'Required');
                        return false;
                    }
                }

                var quantity = document.getElementById('quantity').value;
                var buy_it_now_price = document.getElementById('buy_it_now_price').value;

                if (quantity == '' || quantity == 0) {
                    toastrError('Item Quantity', 'Required');
                    return false;
                }

                if (buy_it_now_price == '' || buy_it_now_price == 0) {
                    toastrError('Item Sale Price', 'Required');
                    return false;
                }



                if (item_sale_type == 'aution') {
                    var start_bid_price = document.getElementById('start_bid_price').value;
                    var auction_duration = document.getElementById('auction_duration').value;

                    if (start_bid_price == '' || start_bid_price == 0) {
                        toastrError('Bid Price Required', 'Required');
                        return false;
                    }

                    if (auction_duration == '') {
                        toastrError('Selection Auction Duration', 'Required');
                        return false;
                    }
                }

                var shipping_price = document.getElementById('shipping_price').value;
                if (shipping_price != '' && shipping_price > 0) {
                    var shipping_duration = document.getElementById('shipping_duration').value;

                    if (shipping_duration == '') {
                        toastrError('Select Shipping Duration', 'Required');
                        return false;
                    }
                }
                return validateSecondStep();
            } else if (index == 3) {

                const container = document.getElementById('additionalDetailsContainer');
                const rows = container.getElementsByClassName('row');
                for (let i = 0; i < rows.length; i++) {
                    const titleField = rows[i].querySelector('[id^=item_additional_information_title_]');
                    const valueField = rows[i].querySelector('[id^=item_additional_information_value_]');

                    if (titleField && titleField.value.trim() === '') {
                        toastr.error('Title field cannot be empty', 'Required');
                        return false;
                    }

                    if (valueField && valueField.value.trim() === '') {
                        toastr.error('Value field cannot be empty', 'Required');
                        return false;
                    }
                }

                return validateThirdStep();
            } //etc.

        },
        onTabClick: function(tab, navigation, index) {
            // Disable the posibility to click on tabs
            return false;
        },
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index + 1;

            var wizard = navigation.closest('.wizard-card');

            // If it's the last tab then hide the last button and show the finish instead
            if ($current >= $total) {
                $(wizard).find('.btn-next').hide();
                $(wizard).find('.btn-finish').show();
            } else {
                $(wizard).find('.btn-next').show();
                $(wizard).find('.btn-finish').hide();
            }
        }
    });

    // Prepare the preview for profile picture
    $("#wizard-picture0").change(function() {
        readURL(this, 0);
        toastrError('wiz 0', 'error');
    });

    $("#wizard-picture1").change(function() {
        readURL(this, 1);
        toastrError('wiz 11', 'error');


    });

    $("#wizard-picture2").change(function() {
        try {
            readURL(this, 2);
        } catch (error) {
            console.error('Error reading file:', error);
            toastr.error('An error occurred while reading the file.', 'Error');
        }
        toastrError('wiz 1', 'error');


    });

    $("#wizard-picture3").change(function() {
        readURL(this, 3);
        toastrError('wiz 2', 'error');

    });

    $("#wizard-picture4").change(function() {
        readURL(this, 4);
        toastrError('wiz 3', 'error');

    });

    $("#wizard-picture5").change(function() {
        readURL(this, 5);
    });

    $("#wizard-picture6").change(function() {
        readURL(this, 6);
    });

    $("#wizard-picture8").change(function() {
        readURL(this, 8);
    });

    $("#wizard-picture9").change(function() {
        readURL(this, 9);
    });

    $("#wizard-picture10").change(function() {
        readURL(this, 10);
    });

    $("#wizard-picture11").change(function() {
        readURL(this, 11);
    });

    $("#wizard-picture12").change(function() {
        readURL(this, 12);
    });

    $("#wizard-picture13").change(function() {
        readURL(this, 13);
    });

    $("#wizard-picture14").change(function() {
        readURL(this, 14);
    });

    $("#wizard-picture15").change(function() {
        readURL(this, 15);
    });

    $("#wizard-picture16").change(function() {
        readURL(this, 16);
    });

    $("#wizard-picture17").change(function() {
        readURL(this, 17);
    });

    $("#wizard-picture18").change(function() {
        readURL(this, 18);
    });

    $("#wizard-picture19").change(function() {
        readURL(this, 19);
    });

    $("#wizard-picture20").change(function() {
        readURL(this, 20);
    });



    $('[data-toggle="wizard-radio"]').click(function() {
        wizard = $(this).closest('.wizard-card');
        wizard.find('[data-toggle="wizard-radio"]').removeClass('active');
        $(this).addClass('active');
        $(wizard).find('[type="radio"]').removeAttr('checked');
        $(this).find('[type="radio"]').attr('checked', 'true');
    });

    $('[data-toggle="wizard-checkbox"]').click(function() {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $(this).find('[type="checkbox"]').removeAttr('checked');
        } else {
            $(this).addClass('active');
            $(this).find('[type="checkbox"]').attr('checked', 'true');
        }
    });

    $height = $(document).height();
    $('.set-full-height').css('height', $height);


});

function validateFirstStep() {

    $(".wizard-card form").validate({
        rules: {
            firstname: "required",
            lastname: "required",
            email: {
                required: true,
                email: true
            }

            /*  other possible input validations
             ,username: {
             required: true,
             minlength: 2
             },
             password: {
             required: true,
             minlength: 5
             },
             confirm_password: {
             required: true,
             minlength: 5,
             equalTo: "#password"
             },

             topic: {
             required: "#newsletter:checked",
             minlength: 2
             },
             agree: "required"
             */

        },
        messages: {
            firstname: "Please enter your First Name",
            lastname: "Please enter your Last Name",
            email: "Please enter a valid email address",
            /*   other posible validation messages
             username: {
             required: "Please enter a username",
             minlength: "Your username must consist of at least 2 characters"
             },
             password: {
             required: "Please provide a password",
             minlength: "Your password must be at least 5 characters long"
             },
             confirm_password: {
             required: "Please provide a password",
             minlength: "Your password must be at least 5 characters long",
             equalTo: "Please enter the same password as above"
             },
             email: "Please enter a valid email address",
             agree: "Please accept our policy",
             topic: "Please select at least 2 topics"
             */

        }
    });

    if (!$(".wizard-card form").valid()) {
        //form is invalid
        return false;
    }

    return true;
}

function validateSecondStep() {

    //code here for second step
    $(".wizard-card form").validate({
        rules: {},
        messages: {}
    });

    if (!$(".wizard-card form").valid()) {
        console.log('invalid');
        return false;
    }
    return true;

}

function validateThirdStep() {
    //code here for third step


}

//Function to show image before upload

function readURL(input, idNum) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        // var wizardPicturePreview = '#wizardPicturePreview';
        // if (idNum > 0) {
        //     wizardPicturePreview = '#wizardPicturePreview' + idNum;
        // }
        reader.onload = function(e) {
            $('#wizardPicturePreview' + idNum).attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}