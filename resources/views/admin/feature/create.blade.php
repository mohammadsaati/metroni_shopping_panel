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

    <div class="row mt-10">
        <div class="12">
            <form method="post" action="{{ route('feature.store') }}">
                @csrf
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                        <div class="mb-10">
                            <label for="name" class="required form-label">نام ویژگی</label>
                            <input id="name" type="text" name="name" class="form-control" placeholder="ویژگی">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                        <div class="mb-10">
                            <label for="status" class="required form-label">وضعیت</label>
                            <select id="status" name="status" class="form-select">
                                <option value="1" selected>فعال</option>
                                <option value="0">غیر فعال</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-12"></div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-12"></div>
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
