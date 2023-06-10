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

                    PERMISSION HOME

                </div>
            </div>
        </div>

        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-header">Master list</div>
                <div class="card-body">
                    <a href="/permission/create" class="btn btn-primary">Create Permission</a>
                    {{-- dd(auth()->user()->getRoleClass()->first()->hasPermissionTo('removepost')) --}}
                    {{-- dd(auth()->user()->getPermissionsViaRoles()) --}}
                    {{-- dd(auth()->user()->can('removepost')) --}}
                    {{-- dd(auth()->user()->getPermissionsViaRoles()) --}}
                    <table class="table table-responsive table-stripped">
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->permissions }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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