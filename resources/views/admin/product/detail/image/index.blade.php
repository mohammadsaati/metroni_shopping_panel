<x-default-layout>
    <x-slot:title>
        {!! $data["title"] !!}
    </x-slot:title>

    <div class="row" dir="rtl">
        <div class="col-9">
            <h3>
                <span class="menu-icon">{!! getIcon(name: "picture" , class: "fs-2") !!}</span>
                {!! $data["title"] !!}
            </h3>
        </div>

        <div class="col-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                اضافه کردن
            </button>

            <div class="modal fade" tabindex="-1" id="kt_modal_1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">عکس جدید</h3>

                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                            </div>
                            <!--end::Close-->
                        </div>

                        <form method="post" action="{{ route("product.image.store" , [ "product" => $data["product"]->slug ] ) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $data["product"]->id }}">
                            <div class="modal-body">
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="image" class="required form-label">عکس</label>
                                        <input id="image" type="file" name="image" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">بستن</button>
                                <button type="submit" class="btn btn-primary">{!! trans("panel.save_btn") !!}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <br/>
    <br/>


    <br><br>
    <div class="row">
        @foreach($data["images"] as $image)
            <div class="col-2" id="img-{{ $image->id }}">
                <!--begin::Card-->
                <div class="card  overlay overflow-hidden">
                    <div class="card-body p-0">
                        <div class="overlay-wrapper">
                            <img src="{{ get_image("products/gallery/".$image->image) }}" alt="" class="w-100 rounded"/>
                        </div>
                        <div class="overlay-layer bg-dark bg-opacity-25">
                            @php(
                                $config = [
                                    "item" => $image ,
                                    "route_bindings" => [
                                            "product"   =>  $data["product"]->slug ,
                                            "image"     =>  $image->id
                                        ] ,
                                    "ajax_url_name" => "product.image.delete" ,
                                    "ajax_data" => [] ,
                                    "deleting_item" => "#img-".$image->id
                                ]
                            )
                          <x-delete-btn :config="$config"/>

                        </div>
                        <h5 class="text-center my-3">{{ $image->name }}</h5>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        @endforeach

    </div>

</x-default-layout>
