{{-- /**
* define JS file GLOBAL
* START
*/ --}}
<!-- Js Plugins -->
<script src="{{ asset('/shop/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('/shop/js/bootstrap.min.js ')}}"></script>
<script src="{{ asset('/shop/js/jquery.nice-select.min.js ')}}"></script>
<script src="{{ asset('/shop/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('/shop/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('/shop/js/mixitup.min.js') }}"></script>
<script src="{{ asset('/shop/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/shop/js/main.js') }}"></script>
{{-- /**
* define JS file GLOBAL
* END
*/ --}}
    

{{-- /**
* define JS use INTERNAL (noi no o tung page)
* START (khai bao la css va qua moi page thi` dung @push('js'))
*/ --}}
{{-- declare all file script use global --}}
<script src="/plugins/jquery.min.js"></script>
<script src="/plugins/popper.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.min.js"></script>

{{-- declare other file script use private --}}

@stack('js')
