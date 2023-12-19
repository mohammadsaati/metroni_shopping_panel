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
        <div class="12">
            <form method="post" action="{{ route('size.store') }}">
                @csrf
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                        <div class="mb-10">
                            <label for="name" class="required form-label">مقدار</label>
                            <input id="name" type="text" name="value" class="form-control" placeholder="مقدار">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-12"></div>
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
