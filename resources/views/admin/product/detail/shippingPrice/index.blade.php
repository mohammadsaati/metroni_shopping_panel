<x-default-layout>
    <x-slot:title>
        {!! $data["title"] !!}
    </x-slot:title>

    <div class="row" dir="rtl">
        <div class="col-9">
            <h3>
                {!! getIcon(name: "truck" , class: "fs-2 text-dark") !!}
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
                            <h3 class="modal-title">هزینه ی ارسال جدید</h3>

                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                            </div>
                            <!--end::Close-->
                        </div>

                       <form method="post" action="{{ route("product.shipping_price.store" , [ "product" => $data["product"]->slug ] ) }}">
                           @csrf
                           <input type="hidden" name="product_id" value="{{ $data["product"]->id }}">
                           <div class="modal-body">
                               <div class="form-group row">
                                   <div class="col-6">
                                       <label for="city" class="required form-label">شهر</label>
                                       <select id="city" name="city_id" class="form-select">
                                           <option value="">انتخاب شهر</option>
                                           @foreach($data["cities"] as $city)
                                              <option value="{{ $city->id }}">{{ $city->name }}</option>
                                           @endforeach
                                       </select>
                                   </div>
                                   <div class="col-6">
                                       <label for="price" class="required form-label">هزینه (تومان)</label>
                                       <input type="text" id="price" name="price" class="form-control">
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

    <div class="row">
        <div class="col-12">

            <div class="table-responsive">
                <table class="table border table-rounded table-row-bordered table-row-gray-300 border-gray-300 gs-4 gy-4" dir="rtl">

                    <thead class="bg-secondary">
                    <tr>
                        <th scope="col"><b>#</b></th>
                        <th scope="col"><b>شهر</b></th>
                        <th scope="col"><b>هزینه</b></th>
                        <th scope="col"><b>عملیات</b></th>
                    </tr>
                    </thead>

                    <tbody>
                    @php($i = 1)
                    @foreach($data["shipping_prices"] as $shipping_price)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $shipping_price->city->name }}</td>
                           <form method="post" action="{{ route('product.shipping_price.update' , [ "product" => $data["product"]->slug  , "shipping_price" => $shipping_price->id ] ) }}">
                               @csrf
                               <td class="col-2">
                                   <input type="text" name="price" value="{{ number_format($shipping_price->price) }}" class="border border-1 border-gray-300 form-control">
                               </td>


                               <td>
                                   <button type="submit" class="btn">
                                       {!! getIcon(name:"notepad-edit" , class: "fs-1 text-primary" , type: "duotone") !!}
                                   </button>
                                   @php(
                                 $configs = [
                                         "item" =>  $shipping_price ,
                                         "route_bindings" => [
                                                "shipping_price" => $shipping_price->id ,
                                                "product" => $data["product"]->slug ,
                                             ] ,
                                         "ajax_url_name" =>  "product.shipping_price.delete" ,
                                         "func"  => "" ,
                                     ]
                                 )


                                   <x-deleteBtn :config="$configs" />
                               </td>
                           </form>
                        </tr>
                        @php($i++)
                    @endforeach
                    </tbody>

                </table>
            </div>

        </div>

    </div>

</x-default-layout>
