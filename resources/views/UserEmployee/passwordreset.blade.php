<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Register Email</title>
    <style>
      /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; }

      body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; }

      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top; }

      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

      .body {
        background-color: #f6f6f6;
        width: 100%; }

      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        Margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px; }

      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        Margin: 0 auto;
        max-width: 580px;
        padding: 10px; }

      /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
      .main {
        background: #ffffff;
        border-radius: 3px;
        width: 100%; }

      .wrapper {
        box-sizing: border-box;
        padding: 20px; }

      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }

      .footer {
        clear: both;
        Margin-top: 10px;
        text-align: center;
        width: 100%; }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center; }

      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h1,
      h2,
      h3,
      h4 {
        color: #000000;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        margin-bottom: 30px; }

      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize; }

      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        margin-bottom: 15px; }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; }

      a {
        color: #3498db;
        text-decoration: underline; }

      /* -------------------------------------
          BUTTONS
      ------------------------------------- */
      .btn {
        box-sizing: border-box;
        width: 100%; }
        .btn > tbody > tr > td {
          padding-bottom: 15px; }
        .btn table {
          width: auto; }
        .btn table td {
          background-color: #ffffff;
          border-radius: 5px;
          text-align: center; }
        .btn a {
          background-color: #ffffff;
          border: solid 1px #3498db;
          border-radius: 5px;
          box-sizing: border-box;
          color: #3498db;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize; }

      .btn-primary table td {
        background-color: #3498db; }

      .btn-primary a {
        background-color: #3498db;
        border-color: #3498db;
        color: #ffffff; }

      /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
      .last {
        margin-bottom: 0; }

      .first {
        margin-top: 0; }

      .align-center {
        text-align: center; }

      .align-right {
        text-align: right; }

      .align-left {
        text-align: left; }

      .clear {
        clear: both; }

      .mt0 {
        margin-top: 0; }

      .mb0 {
        margin-bottom: 0; }

      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0; }

      .powered-by a {
        text-decoration: none; }

      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        Margin: 20px 0; }

      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important; }
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
          font-size: 16px !important; }
        table[class=body] .wrapper,
        table[class=body] .article {
          padding: 10px !important; }
        table[class=body] .content {
          padding: 0 !important; }
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important; }
        table[class=body] .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important; }
        table[class=body] .btn table {
          width: 100% !important; }
        table[class=body] .btn a {
          width: 100% !important; }
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important; }}

      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
      @media all {
        .ExternalClass {
          width: 100%; }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%; }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important; }
        .btn-primary table td:hover {
          background-color: #34495e !important; }
        .btn-primary a:hover {
          background-color: #34495e !important;
          border-color: #34495e !important; } }

    </style>
  </head>
  <body class="">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">

            <!-- START CENTERED WHITE CONTAINER -->
            <!-- <span class="preheader">This is preheader text. Some clients will show this text as a preview.</span> -->
            <table role="presentation" class="main">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        <p>Hi {{ $employee->Name }}</p>
                        <p>Our system received a ‘Change Password’ request. If this was issued by you, please reset your password by clicking on the link below.</p>
                        <p><a href="{{$reset_url}}" target="_blank" style="display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;">Reset</a></p>
                        <p>If you did not send this request, then please  ignore this message and your password will not be changed.</p>
                        <p>Contact</p>
                        <p>HR</p>
                        <!--<p><a href="{{URL::to('/')}}"><img src="{{url('public/images/mail.png')}}" </a></p>-->
                        <!--<p><img src="data:image/png;base64,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" /></p>-->
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            <div class="footer">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="content-block">
                    <!--<span class="apple-link">Test Company Inc</span>-->
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>
