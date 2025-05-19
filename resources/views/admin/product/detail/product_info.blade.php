<div class="row">
    <div class="col-xl-8 col-lg-8 col-md-6 col-12 p-5 border border-1 border-secondary max-shadow">
        <div class="mb-10">
            <label for="name" class="required form-label">عنوان محصول</label>
            <input id="name" type="text" name="name" class="border border-1 border-gray-400 form-control">
        </div>
        <div class="mb-10">
            <label for="en_name" class="required form-label">عنوان انگلیسی محصول</label>
            <input id="en_name" type="text" name="en_name" class="border border-1 border-gray-400 form-control">
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-10">
                    <label for="category" class="required form-label">دسته بندی اصلی</label>
                    <x-select2 :options="[
                        'id' => 'category',
                        'name' => 'category[]',
                        'data-control' => 'select2',
                        'data-placeholder' => trans('messages.select_place_holder'),
                        'data-allow-clear' => 'true',
                        'data-filters' => json_encode(['isParent' => true]),
                        'data-close-on-select' => 'false',
                        'data-url' => route('category.index'),
                    ]" />

                </div>
            </div>
            <div class="col-6">
                <label for="categories" class="required form-label">دسته بندی های مربوطه</label>
                <x-select2 :options="[
                        'id' => 'categories',
                        'name' => 'categories[]',
                        'data-control' => 'select2',
                        'data-placeholder' => trans('messages.select_place_holder'),
                        'data-allow-clear' => 'true',
                        'multiple' => 'multiple',
                        'data-filters' => json_encode(['isParent' => false]),
                        'data-close-on-select' => 'false',
                        'data-url' => route('category.index'),
                    ]" />
            </div>
        </div>
        <div class="mb-10">
            <label for="kt_docs_tinymce_basic" class="required form-label">توضیحات محصول</label>
            <textarea id="kt_docs_tinymce_basic" name="description" ></textarea>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-12">

        <div class="mb-10 border border-1 border-secondary max-shadow p-5">
            <span  class="required form-label">عکس محصول</span>

            <!--begin::Image input-->
            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset('assets/media/svg/files/jpg.svg') }})">
                <!--begin::Image preview wrapper-->
                <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('assets/media/svg/files/jpg.svg') }})"></div>
                <!--end::Image preview wrapper-->

                <!--begin::Edit button-->
                <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                       data-kt-image-input-action="change"
                       data-bs-toggle="tooltip"
                       data-bs-dismiss="click"
                       title="Change avatar">
                    <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>

                    <!--begin::Inputs-->
                    <input type="file" name="image" />
                    <input type="hidden" name="avatar_remove" />
                    <!--end::Inputs-->
                </label>
                <!--end::Edit button-->

                <!--begin::Cancel button-->
                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                      data-kt-image-input-action="cancel"
                      data-bs-toggle="tooltip"
                      data-bs-dismiss="click"
                      title="Cancel avatar">
                    <i class="ki-outline ki-cross fs-3"></i>
                </span>
                <!--end::Cancel button-->

                <!--begin::Remove button-->
                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                      data-kt-image-input-action="remove"
                      data-bs-toggle="tooltip"
                      data-bs-dismiss="click"
                      title="Remove avatar">
                        <i class="ki-outline ki-cross fs-3"></i>
                </span>
                <!--end::Remove button-->
            </div>
            <!--end::Image input-->
        </div>

        <div class="mb-10 border border-1 border-secondary max-shadow p-5">
            <label class="form-label">گالری محصول</label>


            <!--begin::Repeater-->
            <div id="product_galleries">
                <!--begin::Form group-->
                <div class="form-group">
                    <div data-repeater-list="product_galleries">
                        <div data-repeater-item>
                            <div class="form-group row">
                                <div class="col-md-8">
                                    <input type="file" name="gallery" class="form-control mb-2 mb-md-0"  />
                                </div>

                                <div class="col-md-4">
                                    <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                        <i class="ki-duotone ki-trash fs-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                        حذف
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Form group-->

                <!--begin::Form group-->
                <div class="form-group mt-5">
                    <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                        <i class="ki-duotone ki-plus fs-3"></i>
                        اضافه کردن
                    </a>
                </div>
                <!--end::Form group-->
            </div>
            <!--end::Repeater-->



        </div>

        <div class="mb-10 border border-1 border-secondary max-shadow p-5">
            <div class="row">
                <div class="col-6">
                    <label for="brand" class="form-label">برند</label>
                    <x-select2 :options="[
                        'id' => 'brand',
                        'name' => 'brand',
                        'data-control' => 'select2',
                        'data-placeholder' => trans('messages.select_place_holder'),
                        'data-allow-clear' => 'true',
                        'data-close-on-select' => 'false',
                        'data-url' => route('brand.index'),
                    ]" />
                </div>
                <div class="col-6">
                    <label for="cities" class="form-label">محدودیت شهر</label>
                    <x-select2 :options="[
                        'id' => 'cities',
                        'name' => 'cities',
                        'data-control' => 'select2',
                        'data-placeholder' => trans('messages.select_place_holder'),
                        'data-allow-clear' => 'true',
                        'multiple' => 'multiple',
                        'data-close-on-select' => 'false',
                        'data-url' => route('city.index'),
                    ]" />
                </div>
            </div>
            <div data-kt-buttons="true" class="my-10">
                <div class="row">
                    <div class="col-6">
                        <!--begin::Radio button-->
                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex flex-stack text-start p-6 mb-5">
                            <!--end::Description-->
                            <div class="d-flex align-items-center me-2">
                                <!--begin::Radio-->
                                <div class="form-check form-check-custom form-check-solid form-check-success me-6">
                                    <input class="form-check-input" type="radio" name="status" value="1" checked/>
                                </div>
                                <!--end::Radio-->

                                <!--begin::Info-->
                                <div class="flex-grow-1">
                                    <h2 class="d-flex align-items-center fs-3 fw-bold flex-wrap">
                                        فعال
                                    </h2>
                                    <div class="fw-semibold opacity-50">
                                        اجازه نمایش در سایت
                                    </div>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Description-->

                        </label>
                        <!--end::Radio button-->
                    </div>
                    <div class="col-6">
                        <!--begin::Radio button-->
                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex flex-stack text-start p-6 mb-5">
                            <!--end::Description-->
                            <div class="d-flex align-items-center me-2">
                                <!--begin::Radio-->
                                <div class="form-check form-check-custom form-check-solid form-check-danger me-6">
                                    <input class="form-check-input" type="radio" name="status" value="0"/>
                                </div>
                                <!--end::Radio-->

                                <!--begin::Info-->
                                <div class="flex-grow-1">
                                    <h2 class="d-flex align-items-center fs-3 fw-bold flex-wrap">
                                        غیر فعال
                                    </h2>
                                    <div class="fw-semibold opacity-50">
                                        در سایت نمایش داده نشود
                                    </div>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Description-->
                        </label>
                        <!--end::Radio button-->
                    </div>
                </div>

            </div>
        </div>

        <div class="mb-10 border border-1 border-secondary max-shadow p-5">
            <div class="row">
                <div class="col-6">
                    <label for="is_amazing" class="form-label">انتخاب به عنوان محصول ویژه</label>
                    <!--begin::Switch-->
                    <label class="form-check form-switch form-check-custom form-check-solid">
                        <input name="is_amazing" class="form-check-input" type="checkbox" value="1"/>
                        <span class="form-check-label fw-semibold text-muted">
                            محصول ویژه
                        </span>
                    </label>
                    <!--end::Switch-->
                </div>
                <div class="col-6">
                    <label for="is_amazing_date" class="form-label">تا تاریخ</label>
                    <input  id="is_amazing_date" name="is_amazing_date" class="form-control" data-jdp data-jdp-min-date="today" placeholder="" />
                </div>
            </div>
        </div>

    </div>
</div>


