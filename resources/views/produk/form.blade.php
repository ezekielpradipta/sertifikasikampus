<div class="col-lg-6">
    <div class="form-group focused">
         <label class="form-control-label" for="name">Nama<span class="small text-danger">*</span></label>
             <input type="text" id="title" class="form-control" name="title" placeholder="Nama" value="{{ old('title', $update ? $produk->title:'') }}"required>
                 @error('title')
                     <p class="help-block">{{ $message }}</p>
                 @enderror
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group focused">
        <label class="form-control-label" for="description">Deskripsi<span class="small text-danger">*</span></label>
            <textarea name="description" class="form-control" id="description" cols="20" rows="10" required>{{ old('description', $update ? $produk->description:'') }}</textarea>
               @error('deskripsi')
                  <p class="help-block">{{ $message }}</p>
              @enderror
    </div>
</div>
<div class="col-lg-6">
     <div class="form-group focused">
         <label class="form-control-label" for="price">Harga<span class="small text-danger">*</span></label>
             <input type="number" id="price" class="form-control" min="0" name="price"  value="{{ old('price', $update ? $produk->price:'') }}"required>
                @error('price')
                     <p class="help-block">{{ $message }}</p>
                @enderror
    </div>
</div>
<div class="col-lg-6">
     <div class="form-group focused">
         <label class="form-control-label" for="stock">Stok<span class="small text-danger">*</span></label>
             <input type="number" id="stock" class="form-control" min="0" name="stock"  value="{{ old('stock', $update ? $produk->stock:'') }}"required>
                @error('stock')
                     <p class="help-block">{{ $message }}</p>
                @enderror
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group focused">
        <label class="form-control-label" for="image">Foto<span class="small text-danger">*</span></label>
            @if($update)
                <div class="row no-gutters">
                    <img style="width: 80px; height: 80px;" class="media-object" src="{{ getImageUrl($produk->image) }}">
                </div>
            @endif
            <input type="file" id="image" name="image" @if(!$update) required @endif>
                @if($update) <p class="help-block">Abaikan bila tidak ingin mengganti foto</p> @endif
                    @error('image')
                        <p class="help-block">{{ $message }}</p>
                    @enderror
    </div>
</div>