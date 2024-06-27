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
// end add to cart



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
    // end add bidding



    // delete/remove from cart
    $('.cart-delete-btn').click(function() {
        var cartItem = $(this).closest('.cart-item');
        var cartId = cartItem.data('cart-id');
        var _token = $('#_token').val();

        $.ajax({
            url: `/remove-item-from-cart/${cartId}`,
            type: 'POST',
            data: {
                _token: _token
            },
            success: function(response) {
                if (response[1] === 200) {
                    toastrSuccess(response[3], 'Cart Alert');
                    cartItem.remove();
                } else {
                    toastrError(response[3], 'Error');
                }
            },
            error: function(xhr, status, error) {
                toastrError('Something went wrong', 'Error');
            }
        });
    });
    // end remove from cart



    // update quantity cart
    // Handle quantity change
    $('.cart-quantity-btn').click(function() {
        var cartItem = $(this).closest('.cart-item');
        var cartId = cartItem.data('cart-id');
        var action = $(this).data('action');
        var quantityInput = cartItem.find('.quantity-input');
        var currentQuantity = parseInt(quantityInput.val());
        var _token = $('#_token').val();

        // Calculate new quantity
        var newQuantity = (action === 'plus') ? currentQuantity + 1 : currentQuantity - 1;
        if (newQuantity < 1) return;

        $.ajax({
            url: `/update-cart-quantity/${cartId}/${action}`,
            type: 'POST',
            data: {
                _token: _token,
                quantity: newQuantity
            },
            success: function(response) {
                if (response[1] === 200) {
                    quantityInput.val(newQuantity);

                    var buy_it_now_price = cartItem.find('.buy_it_now_price');
                    var newTotalAmount = parseInt(buy_it_now_price.val()) * parseInt(newQuantity);
                    cartItem.find('.amount').text(newTotalAmount);


                    toastrSuccess(response[3], 'Cart Alert');
                } else {
                    toastrError(response[3], 'Error');
                }
            },
            error: function(xhr, status, error) {
                toastrError('Something Went Wrong', 'Error');
                console.error('Error updating cart quantity:', error);
            }
        });
    });
    // end update quantity cart





});