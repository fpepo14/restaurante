<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Crear Restaurante</h5>
      </div>
      <div class="modal-body">
        <form action="{{ Route('createRestaurant') }}" class="form-group" method="POST">
            @csrf
            @method('POST')
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="name" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
  </div>
</div>