<form action="{{!empty($procedimento) ? '/procedimentos/update/'.$procedimento->id : '/procedimentos/insert'}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-4 p-2">
            <label for="" class="form-label">Pet</label>
            <select name="id_pet" id="id_pet" {{!empty($pet->id)?'disabled':''}} class="select2 form-select" required>
                <option value="">Selecione</option>
                @foreach($pets as &$p)
                    <option value="{{$p->id}}" {{$p->id == ($pet->id??'') ? 'selected readonly' : '' }}>{{$p->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-8 p-2">
            <label for="" class="form-label">Descrição</label>
            <input type="text" class="form-control" name="descricao" id="descricao" required value="{{old('descricao')??$procedimento->descricao??''}}">
        </div>
        <div class="col-md-4 p-2">
            <label for="" class="form-label">Valor</label>
            <input type="text" class="form-control" required name="valor" id="valor" value="{{old('valor')??(!empty($procedimento->valor) ? number_format($procedimento->valor, 2, ',', '.') : '')}}">
        </div>
        <div class="col-md-4 p-2">
            <label for="" class="form-label">Data Procedimento</label>
            <input type="date" name="data_procedimento" required class="form-control" id="data_procedimento" value="{{old('data_procedimento')??$procedimento->data_procedimento??''}}">
        </div>
        <div class="col-md-4 p-2">
            <label for="" class="form-label">&nbsp;</label>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="status" {{(old('ststus') == 1 || ($procedimento->status??'') == 1) ? 'checked' : ''}}>
                <label class="form-check-label" for="flexSwitchCheckDefault">Realizado</label>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col p-2">
            <button type="submit" class="btn btn-success">{{!empty($procedimento)?'Alterar':'Cadastrar'}}</button>
        </div>
    </div>
</form>