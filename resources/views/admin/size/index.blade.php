<x-default-layout>
    <x-slot:title>
        {!! $data["title"] !!}
    </x-slot:title>

    <div class="row">
        <div class="col-12 bg-secondary p-3 rounded-3">
            <p>
                <span class="menu-icon">{!! getIcon(name: "size" , class: "fs-2") !!}</span>
                &nbsp;
                {!! $data["title"] !!}
            </p>
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
                        <th scope="col"><b>ویرایش</b></th>
                    </tr>
                    </thead>

                    <tbody>
                        @php($i = 1)
                        @foreach($data["sizes"] as $size)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $size->value }}</td>
                                <td>
                                    <a href="{{ route("size.show" , ["size" => $size->id]) }}">
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
                {!! $data["sizes"]->links() !!}
            </ul>
        </div>

    </div>

</x-default-layout>
