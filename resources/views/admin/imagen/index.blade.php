@extends ('layouts.admin2')
@section ('contenido')

    @include('admin.imagen.includes.nuevaImagen')
    @include('admin.imagen.includes.modal-delete-img-user')
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
<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
    <div class="widget-header widget-header-small">
        <h6 class="widget-title">
            <i class="ace-icon fa fa-sort">
            </i>
            Imagenes de los anunciantes
        </h6>
    </div>
    <div class="widget-body" style="display: block;">
        <div class="widget-main">
            <table class="table table-bordered table-hover" id="simple-table">
                <thead>
                    <th>
                        Id
                    </th>
                    <th class="detail-col">
                        Detalles
                    </th>
                    <th>
                        Usuario
                    </th>
                    <th>
                        Imagenes
                    </th>
                </thead>
                <tbody>
                    @if(count($usuarios)>0)
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>
                            {{$usuario->id}}
                        </td>
                        <td class="center">
                            <div class="action-buttons">
                                <a class="green bigger-140 show-details-btn" href="#" title="Show Details">
                                    <i class="ace-icon fa fa-angle-double-down">
                                    </i>
                                    <span class="sr-only">
                                        Details
                                    </span>
                                </a>
                            </div>
                        </td>
                        <td>
                            {{$usuario->Usuario->email}}
                        </td>
                        <td id="imgusuario{{$usuario->id}}">
                            {{count($usuario->Imagenes)}}
                        </td>
                    </tr>
                    <tr class="detail-row" >
                        <td colspan="8">
                            <div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                                <div class="widget-header widget-header-small">
                                    <h6 class="widget-title">
                                        <i class="ace-icon fa fa-sort">
                                        </i>
                                        Imágenes de {{$usuario->Usuario->email}}
                                    </h6>
                                    <div class="widget-toolbar">
                                        <a data-action="search" href="#">
                                            <i class="ace-icon fa fa-search">
                                            </i>
                                        </a>
                                        <a data-action="reload" href="#">
                                            <i class="ace-icon fa fa-refresh">
                                            </i>
                                        </a>
                                        <a data-action="collapse" href="#">
                                            <i class="ace-icon fa fa-minus" data-icon-hide="fa-minus" data-icon-show="fa-plus">
                                            </i>
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-body" style="display: block;">
                                    <div class="widget-main" id="det{{$usuario->id}}">
                                        <ul class="ace-thumbnails clearfix">
                                            @foreach($usuario->Imagenes as $imagen)
                                            <li>
                                                <a class="cboxElement" data-rel="colorbox" href="" title="{{$imagen->titulo}}">
                                                    <img alt="{{$imagen->idusuario}}" height="200" src="/imagenes/thumb_{{$imagen->ficheroimagen}}" width="150">
                                                    </img>
                                                </a>
                                                <!--
                                                <div class="tags">
                                                    <span class="label-holder">
                                                        <span class="label label-info">
                                                            breakfast
                                                        </span>
                                                    </span>
                                                    <span class="label-holder">
                                                        <span class="label label-danger">
                                                            fruits
                                                        </span>
                                                    </span>
                                                    <span class="label-holder">
                                                        <span class="label label-success">
                                                            toast
                                                        </span>
                                                    </span>
                                                    <span class="label-holder">
                                                        <span class="label label-warning arrowed-in">
                                                            diet
                                                        </span>
                                                    </span>
                                                </div>
                                            -->
                                                <div class="tools">
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-link">
                                                        </i>
                                                    </a>
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-paperclip">
                                                        </i>
                                                    </a>
                                                    <a href="#">
                                                        <i class="ace-icon delete-modal-img-user fa fa-times red" data-id="{{$imagen->idimagen}}" data-titulo="{{$imagen->titulo}}" data-userid="{{$imagen->idusuario}}">
                                                        </i>
                                                    </a>
                                                </div>
                                            </li>
                                            @endforeach
                                                                                            <a  href="" title="Añadir imagenes">
                                                    <img  height="200" src="/imagenes/thumb_descarga.jpeg" width="150">
                                                    </img>
                                                </a>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                        @else
                    <tr>
                        <td colspan="4">
                            NO TIENES NINGUN REFERIDO
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
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
                //getImagenes();
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
        function getImagenesUser(id)
    {
        var url="{{URL::to('/admin/getImagesUser')}}";
        $.ajax({
            type : 'get',
            url  : url,
            data :{
                'id':$('.iduser').val()
            },
            //data : {'searchText': search}
        }).done(function(data){
            var cuerpo= "det"+id;
            $('#'+cuerpo).html(data);
            $('#imgusuario'+id).text($('#imgusuario'+id).text()-1);
        })
    }
            function transferComplete(data){
                $('#Imagen').modal('hide');
                getImagenes();
            }
            $(document).ready(function() {
                $('.modal').appendTo("body");
            });
                $('.modal-footer1').on('click', '.delete1', function(e) {
                    e.preventDefault();
                    var url="{{URL::to('/admin/eliminarimagen')}}";
                  $.ajax({
                    type: 'post',
                    data: {
                      'id': $('.id').val()
                    },
                    url: url,
                    headers: {
                               'X-CSRF-TOKEN': '{{ csrf_token() }}',
                           },
                    success: function(data) {
                    $('#modal-delete-img-user').modal('hide');
                    getImagenesUser($('.iduser').val());
                    }
                  });
                });

                        $(document).on('click', '.delete-modal-img-user', function(){
                            var id=$(this).data('id');
                            var iduser=$(this).data('userid');
                            var titulo=$(this).data('titulo');
                            $('.id').val(id);
                            $('.iduser').val(iduser);
                            $('#titledelete').text("Desea eliminar la imagen: ".concat(titulo));
                            $('#modal-delete-img-user').modal('show');
                })

</script>
@endsection
