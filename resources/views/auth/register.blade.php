<x-layouts.auth>
    <x-slot:title>
        Login
    </x-slot:title>

    <!-- Section: Design Block -->
    <section class="">
        <!-- Jumbotron -->
        <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
            <div class="container">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h1 class="my-5 display-3 fw-bold ls-tight">
                            The best offer <br/>
                            <span class="text-primary">Register</span>
                        </h1>
                        <p style="color: hsl(217, 10%, 50.8%)">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Eveniet, itaque accusantium odio, soluta, corrupti aliquam
                            quibusdam tempora at cupiditate quis eum maiores libero
                            veritatis? Dicta facilis sint aliquid ipsum atque?
                        </p>
                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="card">
                            <div class="card-body py-5 px-md-5">
                                <form action="{{route('register-store')}}" method="POST">
                                    @csrf
                                        <div class="form-outline mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label float-left" for="form3Example1">Username</label>
                                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"/>
                                                @error('name')
                                                <p class="help-block text-danger">{{ $message }}</p>
                                                {{--<div class="alert alert-danger"></div>--}}
                                                @enderror

                                            </div>
                                        </div>
                                    <!-- Email input -->
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label float-left" for="form3Example3">Email address</label>
                                        <input type="email" name="email" id="form3Example3" class="form-control @error('email') is-invalid @enderror"/>
                                        @error('email')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                        {{--<div class="alert alert-danger"></div>--}}
                                        @enderror

                                    </div>

                                    <!-- Password input -->
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label float-left" for="form3Example4">Password</label>
                                        <input type="password" name="password" id="form3Example4" class="form-control @error('password') is-invalid @enderror"/>
                                        @error('password')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                        {{--<div class="alert alert-danger"></div>--}}
                                        @enderror

                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label float-left" for="form3Example4">Password confirmation</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror"/>
                                        @error('password_confirmation')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                        {{--<div class="alert alert-danger"></div>--}}
                                        @enderror

                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" name="signup" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-primary btn-block mb-4">
                                        Sign up
                                    </button>

                                    <!-- Register buttons -->
                                    <div class="text-center">
                                        <p>or sign up with:</p>
                                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-link btn-floating mx-1">
                                            <i class="fab fa-facebook-f"></i>
                                        </button>

                                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-link btn-floating mx-1">
                                            <i class="fab fa-google"></i>
                                        </button>

                                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-link btn-floating mx-1">
                                            <i class="fab fa-twitter"></i>
                                        </button>

                                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-link btn-floating mx-1">
                                            <i class="fab fa-github"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->

</x-layouts.auth>
