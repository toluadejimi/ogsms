<!doctype html>
<html lang="en"><!-- [Head] start -->
<head><title>OGSMSPOOL</title><!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
          content="OGSMSPOOL NUMBER VERIFICATION">
    <meta name="keywords"
          content="OGSMSPOOL VERIFICATION">
    <meta name="author" content="Phoenixcoded"><!-- [Favicon] icon -->
    <link rel="icon" href="{{url('')}}/public/assets/images/favicon.svg" type="image/x-icon"><!-- [Font] Family -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/fonts/inter/inter.css" id="main-font-link">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/fonts/tabler-icons.min.css">
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/fonts/feather.css">
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/fonts/fontawesome.css">
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/fonts/material.css"><!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/css/style.css" id="main-style-link">
    <link rel="stylesheet" href="{{url('')}}/public/assets/css/style-preset.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
          integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
          crossorigin="anonymous"/>


</head><!-- [Head] end --><!-- [Body] Start -->
<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr"
      data-pc-theme_contrast="" data-pc-theme="light"><!-- [ Pre-loader ] start -->
<div class="page-loader">
    <div class="bar"></div>
</div><!-- [ Pre-loader ] End --><!-- [ Sidebar Menu ] start -->

<header
    id="home"
    style="background-image: url({{url('')}}/public/assets/images/landing/img-headerbg.jpg)"
>
    <!-- [ Nav ] start --><!-- [ Nav ] start -->
    <nav class="navbar navbar-expand-md navbar-light default">
        <div class="container">
            <a class="navbar-brand" href="/"
            ><img src="{{url('')}}/public/assets/images/logo.svg" alt="logo"/> </a >

            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">

                    <li class="nav-item px-1">
                        <a class="nav-link"
                           href="us">Home
                        </a>
                    </li>


                    <li class="nav-item px-1">
                        <a class="nav-link"
                           href="fund-wallet" >Fund Wallet</a >
                    </li>

                    <li class="nav-item px-1">
                        <a class="nav-link"
                           href="orders" >My Orders</a >
                    </li>

                    <li class="nav-item px-1">
                        <a class="nav-link"
                           href="https://api.whatsapp.com/send?phone=2349047123389" >Support</a >
                    </li>

                    <li class="nav-item px-1">
                        <a class="nav-link"
                           href="https://ogbetterboost.com/" > 🚀 Boost social account</a >
                    </li>

                    <li class="nav-item px-1">
                        <a class="nav-link"
                           href="https://myoglog.com/" > 🛍️ Buy Account</a >
                    </li>






                    <li class="nav-item px-1">
                        <a class="nav-link text-danger" href="log-out">Log Out</a>
                    </li>





                </ul>
            </div>




            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">

                    <li class="nav-item">
                        <a
                            style="background: rgb(63,63,63); color: white"
                            class="btn btn btn-buy"
                            target="_blank"
                            href="fund-wallet"><i class="ti ti-wallet"></i
                            >NGN {{number_format(Auth::user()->wallet, 2)}} </a>
                    </li>
                </ul>
            </div>



            <button
                style="background: rgb(63,63,63); color: white"
                class="navbar-toggler rounded"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>


        </div>
    </nav>
    <!-- [ Nav ] start --><!-- [ Nav ] start -->

</header>


@yield('content')


<footer class="footer">
    <p class="d-flex justify-content-center">2024 OGSMSPOOL</p>
</footer>


<!-- Required Js -->
<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{url('')}}/public/assets/js/plugins/popper.min.js"></script>
<script src="{{url('')}}/public/assets/js/plugins/simplebar.min.js"></script>
<script src="{{url('')}}/public/assets/js/plugins/bootstrap.min.js"></script>
<script src="{{url('')}}/public/assets/js/fonts/custom-font.js"></script>
<script src="{{url('')}}/public/assets/js/pcoded.js"></script>
<script src="{{url('')}}/public/assets/js/plugins/feather.min.js"></script>
<script>layout_change('false');</script>
<script>layout_theme_contrast_change('false');</script>
<script>change_box_container('false');</script>
<script>layout_caption_change('true');</script>
<script>layout_rtl_change('false');</script>
<script>preset_change('preset-4');</script>
<script>main_layout_change('vertical');</script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<style>
    .float{
        position:fixed;
        width:60px;
        height:60px;
        bottom:40px;
        right:40px;
        background-color:#25d366;
        color:#FFF;
        border-radius:50px;
        text-align:center;
        font-size:30px;
        box-shadow: 2px 2px 3px #999;
        z-index:100;
    }

    .my-float{
        margin-top:16px;
    }


    .twitter {
        font: normal normal 10px Arial;
        text-align: center;
        color: #998578;
        text-transform: uppercase;
        letter-spacing: 3px;
    }

    .twitter {
        color: #000000;
        text-decoration: none;
        display: block;
        padding: 14px;
        -webkit-transition: all .25s ease;
        -moz-transition: all .25s ease;
        -ms-transition: all .25s ease;
        -o-transition: all .25s ease;
        transition: all .25s ease;
    }

    .twitter :hover {
        color: #FF7D6D;
        text-decoration: none;
    }

    /* Floating Social Media Bar Style Starts Here */

    .fl-fl {
        background: #000000;
        text-transform: uppercase;
        letter-spacing: 3px;
        padding: 4px;
        width: 190px;
        position: fixed;
        right: -145px;
        z-index: 1000;
        font: normal normal 10px Arial;
        -webkit-transition: all .25s ease;
        -moz-transition: all .25s ease;
        -ms-transition: all .25s ease;
        -o-transition: all .25s ease;
        transition: all .25s ease;
    }

    .s-fab {
        font-size: 20px;
        color: #fff;
        padding: 10px 0;
        width: 40px;
        margin-left: 10px;
    }

    .fl-fl:hover {
        right: 0;
    }

    .fl-fl a {
        color: #fff !important;
        text-decoration: none;
        text-align: center;
        line-height: 43px!important;
        vertical-align: top!important;
    }

    .float-fb {
        top: 160px;
    }

    .float-tw {
        top: 215px;
    }

    .float-gp {
        top: 270px;
    }

    .float-rs {
        top: 325px;
    }

    .float-ig {
        top: 380px;
    }

    .float-pn {
        top: 435px;
    }
    /* Floating Social Media Bar Style Ends Here */


    /* Follow us DropDown Starts */

    .btn-clr {
        /*   background: linear-gradient(90deg, rgba(2,0,36,0) 0%, rgba(10,221,8,0.9307073171065301) 0%, rgba(8,220,50,0.9251050762101716) 39%, rgba(6,218,99,0.9251050762101716) 73%, rgba(4,216,156,0.9335084375547094) 100%, rgba(0,212,255,0) 100%); */
        color : #ffffff;
        font : 900 16px/20px 'Lato' sans serif;
    }

    .btn-clr>button:hover{
        background-color: #000000;
        color : #0add08 ;
    }

    .dropdown-menu>li>a:hover,
    .dropdown-menu>li>a:focus{
        background-color: none!important;
    }
    .tb, .tb2, .tb3, .tb4{
        display:flex;
    }

    .tb, .tb2,.tb3{
        border-bottom: 3px solid white;
    }

    .sb {
        padding:10px 0;
        color:white
    }

    .sb-fb{
        padding-right : 3px;
    }
    .tb-sb-fb{
        background-color: #3b5998;
        border-right: 3px solid white;
    }
    .sb-tw {
        padding-right : 3px;
    }
    .tb-sb-tw{
        background-color: #1da1f2;
        border-right: 3px solid white;
    }
    .tb4-sb-rss{
        background-color: #ee802f;
        border-right: 3px solid white;
    }
    .sb-tg{
        padding-right :2px;
    }
    .tb2-sb-tg{
        background-color: #0088cc;
    }

    .sb-in{
        padding-right :1.5px;
    }
    .tb-sb-in{
        background-color: #0a66c2;
    }
    .tb2-sb-ig{
        background: #f09433;
        background: -moz-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        background: -webkit-linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
        background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f09433', endColorstr='#bc1888',GradientType=1 );
        border-right: 3px solid white;
    }
    .sb-tk{
        padding-right : 0.5px;
    }
    .tb3-sb-tk{
        background-color: #000;
        border-right: 3px solid white;
    }
    .tb2-sb-yt{
        background-color: #ff0000;
        border-right: 3px solid white;
    }

    .tb3-sb-med{
        background-color: #02b875;
    }
    .sb-whapp{
        padding-right : 3.5px;
    }
    .tb3-sb-whapp{
        background-color: #25d366;
        border-right: 3px solid white;
    }
    /* DropDown Ends */

    /* Tiktok Logo */
    .tiktok{
        position: relative;
        width: 200px;
        margin: 100px auto;
    }

    .logo {
        position: absolute;
        top: 0;
        left: 0;
        width: 47px;
        height: 218px;
        z-index: 1;
        background: #24f6f0;
    }

      .logo::after {
          font-family:'FontAwesome';
          content: "e07b";
          position: absolute;
          width: 140px;
          height: 140px;
          border: 40px solid #24f6f0;
          border-right: 40px solid transparent;
          border-top: 40px solid transparent;
          border-left: 40px solid transparent;
          top: -110px;
          right: -183px;
          border-radius: 100%;
          transform: rotate(45deg);
          z-index: -10;
      }

      .logo::before {
          content: "e07b";
          position: absolute;
          width: 100px;
          height: 100px;
          border: 47px solid #24f6f0;
          border-top: 47px solid transparent;
          border-radius: 50%;
          top: 121px;
          left: -147px;
          transform: rotate(45deg);
      }

    .logo:last-child {
        left: 10px;
        top: 10px;
        background: #fe2d52;
        z-index: 100;
    }

      .logo:last-child::before {
          border: 47px solid #fe2d52;
          border-top: 47px solid transparent;
      }
    .logo:last-child::after {
        border: 40px solid #fe2d52;
        border-right: 40px solid transparent;
        border-top: 40px solid transparent;
        border-left: 40px solid transparent;
    }


    .logo:last-child {
        mix-blend-mode: lighten;
    }
</style>


<div class="float-sm">
    <div class="fl-fl float-fb">
        <a href="https://api.whatsapp.com/send?phone=2349047123389" target="_blank">
        <svg width="30" height="30" viewBox="0 0 93 89" fill="none" xmlns="http://www.w3.org/2000/svg">
            <mask id="mask0_264_411" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="9" y="9" width="75" height="71">
                <path d="M9.6875 9.27075H83.3125V79.7291H9.6875V9.27075Z" fill="white"/>
            </mask>
            <g mask="url(#mask0_264_411)">
                <path d="M53.4362 9.78993L51.2275 9.49326C44.5894 8.57603 37.8155 9.48345 31.6957 12.1097C25.5759 14.736 20.3622 18.973 16.6625 24.3266C12.7261 29.444 10.3795 35.5211 9.89279 41.8584C9.40607 48.1958 10.799 54.5359 13.9112 60.1491C14.2298 60.7117 14.4281 61.3293 14.4946 61.966C14.5611 62.6026 14.4945 63.2456 14.2988 63.8574C12.71 69.0862 11.2375 74.352 9.6875 79.8774L11.625 79.3212C16.8563 77.9862 22.0875 76.6512 27.3188 75.4274C28.4229 75.2077 29.5706 75.3111 30.6125 75.7241C35.3059 77.9162 40.4349 79.1221 45.6554 79.2611C50.8759 79.4 56.0671 78.4687 60.8805 76.5297C65.694 74.5906 70.0183 71.6887 73.5634 68.0186C77.1084 64.3485 79.7922 59.9953 81.4345 55.2509C83.0768 50.5066 83.6396 45.4809 83.0853 40.5113C82.531 35.5416 80.8723 30.7429 78.2205 26.4372C75.5688 22.1315 71.9853 18.4185 67.7106 15.5472C63.4359 12.676 58.5689 10.7129 53.4362 9.78993ZM63.2012 58.4433C61.7929 59.6499 60.0755 60.4778 58.2241 60.8426C56.3726 61.2074 54.4531 61.0961 52.6613 60.5199C44.5414 58.3319 37.4969 53.4564 32.7825 46.762C30.9817 44.3943 29.5341 41.7983 28.4812 39.0487C27.9111 37.4533 27.8082 35.7389 28.1839 34.0915C28.5596 32.4441 29.3995 30.9267 30.6125 29.7037C31.203 28.9825 32.0068 28.4481 32.9191 28.1703C33.8315 27.8925 34.8101 27.8841 35.7275 28.1462C36.5025 28.3316 37.045 29.407 37.7425 30.2228C38.3082 31.7544 38.9709 33.2526 39.7188 34.7099C40.2861 35.4535 40.5231 36.3816 40.3779 37.2918C40.2327 38.202 39.7171 39.0202 38.9438 39.5678C37.2 41.0512 37.4712 42.2749 38.7112 43.9437C41.4526 47.7231 45.2352 50.7011 49.6388 52.547C50.8788 53.0662 51.8087 53.1774 52.6225 51.9537C52.9712 51.4716 53.4363 51.0637 53.8238 50.6187C56.0713 47.9116 55.3738 47.9487 58.9388 49.432C60.0741 49.8881 61.1746 50.4221 62.2325 51.0266C63.2787 51.6199 64.8675 52.2503 65.1 53.1403C65.3237 54.1059 65.2648 55.1117 64.9298 56.0473C64.5948 56.9829 63.9967 57.8119 63.2012 58.4433Z" fill="white"/>
            </g>
        </svg>
        <i class="fa fa-whatsapp my-float"></i>
       Whatsapp
        </a>
    </div>
    <div class="fl-fl float-tw">
        <a href="https://t.me/ogsmspool" target="_blank">
        <svg width="30" height="30" viewBox="0 0 107 104" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M53.5 8.66675C28.89 8.66675 8.91663 28.0801 8.91663 52.0001C8.91663 75.9201 28.89 95.3334 53.5 95.3334C78.11 95.3334 98.0833 75.9201 98.0833 52.0001C98.0833 28.0801 78.11 8.66675 53.5 8.66675ZM74.1866 38.1334C73.5179 44.9801 70.62 61.6201 69.1487 69.2901C68.5245 72.5401 67.2762 73.6234 66.117 73.7534C63.5312 73.9701 61.5695 72.1067 59.0729 70.5034C55.1495 67.9901 52.9204 66.4301 49.1308 64.0034C44.717 61.1867 47.5704 59.6267 50.1116 57.1134C50.7804 56.4634 62.1937 46.3667 62.4166 45.4567C62.4476 45.3189 62.4435 45.1758 62.4046 45.0399C62.3658 44.904 62.2934 44.7793 62.1937 44.6767C61.9262 44.4601 61.5695 44.5467 61.2575 44.5901C60.8562 44.6767 54.6145 48.7067 42.4433 56.6801C40.66 57.8501 39.055 58.4567 37.6283 58.4134C36.0233 58.3701 32.9916 57.5467 30.7179 56.8101C27.9091 55.9434 25.7245 55.4667 25.9029 53.9501C25.992 53.1701 27.1066 52.3901 29.202 51.5667C42.2204 46.0634 50.8695 42.4234 55.1941 40.6901C67.5883 35.6634 70.1295 34.7967 71.8237 34.7967C72.1804 34.7967 73.0275 34.8834 73.5625 35.3167C74.0083 35.6634 74.142 36.1401 74.1866 36.4867C74.142 36.7467 74.2312 37.5267 74.1866 38.1334Z" fill="white"/>
        </svg>
        Telegram
        </a>
    </div>
{{--    <div class="fl-fl float-gp">--}}
{{--        <i class="fab fa-google-plus-g s-fab"></i>--}}
{{--        <a href="" target="_blank">Recommend us!</a>--}}
{{--    </div>--}}
{{--    <div class="fl-fl float-rs">--}}
{{--        <i class="fas fa-rss s-fab"></i>--}}
{{--        <a href="" target="_blank">Follow via RSS</a>--}}
{{--    </div>--}}
{{--    <div class="fl-fl float-ig">--}}
{{--        <i class="fab fa-instagram s-fab"></i>--}}
{{--        <a href="" target="_blank">Follow us!</a>--}}
{{--    </div>--}}
{{--    <div class="fl-fl float-pn">--}}
{{--        <i class="fab fa-pinterest-p s-fab"></i>--}}
{{--        <a href="" target="_blank">Follow us!</a>--}}
{{--    </div>--}}
</div>

{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">--}}
{{--<a href="https://api.whatsapp.com/send?phone=2349047123389" class="float" target="_blank">--}}
{{--    <i class="fa fa-whatsapp my-float"></i>--}}
{{--</a>--}}




</body>
<!-- [Body] end -->
</html>
