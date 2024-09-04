@extends('layouts.app')

@section('content')
<form wire:submit="order">
    <div class="flex items-center justify-between flex-shrink-0 p-4 border-b-2 rounded-t-md border-neutral-100 ">
        <h5 class="text-xl font-medium leading-normal text-surface " id="exampleModalCenterTitle">
            Подтвердите заказ
        </h5>

        <button type="button"
                class="box-content border-none rounded-none text-neutral-500 hover:text-neutral-800 hover:no-underline focus:text-neutral-800 focus:opacity-100 focus:shadow-none focus:outline-none"
                data-twe-modal-dismiss aria-label="Close">
            <span class="[&>svg]:h-6 [&>svg]:w-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
        </button>
    </div>
    <div class="mx-auto max-w-[1920px] overflow-hidden">
        <div class="w-full relative  flex flex-col min-h-screen ">

            <section class="products-hero hero relative h-[320px] md:h-[590px]">
                <img src="{{asset("/img/product/hero.png")}}" loading="lazy" loading="lazy" alt="">

            </section>

            <section class="content-wrapper product-page py-28 lg:py-48">
                <div class="flex flex-col justify-center text-center gap-10 lg:gap-20">
                    <div class="flex flex-col lg:flex-row gap-4 lg:gap-8 w-full">

                        <div class="galery-swiper-container block lg:hidden">
                            <div class="swiper product_swiper">
                                <div class="swiper-wrapper">
                                    <!-- slide 1 -->
                                    @isset($product->images[0])
                                    <div class="swiper-slide">
                                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                                            <div class="lg:col-span-2">
                                                <div class="outer-border">
                                                    <img src="{{asset('storage/' . $product->images[0])}}"
                                                         class="w-full h-full object-cover">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endisset
                                    @isset($product->images[1])
                                        <!-- slide 2 -->
                                        <div class="swiper-slide">
                                            <div class="outer-border">
                                                <img src="{{asset('storage/' . $product->images[1])}}"
                                                     class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    @endisset
                                    @isset($product->images[2])
                                        <!-- slide 3 -->
                                        <div class="swiper-slide">
                                            <div class="outer-border">
                                                <img src="{{asset('storage/' . $product->images[2])}}"
                                                     class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    @endisset
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>

                        <div class="grid-cols-1 lg:grid-cols-2 gap-4 hidden lg:grid">
                            @isset($product->images[0])
                                <div class="lg:col-span-2">
                                    <div class="outer-border">
                                        <img src="{{asset('storage/' . $product->images[0])}}" class="w-full h-full object-cover">
                                    </div>
                                </div>
                            @endisset
                            @isset($product->images[1])
                                <div class="outer-border">
                                    <img src="{{asset('storage/' . $product->images[1])}}" class="w-full h-full object-cover">
                                </div>
                            @endisset
                            @isset($product->images[2])
                                <div class="outer-border">
                                    <img src="{{asset('storage/' . $product->images[2])}}" class="w-full h-full object-cover">
                                </div>
                            @endisset
                        </div>
                        @isset($product)
                            <div class="flex w-full max-w-[905px] flex-col gap-4 lg:gap-8">
                                <div>
                                    <div class="flex justify-between w-full items-center">
                                        <h1>{{$product->name}}</h1>
                                        <img class="max-h-24" src="{{asset("/img/products/page/logo1.png")}}" alt="">
                                    </div>
                                    <div class="flex justify-between w-full items-end">
                                        <div class="text-start">
                                            <p class="product-price">560₽</p>
                                            <p class="product-price-desc">Цена за 100г.</p>
                                        </div>
                                        <a type="submit" href="/products" class="button !flex px-5 lg:px-14 max-h-20 ">
                                            <p>Заказать</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2 text-start">
                                    <div>
                                        <p class="prop-name">Тип молока:</p>
                                        <p>{{$product->milk}}</p>
                                    </div>
                                    <div>
                                        <p class="prop-name">Твердость:</p>
                                        <p>{{$product->hardness}}</p>
                                    </div>
                                    <div>
                                        <p class="prop-name">Плесень:</p>
                                        <p>{{$product->mold}}</p>
                                    </div>
                                    <div>
                                        <p class="prop-name">Вкус:</p>
                                        <p>{{$product->flavor}}</p>
                                    </div>
                                    <div>
                                        <p class="prop-name">Выдержка:</p>
                                        <p>{{$product->tenacity}}</p>
                                    </div>
                                </div>
                            </div>
                        @endisset
                    </div>

                    <div>
                        <ul class="tab-list list-none ">
                            <li class="tab-link active first-pin">
                                Описание
                            </li>
                            <li class="tab-link second-pin">
                                Рекомендации
                            </li>
                            <div class="underline"></div>
                        </ul>


                        <div class="content-box">
                            <div class="tab-content active">
                                <p>
                                    {!! $product->description !!}
                                </p>

                            </div>

                            <div class="tab-content">
                                <p>
                                    {!! $product->recommendations !!}
                                </p>
                            </div>
                        </div>

                    </div>

                </div>
            </section>


        </div>
    </div>


{{--    <div class="relative p-4">--}}
{{--        <div class="mb-6 text-xl font-medium text-gray-800">--}}
{{--            {{ $product->name }}--}}
{{--        </div>--}}

{{--        <div class="grid items-center gap-4 sm:grid-cols-2 xs:grid-cols-1">--}}
{{--            <div class="rounded-lg h-36 xs:flex xs:justify-center sm:block">--}}
{{--                @isset($product->images)--}}
{{--                    <img class="h-full rounded-lg" src="{{ asset('storage/' . $product->images[0]) }}"--}}
{{--                        alt="{{ $product->name }}">--}}
{{--                @else--}}
{{--                    <img class="h-full rounded-lg" src="{{ asset('img/no_image_placeholder.png') }}"--}}
{{--                        alt="{{ $product->name }}">--}}
{{--                @endisset--}}
{{--            </div>--}}
{{--            <div class="flex flex-col gap-4">--}}
{{--                {{ $this->form }}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 rounded-b-md border-neutral-100">--}}
{{--        <button type="button"--}}
{{--            class="inline-block rounded bg-gray-300 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal transition duration-150 ease-in-out hover:bg-gray-400 focus:bg-gray-400 focus:outline-none focus:ring-0 active:bg-gray-400"--}}
{{--            data-twe-modal-dismiss data-twe-ripple-init data-twe-ripple-color="light">--}}
{{--            Отменить--}}
{{--        </button>--}}
{{--        <button type="submit"--}}
{{--            class="ms-1 inline-block rounded bg-yellow-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out hover:bg-yellow-700 hover:shadow-primary-2 focus:bg-yellow-700 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-primary-2"--}}
{{--            data-twe-ripple-init data-twe-ripple-color="light">--}}
{{--            Заказать--}}
{{--        </button>--}}
{{--    </div>--}}
</form>
@endsection
