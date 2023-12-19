<x-default-layout>
    <x-slot:title>
        {{ $data["title"] }}
    </x-slot:title>

    <div class="row">
        <div class="col-12 bg-secondary p-3 rounded-3">
            <p>
                <span class="menu-icon">{!! getIcon(name: "row-horizontal" , class: "fs-2") !!}</span>
                &nbsp;
                {!! $data["title"] !!}
            </p>
        </div>

        <div class="col-12 mt-12">
            <form method="post" enctype="multipart/form-data" action="{{ route('banner.store') }}">
                @csrf
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="mb-10">
                            <label for="type" class="required form-label">نوع</label>
                            <select id="type" name="type" class="form-select">
                                <option value="" selected>انتخاب کنید</option>
                                <option value="1">محصول</option>
                                <option value="2">دسته بندی</option>
                                <option value="3">لینک خارجی</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="mb-10">
                            <label for="product" class="form-label">محصول</label>
                            <select id="product"  class="form-select" name="product_id" disabled>
                                <option>انتخاب کنید</option>
                                @foreach($data["products"] as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="mb-10">
                            <label for="category" class="form-label">دسته بندی</label>
                            <select id="category" class="form-select" name="category_id" disabled>
                                <option>انتخاب کنید</option>
                                @foreach($data["categories"] as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="mb-10">
                            <label for="link" class="form-label">لینک</label>
                            <input type="text" id="link" name="link" class="form-control" placeholder="لینک" disabled>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="mb-10">
                            <label for="status" class="required form-label">وضعیت</label>
                            <select id="status" name="status" class="form-select">
                                <option value="1" selected>فعال</option>
                                <option value="0">غیر فعال</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="mb-10">
                            <label for="image" class="required form-label">عکس</label>
                            <input type="file" id="image" name="image" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">
                            {!! trans("panel.save_btn") !!}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <x-slot:scripts>
        <script>
            product = $("#product");
            link = $("#link");
            category = $("#category");

            $("#type").change(function (){
                let type_value = $(this).val();
                if(type_value === "1")
                {
                    product.removeAttr("disabled");
                    link.prop("disabled" , true);
                    link.val("");
                    category.prop("disabled" , true);
                    category.val("")

                }else if(type_value === "2"){
                    product.prop("disabled" , true);
                    product.val("")
                    link.prop("disabled" , true);
                    link.val("");
                    category.removeAttr("disabled");

                }else if(type_value === "3"){
                    product.prop("disabled" , true);
                    product.val("")
                    link.removeAttr("disabled");
                    category.prop("disabled" , true);
                    category.val("")

                }else{
                    product.prop("disabled" , true);
                    product.val("")
                    link.prop("disabled" , true);
                    link.val("");
                    category.prop("disabled" , true);
                    category.val("")
                }
            })
        </script>
    </x-slot:scripts>

</x-default-layout>
