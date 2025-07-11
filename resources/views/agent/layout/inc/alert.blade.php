@if (session()->has('success'))
    @php
        $msg = session('success');
        $icon = 'success';
        session()->forget('success');
    @endphp
@elseif (session()->has('error'))
    @php
        $msg = session('error');
        $icon = 'error';
        session()->forget('error');
    @endphp
@endif

@if (!empty($msg))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                html: "{{ $msg }}",
                icon: "{{ $icon }}"
            })
        });
    </script>
@endif
