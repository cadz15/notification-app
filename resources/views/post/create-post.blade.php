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

                    {{ __('You are logged in!') }}

                </div>
            </div>
        </div>

        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-header">Create Post</div>
                <div class="card-body">
                    <form action="/post/create" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="post-title"> Title </label>
                            <input type="text" class="form-control" name="post-title" id="post-title"></input>
                        </div>

                        <div class="form-group mb-1">
                            <label for="post-body"> Post </label>
                            <textarea name="post-body" class="form-control" id="post-body" cols="30" rows="10"></textarea>
                        </div>

                        <input type="submit" class="btn btn-success" value="Post">
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