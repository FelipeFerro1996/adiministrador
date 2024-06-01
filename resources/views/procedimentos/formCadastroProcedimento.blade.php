<form action="{{!empty($procedimento) ? '/procedimentos/update/'.$procedimento->id : '/procedimentos/insert'}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6 p-2">
            @include('componentes.campoDinamicoComponente', [
                'label_descricao'=>'Pet',
                'id_name'=>'id_pet',
                'required'=>'required',
                'tipo'=>'select',
                'objeto'=>$pets??[],
                'value'=>($pet->id??old('id_pet')??''),
                'campo_valor'=>'id',
                'campo_descricao'=>'nome',
                'class_campo'=>($errors->has('id_pet')?'is-invalid':''),
                'mensagem'=>($errors->has('id_pet')?$errors->first('id_pet'):''),
            ])
        </div>
        <div class="col-md-6 p-2">
            @include('componentes.campoDinamicoComponente', [
                'label_descricao'=>'Descrição',
                'id_name'=>'descricao',
                'required'=>'required',
                'tipo'=>'datalist',
                'objeto'=>$descricao_procedimentos??[],
                'campo_valor'=>'descricao',
                'value'=>($procedimento->descricao??old('descricao')??''),
                'class_campo'=>($errors->has('descricao')?'is-invalid':''),
                'mensagem'=>($errors->has('descricao')?$errors->first('descricao'):''),
            ])
        </div>
        <div class="col-md-4 p-2">
            @include('componentes.campoDinamicoComponente', [
                'label_descricao'=>'Valor',
                'id_name'=>'valor',
                'required'=>'required',
                'tipo'=>'input',
                'type'=>'text',
                'value'=>old('valor')??(!empty($procedimento->valor) ? number_format($procedimento->valor, 2, ',', '.') : ''),
                'class_campo'=>($errors->has('valor')?'is-invalid':''),
                'mensagem'=>($errors->has('valor')?$errors->first('valor'):''),
            ])
        </div>
        <div class="col-md-4 p-2">
            @include('componentes.campoDinamicoComponente', [
                'label_descricao'=>'Data',
                'id_name'=>'data_procedimento',
                'required'=>'required',
                'tipo'=>'input',
                'type'=>'date',
                'value'=>old('data_procedimento')??$procedimento->data_procedimento??'',
                'class_campo'=>($errors->has('data_procedimento')?'is-invalid':''),
                'mensagem'=>($errors->has('data_procedimento')?$errors->first('data_procedimento'):'')
            ])
        </div>
        <div class="col-md-4 p-2">
            @include('componentes.campoDinamicoComponente', [
                'label_descricao'=>'Realizado',
                'id_name'=>'status',
                'required'=>'required',
                'tipo'=>'select',
                'objeto'=>[(object)['id'=>1, 'descricao'=>'Sim'], (object)['id'=>'', 'descricao'=>'Não']],
                'value'=>($procedimento->status??old('status')??''),
                'campo_valor'=>'id',
                'campo_descricao'=>'descricao',
                'class_campo'=>($errors->has('status')?'is-invalid':''),
                'mensagem'=>($errors->has('status')?$errors->first('status'):''),
            ])
        </div>
        <div class="col-md-12 p-2">
            @include('componentes.campoDinamicoComponente', [
                'label_descricao'=>'Observações',
                'id_name'=>'observacoes',
                'required'=>'',
                'tipo'=>'textarea',
                'value'=>($procedimento->observacoes??old('observacoes')??''),
                'class_campo'=>($errors->has('observacoes')?'is-invalid':''),
                'mensagem'=>($errors->has('observacoes')?$errors->first('observacoes'):''),
            ])
        </div>
    </div>
    <div class="row ">
        <div class="col p-2">
            <button type="submit" class="btn btn-success">{{!empty($procedimento)?'Alterar':'Cadastrar'}}</button>
        </div>
    </div>
</form>