<ul class="ace-thumbnails clearfix">
    @foreach($imagenes as $imagen)
    <li>
        <a class="cboxElement" data-rel="colorbox" href="" title="{{$imagen->titulo}}">
            <img alt="{{$imagen->idusuario}}" height="200" src="/imagenes/thumb_{{$imagen->ficheroimagen}}" width="150">
            </img>
        </a>
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
                <i class="ace-icon delete-modal fa fa-times red" data-id="{{$imagen->idimagen}}" data-titulo="{{$imagen->titulo}}">
                </i>
            </a>
            <a href="#">
                <button>
                    <i class="" data-id="{{$imagen->idimagen}}" data-titulo="{{$imagen->titulo}}">
                    </i>
                </button>
            </a>
        </div>
    </li>
    @endforeach
</ul>
