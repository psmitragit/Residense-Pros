{!! $output !!}
<script>
    window.addEventListener('DOMContentLoaded', function() {
        $('a').on('click', function(e) {
            e.preventDefault();
        });

        $('#logoutBtn').remove();

        $('form').on('submit', function(e) {
            e.preventDefault();
        });

        $('.ad_module_{{ $position }}').removeClass('d-none');
        $('.ad_module_{{ $position }} img').attr('src', "{{ $image }}");
        $('.ad_module_{{ $position }} a').attr('href', "{{ $link }}");
        $('.ad_module_{{ $position }} a').addClass('ad-image');

        $(document).on('click', '.ad-image', function() {
            window.open($(this).attr('href'), '_blank');
        });
    });
</script>
