"use strict";

$('ul.slimmenu').slimmenu({
    resizeWidth: '860',
    collapserTitle: ' ',
    animSpeed: 250,
    indentChildren: true,
    childrenIndenter: ''
});

$('.btn').button();

$("[rel='tooltip']").tooltip();

$('.form-group').each(function () {
    var self = $(this),
        input = self.find('input');

    input.focus(function () {
        self.addClass('form-group-focus');
    });

    input.blur(function () {
        if (input.val()) {
            self.addClass('form-group-filled');
        } else {
            self.removeClass('form-group-filled');
        }
        self.removeClass('form-group-focus');
    });
});

$('.typeahead').typeahead({
    hint: true,
    highlight: true,
    minLength: 3,
    limit: 8
}, {
    source: function (q, cb) {
        return $.ajax({
            dataType: 'json',
            type: 'get',
            url: 'http://gd.geobytes.com/AutoCompleteCity?callback=?&q=' + q,
            chache: false,
            success: function (data) {
                var result = [];
                $.each(data, function (index, val) {
                    result.push({
                        value: val
                    });
                });
                cb(result);
            }
        });
    }
});


$('input.date-pick, .input-daterange, .date-pick-inline').datepicker({
    todayHighlight: true
});

$('input.date-pick, .input-daterange input[name="start"]').datepicker('setDate', '+1d');
$('.input-daterange input.date-optional').datepicker({ clearBtn: true });
$('.input-daterange input[name="end"]').datepicker('setDate', '+7d');

$('input.time-pick').timepicker({
    minuteStep: 15,
    showInpunts: false
});

$('input.date-pick-years').datepicker({
    startView: 2
});

setfloatinglabelSelect();

$('.booking-item-price-calc .checkbox label').click(function () {
    var checkbox = $(this).find('input'),
        // checked = $(checkboxDiv).hasClass('checked'),
        checked = $(checkbox).prop('checked'),
        price = parseInt($(this).find('span.pull-right').html().replace('$', '')),
        eqPrice = $('#car-equipment-total'),
        tPrice = $('#car-total'),
        eqPriceInt = parseInt(eqPrice.attr('data-value')),
        tPriceInt = parseInt(tPrice.attr('data-value')),
        value,
        animateInt = function (val, el, plus) {
            value = function () {
                if (plus) {
                    return el.attr('data-value', val + price);
                } else {
                    return el.attr('data-value', val - price);
                }
            };
            return $({
                val: val
            }).animate({
                val: parseInt(value().attr('data-value'))
            }, {
                duration: 500,
                easing: 'swing',
                step: function () {
                    if (plus) {
                        el.text(Math.ceil(this.val));
                    } else {
                        el.text(Math.floor(this.val));
                    }
                }
            });
        };
    if (!checked) {
        animateInt(eqPriceInt, eqPrice, true);
        animateInt(tPriceInt, tPrice, true);
    } else {
        animateInt(eqPriceInt, eqPrice, false);
        animateInt(tPriceInt, tPrice, false);
    }
});

$('div.bg-parallax').each(function () {
    var $obj = $(this);
    if ($(window).width() > 992) {
        $(window).scroll(function () {
            var animSpeed;
            if ($obj.hasClass('bg-blur')) {
                animSpeed = 10;
            } else {
                animSpeed = 15;
            }
            var yPos = -($(window).scrollTop() / animSpeed);
            var bgpos = '50% ' + yPos + 'px';
            $obj.css('background-position', bgpos);

        });
    }
});


$(document).ready(function () {
    scrolbar();
    setFooter();

    // Owl Carousel
    var owlCarousel = $('#owl-carousel'),
        owlItems = owlCarousel.attr('data-items'),
        owlCarouselSlider = $('#owl-carousel-slider'),
        owlNav = owlCarouselSlider.attr('data-nav');
    // owlSliderPagination = owlCarouselSlider.attr('data-pagination');

    owlCarousel.owlCarousel({
        items: owlItems,
        navigation: true,
        navigationText: ['', '']
    });

    owlCarouselSlider.owlCarousel({
        slideSpeed: 300,
        paginationSpeed: 400,
        // pagination: owlSliderPagination,
        singleItem: true,
        navigation: true,
        navigationText: ['', ''],
        transitionStyle: 'fade',
        autoPlay: 4500
    });


    setFooter();
    multiRouteEnabler();

});
setActiveNav();
$('.nav-drop').dropit();


$("#price-slider").ionRangeSlider({
    min: 130,
    max: 575,
    type: 'double',
    prefix: "$",
    // maxPostfix: "+",
    prettify: false,
    hasGrid: true
});

setCheck();


$('.booking-item-review-expand').click(function (event) {
    console.log('baz');
    var parent = $(this).parent('.booking-item-review-content');
    if (parent.hasClass('expanded')) {
        parent.removeClass('expanded');
    } else {
        parent.addClass('expanded');
    }
});


$('.stats-list-select > li > .booking-item-rating-stars > li').each(function () {
    var list = $(this).parent(),
        listItems = list.children(),
        itemIndex = $(this).index();

    $(this).hover(function () {
        for (var i = 0; i < listItems.length; i++) {
            if (i <= itemIndex) {
                $(listItems[i]).addClass('hovered');
            } else {
                break;
            }
        }
        $(this).click(function () {
            for (var i = 0; i < listItems.length; i++) {
                if (i <= itemIndex) {
                    $(listItems[i]).addClass('selected');
                } else {
                    $(listItems[i]).removeClass('selected');
                }
            }
        });
    }, function () {
        listItems.removeClass('hovered');
    });
});

$(document).on('ifChecked', '.display-doc-fare', displayDocumentationCost);


$('#expander').live('click', function (event) {
    var bookingItem = $(this).closest(".booking-item");
    if (bookingItem.hasClass('active')) {
        bookingItem.removeClass('active');
        bookingItem.parent().removeClass('active');
        $(this).text('View Seat');
    } else {
        bookingItem.addClass('active');
        bookingItem.parent().addClass('active');
        bookingItem.delay(1500).queue(function () {
            bookingItem.addClass('viewed');

        });
        $(this).text('Hide Seat');
    }
    $("body").getNiceScroll().resize();
});

$('#completeSeatSelection').live('click', function (event) {
    var bookingItem = $(this).parents('.booking-item-details')
    var selectedSeat = bookingItem.find("#busSeat").attr("selectedseats");
    var dvBooking = bookingItem.find(".dvBooking");
    //var internationalPolicy = $('input[name=internationalFarePolicy]:checked').val();

    var isInternationalTrip = dvBooking.data("international-trip");
    var direction = dvBooking.data("booking-direction");
    var showReturn = dvBooking.data("show-return");
    var time = dvBooking.data("booking-time");
    var date = dvBooking.data("booking-date");
    var scheduleId = dvBooking.data("schedule-id");
    var routeDescription = dvBooking.data("route-description");
    var currentFare = dvBooking.data("current-fare");
    var percentDiscount = dvBooking.data("percent-discount");
    var docNoPassport = dvBooking.data("doc-no-passport");
    var docNoId = dvBooking.data("doc-no-id");
    var docVirginPassport = dvBooking.data("doc-virgin-passport");

    //if (isInternationalTrip === "True" & internationalPolicy === undefined) {
    //    showMessage("Validation Error", "This is an International trip. You must select a class of documentation.");
    //    return false;
    //}

    if (JSON.parse(selectedSeat).length === 0) {
        showMessage("Validation Error", "You must select at least a seat.");
        return false;
    }

    var interPolicySplit;

    if (direction === "leave") {
        $("#leaveScheduleId").val(scheduleId);
        $("#leaveTravelTime").val(time);
        $("#leaveTravelDate").val(date);
        $("#leaveSelectedSeat").val(JSON.parse(selectedSeat));
        $("#leaveRouteDescription").val(routeDescription);
        $("#leaveCurrentFare").val(currentFare);
        $("#leavePercentDiscount").val(percentDiscount);
        $("#leaveIsInternationalJourney").val(isInternationalTrip);

        if (isInternationalTrip === "True") {

            $("#leaveDocumentFareNoPassport").val(docNoPassport);
            $("#leaveDocumentFareNoId").val(docNoId);
            $("#leaveDocumentFareVirginPassport").val(docVirginPassport);
        }
    }
    else if (direction === "return") {
        $("#returnScheduleId").val(scheduleId);
        $("#returnTravelTime").val(time);
        $("#returnTravelDate").val(date);
        $("#returnSelectedSeat").val(JSON.parse(selectedSeat));
        $("#returnRouteDescription").val(routeDescription);
        $("#returnCurrentFare").val(currentFare);
        $("#returnPercentDiscount").val(percentDiscount);
        $("#returnIsInternationalJourney").val(isInternationalTrip);

        if (isInternationalTrip === "True") {

            $("#returnDocumentFareNoPassport").val(docNoPassport);
            $("#returnDocumentFareNoId").val(docNoId);
            $("#returnDocumentFareVirginPassport").val(docVirginPassport);
        }
        //if (isInternationalTrip === "True" & internationalPolicy === undefined) {
        //    showMessage("Validation Error", "This is an International trip. You must select a class of documentation.");
        //    return false;
        //}

        //if (isInternationalTrip === "True" && internationalPolicy.length > 0) {

        //    interPolicySplit = internationalPolicy.split(":")
        //    if (interPolicySplit.length > 1) {
        //        $("#leaveInternationalDocumentationCost").val(interPolicySplit[0])
        //        $("#leaveDocumenationType").val(interPolicySplit[1])
        //    }
        //}

    }
    if (showReturn === true) {

        $("#return").removeClass("hidden");
        $("#leave").addClass("hidden");
        setFooter();
        $("body").getNiceScroll().resize();
        return false;
    }
    else {
        var returnSeatString = $("#returnSelectedSeat").val();
        var leaveSeatString = $("#leaveSelectedSeat").val();
        var savedLeaveSeat = $("#leaveSelectedSeat").val().split(',');
        var savedReturnSeat = $("#returnSelectedSeat").val().split(',');
        var returnScheduleId = $("#returnScheduleId").val();
        //var leaveIsInternationalJourney = $("#leaveIsInternationalJourney").val();
        //var leaveInternationalDocumentationCost = $("#leaveInternationalDocumentationCost").val();
        //var leaveDocumenationType = $("#leaveDocumenationType").val();
        //var returnIsInternationalJourney = $("#returnIsInternationalJourney").val();
        //var returnInternationalDocumentationCost = $("#returnInternationalDocumentationCost").val();
        //var returnDocumenationType = $("#returnDocumenationType").val();

        if (leaveSeatString === "") {
            showMessage("Validation Error", "You must select at least a seat for your journey.");
            return false;
        }

        if (returnSeatString === "" & returnScheduleId !== "") {
            showMessage("Validation Error", "You must select at least a seat for your return journey.");
            return false;
        }

        //if (leaveIsInternationalJourney === "True" & (leaveInternationalDocumentationCost.length === 0 | leaveDocumenationType === "")) {
        //    showMessage("Validation Error", "This is an International Trip. You must select a documentation class");
        //    return false;
        //}

        //if (returnIsInternationalJourney === "True" & (returnInternationalDocumentationCost.length === 0 | returnDocumenationType === "")) {
        //    showMessage("Validation Error", "This is an International Trip. You must select a documentation class");
        //    return false;
        //}

        if (savedLeaveSeat.length !== savedReturnSeat.length & returnScheduleId !== "") {
            showMessage("Validation Error", "Your number of selected seat for your return journey does not match the number of selected seat for your journey going. Please review. You can skip the return journey, however, by clicking on the SKIP button.");
            return false;
        }
        else {

            submitFormReplaceForm("#seat-selection-form");
            return false;
        }

    }

});

$("#btnBookingBackToLeave").live("click", function (event) {
    $("#return").addClass("hidden");
    $("#leave").removeClass("hidden");
    //setFooter();
    $("body").getNiceScroll().resize();
});

$("#btnBookingReturnSkip").live("click", function (event) {
    $("#returnScheduleId").val("")
    $("#returnTravelTime").val("")
    $("#returnTravelDate").val("")
    $("#returnSelectedSeat").val("")
    $("#returnRouteDescription").val("")
    $("#returnCurrentFare").val("")
    $("#returnPercentDiscount").val("")

    submitFormReplaceForm("#seat-selection-form");

});


$("button[type=submit].use-ajax-submit-form-replace-form").live("click", function (event) {
    var $button = $(this);
    var $form = $button.closest("form");
    var valData = $form.serialize();
    var pathUrl = $form.attr('action');

    $.post(pathUrl, valData, function (data) {
        $('.replace-form').replaceWith(data);
        compileAngularElement("#busSeat");
        //showRemoveLoading();
        //loadTable();
    }).fail(function (xhr, textStatus, errorThrown) {

        //displayServerMessage("Error", xhr.responseText);
    });
});

$('.form-group-cc-number input').payment('formatCardNumber');
$('.form-group-cc-date input').payment('formatCardExpiry');
$('.form-group-cc-cvc input').payment('formatCardCVC');

$('.card-select > li').click(function () {
    self = this;
    $(self).addClass('card-item-selected');
    $(self).siblings('li').removeClass('card-item-selected');
    $('.form-group-cc-number input').click(function () {
        $(self).removeClass('card-item-selected');
    });
});

// Lightbox Submit form ajax
$('.open-popup-booking-modify').magnificPopup({
    midClick: true,
    callbacks: {
        open: function () {
            this.content.on('click.mycustomevent', '#btnModifyBooking', function (e) {
                e.preventDefault();
                submitFormReplaceForm("#booking-modify-form");
                //var myModule = angular.module('BusSeats', []);
                //$.get('../js/angularjs/bus-seats.html', function (d, s, j) {
                //    $("#busSeat").html(d);
                //    $compile($("#busSeat"))(scope);
                //    scope.$apply();
                //});

                //compileAngularElement("#busSeat");
                this.close();
                //Todo fix angualar reload
                //return false;
            });
        },
        close: function () {
            this.content.off('click.mycustomevent');
        }
    }
});

// Lighbox gallery
$('#popup-gallery').each(function () {
    $(this).magnificPopup({
        delegate: 'a.popup-gallery-image',
        type: 'image',
        gallery: {
            enabled: true
        }
    });
});

// Lighbox image
$('.popup-image').magnificPopup({
    type: 'image'
});

// Lighbox text
$('.popup-text').magnificPopup({
    removalDelay: 500,
    closeBtnInside: true,
    callbacks: {
        beforeOpen: function () {
            this.st.mainClass = this.st.el.attr('data-effect');
        }
    },
    midClick: true
});

// Lightbox iframe
$('.popup-iframe').magnificPopup({
    dispableOn: 700,
    type: 'iframe',
    removalDelay: 160,
    mainClass: 'mfp-fade',
    preloader: false
});


$('.form-group-select-plus').each(function () {
    var self = $(this),
        btnGroup = self.find('.btn-group').first(),
        select = self.find('select');
    btnGroup.children('label').last().click(function () {
        btnGroup.addClass('hidden');
        select.removeClass('hidden');
    });
});
// Responsive videos
$(document).ready(function () {
    $("body").fitVids();
});

$(function ($) {
    $("#twitter").tweet({
        username: "remtsoy", //!paste here your twitter username!
        count: 3
    });
});

$(function ($) {
    $("#twitter-ticker").tweet({
        username: "remtsoy", //!paste here your twitter username!
        page: 1,
        count: 20
    });
});

$(document).ready(function () {
    var ul = $('#twitter-ticker').find(".tweet-list");
    var ticker = function () {
        setTimeout(function () {
            ul.find('li:first').animate({
                marginTop: '-4.7em'
            }, 850, function () {
                $(this).detach().appendTo(ul).removeAttr('style');
            });
            ticker();
        }, 5000);
    };
    ticker();
});
$(function () {
    $('#ri-grid').gridrotator({
        rows: 4,
        columns: 8,
        animType: 'random',
        animSpeed: 1200,
        interval: 1200,
        step: 'random',
        preventClick: false,
        maxStep: 2,
        w992: {
            rows: 5,
            columns: 4
        },
        w768: {
            rows: 6,
            columns: 3
        },
        w480: {
            rows: 8,
            columns: 3
        },
        w320: {
            rows: 5,
            columns: 4
        },
        w240: {
            rows: 6,
            columns: 4
        }
    });

});


$(function () {
    $('#ri-grid-no-animation').gridrotator({
        rows: 4,
        columns: 8,
        slideshow: false,
        w1024: {
            rows: 4,
            columns: 6
        },
        w768: {
            rows: 3,
            columns: 3
        },
        w480: {
            rows: 4,
            columns: 4
        },
        w320: {
            rows: 5,
            columns: 4
        },
        w240: {
            rows: 6,
            columns: 4
        }
    });

});

var tid = setInterval(tagline_vertical_slide, 2500);

// vertical slide
function tagline_vertical_slide() {
    var curr = $("#tagline ul li.active");
    curr.removeClass("active").addClass("vs-out");
    setTimeout(function () {
        curr.removeClass("vs-out");
    }, 500);

    var nextTag = curr.next('li');
    if (!nextTag.length) {
        nextTag = $("#tagline ul li").first();
    }
    nextTag.addClass("active");
}

function abortTimer() { // to be called when you want to stop the timer
    clearInterval(tid);
}
