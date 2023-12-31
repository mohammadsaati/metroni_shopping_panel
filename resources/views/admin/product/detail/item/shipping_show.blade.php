@if(count($data["item"]->shippingPrices))
    <div class="row">
        <div class="col-12">
            <h4>
                هزینه های ارسال برای شهر ها
            </h4>
        </div>
    </div>
@endif
@foreach($data["item"]->shippingPrices as $shipping_price)
    <div class="mb-10">
        <!--begin::Form group-->
        <div class="form-group">
            <div>
                <div data-repeater-item>
                    <div class="form-group row mb-10">
                        <div class="col-md-2">
                            <p>{{ $shipping_price->city->name }}</p>
                        </div>

                        <div class="col-md-2">
                          تومان  {{ number_format($shipping_price->price) }}
                        </div>

                        <div class="col-md-2">
                            @php(
                                $config = [
                                    "item" => $shipping_price ,
                                    "route_bindings" => [
                                            "product"           => $data["product"]->slug ,
                                            "item"              =>  $data["item"]->id ,
                                            "shipping_price"    =>  $shipping_price->id
                                        ],
                                    "ajax_url_name" => "item.shipping_price.delete" ,
                                    "ajax_data" => [] ,
                                    "deleting_item" => "#img-".$shipping_price->id
                                ]
                            )
                            <x-delete-btn :config="$config"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Form group-->
    </div>
@endforeach
