<x-default-layout>
    <x-slot:title>
        {!! $data["title"] !!}
    </x-slot:title>

    <div class="row" dir="rtl">
        <div class="col-12">
            <h3>
                {!! getIcon(name: "abstract-26" , class: "fs-2 text-dark") !!}
                {!! $data["title"] !!}
            </h3>

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
                        <th scope="col"><b>عکس</b></th>
                        <th scope="col"><b>نام محصول</b></th>
                        <th scope="col"><b>موجودی کل</b></th>
                        <th scope="col"><b>دسته بندی اصلی</b></th>
                        <th scope="col"><b>قیمت ها</b></th>
                        <th scope="col"><b>وضعیت</b></th>
                        <th scope="col"><b>ویرایش</b></th>
                    </tr>
                    </thead>

                    <tbody>
                    @php($i = 1)
                    @foreach($data["products"] as $product)
                        <tr @if(!$product->status) class="bg-danger bg-opacity-50" @endif>
                            <td>{{ $i }}</td>
                            <td>
                                <img src="{!! get_image("products/".$product->image) !!}" class="w-50 h-80px rounded" loading="lazy">
                            </td>
                            <td>{{ str($product->name)->words(10 , "...") }}</td>
                            <td>{{ $product->showProductStock() }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>
                                <a href="{{ route('product.item.index' , $product->slug) }}" class="btn btn-primary">
                                    مشاهده ی قیمت ها
                                </a>
                            </td>
                            <td id="tr-{{ $product->id }}">
                                @php(
                                    $configs = [
                                            "item" =>  $product ,
                                            "ajax_url_name" =>  "product.update" ,
                                            "func"  => "" ,
                                            "ajax_data" => [
                                                "status" => $product->status == 1 ? 0 : 1
                                            ]
                                        ]
                                    )


                                <x-statusBtn :config="$configs" />

                            </td>
                            <td>
                                <!--begin::Menu-->
                                <div class="menu menu-rounded menu-column menu-gray-600 menu-state-bg fw-semibold" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                        <!--begin::Menu link-->
                                        <a href="#" class="menu-link">
                                            <span class="menu-title">
                                                {!! getIcon(name: "gear" , class: "fs-2 text-primary") !!}
                                            </span>
                                        </a>
                                        <!--end::Menu link-->

                                        <!--begin::Menu sub-->
                                        <div class="menu-sub menu-sub-dropdown p-3 border border-2 w-200px max-shadow">
                                            <!--begin::Menu item-->
                                            <div class="menu-item">
                                                <a href="{{ route("product.show" , $product->slug) }}" class="menu-link px-1 py-3">
                                                    <span class="menu-bullet me-0 mx-3">
                                                        {!! getIcon(name: "abstract-26" , class: "text-gray-700") !!}
                                                    </span>
                                                    <span class="menu-title">
                                                        ویرایش مشخصات
                                                    </span>
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item">
                                                <a href="{{ route("product.feature.index" , $product->slug) }}" class="menu-link px-1 py-3">
                                                    <span class="menu-bullet me-0 mx-3">
                                                        {!! getIcon(name: "star" , class: "text-gray-700") !!}
                                                    </span>
                                                    <span class="menu-title">
                                                        ویرایش ویژگی ها
                                                    </span>
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item">
                                                <a href="{{ route("product.shipping_price.index" , $product->slug) }}" class="menu-link px-1 py-3">
                                                    <span class="menu-bullet me-0 mx-3">
                                                        {!! getIcon(name: "truck" , class: "text-gray-700") !!}
                                                    </span>
                                                    <span class="menu-title">
                                                        ویرایش هزینه های ارسال
                                                    </span>
                                                </a>
                                            </div>


                                            <!--begin::Menu item-->
                                            <div class="menu-item">
                                                <a href="{{ route("product.image.index" , $product->slug) }}" class="menu-link px-1 py-3">
                                                    <span class="menu-bullet me-0 mx-3">
                                                         {!! getIcon(name: "picture" , class: "text-gray-700") !!}
                                                    </span>
                                                    <span class="menu-title">
                                                        گالری
                                                    </span>
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu sub-->
                                    </div>
                                    <!--end::Menu item-->

                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        @php($i++)
                    @endforeach
                    </tbody>

                </table>
            </div>

        </div>

        <div class="col-12 text-center">
            <ul class="pagination">
                {!! $data["products"]->links() !!}
            </ul>
        </div>
    </div>




</x-default-layout>
