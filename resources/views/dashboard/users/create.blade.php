@extends('layouts.dashboard')

@section('content')
<div class="card uper">
    <div class="card-header">
        Add Shows
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('users.store') }}">
            <div class="form-group">
                @csrf
                <label for="email">Show Name:</label>
                <input type="email" class="form-control" name="email" />
            </div>
            <div class="form-group">
                <label for="password">Show Genre :</label>
                <input type="password" class="form-control" name="password" />
                <!-- </div>
                    <div class="form-group">
                        <label for="price">Show IMDB Rating :</label>
                        <input type="text" class="form-control" name="imdb_rating" />
                    </div>
                    <div class="form-group">
                        <label for="quantity">Show Lead Actor :</label>
                        <input type="text" class="form-control" name="lead_actor" />
                    </div> -->
                <button type="submit" class="btn btn-primary">Create Show</button>
        </form>
    </div>
</div>
</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
@endsection