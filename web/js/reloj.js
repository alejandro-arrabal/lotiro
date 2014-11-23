
$(document).ready(function() {

    $(".botonenvio").click(show);
    $('#botoneventos').click(function(){$('#modalevento').modal()});

}) ;

function show(){
    $('#price').val($(this).parent().parent().children('.reloj').data('actualPrice'));
    $('#price').attr('type','hidden');
    $('#howToModal').modal();


}

function calculardiferencia(object){
    fechainicial=object.data('start');
    fechainicial=new Date(fechainicial);
    fechaactual = new Date();
    fechafinal=fechaactual-fechainicial;
    fechafinal=new Date(fechafinal);
    return (fechafinal);
}

function muestraReloj(id) {
    fechaFin=$('#reloj'+id).data('end');
    fechaFin=new Date(fechaFin);
    fecha=fechaFin-new Date();
    fecha=new Date(fecha);
    horas=(fecha.getHours()-1);
    minutos=(fecha.getMinutes());
    segundos=(fecha.getSeconds());
    milisegundos=(fecha.getMilliseconds());

    if (segundos === 0){ segundos=59; minutos--;}
    if (minutos === 0){ minutos=59; horas--;}

    segundos --;
    var string = "";
    string += horas +':'+ minutos + ':'+ segundos;
    if(fecha<=0){
        $("#reloj"+id).html("Oferta Expirada");
        $("#botonenvio"+id).attr("disabled","disabled");
    }
    else{
        $("#reloj"+id).html(string);
    }


}

