require('../scss/tweet-board.scss');

const $ = require('jquery');
window.$ = $;
window.jQuery = $;

$(document).ready(
    function () {
        $('.js-like').click(function() {
            $(this).closest('.TweetMessage-Likes').find('.js-likesCount').html('1000');
            // $.ajax({
            //     url: "/like",
            //     context: document.body
            // }).success(function(response) {
            //     $('.js-likesCount').innerText(response.likes);
            // });
        });
    }
);
