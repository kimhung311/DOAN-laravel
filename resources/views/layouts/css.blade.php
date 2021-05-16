


{{-- /**
* define CSS file GLOBAL
* START
*/ --}}
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

{{-- code nay de lam j em nhi  --}}
{{-- code nay de chay den file css ở thu muc public --}}
{{-- <base href="{{asset('')}}"> --}}
<!-- Css Styles -->
<link rel="stylesheet" href="/shop/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="/shop/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="/shop/css/elegant-icons.css" type="text/css">
<link rel="stylesheet" href="/shop/css/nice-select.css" type="text/css">
<link rel="stylesheet" href="/shop/css/jquery-ui.min.css" type="text/css">
<link rel="stylesheet" href="/shop/css/owl.carousel.min.css" type="text/css">
<link rel="stylesheet" href="/shop/css/slicknav.min.css" type="text/css">
<link rel="stylesheet" href="/shop/css/style.css" type="text/css">

{{-- /**
* define CSS file GLOBAL
* END
*/ --}}


{{-- /**
* define CSS use INTERNAL (noi no o tung page)
* START (khai bao la css va qua moi page thi` dung @push('css'))
*/ --}}
{{-- all file css use global  --}}
{{-- <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.min.css"> --}}
<link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="/css/common.css">

{{-- declare other file css --}}

@stack('css')
