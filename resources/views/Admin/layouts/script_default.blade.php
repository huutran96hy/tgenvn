<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Datepicker JS -->
<script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker-full.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

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
