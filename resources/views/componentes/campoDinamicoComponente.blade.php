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
        class="form-control form-control-sm {{$class_campo??''}}">
    
@elseif($tipo == 'textarea')
    <textarea 
        id="{{$id_name??''}}"
        name="{{$id_name}}"
        cols="30" 
        rows="10"
        {{$required??''}}
        class="form-control form-control-sm {{$class_campo??''}}">
        {{$value??''}}
    </textarea>
@elseif($tipo == 'select')
    <select 
        id="{{$id_name??''}}"
        name="{{$id_name}}"
        {{$required??''}}
        class="form-control form-control-sm select2 {{$class_campo??''}}"
        >
        @foreach ($objeto as $key => &$item)
            <option 
                {{$value==$item->{$campo_valor} ? 'selected' : '' }}
                value="{{$item->{$campo_valor} ?? ''}}">
                {{$item->{$campo_descricao} ?? ''}}
            </option> 
        @endforeach
    </select>
@elseif($tipo == 'datalist')
    <input 
        class="form-control form-control-sm {{$class_campo??''}}" 
        list="{{!empty($id_name)? $id_name.'_list' :''}}" 
        id="{{$id_name??''}}"
        name="{{$id_name}}"
        value="{{$value??''}}"
        >
    <datalist id="{{!empty($id_name)? $id_name.'_list' :''}}">
        @foreach ($objeto as $key => &$item)
            <option 
                value="{{$item->{$campo_valor} ?? ''}}">
            </option> 
        @endforeach
    </datalist>
@endif

@if(!empty($mensagem))
    <div class="invalid-feedback">
        {{$mensagem}}
    </div>
@endif