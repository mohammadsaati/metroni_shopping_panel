<div class="row">
    <div class="col-md-4 mb-10">
        <label for="shipping_price" class="form-label">قیمیت ارسال کلی (تومان)</label>
        <input id="shipping_price" type="number" name="shipping_price" class="form-control">
    </div>
</div>
<div class="row">
    <!--begin::Repeater-->
    <div class="mb-10" id="shipping_prices">
        <!--begin::Form group-->
        <div class="form-group">
            <div data-repeater-list="shipping_prices">
                <div data-repeater-item>
                    <div class="form-group row mb-10">
                        <div class="col-md-2">
                            <label for="size" class="form-label">شهر</label>
                            <select id="size" name="city_id" class="form-select" data-placeholder="انتخاب شهر">
                                @foreach($data["cities"] as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-md-2">
                            <label for="shipping" class="form-label">قیمیت ارسال (تومان)</label>
                            <input id="shipping" type="number" name="price" class="form-control">
                        </div>

                        <div class="col-md-2">
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
