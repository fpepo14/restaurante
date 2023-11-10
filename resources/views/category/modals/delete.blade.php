<div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Categoria</h5>
      </div>
      <div class="modal-body">
        <p>Se eliminara la categoria: <strong>{{ $category->name }}</strong></p>
        <p class="text-danger">
          ¡ALERTA! ESTA ACCION ELIMINARA TAMBIEN: <br>
          <ul>
            <li>Productos asociados a {{ $category->name }}</li>
          </ul>
        </p>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <form action="{{ Route('deleteCategory', $category->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button  class="btn btn-warning">Confirmar</button>
            </form>
        </div>
    </div>
  </div>
</div>