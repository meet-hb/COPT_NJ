<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="author" content="Coptnj" />

<link rel="stylesheet" href="{{ url('/') }}/assets/front/css/bootstrap.min.css">
{{-- <link rel="stylesheet" href="{{secure_asset('public/assets/front/css/bootstrap.min.css')}}"> --}}

<link rel="stylesheet" href="{{ url('/') }}/assets/front/css/remixicon.css">


<link rel="stylesheet" href="{{ url('/') }}/assets/front/css/flaticon_zigo.css">
<link rel="stylesheet" href="{{ url('/') }}/assets/front/css/swiper-bundle.min.css">
{{-- <link rel="stylesheet" href="{{secure_asset('public/assets/front/css/swiper-bundle.min.css')}}"> --}}

<link rel="stylesheet" href="{{ url('/') }}/assets/front/css/aos.css">
<link rel="stylesheet" href="{{ url('/') }}/assets/front/css/header.css">
{{-- <link rel="stylesheet" href="{{secure_asset('public/assets/front/css/header.css')}}"> --}}
{{-- <link rel="stylesheet" href="{{secure_asset('public/assets/front/css/style.css')}}"> --}}
<link rel="stylesheet" href="{{ url('/') }}/assets/front/css/style.css">
<link rel="stylesheet" href="{{ url('/') }}/assets/front/css/footer.css">
{{-- <link rel="stylesheet" href="{{secure_asset('public/assets/front/css/footer.css')}}"> --}}
<link rel="stylesheet" href="{{ url('/') }}/assets/front/css/responsive.css">
{{-- <link rel="stylesheet" href="{{secure_asset('public/assets/front/css/responsive.css')}}"> --}}
<link rel="stylesheet" href="{{ url('/') }}/assets/front/css/dark-theme.css">
<link rel="icon" type="image/png" href="{{ url('/') }}/assets/front/img/favicon.png">
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">  --}}
<style>
    body,
    html {
        background-image: none !important;
    }

    @media only screen and (max-width: 575px) {
        .footer-subscribe .subscribe-wrapper-inner {
            display: block !important;
        }
    }

    /* Add this to your CSS */
    .social-profile {
        display: flex;
        gap: 10px;
        /* space between icons */
        padding: 0;
        margin-top: 15px;
    }

    .social-profile li {
        list-style: none;
    }

    .social-profile li a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background-color: #00b2a9;
        /* Match your site theme */
        color: white;
        font-size: 16px;
        transition: 0.3s ease;
    }

    .social-profile li a:hover {
        background-color: #008a84;
    }

    .contact-info li {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        color: #fff;
    }

    .contact-info li span {
        display: flex;
        align-items: center;
        justify-content: center;
        background: #00b2a9;
        color: white;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        margin-right: 10px;
        font-size: 16px;
    }

    .footer-widget {
        margin-bottom: 30px;
    }

    .footer-widget-title {
        margin-bottom: 15px;
        font-weight: bold;
        color: #fff;
    }
</style>
