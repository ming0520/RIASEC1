function hideAllInput() {
    $('.edit-user').hide();
}

$(document).ready(
    function() {
        hideAllInput();

        $('.edit-btn').click(
            function() {
                $(this).parents('tr').children().children('.edit-user').toggle(300);
                $(this).children().replaceWith('<span>Cancel</span>');
            }
        )

    }
)