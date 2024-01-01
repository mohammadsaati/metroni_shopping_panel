<div class="table-responsive">
    <table class="table border table-rounded table-row-bordered table-row-gray-300 border-gray-300 gs-4 gy-4" dir="rtl">

        <thead class="bg-secondary">
        <tr>
            <th scope="col"><b>#</b></th>
            <th scope="col"><b>عکس</b></th>
            <th scope="col"><b>نام محصول</b></th>
            <th scope="col"><b>موجودی کل</b></th>
        </tr>
        </thead>

        <tbody>

        @foreach($data["section"]->products as $section_product)
            <tr @if(!$section_product->status) class="bg-danger bg-opacity-50" @endif>
                <td>
                    <input name="products[]" checked value="{{ $section_product->id }}" type="checkbox" class="form-check-input border border-1 border-gray-300">
                </td>
                <td>
                    <img src="{!! get_image("products/".$section_product->image) !!}" class="w-50 h-80px rounded" loading="lazy">
                </td>
                <td>{{ str($section_product->name)->words(10 , "...") }}</td>
                <td>{{ $section_product->showProductStock() }}</td>
            </tr>
        @endforeach

        @foreach($data["products"] as $product)
            <tr @if(!$product->status) class="bg-danger bg-opacity-50" @endif>
                <td>
                    <input name="products[]" value="{{ $product->id }}" type="checkbox" class="form-check-input border border-1 border-gray-300">
                </td>
                <td>
                    <img src="{!! get_image("products/".$product->image) !!}" class="w-50 h-80px rounded" loading="lazy">
                </td>
                <td>{{ str($product->name)->words(10 , "...") }}</td>
                <td>{{ $product->showProductStock() }}</td>
            </tr>
        @endforeach
        </tbody>

    </table>

    <div class="col-12 text-center">
        <ul class="pagination">
            {!! $data["products"]->links() !!}
        </ul>
    </div>
</div>
