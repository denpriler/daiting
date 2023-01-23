@extends('guest::layout')

@props([
    'errors'
])

@section('content')
    <form class="md:w-1/2 w-full mx-2 sm:mx-0 p-2 my-auto bg-white p-6" method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email">
                @lang('validation.attributes.email')
            </label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-input"/>
            @if ($errors->has('email'))
                <ul class="errors">
                    @foreach ($errors->get('email') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email">
                @lang('validation.attributes.password')
            </label>
            <input id="password" type="password" name="password" value="{{ old('password') }}" class="form-input"/>
            @if ($errors->has('password'))
                <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="flex items-center justify-center mt-4">
            <button class="primary" type="submit">
                @lang('guest::pages.login.buttons.login')
            </button>
        </div>
    </form>
@endsection
