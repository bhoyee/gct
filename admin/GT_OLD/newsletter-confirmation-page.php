<!-- Newsletter script -->
<?php
 if($_POST) {

    $email = $_POST['email'];
        //  $to="mistulb@gmail.com";
      $to='support@giddycruisetransportation.com, gidicruiztransportation@gmail.com '; //change to ur mail address
      $subject="New Newsletter SignUp";

  $message = "
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
        <div class='logo-center' align='center' id='emb-email-header'><a style='text-decoration: none;transition: opacity 0.1s ease-in;color: #c3ced9;' href='https://giddycruisetransportation.com'><img style='display: block;height: auto;width: 100%;border: 0;max-width: 185px;' src='https://giddycruisetransportation.com/assets/img/logo2.png' alt='Giddy Cruise Transport' width='185' /></a></div>
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

    <h1 style='Margin-top: 12px;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #3e4751;font-size: 22px;line-height: 31px;font-family: Ubuntu,sans-serif;text-align: center;'>Giddy Cruise Transport</h1>
    <p style='Margin-top: 20px;Margin-bottom: 0;'>&nbsp;</p>
    <h1 style='Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #C70039;font-size: 16px;line-height: 24px;text-align: center;'>New Newsletter Signup Alert:</h1>
    <h3 style='Margin-top: 12px;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #3e4751;font-size: 14px;line-height: 31px;font-family: Ubuntu,sans-serif;text-align: center;'>You have received a new Newsletter Signup.</h3>

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
    <h2 style='Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #3e4751;font-size: 16px;line-height: 24px;font-family: Ubuntu,sans-serif;'><span style='color:#4eaacc'><strong><u>Client Details</u></strong></span></h2>

    <p style='Margin-top: 20px;Margin-bottom: 0;'><em><span style='color:#2c700a'><strong>Email</strong></span></em> : <strong>$email </strong></p>

     <br>


    <p style='Margin-top: 20px;Margin-bottom: 20px;'><span style='color:#f20e0e'><strong>Contact the client to confirm if he/she need your services </strong></span></p>
  </div>
</div>

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

$headers = 'MIME-Version: 1.0'."\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
$headers .= "From: no-reply@giddycruisetransportation.com";



if(mail($to, $subject, $message, $headers)) {
$msg = 'Thank you, Newsletter SignUp Confirmed ';
} else {
$msg = 'We are sorry but the email did not go through.';
}

} else {
$msg = '';
} // Mail Function



?>


<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="We provide safe, affordable,
    and convenient daily transportation. We also offer Private One on One transportation services.">
    <meta name="keywords" content="Transport, House Movers, Logistic Services, Airport Pickup and DropOff">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <title>Giddy Cruise Transport </title>

    <!--=== Bootstrap CSS ===-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="assets/css/plugins/slicknav.min.css" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="assets/css/plugins/magnific-popup.css" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="assets/css/plugins/owl.carousel.min.css" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="assets/css/plugins/gijgo.css" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="assets/css/reset.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="style.css" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="assets/css/responsive.css" rel="stylesheet">


    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="loader-active">

    <!--== Preloader Area Start ==-->
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="assets/img/preloader.gif" alt="JSOFT">
            </div>
        </div>
    </div>
    <!--== Preloader Area End ==-->

    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">
        <!--== Header Top Start ==-->
        <div id="header-top" class="d-none d-xl-block">
            <div class="container">
                <div class="row">
                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-left">
                        <i class="fa fa-map-marker"></i> 21133 Randallstown, Maryland
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-center">
                        <i class="fa fa-mobile"></i> +1 4432202654
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-center">
                        <i class="fa fa-clock-o"></i> Mon-Sat 08:00 - 23:00
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Social Icons Start ==-->
                    <div class="col-lg-3 text-right">
                        <div class="header-social-icons">
                            <a href="https://wa.me/14439855520?text=I%20want%20to%20book%20for%20transport" target="_blank"><i class="fa fa-whatsapp"></i></a>
                            <a href="https://www.instagram.com/giddycruisetransport/"><i class="fa fa-instagram"></i></a>
                            <a href="https://facebook.com/Giddycruise" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://twitter.com/giddycruise"><i class="fa fa-twitter"></i></a>
                        </div>
                    </div>
                    <!--== Social Icons End ==-->
                </div>
            </div>
        </div>
        <!--== Header Top End ==-->

        <!--== Header Bottom Start ==-->
        <div id="header-bottom">
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <div class="col-lg-4">
                        <a href="index.php" class="logo">
                            <img src="assets/img/logo.png" alt="JSOFT">
                        </a>
                    </div>
                    <!--== Logo End ==-->

                    <!--== Main Menu Start ==-->
                    <div class="col-lg-8 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>
                                <li><a href="https://giddycruisetransportation.com/">Home</a>

                                </li>
                              <!--  <li><a href="about.html">About</a></li>
                                <li><a href="services.html">services</a></li>
                              -->
                  <!--          <li><a href="index.php">Pages</a>
                                    <ul>
                                        <li><a href="package.html">Pricing</a></li>
                                        <li><a href="driver.html">Driver</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                        <li><a href="gallery.html">Gallery</a></li>
                                        <li><a href="help-desk.html">Help Desk</a></li>
                                        <li><a href="login.html">Log In</a></li>
                                        <li><a href="register.html">Register</a></li>
                                        <li><a href="404.html">404</a></li>
                                    </ul>
                                </li> -->
                                <li><a href="https://giddycruisetransportation.com/faq.php">FAQ</a>

                                </li>
                                <li><a href="https://giddycruisetransportation.com/contact.php">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--== Header Area End ==-->

    <!--== 404 Page Page Content Start ==-->
   <section id="page-404-wrap" class="section-padding overlay">
       <div class="container">
           <div class="row">
               <div class="col-lg-12 text-center">
                 <?php
               echo "<p id='alert' style='color:White;text-align:center;font-weight: bold;'>$msg </p>";
             ?> <br/>

           </br/>
                   <div class="page-404-content">
                     <div class="number">
                 <div class="four">
                      Thanks For Signing Up To
                   <br/>

                 <br/>Giddy Cruise Transport Newsletter
                 </div>
                 <div class="zero">

                 </div>
               <div class="four"></div>
             </div> <br/>

           </br/>
                 <h4>BOOK A TRIP TODAY!</h4>
                 <p>FOR AS LOW AS $10 RIDES FOR TRIPS
 <br> UNDER 15 MINUTES</p>
                  <a href="index.php" class="btn-404-home"><i class="fa fa-home"></i>Book Now</a>
                   </div>
               </div>
         </div>
       </div>
   </section>
   <!--== 404 Page Page Content End ==-->

        <!--== Footer Area Start ==-->
        <section id="footer-area">
            <!-- Footer Widget Start -->
            <div class="footer-widget-area">
                <div class="container">
                    <div class="row">
                        <!-- Single Footer Widget Start -->
                        <div class="col-lg-4 col-md-6">
                            <div class="single-footer-widget">
                                <h2>About Us</h2>
                                <div class="widget-body">
                                    <img src="assets/img/logo.png" alt="JSOFT">
                                    <p>Giddy Cruise Transport  is the synonym of superb chauffeur service in Baltimore and outside Baltimore, and we are ready to go above and beyond to prove that to you.</p>

                                    <div class="newsletter-area">
                                        <form action="index.php">
                                            <input type="email" placeholder="Subscribe Our Newsletter">
                                            <button type="submit" class="newsletter-btn"><i class="fa fa-send"></i></button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Widget End -->

                        <!-- Single Footer Widget Start -->
                        <div class="col-lg-4 col-md-6">
                            <div class="single-footer-widget">
                                <h2>Follow Us </h2>
                                <div class="widget-body">
                                    <ul class="recent-post">
                                        <li>
                                            <a href="https://facebook.com/Giddycruise" target="_blank">
                                               facebook
                                               <i class="fa fa-long-arrow-right"></i>
                                           </a>
                                        </li>
                                        <li>
                                            <a href="https://wa.me/14439855520?text=I%20want%20to%20book%20for%20transport" target="_blank">
                                              whatsapp
                                               <i class="fa fa-long-arrow-right"></i>
                                           </a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/giddycruisetransport/">
                                               Instagram
                                               <i class="fa fa-long-arrow-right"></i>
                                           </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/giddycruise">
                                                twitter
                                               <i class="fa fa-long-arrow-right"></i>
                                           </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Widget End -->

                        <!-- Single Footer Widget Start -->
                        <div class="col-lg-4 col-md-6">
                            <div class="single-footer-widget">
                                <h2>get touch</h2>
                                <div class="widget-body">
                                    <p>Contact Giddy Cruise Transport and let us be your transportation professionals. Call us or message us for more info, or to make a reservation.</p>

                                    <ul class="get-touch">
                                        <li><i class="fa fa-map-marker"></i> 10 Cinnamon Cir, Randallstown, MD 21133, USA</li>
                                        <li><i class="fa fa-mobile"></i>+14432202654 / <i class="fa fa-whatsapp"></i>+14439855520</li>
                                          <li><i class="fa fa-envelope"></i> support@giddycruisetransportation.com</li>
                                        <li><i class="fa fa-envelope"></i> gidicruiztransportation@gmail.com</li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Widget End -->
                    </div>
                </div>
            </div>
            <!-- Footer Widget End -->

            <!-- Footer Bottom Start -->
            <div class="footer-bottom-area">
                <div class="container">
                  <div class="row">
                      <div class="col-lg-2 text-left">
                          <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                           <a href="https://premium90.web-hosting.com:2096/webmaillogin.cgi" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i> Check Mail </a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                      </div>
                      <div class="col-lg-10 text-center">
                          <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                           Copyright &copy;<script>document.write(new Date().getFullYear());</script> Giddy Cruise . All rights reserved | <i class="fa fa-heart-o" aria-hidden="true"></i>                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                      </div>
                  </div>
                </div>
            </div>
            <!-- Footer Bottom End -->
        </section>
        <!--== Footer Area End ==-->

        <!--== Scroll Top Area Start ==-->
        <div class="scroll-top">
            <img src="assets/img/scroll-top.png" alt="JSOFT">
        </div>
        <!--== Scroll Top Area End ==-->

        <!--=======================Javascript============================-->
        <!--=== Jquery Min Js ===-->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <!--=== Jquery Migrate Min Js ===-->
        <script src="assets/js/jquery-migrate.min.js"></script>
        <!--=== Popper Min Js ===-->
        <script src="assets/js/popper.min.js"></script>
        <!--=== Bootstrap Min Js ===-->
        <script src="assets/js/bootstrap.min.js"></script>
        <!--=== Gijgo Min Js ===-->
        <script src="assets/js/plugins/gijgo.js"></script>
        <!--=== Vegas Min Js ===-->
        <script src="assets/js/plugins/vegas.min.js"></script>
        <!--=== Isotope Min Js ===-->
        <script src="assets/js/plugins/isotope.min.js"></script>
        <!--=== Owl Caousel Min Js ===-->
        <script src="assets/js/plugins/owl.carousel.min.js"></script>
        <!--=== Waypoint Min Js ===-->
        <script src="assets/js/plugins/waypoints.min.js"></script>
        <!--=== CounTotop Min Js ===-->
        <script src="assets/js/plugins/counterup.min.js"></script>
        <!--=== YtPlayer Min Js ===-->
        <script src="assets/js/plugins/mb.YTPlayer.js"></script>
        <!--=== Magnific Popup Min Js ===-->
        <script src="assets/js/plugins/magnific-popup.min.js"></script>
        <!--=== Slicknav Min Js ===-->
        <script src="assets/js/plugins/slicknav.min.js"></script>

        <!--=== Mian Js ===-->
        <script src="assets/js/main.js"></script>


                <!-- GetButton.io widget life chat -->
              <script type="text/javascript">
                  (function () {
                      var options = {
                          facebook: "105248471461316", // Facebook page ID
                          whatsapp: "+14439855520", // WhatsApp number
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

    </body>

    </html>
