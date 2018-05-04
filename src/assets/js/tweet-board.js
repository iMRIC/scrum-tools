require('../scss/tweet-board.scss');

const $ = require('jquery');
window.$ = $;
window.jQuery = $;

$(document).ready(
    function () {
        $('.js-like').click(function() {
            var messageId = $(this).data('id');
            $.ajax({
                url: "/api/tweet_likes",
                type: "POST",
                dataType: "json",
                contentType: "application/json; charset=utf-8",
                data: '{"Message": "/api/tweet_messages/' + messageId + '"}'
            });
        });
    }
);
