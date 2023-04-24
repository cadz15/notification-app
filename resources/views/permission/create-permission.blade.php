@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    PERMISSION CREATE

                </div>
            </div>
        </div>

        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-header">Create Permission</div>
                <div class="card-body">
                    <form action="/permission/create" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="permission-recipient">User</label>
                            <select name="permission-recipient" class="form-control" id="permission-recipient">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="permission-name">Name</label>
                            <input type="text" name="permission-name" id="permission-name" class="form-control">
                        </div>
    
                        <input type="submit" value="Add Permission" class="btn btn-success mt-1">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')

    <!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script defer> 
    Echo.private('App.Models.User.3')
    .notification((notification) => {
        console.log(notification.message);
        console.log(notification);
    });
</script>
@endsection