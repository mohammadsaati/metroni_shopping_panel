<x-default-layout>
    <x-slot:title>
        {!! $data["title"] !!}
    </x-slot:title>

    <div class="row">
        <div class="col-12 bg-secondary p-3 rounded-3">
            <p>
                <span class="menu-icon">{!! getIcon(name: "star" , class: "fs-2") !!}</span>
                &nbsp;
                {!! $data["title"] !!}
            </p>
        </div>
    </div>

    <div class="row mt-20" dir="rtl">
        <div class="col-12">
            <form method="get" action="{{ route("feature.index") }}">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                        <input type="text" name="name" class="form-control" value="{{ request()->get("name") }}" placeholder="نام ویژگی">
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

    <div class="row mt-10">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table border table-rounded table-row-bordered table-row-gray-300 border-gray-300 gs-4 gy-4" dir="rtl">
                    <thead class="bg-secondary">
                    <tr>
                        <th scope="col"><b>#</b></th>
                        <th scope="col"><b>نام</b></th>
                        <th scope="col"><b>وضعیت</b></th>
                        <th scope="col"><b>ویرایش</b></th>
                    </tr>
                    </thead>

                    <tbody>
                        @php($i = 1)
                        @foreach($data["features"] as $feature)
                            <tr @if(!$feature->status) class="bg-danger bg-opacity-50" @endif>
                                <td>{{ $i }}</td>
                                <td>{{ $feature->name }}</td>
                                <td id="tr-{{ $feature->id }}">
                                    @php(
                                        $configs = [
                                                "item" =>  $feature ,
                                                "feature_id" => $feature->id ,
                                                "ajax_url_name" =>  "feature.update" ,
                                                "func"  => "" ,
                                                "ajax_data" => [
                                                    "status" => $feature->status == 1 ? 0 : 1
                                                ]
                                            ]
                                        )


                                    <x-statusBtn :config="$configs" />

                                </td>
                                <td>
                                    <a href="{{ route("feature.show" , ["feature" => $feature->id]) }}">
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
                {!! $data["features"]->links() !!}
            </ul>
        </div>

    </div>

</x-default-layout>
