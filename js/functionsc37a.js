function multiRouteEnabler() {
    var multiRoute = $("#multi-route");

    if (multiRoute === undefined) {
        return;
    }
    multiRoute.css("float", "right");

    var imgParent = multiRoute.parent();
    var parentWidth = imgParent.width();

    //multiRoute.css("width", ((parentWidth / 4) + 'px'));

    var multiRouteHeight = multiRoute.height();
    var parentHeight = imgParent.height();

    multiRoute.css("margin-top", (parentHeight - multiRouteHeight) + "px");
}

function setCountDown() {
    $(".countdown").each(function () {
        var count = $(this);
        $(this).countdown({
            zeroCallback: function (options) {
                var newDate = new Date();
                newDate = newDate.setHours(newDate.getHours() + 130);

                $(count).attr("data-countdown", newDate);
                $(count).countdown({
                    unixFormat: true
                });
            }
        });
    });
}

function setActiveNav() {
    var curr = window.location.pathname;
    var nav = $("#slimmenu").find('a[href="' + curr + '"]');

    if (curr === "/") {
        nav.parent().addClass("active");
    } else
        nav.parentsUntil("#slimmenu", "li").addClass("active");
}

function scrolbar() {
    var nice = $("body").niceScroll({
        cursorcolor: "#000",
        cursorborder: "0px solid #fff",
        railpadding: {
            top: 0,
            right: 0,
            left: 0,
            bottom: 0
        },
        cursorwidth: "10px",
        cursorborderradius: "0px",
        cursoropacitymin: 0.2,
        cursoropacitymax: 0.8,
        boxzoom: true,
        horizrailenabled: false,
        zindex: 9999
    });
    $("body").niceScroll("div.table-container",
        {
            cursorwidth: "12px",
            horizrailenabled: true,
        });
}

function setfloatinglabelSelect() {
    if ($.isFunction($.fn.select2)) {
        $(".select2").select2({ width: 100 });
        $('b[role="presentation"]').hide();
        $(".select2-selection__arrow").append('<i class="fa fa-angle-down"></i>');
    }
}

function setFooter() {
    // footer always on bottom
    var docHeight = $(window).height();
    var footerHeight = $("#main-footer").height();
    var footerTop = $("#main-footer").position().top + footerHeight;
    var lowerMenuHeight = $("#fbaseone").height();

    if (footerTop < docHeight) {
        $("#main-footer").css("margin-top", (docHeight - footerTop) + "px");
        console.log("footer set");
    } else {
        console.log("footer not set");
    }

}

function showMessage(title, content, onClose) {

    //
    if (isJSON(content)) {
        var arr = $.parseJSON(content);

        var item = "<ul class='no-padding'>";
        for (key in arr) {
            item += "<li><b>" + key + "</b>:" + arr[key] + "</li>";
        }
        item += "</ul>";
        content = item;
    }
    $("#msg-dialog-header").text(title);
    $("#msg-dialog-content").html(content);

    $.magnificPopup.open({
        items: {
            src: "#msgDialog",
            type: "inline"
        },
        closeBtnInside: true,
        zoom: {
            enabled: false
        },
        callbacks: {
            close: onClose
        }
    });
}

function submitFormReplaceForm(formId) {
    //var $button = $(formId);
    var $form = $(formId); //$button.closest("form");
    var valData = $form.serialize();
    var pathUrl = $form.attr("action");

    $.post(pathUrl,
        valData,
        function (data) {
            $(".replace-form").replaceWith(data);
            $(".selectpicker").selectpicker("refresh");
            $("body").getNiceScroll().resize();
            setCheck();

        }).fail(function (xhr, textStatus, errorThrown) {
            showMessage("Validation Error", xhr.responseText);
        });
}

function isJSON(jsonString) {
    try {
        var o = JSON.parse(jsonString);

        // Handle non-exception-throwing cases:
        // Neither JSON.parse(false) or JSON.parse(1234) throw errors, hence the type-checking,
        // but... JSON.parse(null) returns null, and typeof null === "object",
        // so we must check for that, too. Thankfully, null is falsey, so this suffices:
        if (o && typeof o === "object") {
            return o;
        }
    } catch (e) {
    }

    return false;
}

function compileAngularElement(elSelector) {

    var elSelector = (typeof elSelector == "string") ? elSelector : null;
    // The new element to be added
    if (elSelector != null) {
        var $div = $(elSelector);

        // The parent of the new element
        var $target = $("[ng-app]");

        angular.element($target).injector().invoke([
            "$compile", function ($compile) {
                var $scope = angular.element($target).scope();
                $compile($div)($scope);
                // Finally, refresh the watch expressions in the new element
                $scope.$apply();
            }
        ]);
    }

}

function setCheck() {
    $(".i-check, .i-radio").iCheck({
        checkboxClass: "i-check",
        radioClass: "i-radio"
    });

}

var hangerSlideIndex = 0;

function carousel() {
    var i;
    var x = document.getElementsByClassName("hanger-slider");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    hangerSlideIndex++;
    if (hangerSlideIndex > x.length) {
        hangerSlideIndex = 1
    }
    x[hangerSlideIndex - 1].style.display = "block";
    setTimeout(carousel, 8000); // Change image every 2 seconds
}

function hangerCarousel() {
    var hangerSlideIndex = 0;
    //carousel();

}

function displayDocumentationCost() {
    var totalLeaveDocCost = 0, totalReturnDocCost = 0;
    $.each($("input.international-fare:checked"),
        function (index, fare) {
            totalLeaveDocCost = totalLeaveDocCost + parseFloat($(this).data("leave-fare-cost"));
            totalReturnDocCost = totalReturnDocCost + parseFloat($(this).data("return-fare-cost"));
        });

    var amountPayable = $(".amount-payable");
    var payable = parseFloat(amountPayable.data("original-amount"));

    if ($("#booking-summary").data("is-return") === "True") {
        var allDocCost = totalLeaveDocCost + totalReturnDocCost;
        $(".summary-doc-fare-total").html("&#x20a6;" + (allDocCost).toLocaleString("en-US"));
        amountPayable.html("&#x20a6;" + (allDocCost + payable).toLocaleString("en-US"));
    } else {
        $(".summary-doc-fare-total").html("&#x20a6;" + totalLeaveDocCost.toLocaleString("en-US"));
        amountPayable.html("&#x20a6;" + (totalLeaveDocCost + payable).toLocaleString("en-US"));
    }

    $(".summary-leave-doc-fare").html("&#x20a6;" + totalLeaveDocCost.toLocaleString("en-US"));
    $(".summary-return-doc-fare").html("&#x20a6;" + totalReturnDocCost.toLocaleString("en-US"));

}

function GetLocation() {
    var geoOption = {
        //enableHighAccuracy: true,
        timeout: 10000,
        maximumAge: 5 * 60 * 1000
    };
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(loadPosition, locationError, geoOption);
        $("#agentLocationMessage")
            .text("We are trying to get your location. Your browser might have a problem in reporting your location.");
    } else {
        $("#agentLocationMessage")
            .text("Your browser cannot report your location. We may not correctly determine your commission.");
    }
}

function loadPosition(position) {
    var coordinates = position.coords;
    $("#agentLocation").val(coordinates.latitude + "," + coordinates.longitude);
    $("#agentLocationMessage").text("");
}

function locationError(position) {
    switch (position.code) {
        case 0:
            $("#agentLocationMessage")
                .text(
                    "An unknown error occurred while getting your location. We may not correctly determine your commission.");
            break;
        case 1:
            $("#agentLocationMessage")
                .text(
                    "You refused to grant access to your location. We are not liable if your commission is less than what you should have earned.");
            break;
        case 2:
            $("#agentLocationMessage")
                .text("Sorry, we could not get your location. We may not correctly determine your commission.");
            break;
        case 3:
            $("#agentLocationMessage")
                .text(
                    "It took longer than expected while getting your location. We may not correctly determine your commission.");
            break;
        default:
            $("#agentLocationMessage").text("");
            break;
    }
}