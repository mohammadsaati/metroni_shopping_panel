<x-default-layout>
    <x-slot:title>
        {!! $data["title"] !!}
    </x-slot:title>

    <div class="row" dir="rtl">
        <div class="col-12">
            <h3>
                <span class="menu-icon">{!! getIcon(name: "picture" , class: "fs-2") !!}</span>
                {!! $data["title"] !!}
            </h3>

        </div>
    </div>

    <br/>
    <br/>


    <br><br>
    <div class="row">
        @foreach($data["images"] as $image)
            <div class="col-2" id="img-{{ $image->id }}">
                <!--begin::Card-->
                <div class="card  overlay overflow-hidden">
                    <div class="card-body p-0">
                        <div class="overlay-wrapper">
                            <img src="{{ get_image("images/".$image->image) }}" alt="" class="w-100 rounded"/>
                        </div>
                        <div class="overlay-layer bg-dark bg-opacity-25">
                            <a href="{{ route("image.show" , $image->slug) }}">
                                <span class="menu-icon">
                                    {!! getIcon(name:"notepad-edit" , class: "fs-3 btn btn-sm btn-info") !!}
                                </span>
                            </a>
                            <a href="#" class="btn btn-light mx-1" onclick=copyUrl('{!! get_image('images/'.$image->image) !!}')>
                                <span class="menu-icon">
                                    copy
                                    {!! getIcon(name:'disconnect' , class:'fs-3') !!}
                                </span>
                            </a>
                            @php(
                                $config = [
                                    "item" => $image ,
                                    "ajax_url_name" => "image.delete" ,
                                    "ajax_data" => [] ,
                                    "deleting_item" => "#img-".$image->id
                                ]
                            )
                          <x-delete-btn :config="$config"/>

                        </div>
                        <h5 class="text-center my-3">{{ $image->name }}</h5>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        @endforeach
        <div class="col-12 text-center">
            <ul class="pagination">
                {!! $data["images"]->links() !!}
            </ul>
        </div>
    </div>

        <script>
            function copyUrl(image_url)
            {
                navigator.clipboard.writeText(image_url);
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toastr-top-center",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };

                toastr.success("کپی شد");
            }
        </script>


</x-default-layout>
