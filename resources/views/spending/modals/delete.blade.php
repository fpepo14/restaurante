<div class="modal fade" id="deleteModal{{ $spending->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Gasto</h5>
      </div>
      <div class="modal-body">
        <p>Se eliminara el gasto: <strong>{{ $spending->name }}</strong></p>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <form action="{{ Route('deleteSpending', $spending->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button  class="btn btn-warning">Confirmar</button>
            </form>
        </div>
    </div>
  </div>
</div>