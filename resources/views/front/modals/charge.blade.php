<div class="modal fade" id="chargeModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title text-light" id="exampleModalLabel">Cobrar Orden</h5>
      </div>
      <div class="modal-body">
        <form action="{{ Route('chargeOrder', $order->id) }}" method="POST">
            @csrf
            @method('POST')
            <p><strong>Orden:</strong> <span class="text-danger">{{ $order->id }}</span></p>
            <p><strong>Mesa:</strong> <span class="text-danger">{{ $order->table->name }}</span></p>
            <select name="payment_method" class="form-control" required>
                <option value="">---- Seleccione un Medio de Pago ----</option>
                @foreach($paymentMethods as $paymentMethod)
                    <option value="{{ $paymentMethod->id }}">{{ $paymentMethod->name }}</option>
                @endforeach
            </select>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Confirmar</button>
            </form>
        </div>
    </div>
  </div>
</div>