@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-[1920px] overflow-hidden">
        <div class="w-full relative  flex flex-col min-h-screen ">

            <section class="products-hero hero relative h-[320px] md:h-[475px]">
                <img src="{{asset("/img/about/hero.png")}}" draggable="false" loading="lazy">
            </section>


            <section class="content-wrapper about-page py-28 lg:py-48" id="about">
                <div class="flex flex-col gap-16 md:gap-28">
                    <div class="flex flex-col lg:flex-row items-start gap-4 justify-between">
                        <div class="hidden lg:block lg:w-1/2 w-full shrink-0 lg:max-w-[920px] self-center ">
                            <img src="{{asset("/img/about/page/img1.png")}}"
                                 class=" w-full h-auto lg:h-full object-cover rounded-lg object-left" draggable="false" loading="lazy">
                        </div>
                        <div class="flex flex-col gap-7">
                            <div class="flex flex-col items-start">
                                <h1 class="mb-5 lg:mb-14 ">О нас</h1>
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
                                </div>

                                <div class="block lg:hidden lg:w-1/2 w-full shrink-0 max-w-[920px]">
                                    <img src="{{asset("/img/about/page/img1.png")}}"
                                         class="w-full h-auto lg:h-full object-cover rounded-lg object-left" draggable="false" loading="lazy">
                                </div>

                            </div>
                        </div>


                    </div>
                </div>

            </section>

            <section class="content-wrapper products " id="products">
                <div class="flex flex-col  items-center justify-center text-center gap-8">
                    <div class="heading-container w-full lg:w-[80%]">
                        <div class="line"></div>
                        <h1>Галерея нашего подворья</h1>
                        <div class="line"></div>
                    </div>
                    <div class="compound-galery">
                        <div class="grid grid-cols-1 grid-rows-3 lg:grid-cols-2 lg:grid-rows-2 gap-4  pb-28 lg:pb-48">
                            <img src="{{asset("/img/about/page/gallery1.png")}}" draggable="false" loading="lazy">
                            <img src="{{asset("/img/about/page/gallery2.png")}}" draggable="false" loading="lazy">
                            <img class="lg:col-span-2 object-cover h-full max-h-[733px] w-full" src="{{asset("/img/about/page/gallery3.png")}}" draggable="false" loading="lazy">
                            <img src="{{asset("/img/about/page/gallery4.png")}}" draggable="false" loading="lazy">
                            <img src="{{asset("/img/about/page/gallery5.png")}}" draggable="false" loading="lazy">
                            <img class="lg:col-span-2 object-cover h-full max-h-[733px] w-full " src="{{asset("/img/about/page/gallery6.png")}}" draggable="false" loading="lazy">
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection
