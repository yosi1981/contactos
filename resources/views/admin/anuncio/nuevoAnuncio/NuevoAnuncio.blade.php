@extends ('layouts.admin2')
@section ('contenido')
<h1>
    Crear Anuncio
</h1>
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            {{ Form::open(array('url' => 'NuevoAnuncio','method'=>'POST'), array('role' => 'form','class'=>'form-horizontal')) }}
            <div class="form-group">
                {{ Form::label('titulo', 'Titulo',array('class'=>'col-sm-3 control-label no-padding-right','for'=>'form-field-1-1')) }}
                <div class="col-sm-9">
                    {{ Form::text('titulo',null, array('placeholder' => 'Introduce el Titulo', 'class' => 'form_control')) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('descripcion', 'Descripcion',array('class'=>'col-sm-3 control-label no-padding-right','for'=>'form-field-1')) }}
                <div class="col-sm-9">
                    {{ Form::textarea('descripcion',null, array('placeholder' => 'Introduce la descripción', 'class' => 'col-xs-10 col-sm-5 limited','maxlength'=>'50')) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('fechainicio', 'Fecha Inicio',array('class'=>'col-sm-3 control-label no-padding-right')) }}
                <div class="col-sm-9">
                    {{ Form::input('date','fechainicio' , '2015-02-22', ['class'=>'datepicker form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('fechafinal', 'Fecha Final',array('class'=>'col-sm-3 control-label no-padding-right')) }}
                <div class="col-sm-9">
                    {{ Form::input('date','fechafinal' , '2015-02-22', ['class'=>'datepicker form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('activo','¿Esta Activo?',array('class'=>'col-sm-3 control-label no-padding-right')) }}
                <div class="col-sm-9">
                    <input class="ace ace-switch ace-switch-6" name="activo" type="checkbox">
                        <span class="lbl">
                        </span>
                    </input>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('idlocalidad','Id Localidad',array('class'=>'col-sm-3 control-label no-padding-right')) }}
                <div class="col-sm-9">
                    {!! Form::select('idlocalidad',$localidades,null, $attributes = array('class'=>'chosen-single chosen-default')) !!}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('idusuario', 'Id Usuario',array('class'=>'col-sm-3 control-label no-padding-right')) }}
                <div class="col-sm-9">
                    {!! Form::select('idusuario',$usuarios,null, $attributes = array('class'=>'chosen-single chosen-default')) !!}
                </div>
            </div>
            <div class="form-group">
                {{ Form::button('Crear Anuncio', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>
@endsection
