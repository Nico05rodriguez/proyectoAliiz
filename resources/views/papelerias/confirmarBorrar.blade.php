<div class="modal fade" id="confirmarBorrar-{{$papeleria->id}}" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">

  <form action=" {{ route('papelerias.destroy', $papeleria->id)}}" method="POST">
    @csrf
    @method('DELETE')

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Eliminar</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <strong>¿Estás seguro de eliminar el registro # {{$papeleria->id}} ?</strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">NO</button>
        <button type="submit" class="btn btn-danger" id="confirm">SÍ</button>
      </div>
    </div>
  </div>
  </form>
</div>