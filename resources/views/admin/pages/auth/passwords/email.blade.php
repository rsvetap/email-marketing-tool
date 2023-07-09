@extends('admin.layout.auth')

@section('title', 'Reset Password')

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

                            <form method="POST" action="{{ route('admin.auth.password.email') }}"
                                  class="needs-validation">

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
                                           value="{{ request()->email ?? old('email') }}"
                                           placeholder="Enter your email"
                                           autocomplete="off"
                                           required
                                           autofocus>
                                </div><!-- Email -->

                                @include('admin.layout.components.error-messages')

                                @if (session('status'))
                                    <div class="alert alert-success bg-success text-white border-0 text-center">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" type="submit">
                                        Send Password Reset Link
                                    </button>
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div><!-- end card -->
                </div> <!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page -->

@endsection
