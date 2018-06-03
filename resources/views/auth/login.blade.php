@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card border-0 bg-light">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control border-0" type="text" placeholder="Your email" name="email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control border-0" type="password" placeholder="Your password" name="password">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" id="login-btn">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection