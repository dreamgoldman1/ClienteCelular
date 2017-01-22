$(document).ready(function () {
    $('#boton-llamar').click(function () {
        var no_celular;
        no_celular = $("#no_celular_origen").val();
        $.ajax({
            dataType: "json",
            url: "http://52.24.48.238/api/consulta-saldo-disponible/"+no_celular,
        }).done(function (data) {
            console.log(data);
            var valorLlamada;
            valorLlamada = data.costo.valor_segundo * $("#tiempo").val();
            console.log(valorLlamada);
            console.log(data.saldo.saldo);
            if (data.saldo.saldo > valorLlamada){
                $('form').submit();
            }else{
                alert('Su saldo disponible no alcanza para realizar esta llamada. \r\n Intente con una llamada más corta o realice una recarga.' );
            }
        });
    });
});
