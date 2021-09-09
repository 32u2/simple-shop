<x-guest-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 center">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mx-auto flex justify-center flex-wrap">
                    @foreach ($products as $p)
                    <div class="p-4 w-80">
                        <div class="max-w-sm bg-white rounded-lg overflow-hidden shadow-lg">
                            <img class="w-full" src="{{env('APP_URL').'/img/no-image-available.png'}}"
                                alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-lg mb-2">{{$p->name}}</div>
                                <p class="text-gray-700 text-sm">{{$p->description}}</p>
                            </div>
                            <div class="px-6 py-4">
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 currencyLabel">
                                    &#163;{{ number_format($p->price, 2, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
