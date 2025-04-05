<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>

<script src="{{ asset('assets/frontend/js/vendor/modernizr-3.6.0.min.js') }}" defer></script>
<script src="{{ asset('assets/frontend/js/vendor/bootstrap.bundle.min.js') }}" defer></script>
<script src="{{ asset('assets/frontend/js/plugins/waypoints.js') }}" defer></script>
<script src="{{ asset('assets/frontend/js/plugins/wow.js') }}" defer></script>
<script src="{{ asset('assets/frontend/js/plugins/magnific-popup.js') }}" defer></script>
<script src="{{ asset('assets/frontend/js/plugins/perfect-scrollbar.min.js') }}" defer></script>
<script src="{{ asset('assets/frontend/js/plugins/isotope.js') }}" defer></script>
<script src="{{ asset('assets/frontend/js/plugins/scrollup.js') }}" defer></script>

{{-- <script src="{{ asset('assets/frontend/js/plugins/swiper-bundle.min.js') }}" defer></script> --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.1/nouislider.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.2.0/wNumb.min.js" defer></script>

<script src="{{ asset('assets/frontend/js/plugins/counterup.js') }}" defer></script>
<script src="{{ asset('assets/frontend/js/main8c94.js') }}" defer></script>
<script src="{{ asset('assets/frontend/js/slider.js') }}" defer></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (document.querySelector(".banner-slider")) {
            var swiper = new Swiper(".banner-slider", {
                loop: true,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });
        }
    });
</script>

<script>
    $(document).ready(function() {
        // Change form action based on dropdown selection
        $('#search_type').on('change', function() {
            var searchType = $(this).val();
            var form = $('#searchForm');

            if (searchType === 'jobs') {
                form.attr('action', '{{ route('jobs.index') }}');
            } else if (searchType === 'employers') {
                form.attr('action', '{{ route('employers.index') }}');
            }
        });

        // Mobile version
        $('#mobile_search_type').on('change', function() {
            var searchType = $(this).val();
            var form = $('#mobileSearchForm');

            if (searchType === 'jobs') {
                form.attr('action', '{{ route('jobs.index') }}');
            } else if (searchType === 'employers') {
                form.attr('action', '{{ route('employers.index') }}');
            }
        });
    });
</script>
