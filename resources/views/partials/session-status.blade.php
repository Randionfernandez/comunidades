@if (session('status'))
    @push('scripts')
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
            };
            })

            Toast.fire ({
            icon: 'success',
                    title: 'Signed in successfully'
                    })
                $(document).ready(function() {
                    $(document).Toasts('create', {
            class: '{{session('status')[1]}}',
                    title: 'Aceptado',
                    body: '{{ session('status')[0]}}',
            });
                    }
            );
        </script>
    @endpush
@endif