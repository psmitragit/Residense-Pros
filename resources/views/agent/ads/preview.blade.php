{!! $output !!}
<script>
    window.addEventListener('DOMContentLoaded', function() {
        $('.ad-image').on('click', function() {
            window.open($(this).attr('href'), '_blank');
        });

        $('a').on('click', function(e) {
            e.preventDefault();
        });

        $('#logoutBtn').remove();

        $('form').on('submit', function(e) {
            e.preventDefault();
        });
    });
</script>
