@extends ('layouts.admin2')
@section ('contenido')

    @include('admin.imagen.includes.nuevaImagen')
    @include('admin.imagen.includes.modal-delete')
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Gallery
                    <small>
                        <i class="ace-icon fa fa-angle-double-right">
                        </i>
                        responsive photo gallery using colorbox
                    </small>
                    <button class="btn btn-success" data-placement="right" data-toggle="tooltip" id="btnUploadImagen" name="btnUploadImagen" title="Subir Imagen">
                        Subir imagen
                    </button>
                </h1>
            </div>
            <!-- /.page-header -->
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div id="tablaImagenes">
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.page-content -->
</div>
<script type="text/javascript">
    $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();   
                getImagenes();
            });
            $('#btnUploadImagen').on('click',function(){
                $('#Imagen').modal('show');
            })
    
            var form=document.getElementById('frmUploadImage');
            var request=new XMLHttpRequest();

            form.addEventListener('submit',function(e){
                e.preventDefault();
                var formData=new FormData(form);

                request.open('post','uploadimage');
                request.addEventListener("load",transferComplete);
                request.send(formData);


            })
    function getImagenes()
    {
        var url="{{URL::to('/admin/getImages')}}";
        $.ajax({
            type : 'get',
            url  : url,
            //data : {'searchText': search}
        }).done(function(data){
            $('#tablaImagenes').html(data);
        })
    }
            function transferComplete(data){
                $('#Imagen').modal('hide');
                getImagenes();
            }
            $(document).ready(function() {
                $('.modal').appendTo("body");
            });
            $(document).on('click', '.delete-modal', function(){
                    $('.id').text($(this).data('id'));
                    $('#titledelete').text("Desea eliminar la imagen: ".concat($(this).data('titulo')));
                    $('#modal-delete').modal('show');
                })
                $('.modal-footer').on('click', '.delete', function(e) {
                    e.preventDefault();
                    var url="{{URL::to('/admin/eliminarimagen')}}";
                  $.ajax({
                    type: 'post',
                    data: {
                      'id': $('.id').text()
                    },
                    url: url,
                    headers: {
                               'X-CSRF-TOKEN': '{{ csrf_token() }}',
                           },
                    success: function(data) {
                    $('#modal-delete').modal('hide');
                    getImagenes();
                    }
                  });
                });
</script>
@endsection
