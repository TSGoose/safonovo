@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-[1920px] overflow-hidden">
        <div class="w-full relative  flex flex-col min-h-screen ">

            <section class="products-hero hero relative h-[320px] md:h-[475px]">
                <img src="{{asset("/img/production/hero.png")}}" loading="lazy" alt="">
            </section>

            <section class="content-wrapper production pt-28  pb-28 lg:pb-48">
                <div class="flex flex-col gap-16 md:gap-28">
                    <div class="flex flex-col lg:flex-row items-start gap-4 justify-between">
                        <div class="flex flex-col gap-7 self-end">
                            <div class="flex flex-col items-start">
                                <h1 class="mb-5 lg:mb-14" id="production">Производство</h1>
                                <div class="flex flex-col items-center lg:items-start text-base sm:text-xl gap-10 mb-10 lg:mb-0">
                                    <div class="border-l border-[#1C0000] pl-2.5 lg:pl-7">
                                        <p>
                                            С 2008 года приносим на Смоленскую землю лучшие рецепты мировых сыров,
                                            совершенствуя древнее ремесло их изготовления. Ручная технология,
                                            собственные стадо, корма и территория пастбищ в самом экологически
                                            чистом Сафоновском районе, а также использование исключительно своего
                                            цельного молока придают нашей продукции неповторимость и
                                            уникальность.<br>
                                            Здесь, среди зеленых лугов и прозрачных речек, пастбище превращается в
                                            утопающий в свете и тишине уголок, где животные пасутся в свободе и
                                            гармонии
                                            с окружающим миром.<br>
                                            Здесь каждый вдох наполнен свежестью чистого воздуха, а каждый шорох
                                            травы
                                            и листвы напоминает о живой природе, в которой заботливо ухаживают за
                                            стадом. Окруженные невероятной красотой ландшафта и запечатленные в
                                            безопасности уединенного района, наши животные на пастбище находят
                                            истинное благополучие и спокойствие.<br>
                                            Экологическая чистота этой территории и ее благоприятное воздействие на
                                            жизнь всех существ здесь играют ключевую роль в создании
                                            высококачественных продуктов и уникальных сыров. Благодаря такому
                                            заботливому отношению к окружающей среде, каждый кусочек сыра,
                                            произведенного на этих пастбищах, становится произведением искусства,
                                            отражающим естественную гармонию
                                            и богатство этой земли.
                                        </p>
                                    </div>
                                </div>

                                <div class="block lg:hidden lg:w-1/2 w-full shrink-0 max-w-[663px] pb-5">
                                    <img src="{{asset("/img/production/page/location.png")}}" class=" w-full h-auto lg:h-full object-cover rounded-lg object-left">
                                </div>

                            </div>
                        </div>

                        <div class="hidden lg:block lg:w-5/12 w-full shrink-0 lg:max-w-[663px] self-center ">
                            <img src="{{asset("/img/production/page/location.png")}}" class=" w-full h-auto lg:h-full object-cover rounded-lg object-left">
                        </div>
                    </div>
                </div>
            </section>

            <section class="content-wrapper production-cards pb-20 lg:pb-72" id="products">
                <div class="production-card">
                    <div class="production-card-img w-full shrink-0 lg:max-w-[920px] lg:h-[580px]">
                        <img src="{{asset("/img/production/page/img1.png")}}" class="w-full h-auto lg:h-full object-cover rounded-lg object-left">
                    </div>

                    <p>
                        С первыми лучами утреннего солнца мы отправляемся на пастбище, аромат свежей травы наполняет
                        воздух, создавая атмосферу гармонии с природой. Начинается дойка, процесс,
                        в котором каждое движение руки наполнено заботой и уважением
                        к животному. Собранное свежее молоко - это настоящий источник ценных питательных веществ,
                        который обогащает организм полезными элементами.
                    </p>

                </div>
                <div class="production-card">
                    <div class="production-card-img w-full shrink-0 lg:max-w-[920px] lg:h-[580px]">
                        <img src="{{asset("/img/production/page/img2.png")}}" class="w-full h-auto lg:h-full object-cover rounded-lg object-left">
                    </div>
                    <p>
                        Сначала молоко проходит через ряд тщательно выверенных технологических этапов: подогревание,
                        добавление кисломолочных культур, ферментации, затем отделение сыворотки и формирование
                        сырного зерна. Каждый шаг выполнен с точностью и заботой, чтобы сохранить все полезные
                        свойства молока и передать им неповторимый вкус и аромат сыра.
                    </p>
                </div>
                <div class="production-card">
                    <div class="production-card-img w-full shrink-0 lg:max-w-[920px] lg:h-[580px]">
                        <img src="{{asset("/img/production/page/img3.png")}}" class="w-full h-auto lg:h-full object-cover rounded-lg object-left">
                    </div>
                    <p>
                        Затем начинается процесс формования и созревания сыра. В этот момент специалисты вносят свой
                        неоценимый вклад, контролируя условия хранения, влажность, температуру и продолжительность
                        созревания. Этот этап требует терпения, внимания к мельчайшим деталям и преданности
                        искусству сыроварения.
                        Каждый порция сыра, выдержанного и подготовленного с особым вниманием, становится настоящим
                        украшением стола и источником наслаждения для ценителей настоящего кулинарного искусства.
                    </p>
                </div>
            </section>

        </div>
    </div>
@endsection
