<x-default-layout>
    <x-slot:title>
        {!! $data["title"] !!}
    </x-slot:title>

    <div class="row" dir="rtl">
        <div class="col-12">
            <h3>
                <li class="far fa-folder"></li>
                {!! $data["title"] !!}
            </h3>

        </div>
    </div>

    <br/>
    <br/>

    <div class="row" dir="rtl">
        <div class="col-12">
            <form method="get" action="{{ route("brand.index") }}">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                        <input type="text" name="name" class="form-control" value="{{ request()->get("name") }}" placeholder="نام">
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                        <select name="status" class="form-select">
                            <option value="">وضعیت</option>
                            <option @if(request()->get("status") == "1") selected @endif value="1">فعال</option>
                            <option @if(request()->get("status") == "0") selected @endif value="0">غیر فعال</option>
                        </select>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-12"></div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-12"></div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary m-4">
                    {!! trans("panel.search_btn") !!}
                </button>
            </form>
        </div>
    </div>

    <br><br>
    <div class="row">
        <div class="col-12">

            <div class="table-responsive">
                <table class="table border table-rounded table-row-bordered table-row-gray-300 border-gray-300 gs-4 gy-4" dir="rtl">

                    <thead class="bg-secondary">
                        <tr>
                            <th scope="col"><b>#</b></th>
                            <th scope="col"><b>عکس</b></th>
                            <th scope="col"><b>نام</b></th>
                            <th scope="col"><b>وضعیت</b></th>
                            <th scope="col"><b>ویرایش</b></th>
                        </tr>
                    </thead>

                    <tbody>
                        @php($i = 1)
                        @foreach($data["brands"] as $brand)
                            <tr @if(!$brand->status) class="bg-danger bg-opacity-50" @endif>
                                <td>{{ $i }}</td>
                                <td>
                                    <img src="{!! get_image("brands/".$brand->image) !!}" class="w-50 h-80px rounded" loading="lazy">
                                </td>
                                <td>{{ $brand->name }}</td>
                                <td id="tr-{{ $brand->id }}">
                                    @php(
                                        $configs = [
                                                "item" =>  $brand ,
                                                "brand_id" => $brand->id ,
                                                "ajax_url_name" =>  "brand.update" ,
                                                "func"  => "" ,
                                                "ajax_data" => [
                                                    "status" => $brand->status == 1 ? 0 : 1
                                                ]
                                            ]
                                        )


                                    <x-statusBtn :config="$configs" />

                                </td>
                                <td>
                                    <a href="{{ route("brand.show" , ["brand" => $brand->slug]) }}">
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
                {!! $data["brands"]->links() !!}
            </ul>
        </div>
    </div>

</x-default-layout>
