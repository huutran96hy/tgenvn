<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Datepicker JS -->
<script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker-full.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        let body = $("body");
        let themeIcon = $("#theme-icon");

        // Lấy URL từ Laravel
        let getThemeUrl = "{{ route('admin.get.theme') }}";
        let changeThemeUrl = "{{ route('admin.change.theme') }}";

        // Lấy theme từ database
        $.get(getThemeUrl, function(response) {
            let currentTheme = response.theme || "light";
            body.attr("data-color-theme", currentTheme);
            themeIcon.toggleClass("fa-sun", currentTheme === "dark");
            themeIcon.toggleClass("fa-moon", currentTheme === "light");
        });

        // Khi nhấn vào nút đổi theme
        $("#toggle-theme").click(function(e) {
            e.preventDefault();
            let newTheme = body.attr("data-color-theme") === "dark" ? "light" : "dark";

            body.attr("data-color-theme", newTheme);
            themeIcon.toggleClass("fa-sun", newTheme === "dark");
            themeIcon.toggleClass("fa-moon", newTheme === "light");

            // Gửi request lưu theme vào database
            $.ajax({
                url: changeThemeUrl,
                type: "POST",
                data: {
                    theme: newTheme
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                success: function(response) {
                    console.log("Theme updated:", response);
                }
            });
        });
    });
</script>
