/**
 * Created by andreysvetlichniy on 06.12.15.
 */
$(function() {
    $(".image-slider.rslides").responsiveSlides({
        auto: false,
        pager: true,
        nav: true,
        speed: 500,
        maxwidth: 801,
        maxheight: 400,
        namespace: "centered-btns"
    });
});