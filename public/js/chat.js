//obrir i tancar el chat
$(document).ready(function () {
    var $chatbox = $('.chatbox'),
        $chatboxTitle = $('.chatbox__title'),
        $chatboxTitleClose = $('.chatbox__title__close'),
        $chatboxCredentials = $('.chatbox__credentials');
    $chatboxTitle.on('click', function () {
        $chatbox.toggleClass('chatbox--tray');
    });
    $chatboxTitleClose.on('click', function (e) {
        e.stopPropagation();
        $chatbox.addClass('chatbox--closed');
    });
    $chatbox.on('transitionend', function () {
        if ($chatbox.hasClass('chatbox--closed')) $chatbox.remove();
    });
    $chatboxCredentials.on('submit', function (e) {
        e.preventDefault();
        $chatbox.removeClass('chatbox--empty');
    });
});
//fi obrir i tancar el chat
//
//
$(document).on('keydown', 'chatbox__message', function (e) {
    var msg = $(this).val();
    var element = $(this);
    if (!msg == '' && e.keyCode == 13 && !e.shiftKey) {
        $('.chatbox__body').append('<div class="chatbox__body__message chatbox__body__message--left"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg" alt="Picture"><p>' + msg + '</p></div>');
        element.val('');
    }
});
