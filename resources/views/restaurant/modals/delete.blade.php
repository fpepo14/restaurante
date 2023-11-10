<div class="modal fade" id="deleteModal{{ $restaurant->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Restaurante</h5>
      </div>
      <div class="modal-body">
        <p>Se eliminara el restaurante: <strong>{{ $restaurant->name }}</strong></p>
        <p class="text-danger">
          ¡ALERTA! ESTA ACCION ELIMINARA TAMBIEN: <br>
          <ul>
            <li>Usuarios asociados a {{ $restaurant->name }}</li>
            <li>Mesas asociadas a {{ $restaurant->name }}</li>
            <li>Productos asociados a {{ $restaurant->name }}</li>
          </ul>
        </p>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <form action="{{ Route('deleteRestaurant', $restaurant->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button  class="btn btn-warning">Confirmar</button>
            </form>
        </div>
    </div>
  </div>
</div>