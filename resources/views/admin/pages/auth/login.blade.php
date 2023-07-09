@extends('admin.layout.auth')

@section('title', 'Login')

@section('content-wrapper')

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header pt-4 pb-4 text-center bg-gradient-light">
                            <a href="{{  route('admin.dashboard.index')  }}" title="Eat in Hotels">
                                <span><img width="200" src="{{ asset('admin/images/logo.svg') }}" alt=""></span>
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Sign In</h4>
                                <p class="text-muted mb-4">Enter your email and password to access Admin panel</p>
                            </div>

                            <form method="POST" action="{{ route('admin.auth.login') }}" class="needs-validation">

                                @csrf
                                @method('POST')

                                <div class="form-group">
                                    <label for="email">
                                        E-Mail Address
                                    </label>
                                    <input id="email"
                                           type="email"
                                           class="form-control"
                                           name="email"
                                           value="{{ old('email') }}"
                                           placeholder="Enter your email"
                                           autocomplete="off"
                                           required
                                           autofocus>
                                </div><!-- Email -->

                                <div class="form-group">
                                    <label for="password">
                                        Password
                                    </label>
                                    <input id="password"
                                           type="password"
                                           class="form-control"
                                           name="password"
                                           placeholder="Enter your password"
                                           autocomplete="new-password"
                                           required>
                                </div><!-- Password -->

                                <input type="hidden" name="remember" value="1">

                                @include('admin.layout.components.error-messages')

                                <div class="form-group mt-4 mb-0 text-center">
                                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                                </div>
                            </form>

                            <div class="form-group mt-4 mb-0 text-center">
                                <a href="{{ route('admin.auth.password.request') }}" title="Forgot password?">
                                    Forgot password?
                                </a>
                            </div>
                        </div> <!-- end card-body -->
                    </div><!-- end card -->
                </div> <!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page -->

@endsection
