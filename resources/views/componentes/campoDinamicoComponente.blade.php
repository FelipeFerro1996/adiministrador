@if(!empty($label_descricao))
    <label 
        for="{{$id_name??''}}" 
        class="form-label {{$label_class??''}} w-100">
        
        {{$label_descricao}}:

        @if(!empty($required))
            <i class="fa-solid fa-asterisk text-danger"></i>
        @endif
        
    </label>
@endif

@if($tipo == 'input')

    <input 
        type="{{$type??'text'}}"
        id="{{$id_name??''}}"
        name="{{$id_name}}"
        value="{{$value??''}}"
        {{$required??''}}
        class="form-control {{$class_campo??''}}">
    
@elseif($tipo == 'textarea')
    <textarea 
        id="{{$id_name??''}}"
        name="{{$id_name}}"
        cols="30" 
        rows="10"
        {{$required??''}}
        class="form-control {{$class_campo??''}}">
        {{$value??''}}
    </textarea>
@elseif($tipo == 'select')
    <select 
        id="{{$id_name??''}}"
        name="{{$id_name}}"
        {{$required??''}}
        class="form-control select2 {{$class_campo??''}}"
        >
        @foreach ($objeto as $key => &$item)
            <option 
                {{$value==$item->{$campo_valor} ? 'selected' : '' }}
                value="{{$item->{$campo_valor} ?? ''}}">
                {{$item->{$campo_descricao} ?? ''}}
            </option> 
        @endforeach
    </select>
@endif

@if(!empty($mensagem))
    <div class="invalid-feedback">
        {{$mensagem}}
    </div>
@endif