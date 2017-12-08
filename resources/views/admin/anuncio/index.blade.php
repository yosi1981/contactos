@extends ('layouts.admin2')
@section ('contenido')

@include('admin.anuncio.includes.modalDelete')
<a href="{{URL::to('/crearAnuncio')}}">
    <button class="btn btn-success">
        Crear Anuncio
    </button>
</a>
@if(session()->has('msj'))
<div class="alert alert-success">
    <button aria-hidden="true" class="close" type="button">
        ×
    </button>
    <span>
        <b>
            Exito -
        </b>
        {{ session('msj')}} ".alert-success"
    </span>
</div>
@endif
<div>
    <div class="col-xs-12">
        <div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
            <div class="widget-header">
                <h5 class="widget-title bigger lighter">
                    <i class="ace-icon fa fa-table">
                    </i>
                    Anuncios
                </h5>
                <div class="input-group">
                    {!! Form::open(array('url'=>'Anuncio','class'=>'input-group','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
                    <span class="input-group-addon">
                        <i class="ace-icon fa fa-check">
                        </i>
                    </span>
                    <input class="form-control search-query" id="searchText" name="searchText" placeholder="Type your query" type="text" value="{{$searchText}}">
                        <span class="input-group-btn">
                            <button class="btn btn-purple btn-sm" type="button">
                                <span class="ace-icon fa fa-search icon-on-right bigger-110">
                                </span>
                                Search
                            </button>
                        </span>
                    </input>
                    {{Form::close()}}
                </div>
            </div>
            <div class="widget-body" id="cuerpo">
                <div align="center" class="widget-main no-padding">
                    <div>
                    </div>
                    <table class="table table-bordered table-hover" id="simple-table">
                        <thead>
                            <tr>
                                <th>
                                    Id Anuncio
                                </th>
                                <th>
                                    Titulo
                                </th>
                                <th>
                                    descripcion
                                </th>
                                <th>
                                    <i class="ace-icon fa fa-clock-o bigger-110 hidden-480">
                                    </i>
                                    Fecha Inicio
                                </th>
                                <th>
                                    <i class="ace-icon fa fa-clock-o bigger-110 hidden-480">
                                    </i>
                                    Fecha Final
                                </th>
                                <th>
                                    <i class="ace-icon fa fa-users-o bigger-110 hidden-480">
                                    </i>
                                    Usuario
                                </th>
                                <th>
                                    Localidad
                                </th>
                                <th>
                                    Provincia
                                </th>
                                <th>
                                    Estado
                                </th>
                                <th>
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anuncios as $anu)
                            <tr>
                                <td>
                                    {{$anu->idanuncio}}
                                </td>
                                <td>
                                    {{$anu->titulo}}
                                </td>
                                <td>
                                    {{$anu->descripcion}}
                                </td>
                                <td>
                                    {{$anu->fechainicio}}
                                </td>
                                <td>
                                    {{$anu->fechafinal}}
                                </td>
                                <td>
                                    <a href="{{URL::to('/Usuario/'.$anu->idusuario.'/edit')}}">
                                        {{$anu->NombreUsuario}}
                                    </a>
                                </td>
                                <td>
                                    {{$anu->NombreLocalidad}}
                                </td>
                                <td>
                                    {{$anu->NombreProvincia}}
                                </td>
                                <td class="hidden-480">
                                    @if ($anu->activo == 0)
                                    <span class="label label-sm label-danger">
                                        Inactivo
                                    </span>
                                    @else
                                    <span class="label label-sm label-success">
                                        Inactivo
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="hidden-sm hidden-xs btn-group">
                                        <button class="btn btn-xs btn-success">
                                            <a href="{{URL::to('/Anuncio/'.$anu->idanuncio.'/edit')}}">
                                                <i class="ace-icon fa fa-pencil bigger-120">
                                                </i>
                                            </a>
                                        </button>
                                        <button class="btn btn-xs btn-danger">
                                            <i class="ace-icon delete-modal fa fa-trash bigger-120" color="white" data-id="{{$anu->idanuncio}}">
                                            </i>
                                        </button>
                                        <button class="btn btn-xs btn-warning">
                                            <a href="{{URL::to('/listadoCitas/'.$anu->idanuncio)}}">
                                                <i class="ace-icon fa fa-calendar bigger-120">
                                                </i>
                                            </a>
                                        </button>
                                    </div>
                                    <div class="hidden-md hidden-lg">
                                        <div class="inline pos-rel">
                                            <button class="btn btn-minier btn-primary dropdown-toggle" data-position="auto" data-toggle="dropdown">
                                                <i class="ace-icon fa fa-cog icon-only bigger-110">
                                                </i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                <li>
                                                    <a class="tooltip-info" data-original-title="View" data-rel="tooltip" href="#" title="">
                                                        <span class="blue">
                                                            <i class="ace-icon fa fa-search-plus bigger-120">
                                                            </i>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="tooltip-success" data-original-title="Edit" data-rel="tooltip" href="#" title="">
                                                        <span class="green">
                                                            <i class="ace-icon fa fa-pencil-square-o bigger-120">
                                                            </i>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="tooltip-error" data-original-title="Delete" data-rel="tooltip" href="#" title="">
                                                        <span class="red">
                                                            <i class="ace-icon fa fa-trash-o bigger-120">
                                                            </i>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$anuncios->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#searchText').on('keyup',function(){
        $value=$(this).val();      
        $.ajax({
            type : 'get',
            url  : '{{URL::to('/searchAnuncio')}}',
            data : {'searchText' : $value},
            async: true,
            dataType: 'json',
            headers: {
                       'X-CSRF-TOKEN': '{{ csrf_token() }}',
                 },
            success:function(data){
                $('#cuerpo').html(data);
            }
        })
    })
    $(document).on('click','.pagination a',function(e){
        e.preventDefault();
        var page=$(this).attr('href').split('page=')[1];
        getAnuncios(page,$('#searchText').val());
    })

$(document).ready(function() {
        $('.modal').appendTo("body");

        });


    function getAnuncios(page,search)
    {
        var url="{{URL::to('/searchAnuncio')}}";
        $.ajax({
            type : 'get',
            url  : url+'?page='+page,
            data : {'searchText': search}
        }).done(function(data){
            $('#cuerpo').html(data);
        })
    }


        
        $(document).on('click', '.delete-modal', function(){
            $('.id').text($(this).data('id'));
            $('#modal-delete').modal('show');
        })
        $('.modal-footer').on('click', '.delete', function(e) {
            e.preventDefault();
            var url="{{URL::to('/eliminarAnuncio')}}";
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
            getAnuncios(1,"");
            $('.modal-backdrop').removeClass();
            }
          });
        });
</script>
@endsection
