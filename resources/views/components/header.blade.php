<header>
    <div class=" content-wrapper relative w-full text-sm xl:text-xl font-medium">
        <div class="w-full py-4 md:py-10">
            <div class="flex justify-between">
                <a class="block md:hidden" href="{{ Route::is('home') ? '#' : route('home') }}">
                    <img class="max-w-[62px]" src="{{ asset('/src/icons/logo-w-bg.svg') }}" alt="">
                </a>
                <div class="flex justify-end items-center gap-4 sm:gap-8 xl:gap-20 w-full">

                    <ul class="nav flex grow gap-4 justify-around items-center list-none">
                        <li><a href="{{ Route::is('home') ? '#about' : route('home') . '#about' }}">О нас</a></li>
                        <li><a href="{{ Route::is('home') ? '#products' : route('home') . '#products' }}">Продукция</a></li>
                        <li><a href="{{ Route::is('home') ? '#production' : route('home') . '#production' }}">Производство</a></li>
                        <li><a href="{{ Route::is('home') ? '#contacts' : route('home') . '#contacts' }}">Контакты</a></li>
                    </ul>
                    <div class="menu-icon cursor-pointer z-[11] block lg:hidden  h-5 w-5 sm:h-7 sm:w-7">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>


        </div>
    </div>
</header>

{{--<header>--}}
{{--    <div class="px-5 relative w-full font-xl font-normal flex items-center header-top">--}}
{{--        <div class="w-full ">--}}
{{--            <div class="flex justify-between items-center sm:justify-center">--}}
{{--                <a href="{{ Route::is('home') ? '#' : route('home') }}"--}}
{{--                   class="flex items-center justify-start flex-shrink-0 block sm:hidden relative z-[9999] ">--}}
{{--                    <img src="{{ asset('img/icons/logo.svg') }}" alt="{{ config('app.name') }}" class="h-10" />--}}
{{--                </a>--}}
{{--                <ul--}}
{{--                    class="nav header-links text-white flex items-center xs:flex-col sm:flex-row navigation-links max-w-[960px] w-full justify-between">--}}
{{--                    <li class="active">--}}
{{--                        <a href="{{ Route::is('home') ? '#' : route('home') }}">--}}
{{--                                    <span>--}}
{{--                                        Главная--}}
{{--                                    </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li>--}}
{{--                        <a href="{{ Route::is('home') ? '#about' : route('home') . '#about' }}">--}}
{{--                                    <span>--}}
{{--                                        О нас--}}
{{--                                    </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li>--}}
{{--                        <a href="{{ Route::is('home') ? '#contacts' : route('home') . '#contacts' }}">--}}
{{--                                    <span>--}}
{{--                                        Контакты--}}
{{--                                    </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="hidden sm:block">--}}
{{--                        <a href="{{ Route::is('home') ? '#' : route('home') }}"--}}
{{--                           class="flex items-center justify-center flex-shrink-0">--}}
{{--                            <img src="{{ asset('img/icons/logo.svg') }}" alt="{{ config('app.name') }}" />--}}
{{--                        </a>--}}
{{--                    </li>--}}


{{--                    <li>--}}
{{--                        <a href="{{ Route::is('home') ? '#products' : route('home') . '#products' }}">--}}
{{--                                    <span>--}}
{{--                                        Товары--}}
{{--                                    </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li>--}}
{{--                        <a href="{{ Route::is('home') ? '#production' : route('home') . '#production' }}">--}}
{{--                                    <span>--}}
{{--                                        Статьи--}}
{{--                                    </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li>--}}
{{--                        <a href="{{ Route::is('home') ? '#faq' : route('home') . '#faq' }}">--}}
{{--                                    <span>--}}
{{--                                        Вопросы--}}
{{--                                    </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}

{{--                <div class="menu-icon cursor-pointer z-[11] block lg:hidden  h-5 w-5 sm:h-7 sm:w-7">--}}
{{--                    <span></span>--}}
{{--                    <span></span>--}}
{{--                    <span></span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</header>--}}
