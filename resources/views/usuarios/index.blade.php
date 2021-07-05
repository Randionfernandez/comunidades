<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @lang('Users')
        </h2>
        <hr>
    </x-slot>

    @if($activeCommunity->nombreRole($activeCommunity) == 'admin')

    <x-jet-button onclick="location.href ='{{ route('usuarios.create') }}'">@lang('New')</x-jet-button>

    <div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <br>
        <table class="table table-bordered">
            <tr>
                <th>Nombre</th>
                <th>@lang('Email')</th>
                <th width="280px">Action</th>
            </tr>
            @forelse ($users as $user)

            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <form action="{{ route('usuarios.destroy',$user) }}" method="POST">

                        <a class="btn btn-primary" href="{{ route('usuarios.show',$user) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('usuarios.edit',$user) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            @endforelse
        </table>

        @else 
        <div class="alert alert-warning">
            <p>No tienes permisos para ver los usuarios de esta comunidad</p>
        </div> 
        @endif
    </div>

</x-app-layout>
