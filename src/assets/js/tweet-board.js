require('../scss/tweet-board.scss');

const $ = require('jquery');
window.$ = $;
window.jQuery = $;

$(document).ready(
    function () {
        $('.js-like').click(function() {
            var el = $(this);
            var messageId = el.data('id');
            $.ajax({
                url: "/api/tweet_likes",
                type: "POST",
                dataType: "json",
                contentType: "application/json; charset=utf-8",
                data: '{"Message": "/api/tweet_messages/' + messageId + '"}',
                success: function(result) {
                    getLikesCount(el, messageId);
                }
            })
        });
    }
);


getLikesCount = function(el, messageId) {
    $.ajax({
        url: "/api/tweet_messages/" + messageId,
        type: "GET",
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        success: function(result) {
            var totalLikes = result.likes.length;
            $(el).closest('.js-TweetMessage-Likes').find('.js-likesCount').html(totalLikes);
        }
    });
}