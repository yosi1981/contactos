    <table class="table table-bordered table-hover" id="simple-table">
        <thead>
            <tr>
                                            <th width="5%">
                                                Id
                                            </th>
                                            <th width="10%">
                                                Titulo
                                            </th>
                                            <th width="10%">
                                                <i class="ace-icon fa fa-clock-o bigger-110 hidden-480">
                                                </i>
                                                Fecha Inicio
                                            </th>
                                            <th width="10%">
                                                <i class="ace-icon fa fa-clock-o bigger-110 hidden-480">
                                                </i>
                                                Fecha Final
                                            </th>
                                            <th width="10%">
                                                <i class="ace-icon fa fa-users-o bigger-110 hidden-480">
                                                </i>
                                                Usuario
                                            </th>
                                            <th width="10%">
                                                Localidad
                                            </th>
                                            <th width="10%">
                                                Provincia
                                            </th>
                                            <th width="10%">
                                                Estado
                                            </th>
                                            <th width="30%">
                                                Acciones
                                            </th>

            </tr>
        </thead>
        @if (count($anuncios)>0)
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
                        Activo
                    </span>
                    @endif
                </td>
                <td>
                    <div class="hidden-sm hidden-xs btn-group">
                        <button class="btn btn-sm btn-success">
                            <a href="{{URL::to('/Anuncio/'.$anu->idanuncio.'/edit')}}">
                                <i class="ace-icon fa fa-pencil bigger-120">
                                </i>
                            </a>
                        </button>
                        <button class="btn btn-sm btn-danger">
                            <i class="ace-icon delete-modal fa fa-trash bigger-120" color="white" data-id="{{$anu->idanuncio}}">
                            </i>
                        </button>
                        <button class="btn btn-sm btn-warning">
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

@else
                <tbody>
                    <tr>
                        <td colspan=9 align="center"><b>No hay resultados en la búsqueda</b></td>

                    </tr>
                </tbody>

@endif
    </table>
    {{$anuncios->links()}}
