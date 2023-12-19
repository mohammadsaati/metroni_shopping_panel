<div>

    @if($config["item"][$config["status_field"]])
        <button type="button" class="btn btn-danger" onclick="changeStatusAction( {{ json_encode($config) }} )">
            غیر فعال کردن
        </button>
    @else
        <button type="button" class="btn btn-success" onclick="changeStatusAction( {{ json_encode($config) }} )">
            فعال کردن
        </button>
    @endif

</div>

@section("scripts")
    <script>
        function changeStatusAction(config)
        {
            Swal.fire({
                icon: 'question' ,
                title: config.alert_title,
                showCancelButton: true,
                confirmButtonText: 'بله',
                cancelButtonText: `خیر`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed)
                {
                    changeStatus(config)
                }
            })
        }

        function changeStatus(ajax_data)
        {
            $.ajax({
                type : 'post' ,
                url : ajax_data['url'] ,
                data : ajax_data['data'] ,
                success : function (result) {
                    if(result) {
                        afterSuccess(ajax_data)
                    }
                } ,
                error : function (err) {
                    console.log(err)
                }

            })
        }

        function moz(c)
        {
            console.log(c)
        }

        function afterSuccess(config)
        {
            let out_put = '';

            if(config.data.status)
            {
                config.data[config.status_field] = 0

                out_put = `<button type="button" class="btn btn-danger" id="stBTN-${config.item.id}">
                        غیر فعال کردن

                </button>
                `;
            }else {
                config.data[config.status_field] = 1

                out_put = `
                <button type="button" class="btn btn-success ${config.data.status}" id="stBTN-${config.item.id}">
              فعال کردن
                </button>
                `;
            }

             console.log(out_put , config.data.status)


            $("#tr-"+config.item.id).html(out_put)
            $("#stBTN-"+config.item.id).on("click" , (e) => {
                e.preventDefault()
                changeStatusAction(config)
            })

            Swal.fire({
                icon : 'success' ,
                title : "با موفقیت انجام شد" ,
                confirmButtonText: 'تمام'
            });
        }

    </script>
@endsection
