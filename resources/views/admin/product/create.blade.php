<x-default-layout>
    <x-slot:title>
        {{ $data["title"] }}
    </x-slot:title>

   <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
       @csrf
       <ul class="nav nav-tabs nav-pills mb-5 fs-6">
           <li class="nav-item mx-3">
               <a class="nav-link active" data-bs-toggle="tab" href="#product_info">
                   {!! getIcon(name: "abstract-26" , class: "fs-2 text-light") !!}
                   &nbsp;
                   مشخصات محصول
               </a>
           </li>
           <li class="nav-item mx-3">
               <a class="nav-link" data-bs-toggle="tab" href="#features_info">
                   ویژگی های محصول
               </a>
           </li>
           <li class="nav-item mx-3">
               <a class="nav-link" data-bs-toggle="tab" href="#item_info">
                   تغیرات قیمیت ها
               </a>
           </li>

           <li class="nav-item mx-3">
               <button type="submit" class="btn btn-success">
                   {!! trans("panel.save_btn") !!}
               </button>
           </li>
       </ul>
       @csrf
       <div class="tab-content" id="myTabContent">
           <div class="tab-pane fade show active" id="product_info" role="tabpanel">
               @include("admin.product.detail.product_info" , $data)
           </div>
           <div class="tab-pane fade" id="item_info" role="tabpanel">
               @include("admin.product.detail.item_info" , $data)
           </div>

           <div class="tab-pane fade" id="features_info" role="tabpanel">
               @include("admin.product.detail.features_info" , $data)
           </div>
       </div>
   </form>


    <x-slot:scripts>
        <script>
            var options = {
                selector: "#kt_docs_tinymce_basic",
                height : "480" ,
                language : "fa" ,
                direction: "rtl"
            };

            if ( KTThemeMode.getMode() === "dark" ) {
            options["skin"] = "oxide-dark";
            options["content_css"] = "dark";
            }

            tinymce.init(options);

            jalaliDatepicker.startWatch({
                minDate: "attr",
                hideAfterChange: false,
                autoHide: true,
                showTodayBtn: true,
                showEmptyBtn: true,
                topSpace: 10,
                bottomSpace: 30,
                dayRendering(opt,input){
                    return {
                        isHollyDay:opt.day==1
                    }
                }
            });



            $('#product_galleries').repeater({
                initEmpty: false,

                defaultValues: {
                    'text-input': 'foo'
                },

                show: function () {
                    $(this).slideDown();
                },

                hide: function (deleteElement) {
                    $(this).slideUp(deleteElement);
                }
            });


            $('#items').repeater({
                initEmpty: false,

                defaultValues: {
                    'text-input': 'foo'
                },

                show: function () {
                    $(this).slideDown();
                },

                hide: function (deleteElement) {
                    $(this).slideUp(deleteElement);
                }
            });


            $('#shipping_prices').repeater({
                initEmpty: false,

                defaultValues: {
                    'text-input': 'foo'
                },

                show: function () {
                    $(this).slideDown();
                },

                hide: function (deleteElement) {
                    $(this).slideUp(deleteElement);
                }
            });

            $('#features').repeater({
                initEmpty: false,

                defaultValues: {
                    'text-input': 'foo'
                },

                show: function () {
                    $(this).slideDown();
                },

                hide: function (deleteElement) {
                    $(this).slideUp(deleteElement);
                }
            });

        </script>
    </x-slot:scripts>

</x-default-layout>
