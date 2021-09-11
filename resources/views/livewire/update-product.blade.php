<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-1 md:px-8 text-gray-600">
            <div class="flex flex-wrap flex-center">
                <div class="py-2 md:py-12 flex-auto">
                    <h2 class="text-2xl font-bold">{{ $name }}</h2>
                    <div class="mt-8 max-w-md">
                        <form wire:submit.prevent="submit">
                            <div class="grid grid-cols-1 gap-6">
                                <label class="block">
                                    <span class="text-gray-700">Product name</span>
                                    <input wire:model="name" type="text" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                        placeholder="product name" />
                                    @error('name') <span class="text-red-600">Invalid product name.</span> @enderror
                                </label>
                                <label class="block">
                                    <span class="text-gray-700">Price</span>
                                    <input wire:model="price" type="text" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                        placeholder="price" />
                                    @error('price') <span class="text-red-600">Invalid price.</span> @enderror
                                </label>
                                <label class="block">
                                    <span class="text-gray-700">Is product available?</span>
                                    <select class="block w-full mt-1 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </label>
                                <label class="block">
                                    <span class="text-gray-700">Product description</span>
                                    <textarea wire:model="description" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" rows="3"></textarea>
                                    @error('description') <span class="text-red-600">Description is required.</span> @enderror
                                </label>
                                <button type="submit" class="bg-green-600 text-gray-100 text-bold text-xl py-2 rounded-full">Update</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="py-8 flex-auto">
                    <div class="mt-0 md:mt-8 max-w-none md:max-w-xs md:float-right">
                        <img  class="w-full cursor-pointer" src="{{ $photo }}" alt="Sunset in the mountains" onclick="$('#selectImage').click();">
                        <span class="mt-2">click on the image to replace it</span>
                        <input type="file" name="image" id="selectImage" class="opacity-0">

                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>





    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Product Image
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img id="image" src="/img/no-image-available.png">
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;
        $("body").on("change", "#selectImage", function (e) {
            var files = e.target.files;
            var done = function (url) {
                image.src = url;
                $modal.modal('show');
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });
        $("#crop").click(function () {
            canvas = cropper.getCroppedCanvas({
                width: 640,
                height: 640,
            });
            canvas.toBlob(function (blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function () {
                    var base64data = reader.result;
                    Livewire.emit('imageUploaded', base64data);
                    $modal.modal('hide');

                    // don't bother with ajax, here's the Livewire
                    // $.support.cors = true
                    // $.ajax({
                    //     type: "POST",
                    //     dataType: "json",
                    //     url: "image",
                    //     data: {
                    //         '_token': $('meta[name="_token"]').attr('content'),
                    //         'image': base64data
                    //     },
                    //     success: function (data) {
                    //         console.log(data);
                    //
                    //         alert("Crop image successfully uploaded");
                    //     }
                    // });
                }
            });
        })
    </script>

</div>
