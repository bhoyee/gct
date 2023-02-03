<?php

if($_POST) {
    $visitor_name = "";
    $visitor_email = "";
    $email_title = "New Transport Booking : Giddy Cruise ";
    $concerned_department = "";
    $visitor_message = "";
    $recipient = "test@giddycruisetransportation.com";
    $email_body = "


    <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional //EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><!--[if IE]><html xmlns='http://www.w3.org/1999/xhtml' class='ie'><![endif]--><!--[if !IE]><!--><html style='margin: 0;padding: 0;' xmlns='http://www.w3.org/1999/xhtml'><!--<![endif]--><head>
              <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
              <title></title>
              <!--[if !mso]><!--><meta http-equiv='X-UA-Compatible' content='IE=edge' /><!--<![endif]-->
              <meta name='viewport' content='width=device-width' /><style type='text/css'>
          @media only screen and (min-width: 620px){.wrapper{min-width:600px !important}.wrapper h1{}.wrapper h1{font-size:26px !important;line-height:34px !important}.wrapper h2{}.wrapper h3{}.column{}.wrapper .size-8{font-size:8px !important;line-height:14px !important}.wrapper .size-9{font-size:9px !important;line-height:16px !important}.wrapper .size-10{font-size:10px !important;line-height:18px !important}.wrapper .size-11{font-size:11px !important;line-height:19px !important}.wrapper .size-12{font-size:12px !important;line-height:19px !important}.wrapper .size-13{font-size:13px !important;line-height:21px !important}.wrapper .size-14{font-size:14px !important;line-height:21px !important}.wrapper .size-15{font-size:15px !important;line-height:23px !important}.wrapper .size-16{font-size:16px !important;line-height:24px !important}.wrapper .size-17{font-size:17px !important;line-height:26px
          !important}.wrapper .size-18{font-size:18px !important;line-height:26px !important}.wrapper .size-20{font-size:20px !important;line-height:28px !important}.wrapper .size-22{font-size:22px !important;line-height:31px !important}.wrapper .size-24{font-size:24px !important;line-height:32px !important}.wrapper .size-26{font-size:26px !important;line-height:34px !important}.wrapper .size-28{font-size:28px !important;line-height:36px !important}.wrapper .size-30{font-size:30px !important;line-height:38px !important}.wrapper .size-32{font-size:32px !important;line-height:40px !important}.wrapper .size-34{font-size:34px !important;line-height:43px !important}.wrapper .size-36{font-size:36px !important;line-height:43px !important}.wrapper .size-40{font-size:40px !important;line-height:47px !important}.wrapper .size-44{font-size:44px !important;line-height:50px !important}.wrapper
          .size-48{font-size:48px !important;line-height:54px !important}.wrapper .size-56{font-size:56px !important;line-height:60px !important}.wrapper .size-64{font-size:64px !important;line-height:63px !important}}
          </style>
              <style type='text/css'>
          body {
            margin: 0;
            padding: 0;
          }
          table {
            border-collapse: collapse;
            table-layout: fixed;
          }
          * {
            line-height: inherit;
          }
          [x-apple-data-detectors],
          [href^='tel'],
          [href^='sms'] {
            color: inherit !important;
            text-decoration: none !important;
          }
          .wrapper .footer__share-button a:hover,
          .wrapper .footer__share-button a:focus {
            color: #ffffff !important;
          }
          .btn a:hover,
          .btn a:focus,
          .footer__share-button a:hover,
          .footer__share-button a:focus,
          .email-footer__links a:hover,
          .email-footer__links a:focus {
            opacity: 0.8;
          }
          .preheader,
          .header,
          .layout,
          .column {
            transition: width 0.25s ease-in-out, max-width 0.25s ease-in-out;
          }
          .preheader td {
            padding-bottom: 8px;
          }
          .layout,
          div.header {
            max-width: 400px !important;
            -fallback-width: 95% !important;
            width: calc(100% - 20px) !important;
          }
          div.preheader {
            max-width: 360px !important;
            -fallback-width: 90% !important;
            width: calc(100% - 60px) !important;
          }
          .snippet,
          .webversion {
            Float: none !important;
          }
          .column {
            max-width: 400px !important;
            width: 100% !important;
          }
          .fixed-width.has-border {
            max-width: 402px !important;
          }
          .fixed-width.has-border .layout__inner {
            box-sizing: border-box;
          }
          .snippet,
          .webversion {
            width: 50% !important;
          }
          .ie .btn {
            width: 100%;
          }
          [owa] .column div,
          [owa] .column button {
            display: block !important;
          }
          [owa] .wrapper > tbody > tr > td {
            overflow-x: auto;
            overflow-y: hidden;
          }
          [owa] .wrapper > tbody > tr > td > div {
            min-width: 600px;
          }
          .ie .column,
          [owa] .column,
          .ie .gutter,
          [owa] .gutter {
            display: table-cell;
            float: none !important;
            vertical-align: top;
          }
          .ie div.preheader,
          [owa] div.preheader,
          .ie .email-footer,
          [owa] .email-footer {
            max-width: 560px !important;
            width: 560px !important;
          }
          .ie .snippet,
          [owa] .snippet,
          .ie .webversion,
          [owa] .webversion {
            width: 280px !important;
          }
          .ie div.header,
          [owa] div.header,
          .ie .layout,
          [owa] .layout,
          .ie .one-col .column,
          [owa] .one-col .column {
            max-width: 600px !important;
            width: 600px !important;
          }
          .ie .two-col .column,
          [owa] .two-col .column {
            max-width: 300px !important;
            width: 300px !important;
          }
          .ie .three-col .column,
          [owa] .three-col .column,
          .ie .narrow,
          [owa] .narrow {
            max-width: 200px !important;
            width: 200px !important;
          }
          .ie .wide,
          [owa] .wide {
            width: 400px !important;
          }
          .ie .fixed-width.has-border,
          [owa] .fixed-width.x_has-border,
          .ie .has-gutter.has-border,
          [owa] .has-gutter.x_has-border {
            max-width: 602px !important;
            width: 602px !important;
          }
          .ie .two-col.has-gutter .column,
          [owa] .two-col.x_has-gutter .column {
            max-width: 290px !important;
            width: 290px !important;
          }
          .ie .three-col.has-gutter .column,
          [owa] .three-col.x_has-gutter .column,
          .ie .has-gutter .narrow,
          [owa] .has-gutter .narrow {
            max-width: 188px !important;
            width: 188px !important;
          }
          .ie .has-gutter .wide,
          [owa] .has-gutter .wide {
            max-width: 394px !important;
            width: 394px !important;
          }
          .ie .two-col.has-gutter.has-border .column,
          [owa] .two-col.x_has-gutter.x_has-border .column {
            max-width: 292px !important;
            width: 292px !important;
          }
          .ie .three-col.has-gutter.has-border .column,
          [owa] .three-col.x_has-gutter.x_has-border .column,
          .ie .has-gutter.has-border .narrow,
          [owa] .has-gutter.x_has-border .narrow {
            max-width: 190px !important;
            width: 190px !important;
          }
          .ie .has-gutter.has-border .wide,
          [owa] .has-gutter.x_has-border .wide {
            max-width: 396px !important;
            width: 396px !important;
          }
          .ie .fixed-width .layout__inner {
            border-left: 0 none white !important;
            border-right: 0 none white !important;
          }
          .ie .layout__edges {
            display: none;
          }
          .mso .layout__edges {
            font-size: 0;
          }
          .layout-fixed-width,
          .mso .layout-full-width {
            background-color: #ffffff;
          }
          @media only screen and (min-width: 620px) {
            .column,
            .gutter {
              display: table-cell;
              Float: none !important;
              vertical-align: top;
            }
            div.preheader,
            .email-footer {
              max-width: 560px !important;
              width: 560px !important;
            }
            .snippet,
            .webversion {
              width: 280px !important;
            }
            div.header,
            .layout,
            .one-col .column {
              max-width: 600px !important;
              width: 600px !important;
            }
            .fixed-width.has-border,
            .fixed-width.ecxhas-border,
            .has-gutter.has-border,
            .has-gutter.ecxhas-border {
              max-width: 602px !important;
              width: 602px !important;
            }
            .two-col .column {
              max-width: 300px !important;
              width: 300px !important;
            }
            .three-col .column,
            .column.narrow {
              max-width: 200px !important;
              width: 200px !important;
            }
            .column.wide {
              width: 400px !important;
            }
            .two-col.has-gutter .column,
            .two-col.ecxhas-gutter .column {
              max-width: 290px !important;
              width: 290px !important;
            }
            .three-col.has-gutter .column,
            .three-col.ecxhas-gutter .column,
            .has-gutter .narrow {
              max-width: 188px !important;
              width: 188px !important;
            }
            .has-gutter .wide {
              max-width: 394px !important;
              width: 394px !important;
            }
            .two-col.has-gutter.has-border .column,
            .two-col.ecxhas-gutter.ecxhas-border .column {
              max-width: 292px !important;
              width: 292px !important;
            }
            .three-col.has-gutter.has-border .column,
            .three-col.ecxhas-gutter.ecxhas-border .column,
            .has-gutter.has-border .narrow,
            .has-gutter.ecxhas-border .narrow {
              max-width: 190px !important;
              width: 190px !important;
            }
            .has-gutter.has-border .wide,
            .has-gutter.ecxhas-border .wide {
              max-width: 396px !important;
              width: 396px !important;
            }
          }
          @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
            .fblike {
              background-image: url(https://i7.createsend1.com/static/eb/master/13-the-blueprint-3/images/fblike@2x.png) !important;
            }
            .tweet {
              background-image: url(https://i8.createsend1.com/static/eb/master/13-the-blueprint-3/images/tweet@2x.png) !important;
            }
            .linkedinshare {
              background-image: url(https://i9.createsend1.com/static/eb/master/13-the-blueprint-3/images/lishare@2x.png) !important;
            }
            .forwardtoafriend {
              background-image: url(https://i10.createsend1.com/static/eb/master/13-the-blueprint-3/images/forward@2x.png) !important;
            }
          }
          @media (max-width: 321px) {
            .fixed-width.has-border .layout__inner {
              border-width: 1px 0 !important;
            }
            .layout,
            .column {
              min-width: 320px !important;
              width: 320px !important;
            }
            .border {
              display: none;
            }
          }
          .mso div {
            border: 0 none white !important;
          }
          .mso .w560 .divider {
            Margin-left: 260px !important;
            Margin-right: 260px !important;
          }
          .mso .w360 .divider {
            Margin-left: 160px !important;
            Margin-right: 160px !important;
          }
          .mso .w260 .divider {
            Margin-left: 110px !important;
            Margin-right: 110px !important;
          }
          .mso .w160 .divider {
            Margin-left: 60px !important;
            Margin-right: 60px !important;
          }
          .mso .w354 .divider {
            Margin-left: 157px !important;
            Margin-right: 157px !important;
          }
          .mso .w250 .divider {
            Margin-left: 105px !important;
            Margin-right: 105px !important;
          }
          .mso .w148 .divider {
            Margin-left: 54px !important;
            Margin-right: 54px !important;
          }
          .mso .size-8,
          .ie .size-8 {
            font-size: 8px !important;
            line-height: 14px !important;
          }
          .mso .size-9,
          .ie .size-9 {
            font-size: 9px !important;
            line-height: 16px !important;
          }
          .mso .size-10,
          .ie .size-10 {
            font-size: 10px !important;
            line-height: 18px !important;
          }
          .mso .size-11,
          .ie .size-11 {
            font-size: 11px !important;
            line-height: 19px !important;
          }
          .mso .size-12,
          .ie .size-12 {
            font-size: 12px !important;
            line-height: 19px !important;
          }
          .mso .size-13,
          .ie .size-13 {
            font-size: 13px !important;
            line-height: 21px !important;
          }
          .mso .size-14,
          .ie .size-14 {
            font-size: 14px !important;
            line-height: 21px !important;
          }
          .mso .size-15,
          .ie .size-15 {
            font-size: 15px !important;
            line-height: 23px !important;
          }
          .mso .size-16,
          .ie .size-16 {
            font-size: 16px !important;
            line-height: 24px !important;
          }
          .mso .size-17,
          .ie .size-17 {
            font-size: 17px !important;
            line-height: 26px !important;
          }
          .mso .size-18,
          .ie .size-18 {
            font-size: 18px !important;
            line-height: 26px !important;
          }
          .mso .size-20,
          .ie .size-20 {
            font-size: 20px !important;
            line-height: 28px !important;
          }
          .mso .size-22,
          .ie .size-22 {
            font-size: 22px !important;
            line-height: 31px !important;
          }
          .mso .size-24,
          .ie .size-24 {
            font-size: 24px !important;
            line-height: 32px !important;
          }
          .mso .size-26,
          .ie .size-26 {
            font-size: 26px !important;
            line-height: 34px !important;
          }
          .mso .size-28,
          .ie .size-28 {
            font-size: 28px !important;
            line-height: 36px !important;
          }
          .mso .size-30,
          .ie .size-30 {
            font-size: 30px !important;
            line-height: 38px !important;
          }
          .mso .size-32,
          .ie .size-32 {
            font-size: 32px !important;
            line-height: 40px !important;
          }
          .mso .size-34,
          .ie .size-34 {
            font-size: 34px !important;
            line-height: 43px !important;
          }
          .mso .size-36,
          .ie .size-36 {
            font-size: 36px !important;
            line-height: 43px !important;
          }
          .mso .size-40,
          .ie .size-40 {
            font-size: 40px !important;
            line-height: 47px !important;
          }
          .mso .size-44,
          .ie .size-44 {
            font-size: 44px !important;
            line-height: 50px !important;
          }
          .mso .size-48,
          .ie .size-48 {
            font-size: 48px !important;
            line-height: 54px !important;
          }
          .mso .size-56,
          .ie .size-56 {
            font-size: 56px !important;
            line-height: 60px !important;
          }
          .mso .size-64,
          .ie .size-64 {
            font-size: 64px !important;
            line-height: 63px !important;
          }
          </style>

            <!--[if !mso]><!--><style type='text/css'>
          @import url(https://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic|Ubuntu:400,700,400italic,700italic);
          </style><link href='https://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic|Ubuntu:400,700,400italic,700italic' rel='stylesheet' type='text/css' /><!--<![endif]--><style type='text/css'>
          body{background-color:#ededf1}.logo a:hover,.logo a:focus{color:#859bb1 !important}.mso .layout-has-border{border-top:1px solid #b4b4c4;border-bottom:1px solid #b4b4c4}.mso .layout-has-bottom-border{border-bottom:1px solid #b4b4c4}.mso .border,.ie .border{background-color:#b4b4c4}.mso h1,.ie h1{}.mso h1,.ie h1{font-size:26px !important;line-height:34px !important}.mso h2,.ie h2{}.mso h3,.ie h3{}.mso .layout__inner,.ie .layout__inner{}.mso .footer__share-button p{}.mso .footer__share-button p{font-family:Ubuntu,sans-serif}
          </style><meta name='robots' content='noindex,nofollow' />
          <meta property='og:title' content='My First Campaign' />
          </head>
          <!--[if mso]>
            <body class='mso'>
          <![endif]-->
          <!--[if !mso]><!-->
            <body class='full-padding' style='margin: 0;padding: 0;-webkit-text-size-adjust: 100%;'>
          <!--<![endif]-->
              <table class='wrapper' style='border-collapse: collapse;table-layout: fixed;min-width: 320px;width: 100%;background-color: #ededf1;' cellpadding='0' cellspacing='0' role='presentation'><tbody><tr><td>
                <div role='banner'>
                  <div class='preheader' style='Margin: 0 auto;max-width: 560px;min-width: 280px; width: 280px;width: calc(28000% - 167440px);'>
                    <div style='border-collapse: collapse;display: table;width: 100%;'>
                    <!--[if (mso)|(IE)]><table align='center' class='preheader' cellpadding='0' cellspacing='0' role='presentation'><tr><td style='width: 280px' valign='top'><![endif]-->
                      <div class='snippet' style='display: table-cell;Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;width: calc(14000% - 78120px);padding: 10px 0 5px 0;color: #7c7e7f;font-family: Ubuntu,sans-serif;'>

                      </div>
                    <!--[if (mso)|(IE)]></td><td style='width: 280px' valign='top'><![endif]-->
                      <div class='webversion' style='display: table-cell;Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;width: calc(14100% - 78680px);padding: 10px 0 5px 0;text-align: right;color: #7c7e7f;font-family: Ubuntu,sans-serif;'>

                      </div>
                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                    </div>
                  </div>
                  <div class='header' style='Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);' id='emb-email-header-container'>
                  <!--[if (mso)|(IE)]><table align='center' class='header' cellpadding='0' cellspacing='0' role='presentation'><tr><td style='width: 600px'><![endif]-->
                    <div class='logo emb-logo-margin-box' style='font-size: 26px;line-height: 32px;Margin-top: 6px;Margin-bottom: 20px;color: #c3ced9;font-family: Roboto,Tahoma,sans-serif;Margin-left: 20px;Margin-right: 20px;' align='center'>
                      <div class='logo-center' align='center' id='emb-email-header'><a style='text-decoration: none;transition: opacity 0.1s ease-in;color: #c3ced9;' href='https://giddycruisetransportation.com/'><img style='display: block;height: auto;width: 100%;border: 0;max-width: 185px;' src='https://giddycruisetransportation.com/assets/img/logo2.png' alt='Giddy Cruise Transport' width='185' /></a></div>
                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>
                <div>
                <div class='layout one-col fixed-width' style='Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;'>
                  <div class='layout__inner' style='border-collapse: collapse;display: table;width: 100%;background-color: #ffffff;' emb-background-style>
                  <!--[if (mso)|(IE)]><table align='center' cellpadding='0' cellspacing='0' role='presentation'><tr class='layout-fixed-width' emb-background-style><td style='width: 600px' class='w560'><![endif]-->
                    <div class='column' style='text-align: left;color: #7c7e7f;font-size: 14px;line-height: 21px;font-family: PT Serif,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);'>

                      <div style='Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;'>
                <div style='mso-line-height-rule: exactly;line-height: 10px;font-size: 1px;'>&nbsp;</div>
              </div>

                      <div style='Margin-left: 20px;Margin-right: 20px;'>
                <div style='mso-line-height-rule: exactly;mso-text-raise: 4px;'>
                  <h1 style='Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #C70039;font-size: 16px;line-height: 24px;text-align: center;'>New Booking Alert:</h1><h3 style='Margin-top: 12px;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #3e4751;font-size: 14px;line-height: 31px;font-family: Ubuntu,sans-serif;text-align: center;'>You have received a new booking alert.</h3>
                </div>
              </div>

                      <div style='Margin-left: 20px;Margin-right: 20px;'>
                <div class='divider' style='display: block;font-size: 2px;line-height: 2px;Margin-left: auto;Margin-right: auto;width: 40px;background-color: #b4b4c4;Margin-bottom: 20px;'>&nbsp;</div>
              </div>

                      <div style='Margin-left: 20px;Margin-right: 20px;'>
                <div style='mso-line-height-rule: exactly;line-height: 5px;font-size: 1px;'>&nbsp;</div>
              </div>

                      <div style='Margin-left: 20px;Margin-right: 20px;'>
                <div style='mso-line-height-rule: exactly;mso-text-raise: 4px;'>
                  <h2 style='Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #3e4751;font-size: 16px;line-height: 24px;font-family: Ubuntu,sans-serif;'><span style='color:#4eaacc'><strong><u>Guest Details</u></strong></span></h2><p style='Margin-top: 16px;Margin-bottom: 0;'><em><span style='color:#2e6e0d'><strong>Guest Full-Name</strong></span></em>: <strong>$name </strong></p><p style='Margin-top: 20px;Margin-bottom: 0;'><em><span style='color:#2c700a'><strong>Phone Number</strong></span></em>: <strong>$phone </strong></p>
                  <p style='Margin-top: 16px;Margin-bottom: 0;'><em><span style='color:#2e6e0d'><strong>Pick Up Address</strong></span></em>: <strong>$pAddress </strong></p><p style='Margin-top: 20px;Margin-bottom: 0;'><em><span style='color:#2c700a'><strong>Drop Off Address:</strong></span></em>: <strong>$dAddress </strong></p>
                    <p style='Margin-top: 16px;Margin-bottom: 0;'><em><span style='color:#2e6e0d'><strong>Pick Up Date</strong></span></em>: <strong>$pDate </strong></p>
                      <p style='Margin-top: 16px;Margin-bottom: 0;'><em><span style='color:#2e6e0d'><strong>Pick Up Time</strong></span></em>: <strong>$tHR </strong> : <strong>$tMin </strong></p>
                   <br>

                  <p style='Margin-top: 20px;Margin-bottom: 20px;'><span style='color:#C70039'><strong>Contact the client as soon as possible.</strong></span></p>
                </div>
              </div>



                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>

                <div style='line-height:20px;font-size:20px;'>&nbsp;</div>



                <div style='line-height:20px;font-size:20px;'>&nbsp;</div>


                <div role='contentinfo'>
                  <div class='layout email-footer' style='Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;'>
                    <div class='layout__inner' style='border-collapse: collapse;display: table;width: 100%;'>
                    <!--[if (mso)|(IE)]><table align='center' cellpadding='0' cellspacing='0' role='presentation'><tr class='layout-email-footer'><td style='width: 400px;' valign='top' class='w360'><![endif]-->
                      <div class='column wide' style='text-align: left;font-size: 12px;line-height: 19px;color: #7c7e7f;font-family: Ubuntu,sans-serif;Float: left;max-width: 400px;min-width: 320px; width: 320px;width: calc(8000% - 47600px);'>
                        <div style='Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;'>
                          <table class='email-footer__links emb-web-links' style='border-collapse: collapse;table-layout: fixed;' role='presentation'><tbody><tr role='navigation'>
                          <td class='emb-web-links' style='padding: 0;width: 26px;'><a style='text-decoration: underline;transition: opacity 0.1s ease-in;color: #7c7e7f;' href='#'><img style='border: 0;' src='https://i2.createsend1.com/static/eb/master/13-the-blueprint-3/images/facebook.png' width='26' height='26' alt='Facebook' /></a></td><td class='emb-web-links' style='padding: 0 0 0 3px;width: 26px;'><a style='text-decoration: underline;transition: opacity 0.1s ease-in;color: #7c7e7f;' href='#'><img style='border: 0;' src='https://i3.createsend1.com/static/eb/master/13-the-blueprint-3/images/twitter.png' width='26' height='26' alt='Twitter' /></a></td><td class='emb-web-links' style='padding: 0 0 0 3px;width: 26px;'><a style='text-decoration: underline;transition: opacity 0.1s ease-in;color: #7c7e7f;' href='#'><img style='border: 0;' src='https://i4.createsend1.com/static/eb/master/13-the-blueprint-3/images/youtube.png' width='26' height='26' alt='YouTube' /></a></td><td class='emb-web-links' style='padding: 0 0 0 3px;width: 26px;'><a style='text-decoration: underline;transition: opacity 0.1s ease-in;color: #7c7e7f;' href='#'><img style='border: 0;' src='https://i5.createsend1.com/static/eb/master/13-the-blueprint-3/images/instagram.png' width='26' height='26' alt='Instagram' /></a></td><td class='emb-web-links' style='padding: 0 0 0 3px;width: 26px;'><a style='text-decoration: underline;transition: opacity 0.1s ease-in;color: #7c7e7f;' href='#'><img style='border: 0;' src='https://i6.createsend1.com/static/eb/master/13-the-blueprint-3/images/linkedin.png' width='26' height='26' alt='LinkedIn' /></a></td><td class='emb-web-links' style='padding: 0 0 0 3px;width: 26px;'><a style='text-decoration: underline;transition: opacity 0.1s ease-in;color: #7c7e7f;' href='#'><img style='border: 0;' src='https://i7.createsend1.com/static/eb/master/13-the-blueprint-3/images/website.png' width='26' height='26' alt='Website' /></a></td><td class='emb-web-links' style='padding: 0 0 0 3px;width: 26px;'><a style='text-decoration: underline;transition: opacity 0.1s ease-in;color: #7c7e7f;' href='#'><img style='border: 0;' src='https://i8.createsend1.com/static/eb/master/13-the-blueprint-3/images/pinterest.png' width='26' height='26' alt='Pinterest' /></a></td>
                          </tr></tbody></table>
                          <div style='font-size: 12px;line-height: 19px;Margin-top: 20px;'>
                            <div>Giddy Cruise Transport<br />
           8319 Liberty Road, Maryland<br />
                          </div>
                          <div style='font-size: 12px;line-height: 19px;Margin-top: 18px;'>

                          </div>
                          <!--[if mso]>&nbsp;<![endif]-->
                        </div>
                      </div>
                    <!--[if (mso)|(IE)]></td><td style='width: 200px;' valign='top' class='w160'><![endif]-->
                      <div class='column narrow' style='text-align: left;font-size: 12px;line-height: 19px;color: #7c7e7f;font-family: Ubuntu,sans-serif;Float: left;max-width: 320px;min-width: 200px; width: 320px;width: calc(72200px - 12000%);'>
                        <div style='Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;'>

                        </div>
                      </div>
                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                    </div>
                  </div>
                  <div class='layout one-col email-footer' style='Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;'>
                    <div class='layout__inner' style='border-collapse: collapse;display: table;width: 100%;'>
                    <!--[if (mso)|(IE)]><table align='center' cellpadding='0' cellspacing='0' role='presentation'><tr class='layout-email-footer'><td style='width: 600px;' class='w560'><![endif]-->
                      <div class='column' style='text-align: left;font-size: 12px;line-height: 19px;color: #7c7e7f;font-family: Ubuntu,sans-serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);'>
                        <div style='Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;'>
                          <div style='font-size: 12px;line-height: 19px;'>
                            <span><preferences style='text-decoration: underline;' lang='en'>Preferences</preferences>&nbsp;&nbsp;|&nbsp;&nbsp;</span><unsubscribe style='text-decoration: underline;'>Unsubscribe</unsubscribe>
                          </div>
                        </div>
                      </div>
                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                    </div>
                  </div>
                </div>
                <div style='line-height:40px;font-size:40px;'>&nbsp;</div>
              </div></td></tr></tbody></table>

          </body></html>






    ";

    // if(isset($_POST['visitor_name'])) {
    //     $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
    //     $email_body .= "<div>
    //                        <label><b>Visitor Name:</b></label>&nbsp;<span>".$visitor_name."</span>
    //                     </div>";
    // }
    //
    // if(isset($_POST['visitor_email'])) {
    //     $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
    //     $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    //     $email_body .= "<div>
    //                        <label><b>Visitor Email:</b></label>&nbsp;<span>".$visitor_email."</span>
    //                     </div>";
    // }
    //
    // if(isset($_POST['email_title'])) {
    //     $email_title = filter_var($_POST['email_title'], FILTER_SANITIZE_STRING);
    //     $email_body .= "<div>
    //                        <label><b>Reason For Contacting Us:</b></label>&nbsp;<span>".$email_title."</span>
    //                     </div>";
    // }
    //
    // if(isset($_POST['concerned_department'])) {
    //     $concerned_department = filter_var($_POST['concerned_department'], FILTER_SANITIZE_STRING);
    //     $email_body .= "<div>
    //                        <label><b>Concerned Department:</b></label>&nbsp;<span>".$concerned_department."</span>
    //                     </div>";
    // }
    //
    // if(isset($_POST['visitor_message'])) {
    //     $visitor_message = htmlspecialchars($_POST['visitor_message']);
    //     $email_body .= "<div>
    //                        <label><b>Visitor Message:</b></label>
    //                        <div>".$visitor_message."</div>
    //                     </div>";
    // }
    //
    // if($concerned_department == "billing") {
    //     $recipient = "test@giddycruisetransportation.com";
    // }
    // else if($concerned_department == "marketing") {
    //     $recipient = "binsalith@gmail.com";
    // }
    // else if($concerned_department == "technical support") {
    //     $recipient = "s.adeboye@outlook.com";
    // }
    // else {
    //     $recipient = "mistulb@gmail.com";
    // }
    //
    // $email_body .= "</div>";

    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";

    if(mail($recipient, $email_title, $email_body, $headers)) {
        echo "<p>Thank you for contacting us, $visitor_name. You will get a reply within 24 hours.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }

} else {
    echo '<p>Something went wrong</p>';
}
?>

<!DOCTYPE html>
<head>
<title>Form submission</title>
</head>
<body>
  <form action="contact-view.php" method="post">
    <div class="elem-group">
      <label for="name">Your Name</label>
      <input type="text" id="name" name="visitor_name" placeholder="John Doe" pattern=[A-Z\sa-z]{3,20} required>
    </div>
    <div class="elem-group">
      <label for="email">Your E-mail</label>
      <input type="email" id="email" name="visitor_email" placeholder="john.doe@email.com" required>
    </div>
    <div class="elem-group">
      <label for="department-selection">Choose Concerned Department</label>
      <select id="department-selection" name="concerned_department" required>
          <option value="">Select a Department</option>
          <option value="billing">Billing</option>
          <option value="marketing">Marketing</option>
          <option value="technical support">Technical Support</option>
      </select>
    </div>
    <div class="elem-group">
      <label for="title">Reason For Contacting Us</label>
      <input type="text" id="title" name="email_title" required placeholder="Unable to Reset my Password" pattern=[A-Za-z0-9\s]{8,60}>
    </div>
    <div class="elem-group">
      <label for="message">Write your message</label>
      <textarea id="message" name="visitor_message" placeholder="Say whatever you want." required></textarea>
    </div>
    <button type="submit">Send Message</button>
  </form>

</body>
</html>
