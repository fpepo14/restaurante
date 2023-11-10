<div class="modal fade" id="deleteModal{{ $income->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Ingreso</h5>
      </div>
      <div class="modal-body">
        <p>Se eliminara el ingreso: <strong>{{ $income->name }}</strong></p>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <form action="{{ Route('deleteIncome', $income->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button  class="btn btn-warning">Confirmar</button>
            </form>
        </div>
    </div>
  </div>
</div>