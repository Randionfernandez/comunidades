<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-10 mx-auto">

                <form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{ route('juntas.update', $junta) }}">
                    @csrf @method('PATCH')

                    <h1 class="display-4"> {{ __($title) }} </h1>
                    <hr>

                    @include('juntas._form', ['btnText1' => $btnText1, 'btnText2' => $btnText2, 'btndisabled' => $btndisabled])

                </form>
            </div>
        </div>
    </div>
</x-app-layout>