<x-default-layout>
    <x-slot:title>
        {!! $data["title"] !!}
    </x-slot:title>

    <div class="row" dir="rtl">
        <div class="col-9">
            <h3>
                {!! getIcon(name: "abstract-26" , class: "fs-2 text-dark") !!}
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
                            <h3 class="modal-title">ویژگی جدید</h3>

                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                            </div>
                            <!--end::Close-->
                        </div>

                       <form method="post" action="{{ route("product.feature.store" , [ "product" => $data["product"]->slug ] ) }}">
                           @csrf
                           <div class="modal-body">
                               <div class="form-group row">
                                   <div class="col-6">
                                       <label for="feature" class="required form-label">ویژگی</label>
                                       <select id="feature" name="feature_id" class="form-select">
                                           <option value="">انتخاب ویژگی</option>
                                           @foreach($data["features"] as $feature)
                                              <option value="{{ $feature->id }}">{{ $feature->name }}</option>
                                           @endforeach
                                       </select>
                                   </div>
                                   <div class="col-6">
                                       <label for="value" class="required form-label">مقدار</label>
                                       <input type="text" id="value" name="value" class="form-control">
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
                        <th scope="col"><b>ویژگی</b></th>
                        <th scope="col"><b>مقدار</b></th>
                        <th scope="col"><b>عملیات</b></th>
                    </tr>
                    </thead>

                    <tbody>
                    @php($i = 1)
                    @foreach($data["product_features"] as $product_feature)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $product_feature->name }}</td>
                           <form method="post" action="{{ route('product.feature.update' , [ "product" => $data["product"]->slug  , "feature" => $product_feature->id ] ) }}">
                               @csrf
                               <td class="col-2">
                                   <input type="text" name="value" value="{{ $product_feature->pivot->value }}" class="border border-1 border-gray-300 form-control">
                               </td>


                               <td>
                                   <button type="submit" class="btn">
                                       {!! getIcon(name:"notepad-edit" , class: "fs-1 text-primary" , type: "duotone") !!}
                                   </button>
                                   @php(
                                 $configs = [
                                         "item" =>  $product_feature ,
                                         "route_bindings" => [
                                                "feature" => $product_feature->id ,
                                                "product" => $data["product"]->slug ,
                                             ] ,
                                         "ajax_url_name" =>  "product.feature.delete" ,
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
