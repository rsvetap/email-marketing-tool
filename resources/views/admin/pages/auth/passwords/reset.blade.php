@extends('admin.layout.auth')

@section('title', 'Password reset')

@section('content-wrapper')

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header pt-4 pb-4 text-center bg-gradient-light">
                            <a href="{{ route('admin.auth.login') }}" title="Eat in Hotels">
                                <span><img width="200" src="{{ asset('admin/images/logo.svg') }}" alt=""></span>
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <form method="POST" action="{{ route('admin.auth.password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group">
                                    <label for="email">
                                        E-Mail Address
                                    </label>
                                    <input id="email"
                                           type="email"
                                           class="form-control"
                                           name="email"
                                           value="{{ $email ?? old('email') }}"
                                           placeholder="Enter your email"
                                           autocomplete="email"
                                           required
                                           autofocus>
                                </div><!-- Email -->

                                <div class="form-group">
                                    <label for="email">
                                        Password
                                    </label>
                                    <input id="password"
                                           type="password"
                                           class="form-control"
                                           name="password"
                                           placeholder="Password"
                                           autocomplete="current-password"
                                           required>
                                </div><!-- Password -->

                                <div class="form-group">
                                    <label for="email">
                                        Password
                                    </label>
                                    <input id="password_confirmation"
                                           type="password"
                                           class="form-control"
                                           name="password_confirmation"
                                           placeholder="Password confirmation"
                                           autocomplete="current-password"
                                           required>
                                </div><!-- Password confirmation -->

                                @include('admin.layout.components.error-messages')

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" type="submit">
                                        Reset Password
                                    </button>
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div><!-- end card -->
                </div> <!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div>

@endsection
