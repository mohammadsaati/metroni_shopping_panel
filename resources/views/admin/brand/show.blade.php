<x-default-layout>
    <x-slot:title>
        {!! $data["title"] !!}
    </x-slot:title>

    <div class="row" dir="rtl">
        <div class="col-12 bg-secondary p-3 rounded-3">
            <p>
                <span class="menu-icon">{!! getIcon(name: "bookmark-2" , class: "fs-2") !!}</span>
                &nbsp;
                {!! $data["title"] !!}
            </p>
        </div>

        <div class="col-12 mt-12">
            <form  method="post" enctype="multipart/form-data" action="{{ route("brand.update" , $data["brand"]) }}">
                @csrf

                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                        <div class="mb-10">
                            <label for="nameFormControl" class="required form-label">نام</label>
                            <input type="text" name="name" id="nameFormControl" class="form-control" value="{{ $data["brand"]->name }}" placeholder="نام"/>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                        <label for="statusSelect" class="required form-label">وضعیت</label>
                        <select id="statusSelect" name="status" class="form-select">
                            <option @if($data["brand"]->status) selected @endif value="1" >فعال</option>
                            <option @if(!$data["brand"]->status) selected @endif value="0">غیر فعال</option>
                        </select>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                            <div class="mb-10">
                                <label for="fileUpload" class="required form-label">عکس</label>
                                <input type="file" name="image" id="fileUpload" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                        <img src="{!! get_image("brands/".$data["brand"]->image) !!}" class="w-50 h-80px rounded" loading="lazy">
                    </div>
                </div>


                <div class="row">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">
                            {!! trans("panel.update_btn") !!}
                        </button>
                    </div>
                </div>

            </form>
        </div>

    </div>

</x-default-layout>
