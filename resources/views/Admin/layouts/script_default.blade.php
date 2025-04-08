<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Datepicker JS -->
<script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker-full.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        let body = $("body");
        let themeIcon = $("#theme-icon");
        let toggleThemeBtn = $("#toggle-theme");

        // Lấy theme từ localStorage trước
        let currentTheme = localStorage.getItem("theme") || "light";
        applyTheme(currentTheme);

        // Khi nhấn vào nút đổi theme
        toggleThemeBtn.click(function(e) {
            e.preventDefault();
            let newTheme = body.attr("data-color-theme") === "dark" ? "light" : "dark";

            applyTheme(newTheme);

            // Lưu vào localStorage
            localStorage.setItem("theme", newTheme);
        });

        // Hàm áp dụng theme
        function applyTheme(theme) {
            body.attr("data-color-theme", theme);
            themeIcon.toggleClass("fa-sun", theme === "dark");
            themeIcon.toggleClass("fa-moon", theme === "light");
        }
    });
</script>

{{-- Clear input search --}}
<script>
    $(document).ready(function() {
        function toggleClearBtn(input) {
            let $btn = input.siblings('.clear-btn');
            $btn.toggle(input.val().length > 0);
        }

        $('.clearable-input').each(function() {
            let $input = $(this);

            toggleClearBtn($input);

            $input.on('input', function() {
                toggleClearBtn($input);
            });

            $input.siblings('.clear-btn').on('click', function() {
                $input.val('').trigger('input').focus();
            });
        });
    });
</script>
