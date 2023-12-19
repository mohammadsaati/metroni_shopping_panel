<x-default-layout>
    <x-slot:title>
        {{ $data["title"] }}
    </x-slot:title>

    <div class="row">
        <div class="col-12 bg-secondary p-3 rounded-3">
            <p>
                <span class="menu-icon">{!! getIcon(name: "slider" , class: "fs-2") !!}</span>
                &nbsp;
                {!! $data["title"] !!}
            </p>
        </div>

        <div class="col-12 mt-12">
            <form method="post" enctype="multipart/form-data" action="{{ route('slider.store') }}">
                @csrf
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="mb-10">
                            <label for="title" class="required form-label">عنوان</label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="عنوان">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="mb-10">
                            <label for="priority" class="required form-label">اولویت</label>
                            <input type="number" id="priority" name="priority" class="form-control" placeholder="اولویت">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="mb-10">
                            <label for="status" class="required form-label">مناسب برای</label>
                            <select class="form-select" id="status" name="status">
                                <option selected value="1">وب سایت</option>
                                <option value="2">اپلیکیشن موبایل</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="mb-10">
                            <label for="type" class="required form-label">نوع</label>
                            <select id="type" name="type" class="form-select">
                                <option value="" selected>انتخاب کنید</option>
                                <option value="1">محصول</option>
                                <option value="2">دسته بندی</option>
                                <option value="4">سکشن</option>
                                <option value="3">لینک خارجی</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="mb-10">
                            <label for="product" class="form-label">محصول</label>
                            <select id="product"  class="form-select" name="product_id" disabled>
                                <option>انتخاب کنید</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="mb-10">
                            <label for="category" class="form-label">دسته بندی</label>
                            <select id="category" class="form-select" name="category_id" disabled>
                                <option>انتخاب کنید</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="mb-10">
                            <label for="section"  class="form-label">سکشن</label>
                            <select id="section" class="form-select" name="section_id" disabled>
                                <option>انتخاب کنید</option>
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

</x-default-layout>
