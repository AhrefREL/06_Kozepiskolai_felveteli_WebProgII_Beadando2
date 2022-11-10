function kepzesek(){
    $.post(
        "models/felveteliAjax_model.php",
        {"op" : "get_kepzes"},
        function(data) {            
            $("<option>").val("0").text("Válasszon...").appendTo("#kepzesek");
            var lista = data.lista;
            for(i=0; i<lista.length; i++)                
                $("<option>").val(lista[i].id).text(lista[i].nev).appendTo("#kepzesek");
        },
        "json"                                                    
    );
}

function sorrendErtekek(){
    $("#sorrend").html("");
    var kepzesid = $("#kepzesek").val();
    $.post(
        "models/felveteliAjax_model.php",
        {"op" : "get_sorrend", "kepzesid": kepzesid },
        function(data) {
            $("<option>").val("0").text("Válasszon...").appendTo("#sorrend");
            var lista = data.lista;
            for(i=0; i<lista.length; i++)                
                $("<option>").val(lista[i].sorrend).text(lista[i].sorrend).appendTo("#sorrend");
        },
        "json"

    );
}

function jelentkezokLekereseKepzesEsSorrend(){
    $("#return_jelentkezok").html("");
    var kepzesid = $("#kepzesek").val();
    var sorrend = $("#sorrend").val();
    $.post(
        "models/felveteliAjax_model.php",
        {"op" : "get_jelentkezok", "kepzesid": kepzesid, "sorrend": sorrend },
        function(data) {
            $('<tr id="table_jelentkezok">').appendTo("#return_jelentkezok");
            $("<th>").text("Sorszám").appendTo("#table_jelentkezok");
            $("<th>").text("Név").appendTo("#table_jelentkezok");
            $("<th>").text("Nem").appendTo("#table_jelentkezok");
            var lista = data.lista;
            console.log(lista);
            for(i=0; i<lista.length; i++)  {
               
                $('<tr>').attr('id', 'jelentkezo_'+i).appendTo("#return_jelentkezok");
                $("<td>").text(i+1).appendTo("#jelentkezo_"+i);
                $("<td>").text(lista[i].nev).appendTo("#jelentkezo_"+i);
                $("<td>").text(lista[i].nem).appendTo("#jelentkezo_"+i);
            }
          
        },
        "json"
    );
}



$(document).ready(function() {
    kepzesek();
    $("#kepzesek").change(sorrendErtekek);
    $("#sorrend").change(jelentkezokLekereseKepzesEsSorrend);
    
 });


