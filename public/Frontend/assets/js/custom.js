// toastr message function
// errorMessage
function toastrError(message, title = null) {
    toastr.options.escapeHtml = true;
    toastr.options.progressBar = true;
    toastr.options.closeButton = true;

    toastr.error(message, title);
}

// successMessage
function toastrSuccess(message, title = 'Notification') {
    toastr.options.escapeHtml = true;
    toastr.options.progressBar = true;
    toastr.options.closeButton = true;

    toastr.success(message, title);
}




// addTOCart
$(document).ready(function() {
    $('#addItemToCart').click(function(event) {
        event.preventDefault();
        var itemId = $('#item_id').val();
        var _token = $('#_token').val();

        $('#addItemToCart').attr('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Adding...');
        $.ajax({
            url: `/add-to-cart/${itemId}`,
            type: 'POST',
            data: { item_id: itemId, _token: _token },
            success: function(response) {
                if (response[0] === 'status' && response[1] === 200) {
                    toastrSuccess(response[3], 'Cart Alert');
                } else {
                    toastrError(response[3], 'Error');
                }

                $('#addItemToCart').attr('disabled', false).html('Add to Cart');
            },
            error: function(xhr, status, error) {
                toastrError('something wents wrong', 'Request Fail');
            }
        });
    });
});

// addBidding
$(document).ready(function() {
    $('#addItemBidding').click(function(event) {
        event.preventDefault();
        var itemId = $('#item_id').val();
        var bid_amount = $('#bid_amount').val();
        var optional_message = $('#optional_message').val();
        var _token = $('#_token').val();

        $('#addItemBidding').attr('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Sending...');
        $.ajax({
            url: `/add-bid/${itemId}`,
            type: 'POST',
            data: { item_id: itemId, bid_amount: bid_amount, optional_message: optional_message, _token: _token },
            success: function(response) {
                if (response[0] === 'status' && response[1] === 200) {
                    toastrSuccess(response[3], 'Offer Sent');
                } else {
                    toastrError(response[3], 'Error');
                }

                $('#addItemBidding').attr('disabled', false).html('Send Offer');
                if (response[0] === 'status' && response[1] === 202) {
                    return false;
                }

                $('#bid_amount').val('');
                $('#optional_message').val('');

                var modal = document.getElementById("createOfferModal");
                modal.classList.remove('show');
                modal.style.display = "none";

            },
            error: function(xhr, status, error) {
                toastrError('something wents wrong', 'Request Fail');
            }
        });
    });
});
