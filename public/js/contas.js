$(document).ready(()=>{
    $("#total_parcela").blur(()=>{
        console.log($("#total_parcela").val())
        if($("#parcelas").val() > 0 && $("#total_parcela").val() != ''){
            qtdParcelas = parseInt($("#parcelas").val());
            totalParcela = parseFloat($("#total_parcela").val());
            total = qtdParcelas * totalParcela;
            $("#total").val(total.toFixed());
        }else{
            $("#total").val('');
        }
    })

    $("#parcelas").blur(()=>{
        console.log($("#total_parcela").val().length)
        if($("#parcelas").val() > 0 && $("#total_parcela").val() != ''){
            qtdParcelas = parseInt($("#parcelas").val());
            totalParcela = parseFloat($("#total_parcela").val());
            total = qtdParcelas * totalParcela;
            $("#total").val(total.toFixed());
        }else{
            $("#total").val('');
        }
    })

    $('#total_parcela').mask('#,##0.00', {reverse:true})
});