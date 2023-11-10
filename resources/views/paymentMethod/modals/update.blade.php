<div class="modal fade" id="updateModal{{ $paymentMethod->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLabel">Editar Medio de Pago</h5>
      </div>
      <div class="modal-body">
        <form action="{{ Route('updatePaymentMethod', $paymentMethod->id) }}" class="form-group" method="POST">
            @csrf
            @method('PUT')
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="name" required value="{{ $paymentMethod->name }}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Actualizar</button>
            </div>
        </form>
    </div>
  </div>
</div>