
<footer class="text-white mt-auto py-5 lg:py-0">
    <div class="mx-auto content-wrapper">
        <div class="flex flex-col lg:flex-row justify-between  items-center gap-5 ">
            <div class="hidden lg:block">
                <img src="{{asset("/img/footer/img.png")}}" loading="lazy" alt="">
            </div>
            <div class="flex justify-between max-w-2xl w-full shrink flex-row text-center">
                <a href="{{ Route::is('home') ? '#about' : route('home') . '#about' }}">О нас</a>
                <a href="{{ Route::is('home') ? '#products' : route('home') . '#products' }}">Продукция</a>
                <a href="{{ Route::is('home') ? '#production' : route('home') . '#production' }}">Производство</a>
                <a href="{{ Route::is('home') ? '#contacts' : route('home') . '#contacts' }}">Контакты</a>
            </div>
            <div class="flex justify-between w-full lg:w-auto items-center">
                <div class="block lg:hidden">
                    <img src="{{asset("/img/footer/img.png")}}" loading="lazy" alt="">
                </div>

                <div class="flex flex-col lg:text-start min-w-36" id="contacts">
                    <a href="https://yandex.ru/maps/geo/derevnya_voynovshchina/1499057827/?l=sat%2Cskl&ll=33.028440%2C55.022182&z=17"
                       target="_blank">Смоленская обл., Сафоновский р-н,<br>
                        д. Войновщина
                    </a>
                    <a href="mailto:info@don-safon.ru">info@don-safon.ru</a>
                    <a href="tel:+79033214567">+7 903 321-45-67 </a>
                </div>
            </div>

        </div>
    </div>
</footer>
{{--<footer class="text-center text-white pt-20 mt-auto">--}}
{{--    <div--}}
{{--        class="px-5  md:px-10 xl:px-16 pb-5 md:pb-10 xl:pb-16 mx-auto text-center md:text-left max-w-[1920px] h-auto md:h-[400px]">--}}
{{--        <div class="grid gap-8 grid-1 md:grid-cols-3">--}}
{{--            <div class="h-fit grid grid-cols-3 gap-x-4 gap-y-2 text-white">--}}
{{--                <a href="{{ Route::is('home') ? '#about' : route('home') . '#about' }}">--}}
{{--                    Главная--}}
{{--                </a>--}}
{{--                <a href="{{ Route::is('home') ? '#contacts' : route('home') . '#contacts' }}">--}}
{{--                    Контакты--}}
{{--                </a>--}}
{{--                <a href="{{ Route::is('home') ? '#about' : route('home') . '#production' }}">--}}
{{--                    Статьи--}}
{{--                </a>--}}
{{--                <a href="{{ Route::is('home') ? '#about' : route('home') . '#about' }}">--}}
{{--                    О нас--}}
{{--                </a>--}}
{{--                <a href="{{ Route::is('home') ? '#products' : route('home') . '#products' }}">--}}
{{--                    Товары--}}
{{--                </a>--}}
{{--                <a href="{{ Route::is('home') ? '#faq' : route('home') . '#faq' }}">--}}
{{--                    Вопросы--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <div class="flex justify-center">--}}
{{--                <img class="h-[122px]" src="{{ asset('img/icons/logo.svg') }}" alt="">--}}
{{--            </div>--}}

{{--            <div class="flex flex-col gap-5">--}}

{{--                @isset($phone)--}}
{{--                <a href="tel:{{ $phone }}" class="font-6xl text-BebasNeue self-end">--}}
{{--                    {{ $phone }}--}}
{{--                </a>--}}
{{--                @endisset--}}

{{--                @isset($email)--}}
{{--                <a href="mailto:{{ $email }}" class="font-xl self-end">--}}
{{--                    {{ $email }}--}}
{{--                </a>--}}
{{--                @endisset--}}

{{--                @isset($address)--}}
{{--                <p class="font-xl self-end">--}}
{{--                    {{ $address }}--}}
{{--                </p>--}}
{{--                @endisset--}}




{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</footer>--}}
