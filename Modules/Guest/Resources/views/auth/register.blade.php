@extends('guest::layout')

@props([
    'errors'
])

@section('content')
    <form class="md:w-1/2 w-full w-full mx-2 p-2 my-auto bg-white p-6" method="POST" action="{{ route('register') }}">
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

        <!-- User Type -->
        <div class="mt-4">
            <div class="flex flex-row justify-evenly content-center">
                <div class="flex content-center items-center">
                    <label for="user-type" class="mr-4">
                        @lang('guest::pages.register.labels.user-type')
                    </label>
                </div>

                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @foreach(\App\Enums\UserType::cases() as $type)
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center pl-3">
                                <input id="user-type" type="radio" value="{{ $type->name }}"
                                       @if(old('user-type') === $type->name) checked @endif name="user-type"
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="horizontal-list-radio-license"
                                       class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    @lang("validation.attributes.user-type.$type->name")
                                </label>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            @if ($errors->has('type'))
                <ul class="errors">
                    @foreach ($errors->get('type') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <!-- City -->
        <div class="mt-4">
            <label for="email">
                @lang('validation.attributes.city')
            </label>
            <x-controls.searchable-select id="city" name="city" :route="route('api.city.index')"
                                          parameter="title" :translatable="true"/>
            @if ($errors->has('city'))
                <ul class="errors">
                    @foreach ($errors->get('city') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="flex items-center justify-center mt-4">
            <button class="primary" type="submit">
                @lang('guest::pages.register.buttons.register')
            </button>
        </div>
    </form>
@endsection
