{{-- <x-auth>
    <x-slot:title>
        Login
    </x-slot:title> --}}
    <section class="vh-100" style="background-color: hsl(0, 0%, 96%);">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Sign in</h3>
                            <form action="{{route('authenticate')}}" method="post">
                                @csrf
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label float-left" for="typeEmailX-2">Email</label>
                                    <input type="email" name="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror"/>
                                    @error('email')
                                    <p class="help-block text-danger">{{ $message }}</p>
                                    {{--<div class="alert alert-danger"></div>--}}
                                    @enderror
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label float-left" for="typePasswordX-2">Password</label>
                                    <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror"/>
                                    @error('password')
                                    <p class="help-block text-danger">{{ $message }}</p>
                                    {{--<div class="alert alert-danger"></div>--}}
                                    @enderror

                                </div>

                                <!-- Checkbox -->
                                <div class="form-check d-flex justify-content-start mb-4">
                                    <input class="form-check-input" type="checkbox" value="" id="remember"
                                           name="remember"/>
                                    <label class="form-check-label" for="form1Example3"> Remember password </label>
                                </div>

                                <button data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-primary btn-lg btn-block" type="submit" name="login">Login
                                </button>
                                <br>
                                <!-- Register -->
                                {{--<div class="form-check d-flex justify-content-center mb-4">
                                    <a class="form-check-input"
                                       style="color: blue; border: 1px solid darkgrey; padding: 10px; margin-top: -10px; border-radius: 5px; background-color: #a0aec0;"
                                       href="{{route('register')}}">Sign Up</a><br>
                                </div>--}}
                                <div class="text-center pt-4 text-muted">Don't have an account? <a href="#">Sign up</a></div>

                                <hr class="my-4">

                               {{-- <button data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
                                        type="submit"><i class="fab fa-google me-2"></i> Sign in with google
                                </button>
                                <button data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
                                        type="submit"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook
                                </button>--}}
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

{{-- </x-auth> --}}


