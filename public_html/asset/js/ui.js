$(function () {

    $.fn.modal = function ($action) {
        switch ($action) {
            case "show":
                $(this).css('display', 'inline-block');
                break;
            case "hide":
                $(this).css('display', 'none');
                break;
        }
    }
})

$(document).on('click', '[data-dismiss="modal"]', function () {
    var data = $(this).data('dismiss');

    switch (data) {
        case "modal":
            $(this).parents(".modal").css("display", "none");
            break;
    }
})

$(document).on('click', '.menu .title a', function () {
    var submenu = $(this).parents(".menu").find(".submenu").length;

    if (submenu > 0) {
        $(this).parents(".menu").find(".submenu").css("display", "flex");
    }
    return false;
})