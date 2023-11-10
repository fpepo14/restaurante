<div class="modal fade" id="updateModal{{ $income->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLabel">Editar Ingreso</h5>
      </div>
      <div class="modal-body">
        <form action="{{ Route('updateIncome', $income->id) }}" class="form-group" method="POST">
            @csrf
            @method('PUT')
            <label for="id">Gasto:</label>
            <p>{{ $income->name }}</p>
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" value="{{ $income->name }}">
            <label for="amount">Monto:</label>
            <input type="number" class="form-control" name="amount" value="{{ $income->amount }}">
            <label for="restaurant">Restaurante:</label>
            <select name="restaurant_id" class="form-control" required>
                <option value="{{ $income->restaurant->id }}">{{ $income->restaurant->name }}</option>
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