<div class="card-body">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{ old('name', isset($product) ? $product->name : '') }}">

        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="code">Code</label>
        <input type="text" name="code" class="form-control" id="code" placeholder="Enter code" value="{{ old('code', isset($product) ? $product->code : '') }}">

        @error('code')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" name="price" class="form-control" id="price" placeholder="Enter price" value="{{ old('price', isset($product) ? $product->price : '') }}">

        @error('price')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="text" name="quantity" class="form-control" id="quantity" placeholder="Enter quantity" value="{{ old('quantity', isset($product) ? $product->quantity : '') }}">

        @error('quantity')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
