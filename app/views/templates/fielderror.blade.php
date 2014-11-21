@if($errors->has($field))
<span class="help-block">
    @foreach ($errors->get($field) as $error)
    <p>{{{ $error }}}</p>
    @endforeach
</span>
@endif
