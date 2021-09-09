<x-guest-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 center">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mx-auto py-11">
                        <div class="mx-auto my-14 w-80">
                            <div class="max-w-sm bg-white rounded-lg overflow-hidden shadow-lg">
                                <img class="w-full" src="{{env('APP_URL').'/img/no-image-available.png'}}"
                                    alt="Sunset in the mountains">
                                <div class="px-6 py-4">
                                    <div class="font-bold text-lg mb-2">{{$product->name}}</div>
                                    <p class="text-gray-700 text-sm">{{$product->description}}</p>
                                </div>
                                <div class="px-6 py-4">
                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 font-semibold text-gray-700 mr-2 w-28 text-center currencyLabel">
                                        &#163;{{ number_format($product->price, 2, ',', '.') }}
                                    </span>
                                    <span class="inline-block bg-green-800 rounded-full px-3 py-1 font-semibold text-gray-100 mr-2 currencyLabel w-28 text-center float-right">
                                        Buy
                                    </span>
                                </div>
                            </div>
                        </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
