<div aria-hidden="true" class="modal " id="Imagen" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Subir Imagen
                </h4>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        x
                    </span>
                </button>
            </div>
            <form action="/admin/uploadimage" enctype="multipart/form-data" id="frmUploadImage">
                <input name="iduserimagen" id="iduserimagen" class="iduserimagen" type="text" value=""></input>
                <div class="modal-body">
                    <div align="center" class="row">
                        <!--

                        Falta programar el formulario de subir imagenes

                        -->
                        <label>
                            Nuevo Archivo
                        </label>

                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <span class="btn btn-rose btn-round btn-file">
                                <span class="fileinput-new">
                                </span>
                                <input name="" type="hidden" value="">
                                    <input multiple="" name="filesUpload[]" type="file">
                                        <div class="ripple-container">
                                        </div>
                                    </input>
                                </input>

                            </span>
                        </input>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" type="button" value="save">
                        Cerrar
                    </button>
                    <button class="btn btn-primary" type="submit">
                        Confirmar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
