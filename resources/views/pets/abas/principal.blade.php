<form action="{{!empty($pet)? route('atualizaPet', ['id', $pet->id]) : route('insertPet') }}" class="text-white" method="POST">
    @csrf
    @if(!empty($pet->id))
        @method('PUT')
    @endif
    <div class="row">
        <div class="p-2 col-md-5">
            @include('componentes.campoDinamicoComponente', [
                'label_descricao'=>'Espécie',
                'id_name'=>'especie',
                'required'=>'required',
                'tipo'=>'select',
                'objeto'=>$especies??[],
                'value'=>($pet->especie_id??old('especie')??''),
                'campo_valor'=>'id',
                'campo_descricao'=>'descricao',
                'class_campo'=>($errors->has('especie')?'is-invalid':''),
                'mensagem'=>($errors->has('especie')?$errors->first('especie'):''),
            ])
        </div>
        <div class="p-2 col-md-7">
            @include('componentes.campoDinamicoComponente', [
                'label_descricao'=>'Nome',
                'id_name'=>'nome',
                'required'=>'required',
                'tipo'=>'input',
                'type'=>'text',
                'value'=>($pet->nome??old('nome')??''),
                'class_campo'=>($errors->has('nome')?'is-invalid':''),
                'mensagem'=>($errors->has('nome')?$errors->first('nome'):''),
            ])
        </div>
        <div class="p-2 col-md-4">
            @include('componentes.campoDinamicoComponente', [
                'label_descricao'=>'Espécie',
                'id_name'=>'sexo',
                'required'=>'required',
                'tipo'=>'select',
                'objeto'=>[(object)['id'=>'1', 'sexo'=>'Macho'], (object)['id'=>'2', 'sexo'=>'Fêmea']],
                'value'=>($pet->sexo??old('sexo')??''),
                'campo_valor'=>'id',
                'campo_descricao'=>'sexo',
                'class_campo'=>($errors->has('sexo')?'is-invalid':''),
                'mensagem'=>($errors->has('sexo')?$errors->first('sexo'):''),
            ])
        </div>
        <div class="p-2 col-md-4">
            @include('componentes.campoDinamicoComponente', [
                'label_descricao'=>'Raça',
                'id_name'=>'raca',
                'required'=>'required',
                'tipo'=>'input',
                'type'=>'text',
                'value'=>($pet->raca??old('raca')??''),
                'class_campo'=>($errors->has('raca')?'is-invalid':''),
                'mensagem'=>($errors->has('raca')?$errors->first('raca'):''),
            ])
        </div>
        <div class="p-2 col-md-4">
            @include('componentes.campoDinamicoComponente', [
                'label_descricao'=>'Data Nascimento',
                'id_name'=>'data_nascimento',
                'required'=>'required',
                'tipo'=>'input',
                'type'=>'date',
                'value'=>($pet->data_nascimento??old('data_nascimento')??''),
                'class_campo'=>($errors->has('data_nascimento')?'is-invalid':''),
                'mensagem'=>($errors->has('data_nascimento')?$errors->first('data_nascimento'):''),
            ])
        </div>
    </div>
    <div class="row">
        <div class="p-2 col">
            <button type="submit" class="btn btn-success">{{!empty($pet)?'Alterar':'Cadastrar'}}</button>
        </div>
    </div>
</form>