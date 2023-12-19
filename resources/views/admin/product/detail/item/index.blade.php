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
            <a href="{{ route("product.item.create" , ["product" => $data["product"]->slug ]) }}" class="btn btn-primary">
                اضافه کردن
            </a>
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
                        <th scope="col"><b>سایز</b></th>
                        <th scope="col"><b>موجودی</b></th>
                        <th scope="col"><b>قیمت(تومان)</b></th>
                        <th scope="col"><b>وضعیت</b></th>
                        <th scope="col"><b>عملیات</b></th>
                    </tr>
                    </thead>

                    <tbody>
                    @php($i = 1)
                    @foreach($data["items"] as $item)
                        <tr @if(!$item->status) class="bg-danger bg-opacity-50" @endif>
                            <td>{{ $i }}</td>
                            <td>
                                <select name="size_id" class="form-select">
                                    @foreach($data["sizes"] as $size)
                                        <option @if($item->sise_id == $size->id) selected @endif value="{{ $size->id }}">{{ $size->value }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>{{ $item->stock }}</td>
                            <td>{{ $item->prices()->latest()->first()->after }}</td>
                            <td id="tr-{{ $item->id }}">
                                @php(
                                    $configs = [
                                            "item" =>  $item ,
                                            "ajax_url_name" =>  "product.item.update" ,
                                            "route_bindings" => [
                                                     "product" => $data["product"]->slug ,
                                                     "item"  =>  $item
                                                ],
                                            "func"  => "" ,
                                            "ajax_data" => [
                                                "status" => $item->status == 1 ? 0 : 1
                                            ]
                                        ]
                                    )


                                <x-statusBtn :config="$configs" />

                            </td>
                            <td>
                                <a href="{{ route("product.item.show" , ["product" => $data["product"]->slug , "item" => $item ]) }}">
                                    {!! getIcon(name:"notepad-edit" , class: "fs-1 text-primary" , type: "duotone") !!}
                                </a>
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
                {!! $data["items"]->links() !!}
            </ul>
        </div>
    </div>

    <x-slot:extra_scripts>
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


            $('#items').repeater({
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
    </x-slot:extra_scripts>

</x-default-layout>
