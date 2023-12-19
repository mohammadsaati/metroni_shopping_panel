

<button type="submit" class="btn" onclick="DeleteBtn(event,{{ json_encode($config) }})">
    {!! getIcon(name:'trash' , class: 'fs-2 text-danger') !!}
</button>

@section("delete-scripts")
    <script>
        function DeleteBtn(e , config)
        {
            e.preventDefault();
            console.log(config);

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
                    DeleteItem(config)
                }
            })
        }

        function DeleteItem(config)
        {
            $.ajax({
                type : config.ajax_type ,
                url : config.url ,
                data : config.data['data'] ,
                headers : {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } ,
                success : function (result) {
                    if(result) {
                        afterDeleted(config.deleting_item)
                    }
                } ,
                error : function (err) {
                    console.log(err)
                }

            })
        }

        function afterDeleted(deleteing_item)
        {
            $(deleteing_item).remove()
            Swal.fire({
                icon : 'success' ,
                title : "با موفقیت حدف شد" ,
                confirmButtonText: 'تمام'
            });
        }


    </script>
@endsection
