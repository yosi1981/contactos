@extends ('layouts.admin2')
@section ('contenido')
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        </div>
        <div class="page-content">
            <div class="page-header">
                @include('includes.admin.tables.infoReferidosTable')
                @include('includes.admin.tables.infoAnunciosProvincias')
            </div>
        </div>
    </div>
</div>
<script>
    $('.show-details-btn').on('click', function(e) {
                    e.preventDefault();
                    $(this).closest('tr').next().toggleClass('open');
                    $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
                });
</script>
@endsection
