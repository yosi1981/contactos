{!! Form::open(array('url'=>'Anuncio','method'=>'GET','class'=>'input-group','autocomplete'=>'off','role'=>'search')) !!}
<input class="form-control search-query" id="searchText" name="searchText" placeholder="Type your query" type="text" value="{{$searchText}}">
    <span class="input-group-btn">
        <button class="btn btn-inverse btn-white" type="submit">
            <span class="ace-icon fa fa-search icon-on-right bigger-110">
                Search
            </span>
        </button>
    </span>
</input>
{{Form::close()}}
