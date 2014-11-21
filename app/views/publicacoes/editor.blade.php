<div class="row">
    <input type="hidden" name="editor_idx[]" class="editor_idx" value="{{$key}}">
    <div class="col-lg-10"> 
        <input type="text" name="editor{{$key}}" value="{{ $editor['nome'] }}"
               class="form-control {{ ($errors->has('editor'.$key)?'has-error':'') }}" placeholder="Nome do Editor">
    </div>
    <div class="col-lg-2"> 
        <button type="button" title="Remover editor" class="btn btn-primary remover-editor">
            <span class="glyphicon glyphicon-minus"></span>
        </button>
    </div>
</div>