/*Author: Ing. Ruben D. Chirinos R. Tlf: +58 0416-3422924, email: elsaiya@gmail.com*/

/*tipos de graficos
    bar
    horizontalBar
    line
    radar
    polarArea
    pie
    doughnut
    bubble
 Con pointRadius podrás establecer el radio del punto.

fill: false, –> no aparecerá relleno por debajo de la línea.

showLine: false, –> no aparecerá la línea.

Es decir, si ponemos fill y showLine a false, tendremos un gráfico de puntos, en lugar de un gráfico
de líneas. pointStyle: ‘circle’, ‘triangle’, ‘rect’, ‘rectRounded’, ‘rectRot’, ‘cross’, ‘crossRot’, ‘star’,
‘line’, and ‘dash’ Podría ser incluso una imagen.

spanGaps está por defecto a false. Si lo ponemos a true, cuando te falte un valor en la línea, no se 
romperá la línea.*/

/* GRAFICO PARA VENTAS POR SUCURSALES ANUAL*/
function showGraphDoughnut()
    {
        {
            $.post("data.php?ProcesosxSucursales=si",
            function (data)
            {
                console.log(data);
                var id = [];
                var name = [];
                var bitacora = [];
                var myColors=[];

                for (var i in data) {
                    id.push(data[i].codoficina);
                    name.push(data[i].nomoficina);
                    bitacora.push(data[i].totalbitacora);
                }

                $.each(id, function( index,num ) {
                    if (num == 1)
                            myColors[index]= "#f0ad4e";
                    if (num == 2)
                            myColors[index]= "#ff7676";
                    if (num == 3)
                            myColors[index]= "#E0E4CC";
                    if (num == 4)
                            myColors[index]= "#3e95cd";
                    if (num == 5)
                            myColors[index]= "#969788";
                    if (num == 6)
                            myColors[index]= "#987DDB";
                    if (num == 7)
                            myColors[index]= "#169696"; 
                    if (num == 8)
                            myColors[index]= "#69D2E7";   
                    if (num == 9)
                            myColors[index]= "#F38630";   
                    if (num == 10)
                            myColors[index]= "#F82330";  
                    if (num == 11)
                            myColors[index]= "#D3E37D";  
                    if (num == 12)
                            myColors[index]= "#00FFFF";  
                    if (num == 13)
                            myColors[index]= "#fff933";  
                    if (num == 14)
                            myColors[index]= "#90ff33";  
                    if (num == 15)
                            myColors[index]= "#E8AC9E"; 
                    if (num == 16)
                            myColors[index]= "#008000"; 
                    if (num == 17)
                            myColors[index]= "#8633ff"; 
                    if (num == 18)
                            myColors[index]= "#003399"; 
                    if (num == 19)
                            myColors[index]= "#008080"; 
                    if (num == 20)
                            myColors[index]= "#8EE1BC"; 
                    if (num == 21)
                            myColors[index]= "#25AECD";
                });

            var chartdata = {
                labels: name,
                datasets: [
                {
                    label: "Total de Acciones",    
                    backgroundColor: myColors,
                    borderWidth: 1,
                    data: bitacora
                }
                    ]
            };

            //var graphTarget = $("#barChart");
            var graphTarget = $("#DoughnutChart");
            //var steps = 3;

            var barGraph = new Chart(graphTarget, {
                type: 'doughnut',
                data: chartdata,
                responsive : true,
                animation: true,
                barValueSpacing : 2,
                barDatasetSpacing : 1,
                tooltipFillColor: "rgba(0,0,0,0.8)",
                multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>" 
            });
        });
    }
}