@push('scripts')
        <script>
            $(document).ready(function() {
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'There are not',
                    body: 'There are not communities created yet.',
                });
            });
        </script>
    @endpush