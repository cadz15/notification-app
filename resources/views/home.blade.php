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

                    @foreach ($notifications as $notification)
                        {{ var_dump($notification->data) }}
                    @endforeach
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