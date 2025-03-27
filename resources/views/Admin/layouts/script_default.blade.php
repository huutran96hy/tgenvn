<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- <script src="{{ mix('assets/frontend/js/style.js') }}" async></script> --}}

<script>
    $(document).ready(function() {
        // Dropdown for profile
        $(".dropdown-toggle-custom").on("click", function(e) {
            e.preventDefault();
            var dropdownMenu = $(this).closest(".nav-item").find(".dropdown-menu");

            $(".dropdown-menu").not(dropdownMenu).removeClass("show").css("right", "");

            // Toggle dropdown này và thêm right: 0;
            if (dropdownMenu.hasClass("show")) {
                dropdownMenu.removeClass("show").css("right", "");
            } else {
                dropdownMenu.addClass("show").css("right", "0");
            }
        });

        // Ẩn dropdown khi click ra ngoài
        $(document).on("click", function(e) {
            if (!$(e.target).closest(".nav-item").length) {
                $(".dropdown-menu").removeClass("show").css("right", "");
            }
        });

        // Đóng mở sidebar
        $(".sidebar-main-resize").on("click", function() {
            $(".sidebar").toggleClass("sidebar-main-resized");
        });

        // $(".sidebar-mobile-main-toggle").on("click", function() {
        //     $(".sidebar").toggleClass("open"); 
        // });

        // Đổi theme
        let body = $("body");

        let currentTheme = localStorage.getItem("theme") || "dark";
        body.attr("data-color-theme", currentTheme);

        $("#toggle-theme").click(function() {
            let newTheme = body.attr("data-color-theme") === "dark" ? "light" : "dark";
            body.attr("data-color-theme", newTheme);
            localStorage.setItem("theme", newTheme);
        });
    });
</script>
