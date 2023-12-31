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

    <form method="post" action="{{ route("product.item.update" , ["product" => $data["product"] , "item" => $data["item"] ]) }}">
        @csrf
        <div class="form-group row mb-10 text-center">
            <div class="col-md-2">
                <label for="size" class="form-label">سایز</label>
                <select id="size" name="size_id" class="form-select" data-placeholder="انتخاب سایز">
                    @foreach($data["sizes"] as $size)
                        <option @if($data["item"]->size_id == $size->id) selected @endif value="{{ $size->id }}">{{ $size->value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="stock" class="form-label">موجودی</label>
                <input id="stock" type="number" name="stock" class="form-control" value="{{ $data["item"]->stock }}">
            </div>
            <div class="col-md-2">
                <label for="shipping_price" class="form-label">هزینه ی ارسال کلی(تومان)</label>
                <input id="shipping_price" type="number" name="shipping_price" value="{{ $data["item"]->shipping_price }}" class="form-control">
            </div>
            <div class="col-md-2">
                <label for="status" class="form-label">وضعیت</label>
                <select id="status" name="status" class="form-select">
                    <option @if($data["item"]->status) selected @endif value="1">فعال</option>
                    <option @if(!$data["item"]->status) selected @endif value="0">غیر فعال</option>
                </select>
            </div>
        </div>

        <div class="form-group row mb-10">
            <div class="col-md-2">
                <label for="price" class="form-label">قیمیت (تومان)</label>
                <input id="price" type="number" name="price" class="form-control" value="{{ $data["price"]->after }}">
            </div>
            <div class="col-md-2">
                <label for="discount" class="form-label">قیمت با تخفیف (تومان)</label>
                <input id="discount" type="number" name="discount" class="form-control" value="{{ $data["price"]->discount }}">
            </div>
            <div class="col-md-2">
                <label for="off_deadline" class="form-label">تاریخ اتمام تخفیف</label>
                <input id="off_deadline" type="text" name="off_deadline" class="form-control" data-jdp data-jdp-min-date="today" value="{{ $data["price"]->off_deadline }}">
            </div>

        </div>

        @include("admin.product.detail.item.shipping_show" , $data)
        @include("admin.product.detail.city_shipping" , $data)

        <div class="row">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">
                    {!! trans("panel.update_btn") !!}
                </button>
            </div>
        </div>

    </form>

    <x-slot:scripts>
        <script>
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


            $('#shipping_prices').repeater({
                initEmpty: false,

                defaultValues: {
                    'text-input': 'foo'
                },

                show: function () {
                    $(this).slideDown();
                },

                hide: function (deleteElement) {
                    $(this).slideUp(deleteElement);
                }
            });

        </script>
    </x-slot:scripts>
</x-default-layout>
