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
        // let userId = {{ auth()->check() ? auth()->id() : 'null' }};

        $("#applyJobForm").on("submit", function(e) {
            e.preventDefault();

            // if (!userId) {
            //     alert("Bạn cần đăng nhập trước khi ứng tuyển!");
            //     return;
            // }

            let formData = new FormData(this);
            // formData.append("user_id", userId);

            $.ajax({
                url: "{{ route('candidate.store') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                beforeSend: function() {
                    $("#applyJobForm button[type=submit]").prop("disabled", true).text(
                        "Đang gửi...");
                },
                success: function(response) {
                    if (response.success) {
                        alert("Ứng tuyển thành công!");
                        $("#applyJobForm")[0].reset();
                        $("#ModalApplyJobForm").modal("hide");
                    } else {
                        alert("Đã có lỗi xảy ra: " + response.message);
                    }
                },
                error: function(xhr) {
                    console.error("Lỗi từ server:", xhr); // Log lỗi chi tiết lên console
                    let errorMessage = "Đã có lỗi xảy ra!\n";

                    if (xhr.responseJSON) {
                        if (xhr.responseJSON.message) {
                            errorMessage += "Thông báo: " + xhr.responseJSON.message + "\n";
                        }
                        if (xhr.responseJSON.errors) {
                            errorMessage += "Chi tiết:\n";
                            $.each(xhr.responseJSON.errors, function(key, value) {
                                errorMessage += "- " + value + "\n";
                            });
                        }
                    } else {
                        errorMessage += "Lỗi không xác định!";
                    }

                    alert(errorMessage);
                },
                complete: function() {
                    $("#applyJobForm button[type=submit]").prop("disabled", false).text(
                        "Ứng tuyển");
                },
            });
        });
    });
</script>
