<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <table class="table-auto w-full text-gray-700">
                    <thead>
                        <tr>
                            <th class="bg-blue-100 border px-8 py-4 text-left p-2">Product</th>
                            <th class="bg-blue-100 border px-8 py-4 text-right p2">Price</th>
                            <th class="bg-blue-100 border px-8 py-4 text-center p2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $p)
                        <tr class="ml-2">
                            <td class="border px-8 py-4 text-left">{{ $p->name }}</td>
                            <td class="border px-8 py-4 text-right text-sm">{{ number_format($p->price, 2, '.', ',') }}</td>
                            <td class="border px-8 py-4 text-center">
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 cursor-pointer">
                                Update
                            </span>
                            <span class="inline-block bg-red-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 cursor-pointer"
                                wire:click="destroy({{ $p->id }})">
                                Delete
                            </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="px-8 py-6">{{ $products->links() }}</div>

                @if ($products->isEmpty())
                    <h3 class="px-8 py-6">Welcome to simple-shop app.</h3>
                    <h3 class="px-8 pb-12">Create your first product and good luck with sales!</h3>
                @endif
            </div>
        </div>
    </div>
</div>
