@extends('layouts.app')

@section('content')
    {{--    <div class="container mx-auto h-full flex justify-center items-center">--}}
    {{--        <div class="w-1/3">--}}
    {{--            <div class="font-bold text-lg md:text-xl xl:text-2xl tracking-tight">{{ __('Login') }}</div>--}}
    {{--            <form method="POST" action="{{ route('login') }}">--}}
    {{--                @csrf--}}

    {{--                <div class="space-y-2">--}}
    {{--                    <label for="email" class="block font-medium tracking-tight">{{ __('E-Mail Address') }}</label>--}}

    {{--                    <div class="col-md-6">--}}
    {{--                        <input id="email" type="email"--}}
    {{--                               class="w-full border border-gray-400 text-gray-800 placeholder-gray-400 rounded focus:border-transparent focus:outline-none focus:shadow-outline px-3 py-2"--}}
    {{--                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

    {{--                        @error('email')--}}
    {{--                        <span class="text-xs text-red-500">--}}
    {{--                                        {{ $message }}--}}
    {{--                                    </span>--}}
    {{--                        @enderror--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                <div class="space-y-2">--}}
    {{--                    <label for="password" class="block font-medium tracking-tight">{{ __('Password') }}</label>--}}

    {{--                    <div class="col-md-6">--}}
    {{--                        <input id="password" type="password"--}}
    {{--                               class="w-full border border-gray-400 text-gray-800 placeholder-gray-400 rounded focus:border-transparent focus:outline-none focus:shadow-outline px-3 py-2"--}}
    {{--                               name="password" required autocomplete="current-password">--}}

    {{--                        @error('password')--}}
    {{--                        <span class="text-xs text-red-500" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                        @enderror--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                <div class="form-group row">--}}
    {{--                    <div class="col-md-6 offset-md-4">--}}
    {{--                        <div class="form-check">--}}
    {{--                            <input class="form-check-input" type="checkbox" name="remember"--}}
    {{--                                   id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

    {{--                            <label class="form-check-label" for="remember">--}}
    {{--                                {{ __('Remember Me') }}--}}
    {{--                            </label>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                <div class="flex justify-end">--}}
    {{--                    --}}{{-- <button type="submit" class="btn btn-primary">--}}
    {{--                        {{ __('Login') }}--}}
    {{--                    </button> --}}
    {{--                    <button--}}
    {{--                        type="submit"--}}
    {{--                        class="inline-flex items-center text-white px-5 py-2 rounded-lg overflow-hidden focus:outline-none bg-indigo-500 hover:bg-indigo-600 font-semibold tracking-tight">--}}
    {{--                        Login--}}
    {{--                    </button>--}}

    {{--                    @if (Route::has('password.request'))--}}
    {{--                        <a class="btn btn-link" href="{{ route('password.request') }}">--}}
    {{--                            {{ __('Forgot Your Password?') }}--}}
    {{--                        </a>--}}
    {{--                    @endif--}}
    {{--                </div>--}}
    {{--            </form>--}}

    {{--        </div>--}}
    {{--    </div>--}}
    <body class="font-mono bg-gray-400">
    <!-- Container -->
    <div class="container mx-auto">
        <div class="flex justify-center px-6 my-12">
            <!-- Row -->
            <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                <!-- Col -->
                <div
                    class="w-full h-auto bg-gray-400 hidden lg:block lg:w-1/2 bg-cover rounded-l-lg"
                    style="background-image: url('https://source.unsplash.com/K4mSJ7kc0As/600x800')"
                ></div>
                <!-- Col -->
                <div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
                    <h3 class="pt-4 text-2xl text-center">Welcome Back!</h3>
                    <form method="POST" action="{{ route('login') }}" class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                        @csrf
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                                Email
                            </label>
                            <input
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="email" type="email" name="email" value="{{ old('email') }}" required
                                autocomplete="email" autofocus
                                placeholder="Email Address"
                            />
                            @error('email')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                {{ __('Password') }}
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="password"
                                type="password"
                                name="password" required autocomplete="current-password"
                                placeholder="******************"
                            />
                            @error('password')
                            <span class="text-xs text-red-500" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <input class="mr-2 leading-tight" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}/>
                            <label class="text-sm" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="mb-6 text-center">
                            <button
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                type="submit"
                            >
                                {{ __('Login') }}
                            </button>
                        </div>
                        <hr class="mb-6 border-t"/>
                        <div class="text-center">
                            <a
                                class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                href="{{ route('register') }}"
                            >
                                Create an Account!
                            </a>
                        </div>
                        <div class="text-center">
                            <a
                                class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                href="{{ route('password.request') }}"
                            >
                                Forgot Password?
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
