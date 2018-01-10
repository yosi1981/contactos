@extends ('layouts.admin2')
@section ('contenido')
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        </div>
        <div class="page-content">
            <div class="page-header">
            </div>
<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
    <div class="widget-header widget-header-small">
        <h6 class="widget-title">
            <i class="ace-icon fa fa-sort">
            </i>
            Información de los paquetes
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
                        Id 
                    </th>
                    <th class="detail-col">
                        Detalles
                    </th>
                    <th>
                        Usuario
                    </th>
                    <th>
                        Estado
                    </th>
                    <th>
                        Consumo
                    </th>

                </thead>
                <tbody>
                    @if(count($paquetes)>0)
                @foreach($paquetes as $paquete)
                    <tr>
                        <td>
                            {{$paquete->idpaquete}}
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
                            {{$paquete->Useranunciante->Usuario->email}}
                        </td>
                        <td>
                            {{$paquete->estado}}
                        </td>
                        <td >
                        	

						<div class="progress  progress-striped active">
													<div class="progress-bar progress-bar-success" style="width: {{count($paquete->Usos)*100/$paquete->dcontratados}}%;">{{count($paquete->Usos)}}/{{$paquete->dcontratados}}&nbsp;({{count($paquete->Usos)*100/$paquete->dcontratados}}%)</div>
													<div class="progress-bar progress-bar-warning" style="width: {{($paquete->dcontratados - count($paquete->Usos))*100/$paquete->dcontratados}}%;"></div>
						</div>

                        </td>
                    </tr>
                    <tr class="detail-row">
                        <td colspan="8">
                            <div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                                <div class="widget-header widget-header-small">
                                    <h6 class="widget-title">
                                        <i class="ace-icon fa fa-sort">
                                        </i>
                                        Anuncios del paquete {{$paquete->idpaquete}}
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
                                                @if(count($paquete->Usos)>0)

                                @foreach ($paquete->Usos as $usospaquete)
                                                <tr>
                                                    <td>
                                                        {{$usospaquete->idanuncioDia}}
                                                    </td>
                                                    <td>
                                                        {{$usospaquete->fecha}}
                                                    </td>
                                                    <td>
                                                        {{$usospaquete->idanuncio}}
                                                    </td>
                                                    <td>
                                                        {{$usospaquete->numvisitas}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                                        @else
                                                <tr>
                                                    <td colspan="4">
                                                        No se ha utilizado aún este paquete
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
                            NO hay ningun paquete que mostrar
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

        </div>
    </div>
</div>

@endsection
