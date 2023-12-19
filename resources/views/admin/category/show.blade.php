<x-default-layout>
    <x-slot:title>
        {!! $data["title"] !!}
    </x-slot:title>

    <div class="row" dir="rtl">
        <div class="col-12 bg-secondary p-3 rounded-3">
            <p>
                <li class="far fa-folder"></li>
                &nbsp;
                {!! $data["title"] !!}
            </p>
        </div>

        <div class="col-12 mt-12">
            <form  method="post" enctype="multipart/form-data" action="{{ route("category.update" , $data["category"]) }}">
                @csrf

                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                        <div class="mb-10">
                            <label for="nameFormControl" class="required form-label">نام دسته بندی</label>
                            <input type="text" name="name" id="nameFormControl" class="form-control" value="{{ $data["category"]->name }}" placeholder="دسته بندی"/>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-12" dir="rtl">
                        <label for="parentSelect" class="form-label">مادر</label>
                        <select name="parent_id" id="parentSelect" class="form-select form-select-transparent" data-control="select2" data-placeholder="Select an option">
                            <option value=" ">انتخاب دسته بندی مادر</option>
                            @foreach($data["parents"] as $parent)
                                <option @if($data["category"]->parent_id == $parent->id) selected @endif value="{{ $parent->id }}">{{ $parent->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                        <label for="statusSelect" class="required form-label">وضعیت</label>
                        <select id="statusSelect" name="status" class="form-select">
                            <option @if($data["category"]->status) selected @endif value="1" >فعال</option>
                            <option @if(!$data["category"]->status) selected @endif value="0">غیر فعال</option>
                        </select>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-12"></div>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                        <div class="mb-10">
                            <label for="nameFormControl" class="required form-label">اولویت</label>
                            <input type="number" name="priority" id="nameFormControl" class="form-control" value="{{ $data["category"]->priority }}" placeholder="1"/>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                        <div class="mb-10">
                            <label for="fileUpload" class="required form-label">عکس</label>
                            <input type="file" name="image" id="fileUpload" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-12"></div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-12"></div>
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
