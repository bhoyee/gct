
<footer id="main-footer">
    <div class="hidden-xs hidden-sm">
        <div id="fbaseone" class="container">
            <div class="col-md-5 col-sm-4">
                <ul style="float:right; margin-top:1%">
                    <li> <a class="no-child" href="https://giddycruisetransportation.com">HOME</a> </li>
                    <li>
                        <a href="About.php">ABOUT US</a>
                    </li>
                    <li>  <a class="no-child" href="ticketpolicy.php">TICKET POLICY</a> </li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-4">
                <p align="center"><img src="img/new-skin/chisco_logo.png" width="150px"></p>
            </div>
            <div class="col-md-5 col-sm-4">
                <ul>
                    <li> <a href="faq.php">FAQs</a> </li>
                    <li> <a href="airporttrip.php">AIRPORT DROP OFF</a> </li>
                    <li> <a href="Charter.php">CHARTER BUS</a> </li>
                </ul>
            </div>
        </div>
    </div>



    <div class="container pt20">
        <div class="col-md-4 col-sm-12 col-xs-12">
            <h4>ABOUT Giddy Cruise Transport</h4>
            <p>
         As a brand, our reputation is built on our customer and client-focused approach. We take pride in providing our customers with a personalized experience, and providing the best customer service. Our goal is to become a prominent transportation business within the transportation industry.

            </p>
            <p class="pimg">
                <a href="https://www.facebook.com/Giddycruise"><img src="img/new-skin/fb.svg" width="40px"></a>
                <a href="https://twitter.com/giddycruise"><img src="img/new-skin/twitter.svg" width="40px"></a>
                <a href="https://www.instagram.com/giddycruisetransport"><img src="img/new-skin/ig.svg" width="40px"></a>
            </p>
        </div>
        <div class="col-md-2 col-sm-4 hidden-xs">
            <h4>SITE LINKS</h4>
            <ul>
                <!-- <li><a href="Careers.html">Career</a></li> -->
                <li><a href="Faq.php">FAQs</a></li>
                <li><a href="Contact.php">Contact us</a></li>
                <li><a href="ticketpolicy.php">Ticket Policy</a></li>
                <li><a href="#">Terms of use</a></li>

            </ul>
        </div>
        <div class="col-md-2 col-sm-4 hidden-xs ">
            <h4>COMPANY</h4>
            <ul>
                <li><a href="#/" target="_blank">Giddy Host</a></li>

            </ul>
            <h4>ADDRESS</h4>
            <p>
            200 E Pratt St Suite 4100, Baltimore, MD 21202, USA
            </p>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <h4>HAVE QUESTION</h4>
            <p>+14432202654 </p>
            <p>+14439855520 </p>
            <h4>EMAIL ADDRESS </h4>
            <p>gidicruiztransportation@gmail.com </p>
            <p>support@giddycruisetransportation.com</p>

            <p align=""><a href="Contact.php">
                <button class="btn btn-large btnfoot"> <i class="fa fa-envelope" aria-hidden="true"></i> Contact us</button></a>
            </p>
        </div>

        <div style="clear:both"></div>
        <hr />

        <p align="center">
            Copyright © 2022 - Giddy Cruise Transport. All rights reserved. Powered by <a class="text-color bolded" target="_blank" href="https://giddyhost.com"> Giddy Host</a>
        </p>
        <img src="img/new-skin/secure-stripe-payment-logo.png" alt="payment gateway logo">

    </div>


</footer>




    <div id="server-message-dialog" class="modal modal-message modal-success fade in" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i id="server-message-icon" class="glyphicon glyphicon-check"></i>
            </div>
            <div class="modal-title"><h4 class="modal-title" id="server-message-title">Model Title</h4></div>
            <div class="modal-body"><div id="server-message-content" class="text-align-left wrap">Content</div></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
            </div>
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>


    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="lib/bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>

    <script src="js/modernizr.js"></script>
    <script src="js/jquery-migrate-1.4.1.min.js"></script>
    <script src="js/slimmenu.js"></script>
    <script src="js/bootstrap-timepicker.js"></script>
    <script src="js/bootstrap-select.js"></script>

    <script src="js/dropit.js"></script>
    <script src="js/ionrangeslider.js"></script>
    <script src="js/icheck.js"></script>
    <script src="js/fotorama.js"></script>
    <script src="js/typeahead.js"></script>
    <script src="js/card-payment.js"></script>
    <script src="js/magnific.js"></script>
    <script src="js/owl-carousel.js"></script>
    <script src="js/fitvids.js"></script>
    <script src="js/tweet.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/gridrotator.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/functionsc37a.js?v=he1Iyy-M8r_d_HYU_OnRF54ub32de-URpTmXgeWzv7E"></script>

    <script src="js/custom9969.js?v=5TxqwrZcIJk2iGhWpAs2932Ym8_WYyalqRK5aSa2vE8"></script>
    <script src="js/request.helper0b0e.js?v=1Yh7gtvjFt1dVE1kr3_cRhtAiSC3EHa59eAZl7faaOM"></script>

    
    <script>
                $(window).ready(function () {
                function setDepartureTerminal() {
                    displayDropLoading($("#DepartureTerminalId"))
                    var location = 'Booking/GetDepartures.json';
                    var items = "<option data-hidden='"+true+"'>Select your departure</option>";
                    $('.selectpicker').selectpicker('refresh');

                    $.getJSON(location, null, function(data) {
                        $.each(data, function (index, item) {
                            if (item) {items += "<option value='" + item.id + "'>" + item.name + "</option>";}
                        });
                        $("#DepartureTerminalId").html(items);
                        clearDropConent($("#RouteId"));
                        $('.selectpicker').selectpicker('refresh');

                    }).fail(function (xhr, textStatus, errorThrown) {
                        $("#DepartureTerminalId").html("<option data-hidden='" + true + "'>No Terminal Available</option>");
                        $('.selectpicker').selectpicker('refresh');
                        });
                    //window.localStorage.clear();
                }

                function displayDropLoading(element) {
                    var defaultOption = "<option>" + "Loading... " + "</option>";
                    element.html(defaultOption);
                }


                function clearDropConent(element) {
                    var defaultOption ="<option data-hidden='" + true + "'>First select your departure </option>";
                    element.html(defaultOption);
                }

                function disableElement(element) {
                    element.attr('disabled', 'disabled');
                }

                $('#DepartureTerminalId').on("change", function(evt) {
                    evt.preventDefault();
                    displayDropLoading($("#RouteId"))
                    $('.selectpicker').selectpicker('refresh');
                    var selectedId = $('option:selected', $(this)).val();

                    if (selectedId === "") {
                        clearDropConent($("#RouteId"));
                        $('.selectpicker').selectpicker('refresh');
                        disableElement("#booking-button");
                        return;
                    }

                    var locationBaseUrl = 'Booking/GetRoute.json';
                    var items = "<option data-hidden='" + true + "'>Select your destination</option>";
                    var location = locationBaseUrl + "/" + selectedId;

                    $.getJSON(location, null, function(data) {
                        $.each(data, function (index, item) {
                            if (item) {items += "<option value='" + item.id + "'>" + item.name + "</option>";}
                        });
                        $("#RouteId").html(items);
                        $('.selectpicker').selectpicker('refresh');
                        $("#booking-button").removeAttr('disabled');

                    }).fail(function (xhr, textStatus, errorThrown) {
                        $("#RouteId").html("<option data-hidden='" + true + "'>Couldn't retrieve data</option>");

                    });

                });

                    setDepartureTerminal();
                    disableElement($("#booking-button"));
                    //hangerCarousel();
                    $("#ReturnDate").val("");

                $("#round-trip-button").on("click",
                    function(evt) {
                        $(this).addClass("active");
                        $("#one-way-button").removeClass("active");
                        $("#return-date-div").css({ "display": "" });
                    });

                $("#one-way-button").on("click",
                    function(evt) {
                        $(this).addClass("active");
                        $("#round-trip-button").removeClass("active");

                        $("#ReturnDate").val("");
                        $("#return-date-div").css({ "display": "none" });
                    });

                var noError ="True";
                if (noError=="False") {
                   $.bootstrapGrowl("<b>Error Occurred</b><br/>", {
                        type: 'danger',
                        align: 'center',
                        width: 'auto',
                        allow_dismiss: false,
                        offset: { from: 'top', amount: 50 },
                        delay: 6000,
                    });
                }
            })

    </script>

    
            <!-- GetButton.io widget life chat -->
            <script type="text/javascript">
              (function () {
                  var options = {
                      facebook: "105248471461316", // Facebook page ID
                      whatsapp: "+14432202654", // WhatsApp number
                      call_to_action: "Chat Us", // Call to action
                      button_color: "#FF6550", // Color of button
                      position: "right", // Position may be 'right' or 'left'
                      order: "facebook,whatsapp", // Order of buttons
                  };
                  var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
                  var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
                  s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
                  var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
              })();
          </script>
          <!-- /GetButton.io widget -->



    <script>
        $(document).ready(function () {
            //$('a[href^="#"]').on('click',function (e) {
            //    e.preventDefault();

            //    var target = this.hash,
            //    $target = $(target);

            //    $('html, body').stop().animate({
            //        'scrollTop': $target.offset().top
            //    }, 900, 'swing', function () {
            //        window.location.hash = target;
            //    });
            //});

            $('.input-group.date').datepicker({ format: "D M d, yyyy" });

            $(function () {
                $('[data-toggle="tooltip"]').tooltip();
            })

        });</script>

<!-- ..loading before submit -->
<script>
	function myFunction() {
	var spinner = $('#loader');
	document.getElementById("loader").style.display = "inline"; // to undisplay
	}
	</script>

<!-- php do not refresh page after submit post -->
<script>
		if ( window.history.replaceState ) {
			window.history.replaceState( null, null, window.location.href );
		}
	</script>
       <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   </body>

<!-- Mirrored from chiscotransport.com.ng/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jan 2022 06:12:00 GMT -->
</html>

