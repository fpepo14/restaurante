<div class="modal fade" id="updateModal{{ $spending->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLabel">Editar Gasto</h5>
      </div>
      <div class="modal-body">
        <form action="{{ Route('updateSpending', $spending->id) }}" class="form-group" method="POST">
            @csrf
            @method('PUT')
            <label for="id">Gasto:</label>
            <p>{{ $spending->name }}</p>
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" value="{{ $spending->name }}">
            <label for="amount">Monto:</label>
            <input type="number" class="form-control" name="amount" value="{{ $spending->amount }}">
            <label for="restaurant">Restaurante:</label>
            <select name="restaurant_id" class="form-control" required>
                <option value="{{ $spending->restaurant->id }}">{{ $spending->restaurant->name }}</option>
                @foreach($restaurants as $restaurant)
                    <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
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