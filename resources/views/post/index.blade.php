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

                    POST HOME 

                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="card mt-1">
                <div class="card-header">
                    Featured
                </div>
                <div class="card-body">
                    <a href="/post/create" class="btn btn-primary">Create Post</a>


                    <table class="table table-responsive table-striped">
                        <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>
                                    <div class="card">
                                        <div class="card-header">{{ $post->title }}</div>
                                        <div class="card-body">
                                            {{ $post->body }}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    
                    

                    {{ dd($posts->links('pagination::simple-bootstrap-4')) }}
                     {{ $posts->links()  }}
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