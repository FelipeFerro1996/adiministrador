$(document).ready(()=>{
    
})

function abrirModalcadastrarProcedimento(id_pet=null){
    var pet = '';
    if(id_pet != null){
        pet = '/'+id_pet;
    }
    $.ajax({
        url: "/procedimentos/create"+pet, // URL para onde a requisição será enviada
        type: "GET", // Método HTTP usado para enviar a requisição (GET, POST, PUT, DELETE, etc.) // Dados a serem enviados com a requisição
        success: function(response) { // Função a ser executada quando a requisição for bem-sucedida
            // console.log(response);
            $("#conteudoCadastroProcedimento").html(response)
            $("#cadastrarProcedimento").modal('show');
            $('#valor').mask('#,##0.00', {reverse:true})
            $('select.select2').select2()
            // $('.select2').select2();
        },
        error: function(xhr, status, error) { // Função a ser executada quando ocorrer um erro na requisição
            console.log(error);
        }
    });
}

function abrirModalalteracaoProcedimento(id_procedimento=null){
    $.ajax({
        url: "/procedimentos/edit/"+id_procedimento, // URL para onde a requisição será enviada
        type: "GET", // Método HTTP usado para enviar a requisição (GET, POST, PUT, DELETE, etc.) // Dados a serem enviados com a requisição
        success: function(response) { // Função a ser executada quando a requisição for bem-sucedida
            // console.log(response);
            $("#conteudoCadastroProcedimento").html(response)
            $("#cadastrarProcedimento").modal('show');
            $('#valor').mask('#,##0.00', {reverse:true})
            $('.select2').select2();
        },
        error: function(xhr, status, error) { // Função a ser executada quando ocorrer um erro na requisição
            console.log(error);
        }
    });
}

function marcarRealizado(id_procedimento=''){
    if(confirm('Deseja realmente marcar esse procedimento como realizado?')){
        $.ajax({
            url: "/marcarRealizado/"+id_procedimento, // URL para onde a requisição será enviada
            type: "POST", // Método HTTP usado para enviar a requisição (GET, POST, PUT, DELETE, etc.) // Dados a serem enviados com a requisição
            success: function(response) { // Função a ser executada quando a requisição for bem-sucedida
                // console.log(response);
                $("#conteudoCadastroProcedimento").html(response)
                $("#cadastrarProcedimento").modal('show');
                $('#valor').mask('#,##0.00', {reverse:true})
                $('.select2').select2();
            },
            error: function(xhr, status, error) { // Função a ser executada quando ocorrer um erro na requisição
                console.log(error);
            }
        }); 
    }
}