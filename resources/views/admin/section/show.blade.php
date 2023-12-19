<x-default-layout>
    <x-slot:title>
        {{ $data["title"] }}
    </x-slot:title>

    <div class="row">
        <div class="col-12 bg-secondary p-3 rounded-3">
            <p>
                <span class="menu-icon">{!! getIcon(name: "row-horizontal" , class: "fs-2") !!}</span>
                &nbsp;
                {!! $data["title"] !!}
            </p>
        </div>

        <div class="col-12 mt-12">
            <form method="post" enctype="multipart/form-data" action="{{ route('section.update' , $data["section"]->id ) }}">
                @csrf
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="mb-10">
                            <label for="status" class="required form-label">وضعیت</label>
                            <select id="status" name="status" class="form-select">
                                <option value="1" @if($data["section"]->status) selected @endif>فعال</option>
                                <option value="0" @if(!$data["section"]->status) selected @endif> غیر فعال</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="mb-10">
                            <label for="name" class="form-label required">نام</label>
                            <input id="name" type="text" name="name" class="form-control" value="{{ $data["section"]->name }}">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="mb-10">
                            <label for="bg_color" class="form-label">رنگ پس زیمه</label>
                            <input id="bg_color" type="color" name="bg_color" class="form-control" value="{{ $data["section"]->bg_color }}">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="mb-10">
                            <label for="bg_image" class="form-label">عکس</label>
                            <input type="file" id="bg_image" name="bg_image" class="form-control" >
                        </div>
                    </div>
                </div>


                <div class="row">
                    @include("admin.section.details.update_product_info" , $data)
                </div>

                <div class="row">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">
                            {!! trans("panel.save_btn") !!}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</x-default-layout>
