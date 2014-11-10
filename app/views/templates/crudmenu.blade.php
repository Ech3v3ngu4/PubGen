<div class="well well-sm">
    <div class="row">
        @if(isset($buttons))
        <div class="col-lg-8">
            @foreach($buttons as $button)
            <a class="btn btn-primary" href="{{ url($button['url']) }}">
                @if(isset($button['icon']) && $button['icon'])
                <i class="glyphicon {{ $button['icon'] }}"></i>
                @endif
                
                {{{ $button['label'] }}}
            </a>
            @endforeach
        </div>
        @endif
        
        <div class="col-lg-4">
            {{ Form::open(array('url' => $search, 'role' => 'form', 'method' => 'get')) }}
            <div class="input-group input-group-sm">
                {{ Form::text('pesquisa', $pesquisa, array('class' => 'form-control', 'placeholder' => 'Pesquisar')) }}
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </span>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
