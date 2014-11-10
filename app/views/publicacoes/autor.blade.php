<div class="row">
    <input type="hidden" name="autor_idx[]" class="autor_idx" value="{{$key}}">
    <div class="col-lg-5"> 
        <input type="text" name="autor{{$key}}" value="{{ $autor }}"
               class="form-control {{ ($errors->has('autor'.$key)?'has-error':'') }}" placeholder="Nome do Autor">
    </div>
    <div class="col-lg-2"> 
        <button type="button" title="Remover Autor" class="btn btn-primary remover-autor">
            <span class="glyphicon glyphicon-minus"></span>
        </button>
    </div>
</div>