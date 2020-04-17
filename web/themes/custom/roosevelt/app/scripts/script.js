jQuery(document).ready(function($) {
    
    jQuery("header").stick_in_parent({
        offset_top: 0,
        spacer: false,
        recalc_every: false
    });

    { // Block scoping this whole shebang.
        var $img1 = $('.landing-lead-ImgInnerWrapper img'),
            $bg1 = $('<div/>', {
                style: 'background-image: url(' + $img1.attr('data-src') + ')',
                class: 'landing-leadBGreplace'
            })
        $img4 = $('.landing-story-ImgInnerWrapper img'),
            $bg4 = $('<div/>', {
                style: 'background-image: url(' + $img4.attr('data-src') + ')',
                class: 'landing-storyBGreplace'
            });

        enquire.register("screen and (min-width:960px)", {
            // Triggered when a media query matches.
            match: function() {
                $img1.replaceWith($bg1);
                $img4.replaceWith($bg4)
            },
            unmatch: function() {
                $bg1.replaceWith($img1);
                $bg4.replaceWith($img4)
            },
            setup: function() {
                $img1.attr("src", $img1.attr('data-src-mobile'));
            }

        });
    }
});
