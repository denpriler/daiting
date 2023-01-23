<div class="relative hidden items-center justify-center overflow-hidden min-h-full sm:flex aspect-video">
    <div class="relative z-30 p-5 text-white rounded-xl bg-black bg-opacity-70 h-full pt-10">
        <div class="flex flex-col justify-evenly items-start mx-4 h-full my-auto text-xl">
            <h1 class="font-bold text-3xl">
                @lang('guest::pages.home.components.banner.title')
            </h1>
            <p class="my-4">
                @lang('guest::pages.home.components.banner.subtitle')
            </p>
            <ul class="list-none my-8">
                <li>Более 20 000 анкет сногсшибательных девушек</li>
                <li>Высокая вероятность знакомства для состоятельных мужчин</li>
                <li>Работаем в сфере знакомств более 15 лет</li>
            </ul>
            @guest
                <a href="{{ route('register') }}" class="rounded-none btn-link primary my-4 text-2xl" type="button">
                    @lang('guest::pages.home.components.banner.buttons.register')
                </a>
            @endguest
        </div>
    </div>
    <video
        autoplay
        loop
        muted
        class="absolute z-10 w-auto"
    >
        <source
            src="{{ Vite::asset('resources/assets/welcome.mp4') }}"
            type="video/mp4"
        />
        Your browser does not support the video tag.
    </video>
</div>
