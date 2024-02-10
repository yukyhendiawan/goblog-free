(function ($) {
    // Close notice
    $(document).on('click', '.notice-goblog-free button.notice-dismiss', function () {
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'post',
            data: {
                action: 'action-notice-dismiss',
            },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });
}(jQuery));
