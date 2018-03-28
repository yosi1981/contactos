<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
    <div class="widget-header widget-header-small">
        <h6 class="widget-title">
            <i class="ace-icon fa fa-sort">
            </i>
            Información de tus referidos
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
                        Id Referido
                    </th>
                    <th class="detail-col">
                        Detalles
                    </th>
                    <th>
                        Usuario
                    </th>
                    <th>
                        Historial
                    </th>
                </thead>
                <tbody>
                    @if(count($usuario->Referidos)>0)
                @foreach($usuario->Referidos as $referido)
                    <tr>
                        <td>
                            {{$referido->id}}
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
                            {{$referido->Usuario->email}}
                        </td>
                        <td>
                            {{count($referido->HistorialAnuncios)}}
                        </td>
                    </tr>
                    <tr class="detail-row">
                        <td colspan="8">
                            <div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                                <div class="widget-header widget-header-small">
                                    <h6 class="widget-title">
                                        <i class="ace-icon fa fa-sort">
                                        </i>
                                        Anuncios de {{$referido->Usuario->email}}
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
                                                @if(count($referido->HistorialAnuncios)>0)

                                @foreach ($referido->HistorialAnuncios as $anuncioreferido)
                                                <tr>
                                                    <td>
                                                        {{$anuncioreferido->idanuncioDia}}
                                                    </td>
                                                    <td>
                                                        {{$anuncioreferido->fecha}}
                                                    </td>
                                                    <td>
                                                        {{$anuncioreferido->idanuncio}}
                                                    </td>
                                                    <td>
                                                        {{$anuncioreferido->numvisitas}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                                        @else
                                                <tr>
                                                    <td colspan="4">
                                                        No hay anuncios publicados de este usuario
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
                        <td colspan="4">
                            NO TIENES NINGUN REFERIDO
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
   <div class="widget-header widget-header-small">
        <h6 class="widget-title">
            Información de tus ganancias
        </h6>
    </div>    
</div>
