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



    <br><br>
    <div class="row">
        <div class="col-12">

            <div class="table-responsive">
                <table class="table border table-rounded table-row-bordered table-row-gray-300 border-gray-300 gs-4 gy-4" dir="rtl">

                    <thead class="bg-secondary">
                    <tr>
                        <th scope="col"><b>#</b></th>
                        <th scope="col"><b>عکس</b></th>
                        <th scope="col"><b>نوع</b></th>
                        <th scope="col"><b>وضعیت</b></th>
                        <th scope="col"><b>ویرایش</b></th>
                        <th scope="col"><b>حذف</b></th>
                    </tr>
                    </thead>

                    <tbody>
                    @php($i = 1)
                    @foreach($data["banners"] as $banner)
                        <tr @if(!$banner->status) class="bg-danger bg-opacity-50" @endif>
                            <td>{{ $i }}</td>
                            <td>
                                <img src="{!! get_image("banners/".$banner->image) !!}" class="w-50 h-80px rounded" loading="lazy">
                            </td>
                            <td>{{ $banner->showType() }}</td>
                            <td id="tr-{{ $banner->id }}">
                                @php(
                                    $configs = [
                                            "item" =>  $banner ,
                                            "banner_id" => $banner->id ,
                                            "ajax_url_name" =>  "banner.update" ,
                                            "func"  => "" ,
                                            "ajax_data" => [
                                                "status" => $banner->status == 1 ? 0 : 1
                                            ]
                                        ]
                                    )


                                <x-statusBtn :config="$configs" />

                            </td>
                            <td>
                                <a href="{{ route("banner.show" , ["banner" => $banner->id]) }}">
                                    {!! getIcon(name:"notepad-edit" , class: "fs-1 text-primary" , type: "duotone") !!}
                                </a>
                            </td>
                            <td>
                                @php(
                                $delete_configs = [
                                        "item" =>  $banner ,
                                        "ajax_url_name" =>  "banner.delete" ,
                                        "func"  => "" ,
                                    ]
                                )


                                <x-deleteBtn :config="$delete_configs" />
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
                {!! $data["banners"]->links() !!}
            </ul>
        </div>
    </div>

</x-default-layout>
