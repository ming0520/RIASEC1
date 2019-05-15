var $regexname = /^([a-zA-Z]{3,16})$/;
var $regexid = /^(\d{3,16})$/;
var $regxemail = /^[a-z0-9](\.?[a-z0-9]){5,}@g(oogle)?mail\.com$/;
var $regxgender = /^(?:m|M|male|Male|f|F|female|Female|FEMALE|MALE)$/;


function hideAllInput() {
    $('.edit-user').hide();
    $('.update-btn').hide();
}
isCancel = false;
$(document).ready(
    function() {
        hideAllInput();

        $('.edit-btn').click(
            function() {
                $(this).parents('tr').children().children('.edit-user').toggle(300);
                if (isCancel == false) {
                    $(this).parents('tr').children().children('.del-btn').hide(300);
                    $(this).children().replaceWith('<span>Cancel</span>');
                    $(this).parents('tr').children().children('.update-btn').show(300);
                    isCancel = true;
                } else {
                    $(this).parents('tr').children().children('.del-btn').show(300);
                    $(this).parents('tr').children().children('.update-btn').hide(300);
                    $(this).children().replaceWith('<span>Edit</span>');
                    isCancel = false;
                }
            }
        )

        $('.update-btn').click(
            function() {
                // $(this).parents('tr').children('form').submit();
            }
        )

    }
)