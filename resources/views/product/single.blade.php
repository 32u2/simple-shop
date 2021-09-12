<x-guest-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 center">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <div class="max-w-md mx-auto my-20 bg-white rounded-xl shadow-md overflow-hidden md:max-w-3xl">
                <div class="md:flex">
                    <div class="md:flex-shrink-0">
                        <img class="h-full w-full object-cover md:h-full md:w-48" src="{{ $product->image_path }}"
                            alt="{{ $product->name }} image">
                    </div>
                    <div class="p-8">
                        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Stock Available</div>
                        <a href="#"
                            class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{ $product->name }}</a>
                        <p class="mt-2 text-gray-500">{{ $product->description }}</p>
                    </div>
                    <div class="px-6 py-4">
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-2 font-semibold text-gray-700 mr-2 w-28 text-center currencyLabel float-right mb-3">
                            &#163;{{ number_format($product->price, 2, ',', '.') }}
                        </span>
                    </div>
                </div>
            </div>


            <div class="max-w-md mx-auto my-20 bg-white rounded-xl shadow-md overflow-hidden md:max-w-3xl">
                    <div class="">
                        <div class="p-8">
                            <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold mb-4">
                                Enter your email address to purchase this product.
                                <br>
                                No registration needed !
                            </div>
                            <a href="#" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">Email</a>
                            <form wire:submit.prevent="submit">
                            <div class="">
                                <label class="block">
                                    <input wire:model="name" type="email" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                        placeholder="your email address" />
                                        @error('name') <span class="text-red-600">Invalid email address.</span> @enderror
                                </label>
                                <button type="submit" class="bg-green-800 text-gray-100 text-bold text-lg float-right px-6 py-2 my-6 rounded-full">Buy {{ $product->name }}</button>
                            </div>
                        </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
