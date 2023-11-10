<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-light" id="exampleModalLabel">Crear Gasto</h5>
      </div>
      <div class="modal-body">
        <form action="{{ Route('createSpending') }}" class="form-group" method="POST">
            @csrf
            @method('POST')
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="name">
            <label for="amount">Monto:</label>
            <input type="number" class="form-control" name="amount">
            @if(Auth::user()->type == 'ADMIN')
            <label for="restaurant">Restaurante:</label>
            <select name="restaurant_id" class="form-control" required>
                <option value="">---- Selecciona una opcion ----</option>
                @foreach($restaurants as $restaurant)
                    <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                @endforeach
            </select>
            @else
            <input type="hidden" name="restaurant_id" value="{{ Auth::user()->restaurant_id }}">
            @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
  </div>
</div>