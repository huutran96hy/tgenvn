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
        if (document.querySelector(".banner-swiper")) {
            new Swiper(".banner-swiper", {
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });
        }

        if (document.querySelector(".swiper-group-5")) {
            new Swiper(".swiper-group-5", {
                slidesPerView: 1,
                spaceBetween: 15,
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    576: {
                        slidesPerView: 2
                    },
                    768: {
                        slidesPerView: 3
                    },
                    992: {
                        slidesPerView: 4
                    },
                    1200: {
                        slidesPerView: 5
                    },
                },
            });
        }
    });
</script>

<script>
    $(document).ready(function() {
        function updateFormAction(formSelector, selectSelector) {
            var searchType = $(selectSelector).val();
            var form = $(formSelector);

            if (searchType === 'jobs') {
                form.attr('action', '{{ route('jobs.index') }}');
            } else if (searchType === 'employers') {
                form.attr('action', '{{ route('employers.index') }}');
            }
        }

        // Set action ngay khi load trang
        updateFormAction('#searchForm', '#search_type');
        updateFormAction('#mobileSearchForm', '#mobile_search_type');

        // Cập nhật action khi người dùng chọn dropdown
        $('#search_type').on('change', function() {
            updateFormAction('#searchForm', '#search_type');
        });

        $('#mobile_search_type').on('change', function() {
            updateFormAction('#mobileSearchForm', '#mobile_search_type');
        });
    });
</script>
