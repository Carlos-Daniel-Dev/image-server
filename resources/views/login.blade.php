@extends('templates.main')

@section('title') Login @endsection

@section('content')
<main class="flex-grow-1">
    <div class="container-xl d-flex justify-content-center align-items-center" style="height: calc(100vh - 56px);">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="bg-light p-4 rounded-lg shadow-sm">
                    
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <form method="POST" action="{{ route('login.login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
