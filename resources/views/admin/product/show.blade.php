<x-default-layout>
    <x-slot:title>
        {{ $data["title"] }}
    </x-slot:title>

   <form method="post" action="{{ route('product.update' , $data["product"]) }}" enctype="multipart/form-data">
       @csrf

       <div class="row mt-15">
           <div class="col-xl-8 col-lg-8 col-md-6 col-12 p-5 border border-1 border-secondary max-shadow">
               <div class="mb-10">
                   <label for="name" class="required form-label">عنوان محصول</label>
                   <input id="name" type="text" name="name" value="{{ $data["product"]->name }}" class="border border-1 border-gray-400 form-control">
               </div>
               <div class="mb-10">
                   <label for="en_name" class="required form-label">عنوان انگلیسی محصول</label>
                   <input id="en_name" type="text" name="en_name" value="{{ $data["product"]->en_name }}" class="border border-1 border-gray-400 form-control">
               </div>
               <div class="row">
                   <div class="col-6">
                       <div class="mb-10">
                           <label for="category" class="required form-label">دسته بندی اصلی</label>
                           <select id="category" name="category_id" class="form-select">
                               <option>انتخاب دسته بندی</option>
                               @foreach($data["categories"] as $category)
                                   <option @if($data["product"]->category_id ==  $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                               @endforeach
                           </select>
                       </div>
                   </div>
                   <div class="col-6">
                       <label for="categories" class="required form-label">دسته بندی های مربوطه</label>
                       <select id="categories" name="categories[]" class="form-select" data-control="select2" data-placeholder="انتخاب دسته بندی ها" multiple="multiple">
                           @foreach($data["related_categories"] as $related_category)
                               <option @if( in_array( $related_category->id , $data["product"]->categories->pluck("id")->toArray() ) ) selected @endif value="{{ $related_category->id }}">{{ $related_category->name }}</option>
                           @endforeach
                       </select>
                   </div>
               </div>
               <div class="mb-10">
                   <label for="kt_docs_tinymce_basic" class="required form-label">توضیحات محصول</label>
                   <textarea id="kt_docs_tinymce_basic" name="description" >{!! $data["product"]->description !!}</textarea>
               </div>
           </div>
           <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                <div class="mb-10">
                    <button type="submit" class="btn btn-primary w-100 ">
                        {!! trans("panel.update_btn") !!}
                    </button>
                </div>
               <div class="mb-10 border border-1 border-secondary max-shadow p-5">
                   <span  class="required form-label">عکس محصول</span>

                   <div class="row">
                       <div class="col-6">
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
                       <div class="col-6">
                           <img src="{!! get_image("products/".$data["product"]->image) !!}" class="w-50 h-80px rounded" loading="lazy">
                       </div>
                   </div>
               </div>


               <div class="mb-10 border border-1 border-secondary max-shadow p-5">
                   <div class="row mb-10">
                       <div class="col-12">
                           <label for="shipping_price" class="required form-label">هزینه ی ارسال (کلی)</label>
                           <input id="shipping_price" type="number" name="shipping_price" value="{{ $data["product"]->shipping_price }}" class="form-control">
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-6">
                           <label for="brand" class="form-label">برند</label>
                           <select id="brand" name="brand_id" class="form-select" data-control="select2">
                               <option value="">انتخاب برند</option>
                               @foreach($data["brands"] as $brand)
                                   <option @if($data["product"]->brand_id == $brand->id) selected @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
                               @endforeach
                           </select>
                       </div>
                       <div class="col-6">
                           <label for="cities" class="form-label">محدودیت شهر</label>
                           <select id="cities" name="cities[]" class="form-select" data-control="select2" data-placeholder="انتخاب شهر" multiple>
                               @foreach($data["cities"] as $city)
                                   <option @if( in_array($city->id , $data["product"]->cities->pluck("id")->toArray()) ) selected @endif value="{{ $city->id }}">{{ $city->name }}</option>
                               @endforeach
                           </select>
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
                                           <input class="form-check-input" type="radio" name="status" value="1" @if($data["product"]->status) checked @endif/>
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
                                           <input class="form-check-input" type="radio" name="status" value="0" @if(!$data["product"]->status) checked @endif/>
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
                               <input name="is_amazing" class="form-check-input" type="checkbox" value="1" @if($data["product"]->is_amazing) checked @endif/>
                               <span class="form-check-label fw-semibold text-muted">
                            محصول ویژه
                        </span>
                           </label>
                           <!--end::Switch-->
                       </div>
                       <div class="col-6">
                           <label for="is_amazing_date" class="form-label">تا تاریخ</label>
                           <input  id="is_amazing_date" name="is_amazing_date" value="{{ $data["product"]->is_amazing_date }}" class="form-control" data-jdp data-jdp-min-date="today" placeholder="" />
                       </div>
                   </div>
               </div>

           </div>
       </div>

   </form>

    <x-slot:scripts>
        <script>
            var options = {
                selector: "#kt_docs_tinymce_basic",
                height : "480" ,
                language : "fa" ,
                direction: "rtl"
            };

            if ( KTThemeMode.getMode() === "dark" ) {
                options["skin"] = "oxide-dark";
                options["content_css"] = "dark";
            }

            tinymce.init(options);

            jalaliDatepicker.startWatch({
                minDate: "attr",
                hideAfterChange: false,
                autoHide: true,
                showTodayBtn: true,
                showEmptyBtn: true,
                topSpace: 10,
                bottomSpace: 30,
                dayRendering(opt,input){
                    return {
                        isHollyDay:opt.day==1
                    }
                }
            });
        </script>
    </x-slot:scripts>
</x-default-layout>
