$(document).ready(function () {
    $('#boton-llamar').click(function () {
        $.ajax({
            dataType: "json",
            url: "http://operadorcelular.dev/app_dev.php/api/consulta-saldo-disponible/3015192617",
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
