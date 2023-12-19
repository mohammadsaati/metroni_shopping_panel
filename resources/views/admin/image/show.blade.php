<x-default-layout>
    <x-slot:title>
        {!! $data["title"] !!}
    </x-slot:title>

    <div class="row" dir="rtl">
        <div class="col-12 bg-secondary p-3 rounded-3">
            <p>
                <span class="menu-icon">{!! getIcon(name: "picture" , class: "fs-2") !!}</span>
                &nbsp;
                {!! $data["title"] !!}
            </p>
        </div>

        <div class="col-12 mt-12">
            <form  method="post" enctype="multipart/form-data" action="{{ route("image.update" , $data["image"]) }}">
                @csrf

                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                        <div class="mb-10">
                            <label for="nameFormControl" class="required form-label">نام</label>
                            <input type="text" name="name" id="nameFormControl" value="{{ $data["image"]->name }}" class="form-control" placeholder="عکس"/>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                        <div class="mb-10">
                            <label for="imageFormControl" class="required form-label">عکس</label>
                            <input type="file" name="image" id="imageFormControl" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-12"></div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-12"></div>
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
