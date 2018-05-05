require('../scss/tweet-board.scss');

const $ = require('jquery');
window.$ = $;
window.jQuery = $;

const API_TWEET_LIKES = '/api/tweet_likes';
const API_TWEET_MESSAGES = '/api/tweet_messages/';
const CLASS_JS_LIKES_COUNT = '.js-likesMessageId-';

$(document).ready(
    function () {
        $('.js-like').click(function() {
            var messageId = $(this).data('id');
            $(CLASS_JS_LIKES_COUNT + messageId).css('visibility', 'hidden');
            $.ajax({
                url: API_TWEET_LIKES,
                type: "POST",
                dataType: "json",
                contentType: "application/json; charset=utf-8",
                data: '{"Message": "/api/tweet_messages/' + messageId + '"}',
                success: function() {
                    updateLikesCount(messageId);

                },
            })
        });
    }
);


updateLikesCount = function(messageId) {
    $.ajax({
        url: API_TWEET_MESSAGES + messageId,
        type: "GET",
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        success: function(result) {
            var total = result.likes.length;
            $(CLASS_JS_LIKES_COUNT + messageId).html(total);
            $(CLASS_JS_LIKES_COUNT + messageId).css('visibility', 'visible');
        }
    });
}