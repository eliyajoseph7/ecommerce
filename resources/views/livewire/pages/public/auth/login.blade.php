<div class="w-full dark-remove:bg-gray-800 overflow-hidden sm:rounded-lg">

    <div class="py-16 px-2">
        <div
            class="lg:flex bg-white rounded-lg overflow-hidden mx-auto max- w-sm lg:max-w-4xl shadow-md border-t-4 border-sky-900">
            <div class="hidden lg:block lg:w-1/2 bg-cover bg-left"
                style="background-image:url('{{ asset('assets/images/kiosk.png') }}')">
            </div>
            <div class="sm:w-full lg:w-1/2">


                <div class="w-full p-8">
                    <div class="flex justify-center text-red-500">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4 text-red-500" :status="session('status')" />
                    </div>

                    <form wire:submit.prevent="login" class="w-full">
                        <h2 class="text-2xl font-semibold text-gray-700 text-center">🤗</h2>
                        <p class="text-xl text-gray-600 text-center">Welcome back!</p>
                        <a href="#"
                            class="flex items-center justify-center mt-4 text-white rounded-lg shadow-md hover:bg-gray-100">
                            <div class="px-2 py-3 text-lg">
                                🛋️
                            </div>
                            <h1 class="px-4 py-3 w-5/6 text-center text-gray-600 font-bold">Sign in to continue</h1>
                        </a>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="border-b w-1/5 lg:w-1/4"></span>
                            <a href="#" class="text-xs text-center text-gray-500 uppercase">login with
                                email</a>
                            <span class="border-b w-1/5 lg:w-1/4"></span>
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
                            <input wire:model="email" id="email"
                                class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                                type="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <div class="flex justify-between">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                                @if (Route::has('password.request'))
                                    <a class="text-sm text-gray-600 dark-remove:text-gray-400 hover:text-gray-900 dark-remove:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark-remove:focus:ring-offset-gray-800"
                                        href="{{ route('password.request') }}" wire:navigate>
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>
                            <input wire:model="password" id="password"
                                class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                                type="password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="mt-8">
                            <button class="bg-gray-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600"
                                type="submit">Login</button>
                        </div>
                        <!-- Remember Me -->
                        {{-- <div class="block mt-4">
                            <label for="remember" class="inline-flex items-center">
                                <input wire:model="form.remember" id="remember" type="checkbox"
                                    class="rounded dark-remove:bg-gray-900 border-gray-300 dark-remove:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark-remove:focus:ring-indigo-600 dark-remove:focus:ring-offset-gray-800"
                                    name="remember">
                                <span class="ms-2 text-sm text-gray-600 dark-remove:text-gray-400">{{ __('Remember me') }}</span>
                            </label>
                        </div> --}}
                        <div class="pt-2">
                            <a class="text-sm text-gray-600 dark-remove:text-gray-400 hover:text-gray-900 dark-remove:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark-remove:focus:ring-offset-gray-800"
                                href="{{ route('signup') }}">
                                {{ __('Create new account') }}
                            </a>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="border-b w-1/5 md:w-1/4"></span>
                            <a href="#" class="text-xs text-gray-500 uppercase">@E-commerce
                                {{ now()->format('Y') }}</a>
                            <span class="border-b w-1/5 md:w-1/4"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if (session()->has('info'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: '{{ session('info.type') }}',
                title: '{{ session('info.message') }}',
                text: "Enter your credentials to login!",
                showConfirmButton: false,
                timer: 3500
            });
        </script>
    @endif
</div>
