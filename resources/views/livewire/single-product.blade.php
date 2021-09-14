<div>
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


            <div id="checkout_form">
                <div class="max-w-md mx-auto my-20 bg-white rounded-xl shadow-md overflow-hidden md:max-w-3xl">
                    <div class="p-8">
                        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold mb-6">
                            Enter your email address to purchase this product.
                            <br>
                            No registration needed !
                        </div>
                        Email
                        <form wire:submit.prevent="submit">
                            <label class="block">
                                <input type="email" name="email" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                placeholder="your email address" />
                            </label>
                            <button type="button" id="checkout" class="bg-green-800 hover:bg-green-600 text-gray-100 text-bold text-lg float-right px-6 py-2 mt-6 mb-10 rounded-full">Buy {{ $product->name }}</button>
                        </form>
                    </div>
                </div>
            </div>

            <div id="thank_you" style="display:none">
                <div class="text-center max-w-md mx-auto my-20 py-16 bg-white rounded-xl shadow-md overflow-hidden md:max-w-3xl">
                    <h3 class="text-2xl text-center">Thank you for the purchase !</h3>
                    <a href="{{ route('landing') }}">
                        <button type="button" class="bg-purple-800 hover:bg-gray-800 text-gray-100 text-bold text-lg px-6 py-2 mt-6 mb-10 rounded-full">Return to the Store</button>
                    </a>
                </div>
            </div>

            <div id="try_again" style="display:none">
                <div class="text-center max-w-md mx-auto my-20 py-16 bg-white rounded-xl shadow-md overflow-hidden md:max-w-3xl">
                    <h3 class="text-2xl text-center">Something went wrong !</h3>
                    <a href="{{ route('single-product', $product->id) }}">
                        <button type="button" class="bg-purple-800 hover:bg-gray-800 text-gray-100 text-bold text-lg px-6 py-2 mt-6 mb-10 rounded-full">Try Again</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://checkout.stripe.com/checkout.js"> </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $('#checkout').click(function () {
            var amount = {{ $product->price * 100 }}; // boris - remember to half it for the Phase 3
            var image = 'http://127.0.0.1:8000{{ $product->image_path }}';
            var productName = '{{ $product->name }}';
            var productID = '{{ $product->id }}';
            var email = $.trim($("input[name='email']").val());

            var handler = StripeCheckout.configure({
                key: 'pk_test_51JZJFgFtftzX9HhOShq6hWddZf2UKVmcP2Q12ILMDpCQPDkiMYjAsLvPghy5IiSI6uaCkJPrPybY5B4CC9P2DIam00eNKLdwND', // your publisher key id
                locale: 'auto',
                token: function (token) {
                    const data = {
                        product_id: productID,
                        amount: amount,
                        token: token
                    }

                    Livewire.emit('processPurchase', data);
                    console.log(token);
                }

            });

            handler.open({
                name: 'Simple Shop',
                description: productName,
                amount: amount,
                email: email,
                currency: 'gbp',
                image: image,
            });
        })
    </script>
</div>
