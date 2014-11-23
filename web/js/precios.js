for(var i=0;i<$('.reloj').length;i++){
    updatePrice($('.reloj')[i]);
}
function calculatePrice(object){
    var price=object.data('price');
    var interval=new Date((object).data('interval'));
    var discount=object.data('discount');
    var diferencia=calculardiferencia(object);
    var format= interval.getHours()!=0? 'hours':'minutes';
    if(format=='hours'){
        var num_int=Math.floor((diferencia.getHours())/interval.getHours())-1;
        var currentPrice=price-(discount*num_int);
        object.data('actualPrice',currentPrice);
    }
    else{
        var num_int=Math.floor(diferencia.getMinutes()/interval.getMinutes());
        num_int+=Math.floor(((diferencia.getHours()*60)-1)/interval.getMinutes());
        var currentPrice=price-(discount*num_int);
        object.data('actualPrice',currentPrice);
    }
    return currentPrice;
}

function updatePrice(object){
    object=$(object);
    setInterval(function(){
        var currentPrice=calculatePrice(this);
        if((this.data('pricemin')+0)>=currentPrice){
            this.parent().children('.currentPrice').html('Precio actual '+this.data('pricemin')+'€');
        }
        else{
            this.parent().children('.currentPrice').html('Precio actual '+currentPrice+'€');
        }
    }.bind(object),new Date(object.data('interval')).getMilliseconds())
};
