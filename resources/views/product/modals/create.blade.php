<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Crear Producto</h5>
      </div>
      <div class="modal-body">
        <form action="{{ Route('createProduct') }}" class="form-group" method="POST">
            @csrf
            @method('POST')
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="name" required>
            <label for="stock">Stock:</label>
            <input type="number" class="form-control" name="stock" required>
            <label for="price">Precio:</label>
            <input type="number" step="0.01" class="form-control" name="price" required>
            <label for="restaurant">Restaurante:</label>
            <select name="restaurant_id" class="form-control" required>
                <option value="">---- Selecciona una opcion ----</option>
                @foreach($restaurants as $restaurant)
                    <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                @endforeach
            </select>
            <label for="category_id">Categoria:</label>
            <select name="category_id" class="form-control" required>
                <option value="">---- Selecciona una opcion ----</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
  </div>
</div>