<script>
    @if ($message = Session::get('success'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ __($message) }}");
    @endif

    @if ($message = Session::get('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ __($message) }}");
    @endif

    @if ($message = Session::get('warning'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.warning("{{ __($message) }}");
    @endif

    @if ($message = Session::get('info'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.info("{{ __($message) }}");
    @endif

    @if ($errors->any())

        @foreach ($errors->all() as $error)
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>

<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Tem certeza de que deseja excluir este registro?`,
                text: "Se você excluir isso, ele desaparecerá para sempre.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>