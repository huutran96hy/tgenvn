<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Datepicker JS -->
<script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker-full.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

{{-- Đổi theme --}}
<script>
    $(document).ready(function() {
        let body = $("body");
        let themeIcon = $("#theme-icon");
        let storageKey = "theme";

        let currentTheme = localStorage.getItem(storageKey) || "light";
        body.attr("data-color-theme", currentTheme);
        themeIcon.toggleClass("fa-sun", currentTheme === "dark");
        themeIcon.toggleClass("fa-moon", currentTheme === "light");

        $("#toggle-theme").click(function(e) {
            e.preventDefault();
            let newTheme = body.attr("data-color-theme") === "dark" ? "light" : "dark";

            body.attr("data-color-theme", newTheme);
            themeIcon.toggleClass("fa-sun", newTheme === "dark");
            themeIcon.toggleClass("fa-moon", newTheme === "light");

            localStorage.setItem(storageKey, newTheme);
        });
    });
</script>
