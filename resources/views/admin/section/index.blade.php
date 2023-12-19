<x-default-layout>
    <x-slot:title>
        {!! $data["title"] !!}
    </x-slot:title>

    <div class="row" dir="rtl">
        <div class="col-12">
            <h3>
                <span class="menu-icon">{!! getIcon(name: "gift" , class: "fs-2") !!}</span>
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
                        <th scope="col"><b>رنگ</b></th>
                        <th scope="col"><b>وضعیت</b></th>
                        <th scope="col"><b>ویرایش</b></th>
                        <th scope="col"><b>حذف</b></th>
                    </tr>
                    </thead>

                    <tbody>
                    @php($i = 1)
                    @foreach($data["sections"] as $section)
                        <tr @if(!$section->status) class="bg-danger bg-opacity-50" @endif>
                            <td>{{ $i }}</td>
                            <td>
                                @if($section->bg_image)
                                    <img src="{!! get_image("sections/".$section->bg_image) !!}" class="w-50 h-80px rounded" loading="lazy">
                                @else
                                    <span class="badge badge-danger">بدون عکس</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge w-50px h-30px" style="background-color: {!!  $section->bg_color ? $section->bg_color : '#fff' !!}"> </span>
                            </td>
                            <td id="tr-{{ $section->id }}">
                                @php(
                                    $configs = [
                                            "item" =>  $section ,
                                            "section_id" => $section->id ,
                                            "ajax_url_name" =>  "section.update" ,
                                            "func"  => "" ,
                                            "ajax_data" => [
                                                "status" => $section->status == 1 ? 0 : 1
                                            ]
                                        ]
                                    )


                                <x-statusBtn :config="$configs" />

                            </td>
                            <td>
                                <a href="{{ route("section.show" , ["section" => $section->slug]) }}">
                                    {!! getIcon(name:"notepad-edit" , class: "fs-1 text-primary" , type: "duotone") !!}
                                </a>
                            </td>
                            <td>
                                @php(
                                $delete_configs = [
                                        "item" =>  $section ,
                                        "ajax_url_name" =>  "section.delete" ,
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
                {!! $data["sections"]->links() !!}
            </ul>
        </div>
    </div>

</x-default-layout>
