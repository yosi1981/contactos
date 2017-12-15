<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
    <div class="widget-header widget-header-small">
        <h6 class="widget-title">
            <i class="ace-icon fa fa-sort">
            </i>
            Información de todas las Provincias
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
        <div class="widget-main">
            <table class="table table-bordered table-hover" id="simple-table">
                <thead>
                    <th>
                        Id Provincia
                    </th>
                    <th class="detail-col">
                        Detalles
                    </th>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Anuncios
                    </th>
                </thead>
                <tbody>
                    @if(count($provincias)>0)
                @foreach($provincias as $provincia)
                    <tr>
                        <td>
                            {{$provincia->idprovincia}}
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
                            {{$provincia->nombre}}
                        </td>
                        <td>
                            {{count($provincia->anunciosHistorial)}}
                        </td>
                    </tr>
                    <tr class="detail-row">
                        <td colspan="8">
                            <div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                                <div class="widget-header widget-header-small">
                                    <h6 class="widget-title">
                                        <i class="ace-icon fa fa-sort" font-color="#a91414">
                                        </i>
                                        Información de {{$provincia->nombre}}
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
                                    <div class="widget-main">
                                        <table class="table table-bordered table-hover" id="simple-table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Id AnuncioDia
                                                    </th>
                                                    <th>
                                                        Fecha
                                                    </th>
                                                    <th>
                                                        Id Anuncio
                                                    </th>
                                                    <th>
                                                        Num. Visitas
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($provincia->anunciosHistorial)>0)

                                @foreach ($provincia->anunciosHistorial as $anuncio)
                                                <tr>
                                                    <td>
                                                        {{$anuncio->idanuncioDia}}
                                                    </td>
                                                    <td>
                                                        {{$anuncio->fecha}}
                                                    </td>
                                                    <td>
                                                        {{$anuncio->idanuncio}}
                                                    </td>
                                                    <td>
                                                        {{$anuncio->numvisitas}}
                                                    </td>
                                                </tr>
                                                @endforeach 
                                                        @else
                                                <tr>
                                                    <td colspan="4">
                                                        No hay anuncios publicados en esta provincia
                                                    </td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td>
                            NO ADMINISTRAS NINGUNA PROVINCIA
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.box -->
