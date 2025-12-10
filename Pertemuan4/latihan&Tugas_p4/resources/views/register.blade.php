<x-guest-layout>
    <div class="w-full max-w-md bg-neutral-primary-soft border border-default rounded-base shadow-xs p-6 sm:p-8">
        <h2 class="text-2xl font-bold text-heading mb-6 text-center">Create Account</h2>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="space-y-4">
                {{-- Name --}}
                <div>
                    <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Full Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body @error('name') border-red-500 @enderror"
                        placeholder="Enter your full name">
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Username (Sesuai Model User) --}}
                <div>
                    <label for="username" class="block mb-2.5 text-sm font-medium text-heading">Username</label>
                    <input type="text" name="username" id="username" value="{{ old('username') }}" required
                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body @error('username') border-red-500 @enderror"
                        placeholder="Choose a username">
                    @error('username')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block mb-2.5 text-sm font-medium text-heading">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
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

                {{-- Confirm Password --}}
                <div>
                    <label for="password_confirmation" class="block mb-2.5 text-sm font-medium text-heading">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                        placeholder="••••••••">
                </div>

                {{-- Submit Button --}}
                <button type="submit" class="w-full text-white bg-brand hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium font-medium rounded-base text-sm px-5 py-2.5 text-center shadow-xs transition duration-200">
                    Register
                </button>
                
                <p class="text-sm font-light text-body text-center">
                    Already have an account? <a href="{{ route('login') }}" class="font-medium text-brand hover:underline">Login here</a>
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>