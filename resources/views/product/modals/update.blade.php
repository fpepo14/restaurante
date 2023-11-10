<div class="modal fade" id="updateModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
      </div>
      <div class="modal-body">
        <form action="{{ Route('updateProduct', $product->id) }}" class="form-group" method="POST">
            @csrf
            @method('PUT')
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="name" required value="{{ $product->name }}">
            <label for="stock">Stock:</label>
            <input type="number" class="form-control" name="stock" required value="{{ $product->stock }}">
            <label for="price">Precio:</label>
            <input type="number" class="form-control" name="price" required value="{{ $product->price }}">
            <label for="restaurant">Restaurante:</label>
            <select name="restaurant_id" class="form-control" required>
                <option value="{{ $product->restaurant->id }}">{{ $product->restaurant->name }}</option>
                @foreach($restaurants as $restaurant)
                    <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                @endforeach
            </select>
            <label for="category_id">Categoria:</label>
            <select name="category_id" class="form-control" required>
                <option value="{{ $product->category->id }}">{{ $product->category->name }}</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Actualizar</button>
            </div>
        </form>
    </div>
  </div>
</div>