<form class="form-inline" action="{!! route('products.show', $product->slug) !!}" method="post">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="submit" class="btn btn-warning sm"><i class="text-danger fa fa-heart"></i> details</button>
</form>
