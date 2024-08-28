@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-[1920px] overflow-hidden">
        <div class="w-full relative  flex flex-col min-h-screen ">

            <section class="products-hero hero relative h-[320px] md:h-[590px]">
                <img src="{{asset("/img/products/hero.png")}}" loading="lazy" loading="lazy" alt="">
                <div
                    class="hero-text-container  absolute top-0 left-0 z-10 flex items-center justify-center w-full h-full flex-col">
                    <h1>ВКУСНЫЙ СЫР – ЭТО НАШЕ РЕМЕСЛО</h1>
                </div>
            </section>

            <section class="content-wrapper products-page py-28 lg:py-48">
                <div class=" flex flex-col items-center justify-center text-center">

                    <div class="flex gap-8 lg:gap-5 flex-col items-center pb-28 lg:pb-48">
                        <div class="heading-container w-full lg:w-[80%]">
                            <div class="line"></div>
                            <h1><span class="font-semibold">Твердый сыр</span><br>
                                из козьего молока</h1>
                            <div class="line"></div>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-8 lg:gap-5 items-center lg:items-start w-full">
                            <!-- gap-16 md:gap-28 -->
                            <div class="products-card outer-border">
                                <div class="products-card-content ">
                                    <div class="logo-container">
                                        <div>
                                            <img src="{{asset("/img/products/page/logo1.png")}}" class="logo">
                                        </div>
                                        <div class="cheese-container">
                                            <img class="cheese" src="{{asset("/img/products/page/logo1-cheese.png")}}">
                                        </div>

                                    </div>
                                    <div class="content">
                                        <p>«Каприно» - пикантный твердый сыр
                                            из цельного козьего молока. Созревание может занимать от 3 до 12 месяцев
                                            в зависимости от желаемой крепости
                                            и интенсивности вкуса. В процессе выдержки на поверхности сыра
                                            образуется твердая, слегка шероховатая корочка в светло-желтых или
                                            коричневых оттенках. Зрелый «Каприно» отличается пикантностью, легкой
                                            кислинкой
                                            и солоноватой гаммой вкусов. Структура сыра плотная, но достаточно
                                            пластичная. Цвет варьируется от кремового
                                            до медово-желтого.
                                            «Каприно» гармонично дополняет овощные салаты, пасту и ризотто.
                                            В качестве закуски красиво раскрывается в сочетании со сладкими винами,
                                            кьянти и белым сухим. Подавать рекомендуется вместе с свежеиспеченным
                                            хлебом
                                            и фруктами.</p>
                                    </div>
                                </div>
                                <a href="/src/routes/product.html" class="button !flex px-5 lg:px-10">
                                    <p>Купить</p>
                                </a>
                            </div>

                            <div class="products-card outer-border">
                                <div class="products-card-content ">
                                    <div class="logo-container">
                                        <div>
                                            <img src="{{asset("/img/products/page/logo2.png")}}" class="logo">
                                        </div>
                                        <div class="cheese-container">
                                            <img class="cheese" src="{{asset("/img/products/page/logo2-cheese.png")}}">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <p>"Гауда" - пожалуй, один из самых популярных твердых сортов сыра
                                            в мире, и это благодаря его сливочному, сладковатому, с легкими
                                            ореховыми нотами вкусу. "Гауда" из козьего молока является редкой
                                            разновидностью этого сыра, обладает плотной консистенцией с маленькими
                                            глазками, появляющимися при прессовании,
                                            и нежным молочным оттенком. По мере созревания сыр становится суше
                                            и приобретает насыщенный, многогранный аромат. 
                                            «Гауда» козий одинаково хорош
                                            в качестве самостоятельной закуски
                                            и для приготовления сэндвичей, пасты и овощных блюд. Вместе с медом
                                            и свежими фруктами подходит
                                            к красным и белым винам. Очень интересно раскрывается в паре
                                            с ягодными конфитюрами. </p>
                                    </div>
                                </div>
                                <a href="/src/routes/product.html" class="button !flex px-5 lg:px-10">
                                    <p>Купить</p>
                                </a>
                            </div>

                            <div class="products-card outer-border">
                                <div class="products-card-content ">
                                    <div class="logo-container">
                                        <div>
                                            <img src="{{asset("/img/products/page/logo3.png")}}" class="logo">
                                        </div>
                                        <div class="cheese-container">
                                            <img class="cheese" src="{{asset("/img/products/page/logo3-cheese.png")}}">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <p>«Козий» полутвердый сыр высоко ценится среди гурманов за легко узнаваемый
                                            нежно-сладкий, с легкой кислинкой, терпкий вкус и приятный аромат трав и
                                            орехов. Отличительной особенностью сыров из козьего молока является их
                                            высокая питательность
                                            и полезность. Они содержат больше кальция и белка, в них низкий уровень
                                            лактозы и молочных жиров. «Козий» полутвердый сыр получается с плотной
                                            текстурой, при этом сливочной
                                            и тающей во рту.
                                            Гастрономические сочетания «Козьего» сыра не имеют границ. Белое и
                                            красное вино, свежий французский багет или поджаренный хлеб, виноград,
                                            орехи, мед – все они идеально подходят
                                            к этому сорту сыра.
                                            «Козий» полутвердый также интересен в салатах и блюдах из мяса.</p>
                                    </div>


                                </div>
                                <a href="/src/routes/product.html" class="button !flex px-5 lg:px-10">
                                    <p>Купить</p>
                                </a>
                            </div>


                        </div>
                    </div>

                    <div class="flex gap-8 lg:gap-5 flex-col items-center  ">
                        <div class="heading-container w-full lg:w-[80%]">
                            <div class="line"></div>
                            <h1><span class="font-semibold">Твердый сыр</span><br>
                                из овечьего молока</h1>
                            <div class="line"></div>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-5 items-center lg:items-start w-full">
                            <!-- gap-16 md:gap-28 -->
                            <div class="products-card outer-border">
                                <div class="products-card-content ">
                                    <div class="logo-container">
                                        <div>
                                            <img src="{{asset("/img/products/page/logo4.png")}}" class="logo">
                                        </div>
                                        <div class="cheese-container">
                                            <img class="cheese" src="{{asset("/img/products/page/logo4-cheese.png")}}">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <p>«Манчего» — это один из самых известных и почитаемых твердых сортов сыра.
                                            Обладает уникальным внешним видом с эстетичным рисунком «в ёлочку» на
                                            несъедобной корочке. Традиция такого тиснения уходит корнями в давние
                                            времена, когда сыр оборачивали в ткань, сотканную из волокон травы
                                            эспарто.
                                            «Манчего» выдерживают от нескольких месяцев до двух лет. Сыр имеет
                                            плотную маслянистую текстуру белого или светло-желтого цвета с
                                            небольшими воздушными пузырьками. Вкус зрелого «Манчего» сливочный,
                                            насыщенный, с пикантными нотами трав и орехов.
                                            Прекрасно сочетается с ломтиками лосося и поджаренного белого хлеба,
                                            крекерами, хамоном и вялеными томатами. Составляет классическую пару с
                                            красным вином и хересом. </p>
                                    </div>
                                </div>
                                <a href="/src/routes/product.html" class="button !flex px-5 lg:px-10">
                                    <p>Купить</p>
                                </a>
                            </div>

                            <div class="products-card outer-border">
                                <div class="products-card-content ">
                                    <div class="logo-container">
                                        <div>
                                            <img src="{{asset("/img/products/page/logo5.png")}}" class="logo">
                                        </div>
                                        <div class="cheese-container">
                                            <img class="cheese" src="{{asset("/img/products/page/logo5-сheese.png")}}">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <p>"Азиаго" - уникальный сорт сыра, традиционно изготавливающийся
                                            из овечьего молока. Полностью меняет свой вкус от мягкого и чистого
                                            до сливочно-сладкого, пряного и слегка горьковатого в зависимости от
                                            времени выдержки.
                                            Молодой сыр получают спустя всего несколько месяцев, а самый зрелый
                                            к двум годам. Чем старше "Азиаго",
                                            тем светлее он становится и сильнее кристаллизуется. Свежий сыр
                                            используется для приготовления сэндвичей, он также вкусно сочетается
                                            с фруктами, крекерами и мясными изделиями. Более выдержанный тертый сыр
                                            отлично подходит как заправка
                                            к салатам, пасте и картофелю.
                                            "Азиаго" идеален в сочетании с сухим белым вином, медом, виноградом
                                            и грушей.</p>
                                    </div>
                                </div>
                                <a href="/src/routes/product.html" class="button !flex px-5 lg:px-10">
                                    <p>Купить</p>
                                </a>
                            </div>

                            <div class="products-card outer-border">
                                <div class="products-card-content ">
                                    <div class="logo-container">
                                        <div>
                                            <img src="{{asset("/img/products/page/logo6.png")}}" class="logo">
                                        </div>
                                        <div class="cheese-container">
                                            <img class="cheese" src="{{asset("/img/products/page/logo6-сheese.png")}}">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <p>«Пекорино Романо» — старейший твердый сыр с двухтысячелетней историей,
                                            начавшейся в Древнем Риме. Созревает от 5 до 9 месяцев, иногда дольше.
                                            За это время на поверхности сыра образуется твердая, гладкая корочка
                                            соломенного цвета, а внутри формируется плотная, равномерная
                                            и слегка слоистая структура в белых или светло-жёлтых оттенках.
                                            "Пекорино Романо" отличает насыщенный аромат с приятной остринкой. Такое
                                            сочетание делает этот сыр превосходным ингредиентом для приготовления
                                            паст и салатов.
                                            К столу "Пекорино Романо" рекомендуется подавать с красным или белым
                                            вином в компании фруктов, мёда, грецких орехов и свежего белого хлеба.
                                        </p>
                                    </div>
                                </div>
                                <a href="/src/routes/product.html" class="button !flex px-5 lg:px-10">
                                    <p>Купить</p>
                                </a>
                            </div>



                        </div>
                    </div>

                </div>
            </section>

            <section class="content-wrapper pb-28 lg:pb-48">
                <div class="flex flex-col gap-10" id="get-order">
                    <div class="flex flex-col lg:flex-row items-start gap-4 justify-between">
                        <div
                            class="hidden lg:block lg:w-9/12 w-full shrink-0 lg:max-w-[1077px] lg:h-[631px] self-center ">
                            <img src="{{asset("/img/products/page/img.png")}}"
                                 class="w-full h-auto lg:h-full object-cover rounded-lg object-left">
                        </div>
                        <div class="flex flex-col gap-5 h-full lg:justify-between lg:min-h-[631px]">
                            <p>Мы рады пригласить вас ощутить изысканный вкус сыров, произведенных с любовью
                                на нашем подворье. Приобретайте наши сыры, богатые традициями и истинным
                                мастерством, на полках ТЦ "Времена Года" и позвольте себе погрузиться в мир
                                изысканного гастрономического опыта.</p>
                            <div
                                class="block lg:hidden lg:w-9/12 w-full shrink-0 lg:max-w-[1077px] lg:h-[631px] self-center ">
                                <img src="{{asset("/img/products/page/img.png")}}"
                                     class="w-full h-auto lg:h-full object-cover rounded-lg object-left">
                            </div>
                            <p>Приглашаем вас посетить нашу точку продаж в ТЦ "Времена Года" по адресу:
                                Кутузовский проспект, 48</p>

                        </div>
                    </div>
                    <div class="h-[460px] md:h-[630px]" style="position:relative;overflow:hidden;">
                        <a href="https://yandex.ru/maps/org/vremena_goda/1382927229/?utm_medium=mapframe&utm_source=maps"
                           style="color:#eee;font-size:12px;position:absolute;top:0px;">Времена Года</a>
                        <a href="https://yandex.ru/maps/213/moscow/category/shopping_mall/184108083/?utm_medium=mapframe&utm_source=maps"
                           style="color:#eee;font-size:12px;position:absolute;top:14px;">Торговый центр в
                            Москве</a>
                        <iframe
                            src="https://yandex.ru/map-widget/v1/org/vremena_goda/1382927229/?indoorLevel=1&ll=37.487361%2C55.731719&z=17"
                            width="100%" height="100%" frameborder="1" allowfullscreen="true"
                            style="position:relative;"></iframe>
                    </div>
                </div>

            </section>


        </div>
    </div>
    <div class="mx-auto max-w-[1920px] overflow-hidden">

        <div class="w-full relative  flex flex-col min-h-screen ">

            <section class="products-hero hero relative h-[320px] md:h-[475px]">
                <img src="{{asset("/img/products/hero.png")}}" loading="lazy" loading="lazy" alt="">
                <div
                    class="hero-text-container  absolute top-0 left-0 z-10 flex items-center justify-center w-full h-full flex-col">
                    <h1>ВКУСНЫЙ СЫР – ЭТО НАШЕ РЕМЕСЛО</h1>
                </div>
            </section>

            <section class="content-wrapper products-page py-28 lg:py-48">
                <div class=" flex flex-col items-center justify-center text-center">

                    <div class="flex gap-8 lg:gap-5 flex-col items-center pb-28 lg:pb-48">
                        <div class="heading-container w-full lg:w-[80%]">
                            <div class="line"></div>
                            <h1><span class="font-semibold">Твердый сыр</span><br>
                                из козьего молока</h1>
                            <div class="line"></div>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-8 lg:gap-5 items-center lg:items-start w-full">
                            <!-- gap-16 md:gap-28 -->
                            <div class="products-card outer-border">
                                <div class="products-card-content ">
                                    <div class="logo-container">
                                        <div>
                                            <img src="{{asset("/img/products/page/logo1.png")}}" class="logo">
                                        </div>
                                        <div class="cheese-container">
                                            <img class="cheese" src="{{asset("/img/products/page/logo1-cheese.png")}}">
                                        </div>

                                    </div>
                                    <div class="content">
                                        <p>«Каприно» - пикантный твердый сыр
                                            из цельного козьего молока. Созревание может занимать от 3 до 12 месяцев
                                            в зависимости от желаемой крепости
                                            и интенсивности вкуса. В процессе выдержки на поверхности сыра
                                            образуется твердая, слегка шероховатая корочка в светло-желтых или
                                            коричневых оттенках. Зрелый «Каприно» отличается пикантностью, легкой
                                            кислинкой
                                            и солоноватой гаммой вкусов. Структура сыра плотная, но достаточно
                                            пластичная. Цвет варьируется от кремового
                                            до медово-желтого.
                                            «Каприно» гармонично дополняет овощные салаты, пасту и ризотто.
                                            В качестве закуски красиво раскрывается в сочетании со сладкими винами,
                                            кьянти и белым сухим. Подавать рекомендуется вместе с свежеиспеченным
                                            хлебом
                                            и фруктами.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="products-card outer-border">
                                <div class="products-card-content ">
                                    <div class="logo-container">
                                        <div>
                                            <img src="{{asset("/img/products/page/logo2.png")}}" class="logo">
                                        </div>
                                        <div class="cheese-container">
                                            <img class="cheese" src="{{asset("/img/products/page/logo2-cheese.png")}}">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <p>"Гауда" - пожалуй, один из самых популярных твердых сортов сыра
                                            в мире, и это благодаря его сливочному, сладковатому, с легкими
                                            ореховыми нотами вкусу. "Гауда" из козьего молока является редкой
                                            разновидностью этого сыра, обладает плотной консистенцией с маленькими
                                            глазками, появляющимися при прессовании,
                                            и нежным молочным оттенком. По мере созревания сыр становится суше
                                            и приобретает насыщенный, многогранный аромат. 
                                            «Гауда» козий одинаково хорош
                                            в качестве самостоятельной закуски
                                            и для приготовления сэндвичей, пасты и овощных блюд. Вместе с медом
                                            и свежими фруктами подходит
                                            к красным и белым винам. Очень интересно раскрывается в паре
                                            с ягодными конфитюрами. </p>
                                    </div>
                                </div>
                            </div>

                            <div class="products-card outer-border">
                                <div class="products-card-content ">
                                    <div class="logo-container">
                                        <div>
                                            <img src="{{asset("/img/products/page/logo3.png")}}" class="logo">
                                        </div>
                                        <div class="cheese-container">
                                            <img class="cheese" src="{{asset("/img/products/page/logo3-cheese.png")}}">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <p>«Козий» полутвердый сыр высоко ценится среди гурманов за легко узнаваемый
                                            нежно-сладкий, с легкой кислинкой, терпкий вкус и приятный аромат трав и
                                            орехов. Отличительной особенностью сыров из козьего молока является их
                                            высокая питательность
                                            и полезность. Они содержат больше кальция и белка, в них низкий уровень
                                            лактозы и молочных жиров. «Козий» полутвердый сыр получается с плотной
                                            текстурой, при этом сливочной
                                            и тающей во рту.
                                            Гастрономические сочетания «Козьего» сыра не имеют границ. Белое и
                                            красное вино, свежий французский багет или поджаренный хлеб, виноград,
                                            орехи, мед – все они идеально подходят
                                            к этому сорту сыра.
                                            «Козий» полутвердый также интересен в салатах и блюдах из мяса.</p>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>

                    <div class="flex gap-8 lg:gap-5 flex-col items-center  ">
                        <div class="heading-container w-full lg:w-[80%]">
                            <div class="line"></div>
                            <h1><span class="font-semibold">Твердый сыр</span><br>
                                из овечьего молока</h1>
                            <div class="line"></div>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-5 items-center lg:items-start w-full">
                            <!-- gap-16 md:gap-28 -->
                            <div class="products-card outer-border">
                                <div class="products-card-content ">
                                    <div class="logo-container">
                                        <div>
                                            <img src="{{asset("/img/products/page/logo4.png")}}" class="logo">
                                        </div>
                                        <div class="cheese-container">
                                            <img class="cheese" src="{{asset("/img/products/page/logo4-cheese.png")}}">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <p>«Манчего» — это один из самых известных и почитаемых твердых сортов сыра.
                                            Обладает уникальным внешним видом с эстетичным рисунком «в ёлочку» на
                                            несъедобной корочке. Традиция такого тиснения уходит корнями в давние
                                            времена, когда сыр оборачивали в ткань, сотканную из волокон травы
                                            эспарто.
                                            «Манчего» выдерживают от нескольких месяцев до двух лет. Сыр имеет
                                            плотную маслянистую текстуру белого или светло-желтого цвета с
                                            небольшими воздушными пузырьками. Вкус зрелого «Манчего» сливочный,
                                            насыщенный, с пикантными нотами трав и орехов.
                                            Прекрасно сочетается с ломтиками лосося и поджаренного белого хлеба,
                                            крекерами, хамоном и вялеными томатами. Составляет классическую пару с
                                            красным вином и хересом. </p>
                                    </div>
                                </div>
                            </div>

                            <div class="products-card outer-border">
                                <div class="products-card-content ">
                                    <div class="logo-container">
                                        <div>
                                            <img src="{{asset("/img/products/page/logo5.png")}}" class="logo">
                                        </div>
                                        <div class="cheese-container">
                                            <img class="cheese" src="{{asset("/img/products/page/logo5-сheese.png")}}">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <p>"Азиаго" - уникальный сорт сыра, традиционно изготавливающийся
                                            из овечьего молока. Полностью меняет свой вкус от мягкого и чистого
                                            до сливочно-сладкого, пряного и слегка горьковатого в зависимости от
                                            времени выдержки.
                                            Молодой сыр получают спустя всего несколько месяцев, а самый зрелый
                                            к двум годам. Чем старше "Азиаго",
                                            тем светлее он становится и сильнее кристаллизуется. Свежий сыр
                                            используется для приготовления сэндвичей, он также вкусно сочетается
                                            с фруктами, крекерами и мясными изделиями. Более выдержанный тертый сыр
                                            отлично подходит как заправка
                                            к салатам, пасте и картофелю.
                                            "Азиаго" идеален в сочетании с сухим белым вином, медом, виноградом
                                            и грушей.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="products-card outer-border">
                                <div class="products-card-content ">
                                    <div class="logo-container">
                                        <div>
                                            <img src="{{asset("/img/products/page/logo6.png")}}" class="logo">
                                        </div>
                                        <div class="cheese-container">
                                            <img class="cheese" src="{{asset("/img/products/page/logo6-сheese.png")}}">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <p>«Пекорино Романо» — старейший твердый сыр с двухтысячелетней историей,
                                            начавшейся в Древнем Риме. Созревает от 5 до 9 месяцев, иногда дольше.
                                            За это время на поверхности сыра образуется твердая, гладкая корочка
                                            соломенного цвета, а внутри формируется плотная, равномерная
                                            и слегка слоистая структура в белых или светло-жёлтых оттенках.
                                            "Пекорино Романо" отличает насыщенный аромат с приятной остринкой. Такое
                                            сочетание делает этот сыр превосходным ингредиентом для приготовления
                                            паст и салатов.
                                            К столу "Пекорино Романо" рекомендуется подавать с красным или белым
                                            вином в компании фруктов, мёда, грецких орехов и свежего белого хлеба.
                                        </p>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>

                </div>
            </section>

            <section class="content-wrapper pb-28 lg:pb-48">
                <div class="flex flex-col gap-10" id="get-order">
                    <div class="flex flex-col lg:flex-row items-start gap-4 justify-between">
                        <div
                            class="hidden lg:block lg:w-9/12 w-full shrink-0 lg:max-w-[1077px] lg:h-[631px] self-center ">
                            <img src="{{asset("/img/products/page/img.png")}}"
                                 class="w-full h-auto lg:h-full object-cover rounded-lg object-left">
                        </div>
                        <div class="flex flex-col gap-5 h-full lg:justify-between lg:min-h-[631px]">
                            <p>Мы рады пригласить вас ощутить изысканный вкус сыров, произведенных с любовью
                                на нашем подворье. Приобретайте наши сыры, богатые традициями и истинным
                                мастерством, на полках ТЦ "Времена Года" и позвольте себе погрузиться в мир
                                изысканного гастрономического опыта.</p>
                            <div
                                class="block lg:hidden lg:w-9/12 w-full shrink-0 lg:max-w-[1077px] lg:h-[631px] self-center ">
                                <img src="{{asset("/img/products/page/img.png")}}"
                                     class="w-full h-auto lg:h-full object-cover rounded-lg object-left">
                            </div>
                            <p>Приглашаем вас посетить нашу точку продаж в ТЦ "Времена Года" по адресу:
                                Кутузовский проспект, 48</p>

                        </div>
                    </div>
                    <div class="h-[460px] md:h-[630px]" style="position:relative;overflow:hidden;">
                        <a href="https://yandex.ru/maps/org/vremena_goda/1382927229/?utm_medium=mapframe&utm_source=maps"
                           style="color:#eee;font-size:12px;position:absolute;top:0px;">Времена Года</a>
                        <a href="https://yandex.ru/maps/213/moscow/category/shopping_mall/184108083/?utm_medium=mapframe&utm_source=maps"
                           style="color:#eee;font-size:12px;position:absolute;top:14px;">Торговый центр в
                            Москве</a>
                        <iframe
                            src="https://yandex.ru/map-widget/v1/org/vremena_goda/1382927229/?indoorLevel=1&ll=37.487361%2C55.731719&z=17"
                            width="100%" height="100%" frameborder="1" allowfullscreen="true"
                            style="position:relative;"></iframe>
                    </div>
                </div>

            </section>


        </div>
    </div>
{{--    <div class="product-card px-5">--}}
{{--        <div class="max-w-lg mx-auto lg:max-w-6xl pt-10 pb-20 ">--}}
{{--            <a href="{{ Route::is('home') ? '#products' : route('home') . '#products' }}"--}}
{{--               class="text-white flex gap-2 items-center pl-5 font-base">--}}
{{--                <svg width="26" height="8" viewBox="0 0 26 8" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                    <path d="M0.646446 3.64645C0.451185 3.84171 0.451185 4.15829 0.646446 4.35356L3.82843 7.53554C4.02369 7.7308 4.34027 7.7308 4.53553 7.53554C4.7308 7.34027 4.7308 7.02369 4.53553 6.82843L1.70711 4L4.53553 1.17157C4.7308 0.976313 4.7308 0.65973 4.53553 0.464468C4.34027 0.269206 4.02369 0.269206 3.82843 0.464468L0.646446 3.64645ZM26 3.5L1 3.5L1 4.5L26 4.5L26 3.5Z" fill="white"/>--}}
{{--                </svg>--}}
{{--                К товарам--}}
{{--            </a>--}}
{{--            <div class="p-5 bg-white rounded-2xl mt-5 ">--}}
{{--                <div class="{{ $product->images ? 'grid items-start grid-cols-1 gap-6 lg:grid-cols-2 max-lg:gap-12' : '' }}">--}}
{{--                    @isset($product->images)--}}
{{--                        <div class="flex flex-col justify-between h-full top-0 w-full gap-5 lg:sticky sm:flex product-images-carousel">--}}
{{--                            <div class="">--}}
{{--                                <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->name }}" class="object-cover w-4/5  rounded-xl product-image-main" />--}}
{{--                            </div>--}}
{{--                            <div class="flex gap-5 overflow-x-auto">--}}
{{--                                @foreach ($product->images as $image)--}}
{{--                                    <img src="{{ asset('storage/' . $image) }}" alt="{{ $product->name }}" class="h-16  lg:h-28  rounded-xl cursor-pointer {{ $loop->first ? 'border-[3px] border-black' : '' }} product-image" />--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endisset--}}

{{--                    <div class="flex flex-col gap-5 md:gap-10 h-full">--}}
{{--                        <div>--}}
{{--                            <h2 class="font-6xl text-BebasNeue">--}}
{{--                                {{ $product->name }}--}}
{{--                            </h2>--}}
{{--                            <p class="font-2xl text-BebasNeue">--}}
{{--                                {{ $product->price }} P--}}
{{--                            </p>--}}
{{--                        </div>--}}


{{--                        <div>--}}
{{--                            <h3 class="font-xl mb-5 font-semibold">--}}
{{--                                О товаре--}}
{{--                            </h3>--}}
{{--                            <p class="font-base">--}}
{{--                                {!! $product->full_description !!}--}}
{{--                            </p>--}}
{{--                        </div>--}}

{{--                        @isset($product->attributes)--}}
{{--                            <div>--}}
{{--                                <h3 class="font-xl font-semibold mb-5">--}}
{{--                                    Атрибуты--}}
{{--                                </h3>--}}
{{--                                <ul class="pl-4 font-lg list-disc marker:text-[#EB7100] grid grid-cols-1 md:grid-cols-2 gap-4">--}}
{{--                                    @foreach ($product->attributes as $key => $value)--}}
{{--                                        <li>--}}
{{--                                            {{ $key }} - {{ $value }}--}}
{{--                                        </li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}

{{--                            </div>--}}
{{--                        @endisset--}}

{{--                        <button type="button" data-twe-toggle="modal" data-twe-target="#orderModal" data-twe-ripple-init data-twe-ripple-color="light" class="button bg-[#EB7100] mt-auto !w-full md:max-w-56 text-white font-base ">--}}
{{--                            Заказать--}}
{{--                        </button>--}}

{{--                        <div data-twe-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="orderModal" tabindex="-1" aria-labelledby="orderModalTitle" aria-modal="true" role="dialog">--}}
{{--                            <div data-twe-modal-dialog-ref class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[750px]">--}}
{{--                                <livewire:order-modal :product="$product" />--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
