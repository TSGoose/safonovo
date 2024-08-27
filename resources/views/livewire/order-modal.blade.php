<form wire:submit="order"
    class="relative flex flex-col w-full text-current bg-white border-none rounded-md outline-none pointer-events-auto xs:mx-4 bg-clip-padding shadow-4">

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

    <div class="relative p-4">
        <div class="mb-6 text-xl font-medium text-gray-800">
            {{ $product->name }}
        </div>

        <div class="grid items-center gap-4 sm:grid-cols-2 xs:grid-cols-1">
            <div class="rounded-lg h-36 xs:flex xs:justify-center sm:block">
                @isset($product->images)
                    <img class="h-full rounded-lg" src="{{ asset('storage/' . $product->images[0]) }}"
                        alt="{{ $product->name }}">
                @else
                    <img class="h-full rounded-lg" src="{{ asset('img/no_image_placeholder.png') }}"
                        alt="{{ $product->name }}">
                @endisset
            </div>
            <div class="flex flex-col gap-4">
                {{ $this->form }}
            </div>
        </div>
    </div>

    <div class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 rounded-b-md border-neutral-100">
        <button type="button"
            class="inline-block rounded bg-gray-300 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal transition duration-150 ease-in-out hover:bg-gray-400 focus:bg-gray-400 focus:outline-none focus:ring-0 active:bg-gray-400"
            data-twe-modal-dismiss data-twe-ripple-init data-twe-ripple-color="light">
            Отменить
        </button>
        <button type="submit"
            class="ms-1 inline-block rounded bg-yellow-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out hover:bg-yellow-700 hover:shadow-primary-2 focus:bg-yellow-700 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-primary-2"
            data-twe-ripple-init data-twe-ripple-color="light">
            Заказать
        </button>
    </div>
</form>
