@section('script')
    <script>
        $('.only-number').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        }).click(function() {
            $(this).select();
        });

    </script>
@endsection
