<form action="{{!empty($pet)? '/pets/update/'.$pet->id : '/pets/cadastrar' }}" class="text-white" method="POST">
    @csrf
    @if(!empty($pet->id))
        @method('PUT')
    @endif
    <div class="row">
        <div class="p-2 col-md-5">
            <label for="" class="form-label m-0">Espécie</label>
            <select name="especie" id="especie" class="form-control select2 {{$errors->has('especie')?'is-invalid':''}}">
                <option value="">Selecione</option>
                @foreach($especies as &$especie)
                    <option value="{{$especie->id}}" {{(($pet->especie_id??'') == $especie->id || old('especie') == $especie->id) ? 'selected' : ''}}>{{$especie->descricao}}</option>
                @endforeach
            </select>
            @error('especie')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="p-2 col-md-7">
            <label for="" class="form-label m-0">Nome</label>
            <input type="text" class="form-control  {{$errors->has('nome')?'is-invalid':''}}" name="nome" id="nome" value="{{old('nome')??$pet->nome??''}}">
            @error('nome')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="p-2 col-md-4">
            <label for="sexo" class="form-label m-0">Sexo</label>
            <select name="sexo" id="sexo" class="select2 form-control {{$errors->has('nome')?'is-invalid':''}}">
                <option value="">Selecione</option>
                <option value="1" {{($pet->sexo??'') == 1 ? 'selected' : ''}}>Macho</option>
                <option value="2" {{($pet->sexo??'') == 2 ? 'selected' : ''}}>Fêmea</option>
            </select>
            @error('sexo')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="p-2 col-md-4">
            <label for="raca" class="form-label m-0">Raça</label>
            <input type="text" class="form-control  {{$errors->has('raca')?'is-invalid':''}}" name="raca" id="raca" value="{{old('raca')??$pet->raca??''}}">
            @error('raca')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="p-2 col-md-4">
            <label for="data_nascimento" class="form-label m-0">Data Nascimento</label>
            <input type="date" class="form-control  {{$errors->has('data_nascimento')?'is-invalid':''}}" name="data_nascimento" id="data_nascimento" value="{{old('data_nascimento')??$pet->data_nascimento??''}}">
            @error('data_nascimento')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="p-2 col">
            <button type="submit" class="btn btn-success">{{!empty($pet)?'Alterar':'Cadastrar'}}</button>
        </div>
    </div>
</form>