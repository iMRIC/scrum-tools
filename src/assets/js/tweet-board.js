require('../scss/tweet-board.scss');

const $ = require('jquery');
window.$ = $;
window.jQuery = $;

const API_TWEET_LIKES = '/api/tweet_likes';
const API_TWEET_MESSAGES = '/api/tweet_messages';
const API_SPRINT = '/api/sprints';

const IDENTIFIER_JS_LIKES_COUNT = '.js-likesMessageId-';
const IDENTIFIER_JS_BOARD = '#js-board';

$(document).ready(
    function () {
        $(IDENTIFIER_JS_BOARD).fadeIn(1000);

        $('.js-tweetForm').submit(function() {
            var message = $('.js-tweetForm-Message').val();
            var sprint = $('.js-tweetForm-Sprint').val();
            $.ajax({
                url: API_TWEET_MESSAGES,
                type: "POST",
                dataType: "json",
                contentType: "application/json; charset=utf-8",
                data: '{"message": "' + message + '", "sprint":"' + API_SPRINT + '/' + sprint + '" }',
                success: function() {
                    location.reload();

                },
            });
            /** global: event */
            event.preventDefault();
        });

        $('.js-like').click(function() {
            var messageId = $(this).data('id');
            var likesCount = $(IDENTIFIER_JS_LIKES_COUNT + messageId).html();
            $(IDENTIFIER_JS_LIKES_COUNT + messageId).html(parseInt(likesCount) + 1);
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


window.updateLikesCount = function(messageId) {
    $.ajax({
        url: API_TWEET_MESSAGES + '/' + messageId,
        type: "GET",
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        success: function(result) {
            var total = result.likes.length;
            $(IDENTIFIER_JS_LIKES_COUNT + messageId).html(total);
        }
    });
}
