<!-- Modal -->
<div class="modal fade" id="Product" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form enctype="multipart/form-data" method="put" id="product">
                                <input type="hidden" class="form-control" id="id_product" name="id"/>
                                <input type="text" class="form-control" id="name_product" name="name"/>
                                <input type="text" class="form-control" id="description_product" name="description"/>
                                <select class="form-control" name="status" id="status_product">
                                    <option value="1">Activo</option>
                                    <option value="0">Desactivo</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span id="button"></span>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- Function --}}
@include('partials.script')