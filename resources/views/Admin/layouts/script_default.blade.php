<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- <script src="{{ mix('assets/frontend/js/style.js') }}" async></script> --}}

<script>
    $(document).ready(function() {
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
