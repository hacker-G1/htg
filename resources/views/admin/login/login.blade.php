
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | PSP Education</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="PSP Education" />

    @include('layouts.backend.partials.style')
    @yield('style')

</head>


<body data-sidebar="dark" data-layout-mode="light">


    <div class="account-pages">
        <div class="container">
            <div class="row justify-content-center align-items-center h-100v">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>Sign in with Help Together Group.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('assets/images/logo/htg_logo.png') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>


                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="/" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ asset('assets/images/logo/htg_logo.png') }}" alt=""
                                                class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>

                                <a href="/" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ asset('assets/images/logo/htg_logo.png') }}" alt=""
                                                class="rounded-circle" height="50">
                                        </span>
                                    </div>
                                </a>
                            </div>


                            <div class="mt-5">
                                @if ($errors->any())
                                    <div class="col-12">
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger">{{ $error }}</div>
                                        @endforeach
                                    </div>
                                @endif

                                @if (Session()->has('error'))
                                    <div class="alert alert-danger">{{ Session('error') }}</div>
                                @endif
                                @if (Session()->has('success'))
                                    <div class="alert alert-success">{{ Session('success') }}</div>
                                @endif
                            </div>




                            <div class="p-2">
                                <form action="{{ route('login.post') }}" method="POST" class="form-horizontal">
                                    @csrf
                                    <form class="form-horizontal">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Username</label>
                                            <input type="email" name="email" class="form-control" id="username"
                                                placeholder="Enter username">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Enter password" aria-label="Password"
                                                    aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-addon"><i
                                                        class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember-check">
                                            <label class="form-check-label" for="remember-check">
                                                Remember me
                                            </label>
                                        </div>

                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Log
                                                In</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <a href="{{ url('/admin/forgot-password') }}" class="text-muted"><i
                                                    class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                        </div>
                                    </form>
                            </div>

                        </div>
                    </div>
                    <div class="text-center">
                        <p class="m-0">©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Help Together Group.
                        </p>
                        <p> Design & Develop by <a href="https://helptogethergroup.com/" target="_blank">Help Together Group</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.backend.partials.script')
    @yield('script')
</body>

</html>
