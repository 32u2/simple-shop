<div class="select-none">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="py-3 pr-2">
                    <span wire:click="newProduct" class="inline-block bg-gray-800 hover:bg-purple-800 text-gray-10 rounded-full w-30 px-3 py-2 text-sm font-semibold text-gray-100 mr-2 float-right text-center cursor-pointer">
                        Create New Product
                    </span>
                    <br>
                </div>

                <table class="table-auto w-full text-gray-700">
                    <thead>
                        <tr>
                            <th class="bg-blue-100 border px-8 py-4 text-left p-2">Product</th>
                            <th class="bg-blue-100 border px-8 py-4 text-right p2 hidden md:table-cell">Price</th>
                            <th class="bg-blue-100 border px-8 py-4 text-center p2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $p)
                        <tr class="ml-2">
                            <td class="border px-8 py-4text-left">{{ $p->name }}</td>
                            <td class="border px-8 py-4 text-right text-sm hidden md:table-cell">{{ number_format($p->price, 2, '.', ',') }}</td>
                            <td class="border px-8 py-4 text-center">
                            <a href="{{ route('update-product', $p->id) }}">
                                <span class="inline-block bg-gray-800 hover:bg-purple-800 text-gray-100 rounded-full px-3 py-1 text-sm font-semibold mr-2 cursor-pointer">
                                    Update
                                </span>
                            </a>
                            <span class="inline-block bg-red-800 hover:bg-gray-800 text-gray-100 rounded-full px-3 py-1 text-sm font-semibold mr-2 cursor-pointer"
                                onclick="deleteProduct({{$p->id}},'{{ $p->name }}')">
                                Delete
                            </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <script>
                    function deleteProduct(id, name) {
                        doDelete = confirm('Delete ' + name + '?');
                        if (doDelete) {
                            Livewire.emit('deleteProduct', id);
                        }
                    }

                </script>



                {{-- workaround - when last item on the page is live-deleted, navigate to previous page. --}}

                @if ($products->isEmpty())
                    @if ($products->currentPage() > 1)
                       <script>window.history.back();</script>
                    @else
                        <h3 class="px-8 py-6">Welcome to simple-shop app.</h3>
                        <h3 class="px-8 pb-12">Create your first product and good luck with sales!</h3>
                    @endif
                @else
                    <div class="px-8 py-6">{{ $products->links() }}</div>
                @endif
            </div>
        </div>
    </div>







</div>
