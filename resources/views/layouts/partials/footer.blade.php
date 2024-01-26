{{-- <script src="{{ asset('assets/dist/js/jquery-3.3.1.slim.min.js') }}"></script> --}}
<script>
    window.jQuery || document.write('<script src="dist/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<script src="{{ asset('assets/dist/js/vendor/popper.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/swipe.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/bootstrap.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
<script>
    var APP_URL = {!! json_encode(url('/')) !!};
    function scrollToBottom(el) {
        el.scrollTop = el.scrollHeight;
    }
    scrollToBottom(document.getElementById('content'));
</script>
<script src="{{asset('assets/dist/js/settings.js')}}"></script>
<script src="{{asset('assets/dist/js/my-contact.js')}}"></script>
<script src="{{asset('assets/dist/js/chat.js')}}"></script>
