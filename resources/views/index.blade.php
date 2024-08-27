@extends('layouts.app')
@section('content')
    <div class="mx-auto max-w-[1920px] overflow-hidden">
        <div class="w-full relative  flex flex-col min-h-dvh ">

            <section class="hero h-dvh relative max-h">
                <img src="{{asset("/img/hero/background.png")}}" loading="lazy" alt="">

                <div
                    class="content-wrapper hero-text-container absolute top-0 left-0 z-10 flex items-center justify-between w-full h-full flex-col">
                    <img src="{{asset("/icons/logo-w-bg.svg")}}" draggable="false" loading="lazy">
                    <h1>САФОНОВО <br> ПОДВОРЬЕ БОЛЬШАКОВЫХ</h1>
                </div>
            </section>

            <section class="content-wrapper about pt-28 lg:pt-48">
                <div class="flex flex-col gap-28 lg:gap-48 ">
                    <div class="flex flex-col md:flex-row justify-between gap-5 ">
                        <div class="about-card">
                            <div class="text-center">
                                <div class="main-text">
                                    <h2>Подлинный вкус природы</h2>
                                </div>
                                <p>
                                    Сыр изготавливается <br>
                                    по старинным семейным рецептам
                                    с использованием только натуральных ингредиентов, что придает ему особый
                                    неповторимый вкус.
                                </p>
                            </div>
                        </div>

                        <div class="about-card">
                            <img src="{{asset("/icons/logo-wo-bg.svg")}}" class="hidden md:block mx-auto mb-[72px]"
                                 draggable="false" loading="lazy">
                            <div class="text-center">
                                <div class="main-text">
                                    <h2>Региональная уникальность</h2>
                                </div>
                                <p>
                                    "Сафоново Подворье Большаковых" <br>
                                    отражает аутентичные вкусы и традиции
                                    Смоленщины, придавая этому продукту особый колорит и стиль.
                                </p>
                            </div>
                        </div>

                        <div class="about-card">
                            <div class="text-center">
                                <div class="main-text">
                                    <h2>Заботливая работа фермеров</h2>
                                </div>
                                <p>
                                    Начиная от выбора молока и заканчивая упаковкой готового продукта, каждый шаг
                                    тщательно проконтролирован
                                    и сопровождается строгими
                                    стандартами качества.
                                </p>
                            </div>

                        </div>
                        <img src="{{asset("/icons/logo-wo-bg.svg")}}" class="block md:hidden mx-auto w-9/12 max-w-96"
                             loading="lazy" alt="">
                    </div>

                    <div class="flex flex-col lg:flex-row items-start gap-4 justify-between">
                        <div class="flex flex-col gap-7 self-end">
                            <div class="flex flex-col items-start">
                                <h1 class="mb-5 lg:mb-14" id="about">О нас</h1>
                                <div
                                    class="flex flex-col items-center lg:items-start text-base sm:text-xl gap-10 mb-5 lg:mb-0">
                                    <div class="border-l border-[#1C0000] pl-2.5 lg:pl-7">
                                        <p>
                                            Сыроварня "Сафоново Подворье Большаковых" на Смоленщине - это оазис
                                            традиционного сыроделия, окутанный духом старины и мастерства.
                                            Расположенная
                                            в сельской местности
                                            на просторах Смоленской области, эта сыроварня является настоящим
                                            культурным
                                            центром, где сочетаются вековые семейные рецепты и новаторские подходы к
                                            производству сыра.<br>
                                            Сыры "Сафоново Подворье Большаковых" пользуются заслуженным признанием
                                            благодаря уникальному вкусу и непреходящему качеству.<br>
                                            Каждый кусочек сыра, созданного этой семьей, это настоящий шедевр,
                                            воплощение любви к ремеслу и традициям, каждый этап производства сыра
                                            проходит под чутким контролем опытных мастеров и с сохранением лучших
                                            семейных рецептов.<br>
                                            Таким образом, сыроварня "Сафоново Подворье Большаковых" на Смоленщине
                                            является не только местом производства высококачественного сыра, но и
                                            памятником искусству
                                            и традициям сыроделия, который уважает прошлое и стремится к
                                            качественному
                                            будущему в мире гастрономии.
                                        </p>
                                    </div>
                                    <a href="/about" class="button !hidden lg:!flex px-5 lg:px-10">
                                        <p>Узнать больше</p>
                                    </a>
                                </div>

                                <div class="block lg:hidden lg:w-1/2 w-full shrink-0 max-w-[920px] pb-5">
                                    <div class="outer-border">
                                        <img src="/public/img/about/img.png"
                                             class=" w-full h-auto lg:h-full object-cover object-left"
                                             draggable="false" loading="lazy">
                                    </div>

                                </div>

                                <a href="/about" class="button !flex lg:!hidden px-5 lg:px-10">
                                    <p>Узнать больше</p>
                                </a>

                            </div>
                        </div>

                        <div class="hidden lg:block lg:w-1/2 w-full shrink-0 lg:max-w-[920px] self-center ">
                            <div class="outer-border">
                                <img src="{{asset("/img/about/img.png")}}" class=" w-full h-auto lg:h-full object-cover "
                                     draggable="false" loading="lazy">
                            </div>

                        </div>
                    </div>
                </div>

            </section>


            <section class="content-wrapper slider pt-28 lg:pt-48">
                <div class="galery-swiper-container pb-28 lg:pb-[450px]">
                    <div class="swiper galery_swiper">
                        <div class="swiper-wrapper">
                            @for($i = 1; $i <= 10; $i++)
                            <!-- slide 1 -->
                                <div class="swiper-slide">
                                    <div class="outer-border">
                                        <img src="{{asset("/img/production/{$i}.png")}}"
                                             class="w-full h-auto lg:h-full object-cover rounded-lg object-left">
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="flex flex-col gap-16 md:gap-28 ">

                    <div class="flex flex-col lg:flex-row items-start gap-4 justify-between">
                        <div class="flex flex-col gap-7 self-end">
                            <div class="flex flex-col items-start">
                                <h1 class="mb-5 lg:mb-14" id="production">Производство</h1>
                                <div
                                    class="flex flex-col items-center lg:items-start text-base sm:text-xl gap-5 lg:gap-10 mb-5 lg:mb-0 lg:mb-0">
                                    <div class="border-l border-[#1C0000] pl-2.5 lg:pl-7">
                                        <p>
                                            Процесс создания наших продуктов — это настоящее рукоделие,
                                            сочетающее в
                                            себе традиционные методы и современные технологии. Мы уделяем особое
                                            внимание условиям содержания коз, обеспечивая им комфорт и заботу.
                                            Наши
                                            козы пасутся на свежем воздухе, где витают ароматы трав и цветов,
                                            что
                                            придает молоку особый вкус и аромат, которое становится основой для
                                            изысканных сыров.<br>
                                            Каждый этап производства внимательно контролируется, чтобы сохранить
                                            натуральность и неповторимый вкус продукции. Наши сыры хранят в себе
                                            тепло рук мастера, уважение к традициям и стремление к совершенству.
                                        </p>
                                    </div>
                                    <a href="/production" class="button px-5 lg:px-10 self-start">
                                        <p>Узнать больше</p>
                                    </a>
                                </div>

                                <div class="block lg:hidden lg:w-1/2 w-full shrink-0 max-w-[920px]">
                                    <div class="outer-border">
                                        <img src="{{asset("/img/production/img.png")}}"
                                             class=" w-full h-auto lg:h-full object-cover" draggable="false"
                                             loading="lazy">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="hidden lg:block lg:w-1/2 w-full shrink-0 lg:max-w-[920px] self-center ">
                            <div class="outer-border">
                                <img src="{{asset("/img/production/img.png")}}" class=" w-full h-auto lg:h-full object-cover"
                                     draggable="false" loading="lazy">
                            </div>


                        </div>
                    </div>
                </div>

            </section>

            <section class="content-wrapper products mt-28 lg:mt-48 pb-28 lg:pb-48" id="products">
                <div class="flex flex-col  items-center justify-center text-center gap-5 lg:gap-14">
                    <div class="heading-container w-full lg:w-[80%]">
                        <div class="line"></div>
                        <h1>Продукция</h1>
                        <div class="line"></div>
                    </div>
                    <p> Для гурманов сыроварня "Сафоново Подворье Большаковых" представляет собой изысканный
                        ассортимент<br>
                        настоящих деликатесов, созданных для ценителей высокого качества и утонченного вкуса. Вы
                        найдете изысканные овечьи и козьи сыры различных сортов от классических рецептов до
                        авторских композиций с необычными добавками и специями. </p>
                    <div class="relative w-full">
                        <div class="flex flex-col lg:flex-row w-full justify-between gap-4 lg:gap-40 items-center">
                            <div class="relative w-fit">
                                <img src="{{asset("/img/products/img1.png")}}" draggable="false" loading="lazy" alt="">
                                <div class="w-[85%] absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2">
                                    <div class="about-card">
                                        <div class="text-center">
                                            <div class="main-text">
                                                <h2>Сыры<br>
                                                    из козьего молока</h2>
                                            </div>

                                            <p class="!text-white">
                                                Обладает особой пикантностью
                                                и неповторимым вкусом. Он часто имеет более выраженные молочные
                                                и ореховые ноты.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                class=" lg:absolute top-full left-1/2 lg:-translate-y-full lg:-translate-x-1/2 z-10">
                                <img class="h-20 sm:h-60" src="{{asset("/icons/logo-wo-bg.svg")}}" draggable="false"
                                     loading="lazy" alt="">
                            </div>

                            <div class="relative w-fit">
                                <img src="{{asset("/img/production/img2.png")}}" draggable="false" loading="lazy" alt="">
                                <div class="w-[85%] absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2">
                                    <div class="about-card">
                                        <div class="text-center">
                                            <div class="main-text">
                                                <h2>Сыры<br>
                                                    из овечьего молока</h2>
                                            </div>
                                            <p class="!text-white">
                                                Обладает насыщенным, терпким вкусом и имеет долгое послевкусие.
                                                Овечье
                                                молоко добавляет ему особый аромат и неповторимый оттенок.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <a class="button w-fit px-10 lg:px-14 uppercase" href="/products">
                        <p>посмотреть<br>
                            ассортимент</p>
                    </a>
                </div>
            </section>

            <section class="content-wrapper get-product pb-28 lg:pb-48">
                <div class="flex flex-col gap-16 md:gap-28 ">
                    <div class="flex flex-col lg:flex-row items-start gap-0 lg:gap-14 xl:gap-16 justify-between">
                        <div class="flex flex-col gap-7 self-end ">
                            <div class="flex flex-col items-start">
                                <h1 class="mb-5 lg:mb-14">Приобрести продукцию</h1>
                                <div
                                    class="flex flex-col items-center lg:items-start text-base sm:text-xl gap-10 mb-10 lg:mb-0">
                                    <div class="border-l border-[#1C0000] pl-2.5 lg:pl-7">
                                        <p>
                                            Продукция нашего подворья - это изысканный вкус сыров Италии и
                                            Испании
                                            Производим для себя, делимся с вами.<br>
                                            Радуйте себя и своих близких замечательными сырами от нашего
                                            подворья,
                                            наслаждаясь их вкусом и качеством, где бы вы ни находились!
                                            Наша продукция доступна только в избранных магазинах, в которых
                                            каждый
                                            кусочек сыра представляет собой настоящий бриллиант в мире
                                            уникальных
                                            вкусов.<br>
                                            И, конечно, стоимость нашей продукции не может называться низкой -
                                            она
                                            выражает ценность и редкость каждого изделия, делая его драгоценным
                                            даром для ценителей настоящего гастрономического искусства.
                                        </p>
                                    </div>
                                    <a class="button w-fit px-12 lg:px-24 uppercase"
                                       href="/products#get-order">
                                        <p>адреса<br>
                                            магазинов</p>
                                    </a>
                                </div>

                            </div>
                        </div>

                        <div class="lg:w-1/2 w-full shrink-0 lg:max-w-[679px] self-end ">
                            <div class="h-[460px] xl:h-[595px]" style="position:relative;overflow:hidden;">
                                <a href="https://yandex.ru/maps/org/vremena_goda/1382927229/?utm_medium=mapframe&utm_source=maps"
                                   style="color:#eee;font-size:12px;position:absolute;top:0px;">Времена Года</a><a
                                    href="https://yandex.ru/maps/213/moscow/category/shopping_mall/184108083/?utm_medium=mapframe&utm_source=maps"
                                    style="color:#eee;font-size:12px;position:absolute;top:14px;">Торговый центр в
                                    Москве</a><iframe
                                    src="https://yandex.ru/map-widget/v1/org/vremena_goda/1382927229/?from=mapframe&indoorLevel=1&ll=37.488428%2C55.731337&source=mapframe&utm_source=mapframe&z=16.93"
                                    width="100%" height="100%" frameborder="1" allowfullscreen="true"
                                    style="position:relative;"></iframe></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
{{--@section('content0')--}}
{{--    <section id="hero" class="h-screen max-h-[1080px] pt-10 sm:pt-20 pb-10 ">--}}
{{--        <div class="relative">--}}
{{--            <div class="flex justify-center  px-5 lg:px-14">--}}
{{--                <div class="flex justify-around items-center h-full">--}}
{{--                    <div class="z-10 flex flex-col items-center">--}}
{{--                        <div class="absolute top-0 left-0 z-10">--}}
{{--                            <img class="hero-img" src="{{ asset('img/hero.png') }}" alt="{{ config('app.name') }}" />--}}
{{--                        </div>--}}

{{--                        <h1 class="z-[1]">--}}
{{--                            Brisket Boys--}}
{{--                        </h1>--}}

{{--                        <p class="font-2xl text-white z-[20] max-w-[650px] text-center font-normal">--}}
{{--                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit nostrum laboriosam id--}}
{{--                            iste--}}
{{--                            quasi,--}}
{{--                            sequi officiis adipisci ratione. Iure ea doloribus tempora. Corporis, adipisci? Dolor in--}}
{{--                            illo--}}
{{--                            necessitatibus totam iusto!--}}
{{--                        </p>--}}

{{--                        <div class="flex mt-8">--}}
{{--                            <a href="#about"--}}
{{--                               class="button z-[20] bg-white !px-14 uppercase text-BebasNeue font-4xl">--}}
{{--                                Узнать больше--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </section>--}}


{{--    <section id="about"--}}
{{--             class="p-5 lg:p-14 text-center flex flex-col sm:flex-row relative z-40 ">--}}
{{--        <h2 class="font-6xl flex shrink-0 uppercase text-BebasNeue">О нас--}}
{{--        </h2>--}}

{{--        <div class="flex flex-col gap-5 sm:gap-10 font-xl text-start max-w-[750px]">--}}
{{--            <p>--}}
{{--                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit nostrum laboriosam id iste--}}
{{--                quasi, sequi officiis adipisci ratione. Iure ea doloribus tempora. Corporis, adipisci? Dolor--}}
{{--                in illo necessitatibus totam iusto!--}}
{{--            </p>--}}
{{--            <p>--}}
{{--                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit nostrum laboriosam id iste--}}
{{--                quasi, sequi officiis adipisci ratione. Iure ea doloribus tempora. Corporis, adipisci? Dolor--}}
{{--                in illo necessitatibus totam iusto!--}}
{{--            </p>--}}
{{--        </div>--}}

{{--    </section>--}}

{{--    <section id="contacts" class="px-5 lg:px-16 hexagon">--}}

{{--        <div class="form-grid items-start gap-4 relative z-[1]">--}}

{{--            <div class="p-5 lg:p-10 xl:col-span-2 bg-white h-full rounded-3xl">--}}
{{--                <h1 class="mb-2.5">Свяжитесь с нами</h1>--}}
{{--                <livewire-contact-form />--}}
{{--            </div>--}}
{{--            <x-contacts />--}}

{{--        </div>--}}
{{--    </section>--}}

{{--    @if (!empty($productTypes))--}}
{{--        <section id="products" class="  ">--}}
{{--            <x-section-title title="Продукция" />--}}

{{--            <div class="flex flex-col gap-6">--}}
{{--                @foreach ($productTypes as $type)--}}
{{--                    @if (!empty($type->products))--}}
{{--                    <div class="product-type flex flex-col gap-6 px-5 md:px-10 xl:px-16">--}}
{{--                        <div class="text-center {{$loop->first ? 'pb-8 lg:pb-16' : 'pt-12 lg:pt-24 pb-8 lg:pb-16'}}">--}}
{{--                            <h3 class="font-2xl text-white mb-2 md:mb-5">--}}
{{--                                {{ $type->name }}--}}
{{--                            </h3>--}}
{{--                            @isset($type->description)--}}
{{--                                <h2 class="font-xl text-white">--}}
{{--                                    {!! $type->description !!}--}}
{{--                                </h2>--}}
{{--                            @endisset--}}
{{--                        </div>--}}
{{--                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">--}}
{{--                            @foreach ($type->products as $product)--}}
{{--                            <div--}}
{{--                                class="relative flex flex-col justify-between gap-5 p-4 transition-all bg-white rounded-2xl hover:-translate-y-2 z-[1]">--}}
{{--                                <a href="{{ route('product.show', [$type->code, $product->slug]) }}"--}}
{{--                                   class="h-80 overflow-hidden aspect-w-16 aspect-h-8 rounded-lg">--}}
{{--                                    @isset($product->images)--}}

{{--                                    <img src="{{ asset('storage/' . $product->images[0]) }} " alt="{{ $product->name }}"--}}
{{--                                         class="object-cover w-full h-full max-h-80 hover:scale-125 transition-all duration-300" />--}}
{{--                                     @else--}}
{{--                                        <img src="{{ asset('img/no_image_placeholder.png') }}"--}}
{{--                                                        alt="{{ $product->name }}" class="object-cover w-full h-full max-h-80" />--}}
{{--                                                @endisset--}}
{{--                                </a>--}}

{{--                                <div>--}}
{{--                                    <h3 class="font-2xl font-medium pb-2.5">--}}
{{--                                        {{ $product->name }}--}}
{{--                                    </h3>--}}
{{--                                    <p class="font-lg text-[#999999] pb-7">--}}
{{--                                        {!! $product->short_description !!}--}}
{{--                                    </p>--}}
{{--                                    <h4 class="font-4xl font-bold text-BebasNeue">--}}
{{--                                        {{ $product->price }} P--}}
{{--                                    </h4>--}}
{{--                                </div>--}}

{{--                                <div class="flex justify-between gap-4">--}}
{{--                                    <a href="{{ route('product.show', [$type->code, $product->slug]) }}"--}}
{{--                                       class="button border border-black !w-full font-base">--}}
{{--                                        Подробнее--}}
{{--                                    </a>--}}
{{--                                    <button data-twe-toggle="modal" data-twe-target="#orderModal_{{ $product->id }}"--}}
{{--                                            data-twe-ripple-init data-twe-ripple-color="light" type="button"--}}
{{--                                            class="button bg-[#EB7100] !w-full text-white font-base">--}}
{{--                                        Заказать--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}


{{--                            <div data-twe-modal-init--}}
{{--                                 class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"--}}
{{--                                 id="orderModal_{{ $product->id }}" tabindex="-1"--}}
{{--                                 aria-labelledby="orderModalTitle_{{ $product->id }}" aria-modal="true" role="dialog">--}}
{{--                                <div data-twe-modal-dialog-ref--}}
{{--                                     class="pointer-events-none xs:justify-center relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[750px]">--}}
{{--                                    <livewire:order-modal :product="$product" wire:key="{{ $product->id }}" />--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                             @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    @endif--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </section>--}}
{{--    @endif--}}

{{--    @if (!empty($production))--}}
{{--        <section id="production" class=" px-5 md:px-10 xl:px-16 ">--}}
{{--            <x-section-title title="Статьи" />--}}

{{--            <div class="grid grid-cols-1 gap-6 mx-auto md:grid-cols-2 lg:grid-cols-3 max-md:max-w-lg">--}}
{{--                 @foreach ($production as $article)--}}
{{--                <a href="{{ route('article.show', $article->slug) }}"--}}
{{--                   class="flex flex-col relative top-0 overflow-hidden transition-all duration-300 bg-white rounded-2xl cursor-pointer shadow-yellow-800 hover:-top-2">--}}
{{--                    @isset($article->thumbnail)--}}

{{--                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"--}}
{{--                         class="object-cover w-full h-full max-h-72" />--}}
{{--                    @else--}}
{{--                        <img src="{{ asset('img/no_image_placeholder.png') }}" alt="{{ $article->title }}"--}}
{{--                            class="object-cover w-full h-full max-h-72" />--}}
{{--                    @endisset--}}

{{--                    <div class="flex flex-col flex-grow justify-between p-7">--}}
{{--                        <p class="uppercase pb-10 text-[#999999]">--}}
{{--                            {{ $article->created_at->format('F j, Y') }}--}}
{{--                            |--}}
{{--                            {{ $article->author }}--}}
{{--                        </p>--}}

{{--                        <h3 class="font-2xl font-medium pb-2.5">--}}
{{--                            {{ $article->title }}--}}
{{--                        </h3>--}}
{{--                        <p class="font-base text-[#999999] pb-5">--}}
{{--                            {!! $article->description !!}--}}
{{--                        </p>--}}

{{--                        @isset($article->tags)--}}
{{--                        <div class="flex gap-2.5 flex-wrap">--}}
{{--                            @foreach ($article->tags as $tag)--}}
{{--                            <span class="button !py-2 !px-3 border border-black">--}}
{{--                                    {{ $tag }}--}}
{{--                                </span>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                        @endisset--}}

{{--                    </div>--}}
{{--                </a>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </section>--}}
{{--    @endif--}}

{{--    <section id="faq" class=" px-5 md:px-10 xl:px-16 pb-36">--}}
{{--        <x-section-title title="Часто задаваемые вопросы" />--}}

{{--        <div class=" divide-y divide-[#EB7100] rounded-lg mx-auto">--}}
{{--            <div class="faq-item">--}}
{{--                <button type="button"--}}
{{--                        class="flex items-center justify-between w-full mt-6 mb-5 font-2xl  text-white faq-button">--}}
{{--                            <span class="font-2xl text-white">--}}
{{--                                Вопрос 1--}}
{{--                            </span>--}}
{{--                    <svg class="w-3.5 fill-current shrink-0 faq-icon faq-icon-active hidden" width="20"--}}
{{--                         height="2" viewBox="0 0 20 2" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <rect width="20" height="2" fill="#EB7100" />--}}
{{--                    </svg>--}}
{{--                    <svg class="w-3.5 fill-current hrink-0 faq-icon faq-icon-inactive" width="20" height="20"--}}
{{--                         viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <rect x="11" width="20" height="2" transform="rotate(90 11 0)" fill="#EB7100" />--}}
{{--                        <rect y="9" width="20" height="2" fill="#EB7100" />--}}
{{--                    </svg>--}}

{{--                </button>--}}
{{--                <div class="hidden faq-content">--}}
{{--                    <p class="font-lg  text-white mb-5">--}}
{{--                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Est laudantium obcaecati alias--}}
{{--                        commodi odit--}}
{{--                        delectus aliquam ratione sint ad, minus, ipsa id optio totam numquam esse mollitia in--}}
{{--                        doloremque--}}
{{--                        non? Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum numquam voluptates--}}
{{--                        dolorem--}}
{{--                        blanditiis deleniti voluptatum sint alias eligendi nostrum rerum praesentium repellat,--}}
{{--                        consequuntur--}}
{{--                        sapiente vel suscipit totam earum dicta! Magni!--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="faq-item">--}}
{{--                <button type="button"--}}
{{--                        class="flex items-center justify-between w-full mt-16 mb-5 font-2xl  text-white faq-button">--}}
{{--                            <span class="">--}}
{{--                                Вопрос 2--}}
{{--                            </span>--}}
{{--                    <svg class="w-3.5 fill-current shrink-0 faq-icon faq-icon-active hidden" width="20"--}}
{{--                         height="2" viewBox="0 0 20 2" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <rect width="20" height="2" fill="#EB7100" />--}}
{{--                    </svg>--}}
{{--                    <svg class="w-3.5 fill-current hrink-0 faq-icon faq-icon-inactive" width="20" height="20"--}}
{{--                         viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <rect x="11" width="20" height="2" transform="rotate(90 11 0)" fill="#EB7100" />--}}
{{--                        <rect y="9" width="20" height="2" fill="#EB7100" />--}}
{{--                    </svg>--}}

{{--                </button>--}}
{{--                <div class="hidden faq-content">--}}
{{--                    <p class="font-lg  text-white mb-5">--}}
{{--                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus commodi nostrum--}}
{{--                        hic non--}}
{{--                        consequatur voluptatum maxime voluptas quo atque iure quae a reprehenderit vero, saepe--}}
{{--                        facilis--}}
{{--                        ratione maiores neque nulla. Lorem ipsum dolor sit amet consectetur adipisicing elit.--}}
{{--                        Tenetur id eos--}}
{{--                        veritatis deserunt sunt perspiciatis accusantium aut earum necessitatibus esse pariatur,--}}
{{--                        blanditiis--}}
{{--                        nihil. Saepe sequi facilis repudiandae quasi officiis quae. Lorem ipsum dolor sit amet--}}
{{--                        consectetur--}}
{{--                        adipisicing elit. Sunt aut saepe numquam reprehenderit omnis deleniti illum inventore--}}
{{--                        aperiam, eaque--}}
{{--                        aliquam doloremque unde vitae tenetur itaque atque, nihil nostrum harum consequatur?--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--@endsection--}}
