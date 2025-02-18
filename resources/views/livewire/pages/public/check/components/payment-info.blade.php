<div>
    <div class="border-b py-4">
        <div class="flex space-x-4 items-center">
            <div
                class="w-16 h-16 bg-gray-100 rounded-full flex justify-center items-center text-3xl font-bold text-gray-600">
                3</div>
            <div class="font-bold text-2xl text-gray-700">Payment Methods</div>
        </div>
        <div class="pl-16 py-4">

            <form>

                <ul class="grid w-full gap-6 md:grid-cols-2">
                    <li class="col-span-full">
                        <input type="radio" @checked($paymethod == 'cash') id="cash" wire:model.live="paymethod"
                            value="cash" class="hidden peer">
                        <div
                            class="text-gray-500 bg-inherit border border-gray-200 rounded-lg cursor-pointer dark-remove:hover:text-gray-300 dark-remove:border-gray-700 dark-remove:peer-checked:text-teal-500 peer-checked:border-teal-600 peer-checked:text-teal-600 hover:text-gray-600 hover:bg-gray-100 dark-remove:text-gray-400 dark-remove:bg-gray-800 dark-remove:hover:bg-gray-700">
                            <label for="cash" class="cursor-pointer">
                                <div class="w-full p-5 bg-inherit ">
                                    <div class="inline-flex items-center justify-between w-full">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold flex space-x-2 items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                                </svg>

                                                <span>Cash on delivery</span>
                                            </div>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-6">
                                            <circle cx="12" cy="12" r="10" />
                                        </svg>

                                    </div>
                                    <div
                                        class="p-2 border-t border-teal-100 text-gray-700 {{ $paymethod != 'cash' ? 'hidden' : '' }}">
                                       <div class="text-gray-500"> Only in Dar es Salaam</div>
                                    </div>
                                </div>
                            </label>

                        </div>
                    </li>
                    <li class="col-span-full">
                        <input type="radio" @checked($paymethod == 'bank') id="bank" wire:model.live="paymethod"
                            value="bank" class="hidden peer">
                        <div
                            class="text-gray-500 bg-inherit border border-gray-200 rounded-lg cursor-pointer dark-remove:hover:text-gray-300 dark-remove:border-gray-700 dark-remove:peer-checked:text-teal-500 peer-checked:border-teal-600 peer-checked:text-teal-600 hover:text-gray-600 hover:bg-gray-100 dark-remove:text-gray-400 dark-remove:bg-gray-800 dark-remove:hover:bg-gray-700">
                            <label for="bank" class="cursor-pointer">
                                <div class="w-full p-5 bg-inherit ">
                                    <div class="inline-flex items-center justify-between w-full">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold flex space-x-2 items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                                                </svg>

                                                <span>Bank Transfer</span>
                                            </div>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-6">
                                            <circle cx="12" cy="12" r="10" />
                                        </svg>
                                    </div>
                                    <div
                                        class="p-5 border-t border-teal-100 text-gray-700 {{ $paymethod != 'bank' ? 'hidden' : '' }}">
                                        <div class="">Pay through:</div>
                                        <div class="py-1">
                                            <div class="font-bold text-gray-500">CRDB Bank</div>
                                            <div class="">
                                                <div class="">AC/No. 0152309130700</div>
                                                <div class="">Name. Eliya Joseph Exavery</div>
                                            </div>
                                        </div>
                                        <div class="py-1">
                                            <div class="font-bold text-gray-500">NMB Bank</div>
                                            <div class="">
                                                <div class="">AC/No. 0152309130700</div>
                                                <div class="">Name. Eliya Joseph Exavery</div>
                                            </div>
                                        </div>
                                        <div class="font-italic text-sm">
                                            Once the transfer is complete, please send a copy of the transfer receipt to
                                            info@ejtz.com. or Whatsapp number 0684710914.
                                            <div class="text-red-500">Your order will be processed once the payment is
                                                confirmed in our account.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2">
                                </div>
                            </label>

                        </div>
                    </li>
                    <li class="col-span-full">
                        <input type="radio" @checked($paymethod == 'mno') id="mno" wire:model.live="paymethod"
                            value="mno" class="hidden peer">
                        <div
                            class="text-gray-500 bg-inherit border border-gray-200 rounded-lg cursor-pointer dark-remove:hover:text-gray-300 dark-remove:border-gray-700 dark-remove:peer-checked:text-teal-500 peer-checked:border-teal-600 peer-checked:text-teal-600 hover:text-gray-600 hover:bg-gray-100 dark-remove:text-gray-400 dark-remove:bg-gray-800 dark-remove:hover:bg-gray-700">
                            <label for="mno" class="cursor-pointer">
                                <div class="w-full p-5 bg-inherit ">
                                    <div class="inline-flex items-center justify-between w-full">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold flex space-x-2 items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <span>Mobile Money</span>
                                            </div>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-6">
                                            <circle cx="12" cy="12" r="10" />
                                        </svg>
                                    </div>
                                    <div
                                        class="p-5 border-t border-teal-100 text-gray-700 {{ $paymethod != 'mno' ? 'hidden' : '' }}">
                                        <div class="">Lipa kwa simu TigoPesa, Airtel Money au M-Pesa</div>
                                        <div class="py-1">
                                            <div class="font-bold text-gray-500">Airtel Money</div>
                                            <div class="">
                                                <div class="">Namba. 0684710914</div>
                                                <div class="">Jina. Eliya Joseph Exavery</div>
                                            </div>
                                        </div>
                                        <div class="py-1">
                                            <div class="font-bold text-gray-500">TigoPesa</div>
                                            <div class="">
                                                <div class="">Namba. 0684710914</div>
                                                <div class="">Jina. Eliya Joseph Exavery</div>
                                            </div>
                                        </div>
                                        <div class="py-1">
                                            <div class="font-bold text-gray-500">M-Pesa</div>
                                            <div class="">
                                                <div class="">Namba. 0684710914</div>
                                                <div class="">Jina. Eliya Joseph Exavery</div>
                                            </div>
                                        </div>
                                        <div class="font-italic text-sm">
                                            Once the transfer is complete, please send a copy of the transfer receipt to
                                            info@ejtz.com. or Whatsapp number 0684710914.
                                            <div class="text-red-500">Your order will be processed once the payment is
                                                confirmed in our account.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2">
                                </div>
                            </label>

                        </div>
                    </li>
                </ul>
                @error('paymethod')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </form>

        </div>
    </div>
</div>
