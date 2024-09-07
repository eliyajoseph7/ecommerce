<footer class="bg-gray-100 border-t-8 border-t-sky-900/50 rounded-t-sm {{ Route::is('signin') || Route::is('signup') || Route::is('customer_profile')  ? 'hidden' : ''}}">
    <div class="min-h-[40vh] grid grid-cols-1 md:grid-cols-4 gap-2 w-full space-y-2 py-10 border-b-0 border-b-sky-900/10">
        <div class="px-4">
            <div class="text-lg font-bold py-3">About Us</div>
            <div class=""><span class="float-left flex text-2xl items-center">🇹🇿<img src="{{ asset('assets/images/logo.png') }}" class="w-12 h-10"></span> is a prominent company in Tanzania specializing in a diverse range of services including car sales and supply, house renting and selling, real estate development, and the distribution of electronics, equipment, and machinery.</div>
        </div>
        <div class="px-2">
            <div class="text-lg font-bold py-3">Useful Links</div>
            <ul class="text-gray-600">
                <li class="text-teal-700 hover:text-sky-900"><a href="#">Refund Policy</a></li>
                <li class="text-teal-700 hover:text-sky-900"><a href="#">Delivery Information</a></li>
                <li class="text-teal-700 hover:text-sky-900"><a href="#">Return Policy</a></li>
                <li class="text-teal-700 hover:text-sky-900"><a href="#">Terms & Conditions</a></li>
            </ul>
        </div>
        <div class="px-2">
            <div class="text-lg font-bold py-3">FAQ</div>
            <ul class="text-gray-600">
                <li class="text-teal-700 hover:text-sky-900"><a href="#">Where is EJTZ located?</a></li>
                <li class="text-teal-700 hover:text-sky-900"><a href="#">Does EJTZ build houses or develop real estate?</a></li>
                <li class="text-teal-700 hover:text-sky-900"><a href="#">Is there a warranty?</a></li>
                <li class="text-teal-700 hover:text-sky-900 text-right"><a href="#">See more FAQ..</a></li>
            </ul>
        </div>
        <div class="px-2">
            <div class="text-lg font-bold py-3">Contact Us</div>
            <ul class="text-gray-600">
                <li class="text-teal-700 hover:text-sky-900"><a href="#">Mikocheni B, Dar es Salaam</a></li>
                <li class="text-teal-700 hover:text-sky-900"><a href="tel:+255684710914">+255684710914</a></li>
                <li class="text-teal-700 hover:text-sky-900"><a href="mailto:info@ejtz.co.tz">info@ejtz.co.tz</a></li>
                <li class="text-gray-700 hover:text-sky-900"><a>Mon-Sat, 8:00 - 18:00</a></li>
            </ul>
        </div>
    </div>
    <div class="h-10 bg-sky-900 rounded-md items-center text-white">
    </div>
    <div class="text-md py-2 px-1 text-gray-500 text-left">@ejtz.{{ now()->format('Y') }}</div>

</footer>