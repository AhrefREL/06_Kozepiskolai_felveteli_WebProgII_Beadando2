function kepzesek(){
    $.post(
        "models/felveteliAjax_model.php",
        {"op" : "get_kepzes"},
        function(data) {            
            $("<option>").val("0").text("Válasszon...").appendTo("#kepzesek");
            $("<option>").val("0").text("Válasszon...").appendTo("#miniumumPontKepzesek");
            var lista = data.lista;
            for(i=0; i<lista.length; i++)  {              
                $("<option>").val(lista[i].id).text(lista[i].nev).appendTo("#kepzesek");
                $("<option>").val(lista[i].id).text(lista[i].nev).appendTo("#miniumumPontKepzesek");
            }
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


let myChart = null;

function get_MinimumPontalRendelkezoJelentkezok(){
    $("#return_jelentkezokMinimumPonttalRendelkezok").html("");
    var kepzesid = $("#miniumumPontKepzesek").val();
    
    $.post(
        "models/felveteliAjax_model.php",
        {"op" : "get_MinimumPontalRendelkezoJelentkezok", "kepzesid": kepzesid},
        function(data) {
            $('<tr id="table_jelentkezok2">').appendTo("#return_jelentkezokMinimumPonttalRendelkezok");
            $("<th>").text("Sorszám").appendTo("#table_jelentkezok2");
            $("<th>").text("Név").appendTo("#table_jelentkezok2");
            $("<th>").text("Nem").appendTo("#table_jelentkezok2");
            $("<th>").text("Jelentkezési Sorrend").appendTo("#table_jelentkezok2");
            $("<th>").text("Szerzett Pontszám").appendTo("#table_jelentkezok2");
            var lista = data.lista;
            //console.log(lista);
            var chartData = [0,0,0,0,0];
            for(i=0; i<lista.length; i++)  {
                
                chartData[lista[i].sorrend-1] += 1;
                
                $('<tr>').attr('id', 'jelentkezoMinPont_'+i).appendTo("#return_jelentkezokMinimumPonttalRendelkezok");
                $("<td>").text(i+1).appendTo("#jelentkezoMinPont_"+i);
                $("<td>").text(lista[i].nev).appendTo("#jelentkezoMinPont_"+i);
                $("<td>").text(lista[i].nem).appendTo("#jelentkezoMinPont_"+i);
                $("<td>").text(lista[i].sorrend).appendTo("#jelentkezoMinPont_"+i);
                $("<td>").text(lista[i].szerzett).appendTo("#jelentkezoMinPont_"+i);
            }
           // console.log(chartData);
            
            // start chart
            const config = {
                type: 'bar',

                data:  {
                    labels: [1,2,3,4,5],
                    datasets: [{
                        label: 'Minimumponttal rendelkező jelentkezők száma '+$("#miniumumPontKepzesek option:selected" ).text()+' képzés szerint',
                        data: chartData,
                        backgroundColor: [
                        'rgba(34, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                        ],
                        borderColor: [
                        'rgb(34, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)'
                        ],
                        borderWidth: 1
                    }]
                },
               
                
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                },


              };
              if(myChart){
                myChart.destroy();
              }
              const ctx = document.getElementById('myChart').getContext('2d');               
              myChart = new Chart(ctx, config);
              


            //end chart    


          
        },
        "json"
    );
}



$(document).ready(function() {
    kepzesek();
    $("#kepzesek").change(sorrendErtekek);
    $("#sorrend").change(jelentkezokLekereseKepzesEsSorrend);
    $("#miniumumPontKepzesek").change(get_MinimumPontalRendelkezoJelentkezok);
    
 });


