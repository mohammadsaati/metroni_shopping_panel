<div class="row">
    <!--begin::Repeater-->
    <div class="mb-10" id="features">
        <!--begin::Form group-->
        <div class="form-group">
            <div data-repeater-list="features">
                <div data-repeater-item>
                    <div class="form-group row mb-10">
                        <div class="col-md-2">
                            <label for="feature" class="form-label">ویژگی</label>
                            <select id="feature" name="feature_id" class="form-select">
                                <option value="">انتخاب ویژگی</option>
                                @foreach($data["features"] as $feature)
                                    <option value="{{ $feature->id }}">{{ $feature->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-md-2">
                            <label for="value" class="form-label">مقدار</label>
                            <input id="value" type="text" name="value" class="form-control">
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
