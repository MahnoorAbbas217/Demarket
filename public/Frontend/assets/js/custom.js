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