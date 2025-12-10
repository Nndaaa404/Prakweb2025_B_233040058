<x-guest-layout>
    <div class="w-full max-w-md bg-neutral-primary-soft border border-default rounded-base shadow-xs p-6 sm:p-8">
        <h2 class="text-2xl font-bold text-heading mb-6 text-center">Sign In</h2>

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="space-y-4">
                {{-- Email --}}
                <div>
                    <label for="email" class="block mb-2.5 text-sm font-medium text-heading">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body @error('email') border-red-500 @enderror"
                        placeholder="name@company.com">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block mb-2.5 text-sm font-medium text-heading">Password</label>
                    <input type="password" name="password" id="password" required
                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body @error('password') border-red-500 @enderror"
                        placeholder="••••••••">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Remember Me & Forgot Password --}}
                <div class="flex items-center justify-between">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" name="remember" type="checkbox" class="w-4 h-4 border border-default-medium rounded bg-neutral-secondary-medium focus:ring-3 focus:ring-brand-medium text-brand">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="remember" class="text-body">Remember me</label>
                        </div>
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm font-medium text-brand hover:underline">Forgot password?</a>
                    @endif
                </div>

                {{-- Submit Button --}}
                <button type="submit" class="w-full text-white bg-brand hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium font-medium rounded-base text-sm px-5 py-2.5 text-center shadow-xs transition duration-200">
                    Sign in
                </button>
                
                <p class="text-sm font-light text-body text-center">
                    Don’t have an account yet? <a href="{{ route('register') }}" class="font-medium text-brand hover:underline">Sign up</a>
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>