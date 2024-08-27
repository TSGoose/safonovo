<form wire:submit.prevent="send">
    <div class="grid gap-6 md:grid-cols-2 sm:grid-cols-1 pb-10">
        <div class="flex flex-col items-center">
            <div class="relative flex items-center w-full">
                <input type="text" wire:model="firstName" placeholder="Имя*" required
                       class="w-full px-2 py-3 text-sm text-gray-800 bg-white border-b border-black outline-none focus:border-[#EB7100]" />
            </div>
            <x-input-error for="firstName" />
        </div>

        <div class="flex flex-col items-center">
            <div class="relative flex items-center w-full">
                <input type="text" wire:model="lastName" placeholder="Фамилия"
                       class="w-full px-2 py-3 text-sm text-gray-800 bg-white border-b border-black outline-none focus:border-[#EB7100]" />
            </div>
            <x-input-error for="lastName" />
        </div>

        <div class="flex flex-col items-center">
            <div class="relative flex items-center w-full">
                <input type="tel" wire:model="phone" placeholder="Номер телефона"
                       class="w-full px-2 py-3 text-sm text-gray-800 bg-white border-b border-black outline-none focus:border-[#EB7100]" />
            </div>
            <x-input-error for="phone" />
        </div>

        <div class="flex flex-col items-center">
            <div class="relative flex items-center w-full">
                <input type="email" wire:model="email" placeholder="Email*" required
                       class="w-full px-2 py-3 text-sm text-gray-800 bg-white border-b border-black outline-none focus:border-[#EB7100]" />
            </div>
            <x-input-error for="email" />
        </div>

        <div class="relative flex flex-col items-center w-full md:col-span-2">
            <div class="relative flex items-center w-full">
                                        <textarea wire:model="message" placeholder="Текст Вашего сообщения*" required
                                                  class="w-full px-2 pt-3 text-sm text-gray-800 bg-white border-b border-black outline-none focus:border-[#EB7100]"
                                                  style="resize: none;"></textarea>
            </div>
            <x-input-error for="message" />
        </div>

        <div class="col-span-full">
            <div class="flex gap-6 mt-4  items-baseline flex-wrap">
                <div class="flex items-center">
                    <input id="radio1" type="radio" wire:model="subject"
                           value="Product Information" name="radio-group" checked>
                    <label for="radio1" class="ml-4 text-sm text-gray-500 ">Информация<br> о
                        продукте</label>
                </div>


                <div class="flex items-center">
                    <input id="radio2" type="radio" wire:model="subject"
                           value="Shipping and Delivery" name="radio-group">
                    <label for="radio2" class="ml-4 text-sm text-gray-500 "> Доставка<br> и
                        оплата</label>
                </div>

                <div class="flex items-center">
                    <input id="radio3" type="radio" wire:model="subject"
                           value="Return and Refund" name="radio-group">
                    <label for="radio3" class="ml-4 text-sm text-gray-500 ">Возврат<br>
                        товара</label>
                </div>

                <div class="flex items-center">
                    <input id="radio4" type="radio" wire:model="subject" value="Technical Issue"
                           name="radio-group">
                    <label for="radio4" class="ml-4 text-sm text-gray-500 ">Технические<br>
                        проблемы</label>
                </div>

                <div class="flex items-center">
                    <input id="radio5" type="radio" wire:model="subject" value="Other"
                           name="radio-group">
                    <label for="radio4" class="ml-4 text-sm text-gray-500 ">Другое</label>
                </div>
            </div>
            <x-input-error for="subject" />
        </div>
    </div>

    <button type="submit" class="button bg-[#EB7100] !px-9 uppercase text-BebasNeue text-white">
        Отправить сообщение
    </button>
</form>
