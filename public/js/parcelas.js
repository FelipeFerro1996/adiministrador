$(document).ready(()=>{
    $("#buscarParcelasMes").click(()=>{
        mes = $("#mesParcelas").val();
        buscarParcelaMes(mes)
    })

    $('.valor').mask('###0.00', {reverse:true})

    $("#tipo_conta").change(()=>{
        
        buscarTipoCadastro($("#tipo_conta").val())
        
    })
    $(".select2").select2()
    $("#buscarParcelasMes").trigger('click')
})

function buscarParcelaMes(mes){
    $.ajax({
        url: "/parcelas/"+mes, // URL para onde a requisição será enviada
        type: "GET", // Método HTTP usado para enviar a requisição (GET, POST, PUT, DELETE, etc.) // Dados a serem enviados com a requisição
        success: function(response) { // Função a ser executada quando a requisição for bem-sucedida
            // console.log(response);
            $("#conteudoParcelas").html(response)
        },
        error: function(xhr, status, error) { // Função a ser executada quando ocorrer um erro na requisição
            console.log(error);
        }
    });
}

function buscarTipoCadastro(tipo){
    if(tipo == ''){
        $("#divTipoCadastroParcela").html('')
    }
    $.ajax({
        url: "/parcelas/tipoCadastro/"+tipo, // URL para onde a requisição será enviada
        dataType:'HTML',
        type: "GET", // Método HTTP usado para enviar a requisição (GET, POST, PUT, DELETE, etc.) // Dados a serem enviados com a requisição
        success: function(response) { // Função a ser executada quando a requisição for bem-sucedida
            console.log(response);
            $("#divTipoCadastroParcela").html(response)
            $(".select2").select2()
            $('.valor').mask('#,##0.00', {reverse:true})
        },
        error: function(xhr, status, error) { // Função a ser executada quando ocorrer um erro na requisição
            console.log(error);
        }
    });
}