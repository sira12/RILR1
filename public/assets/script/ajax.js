function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

//FUNCION QUE MUESTRA PROVINCIAS SELECCIONADAS
function AgregarProvincia(check,contador,num){

	var muestra = document.getElementById('provincia2_'+contador);
  var muestra2 = document.getElementById('pais2_'+contador);

					var elementos = document.getElementsByName("check[]");
					var cont = 0; 
					for (var x=0; x < elementos.length; x++) {
					 if (elementos[x].checked) {
					  cont = cont + 1;
					 }
				}
					 if(cont > 0) {
					texto = []; 
					for (x=0;x<elementos.length;x++){
					if (elementos[x].checked==true) {
					texto.push(elementos[x].value);
				}
		} 
		ajax=objetoAjax();
		ajax.open("GET", "funciones.php?MuestraProvincias=si&check="+texto+"&contador="+contador+"&num="+num);
		ajax.onreadystatechange=function() {
				if (ajax.readyState==1 || ajax.readyState==2 || ajax.readyState==3) {
				muestra.innerHTML = "<center><i class='fa fa-spin fa-spinner'></i> Cargando información, por favor espere....</center>";
			}
			if (ajax.readyState==4) {
				var resul=ajax.responseText
				muestra.innerHTML = resul	                    
        muestra2.innerHTML = ""										
			}
		}
		ajax.send(null);		
					 
           } else {

            swal("Oops", "POR FAVOR DEBE SELECCIONAR AL MENOS UNA PROVINCIA!", "error");
				}
}



//FUNCION QUE MUESTRA PROVINCIAS SELECCIONADAS
function AgregarPais(check2,contador2,num2){

  var muestra = document.getElementById('pais2_'+contador2);
  var muestra2 = document.getElementById('provincia2_'+contador2);

          var elementos = document.getElementsByName("check2[]");
          var cont = 0; 
          for (var x=0; x < elementos.length; x++) {
           if (elementos[x].checked) {
            cont = cont + 1;
           }
        }
           if(cont > 0) {
          texto = []; 
          for (x=0;x<elementos.length;x++){
          if (elementos[x].checked==true) {
          texto.push(elementos[x].value);
        }
    } 
    ajax=objetoAjax();
    ajax.open("GET", "funciones.php?MuestraPaises=si&check2="+texto+"&contador2="+contador2+"&num2="+num2);
    //ajax.open("GET", "funciones.php?BuscaHabitacionesReservadas=si&check="+texto+"&desde="+desde+"&hasta="+hasta+"&tipo="+tipo);
    ajax.onreadystatechange=function() {
        if (ajax.readyState==1 || ajax.readyState==2 || ajax.readyState==3) {
        muestra.innerHTML = "<center><i class='fa fa-spin fa-spinner'></i> Cargando información, por favor espere....</center>";
      }
      if (ajax.readyState==4) {
        var resul=ajax.responseText
        muestra.innerHTML = resul                     
        muestra2.innerHTML = ""
      }
    }
    ajax.send(null);    
           
           } else {

            swal("Oops", "POR FAVOR DEBE SELECCIONAR AL MENOS UN PAIS!", "error");
        }
}