//FUNCION PARA AGREGAR Y ELIMINAR CAMPOS DINAMICAMENTE

    var cont=1;
    
    //FUNCION AGREGA TAREA
    function AddTarea()  //Esta la funcion que agrega las filas segunda parte :
    {
    cont++;
    //autocompletar
    var indiceFila=1;
    myNewRow = document.getElementById('tabla').insertRow(-1);
    myNewRow.id=indiceFila;
    myNewCell=myNewRow.insertCell(-1);
    myNewCell.innerHTML='<div class="col-md-12"><div class="form-group has-feedback"><label class="control-label">Nombre de Tarea: <span class="symbol required"></span></label><input type="text" class="form-control" name="nomtarea[]'+cont+'" id="nomtarea'+cont+'" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Nombre de Tarea" title="Ingrese Nombre de Tarea" autocomplete="off" required="" aria-required="true"><i class="fa fa-pencil form-control-feedback"></i></div></div>';
    indiceFila++;
    }

    //FUNCION BORRAR TAREA
    function BorrarTarea() {
        var table = document.getElementById('tabla');
        if(table.rows.length > 1)
        {
            table.deleteRow(table.rows.length -1);
            cont--;
        }
    }
    
    //FUNCION AGREGA ACCION
    function AddAccion()  //Esta la funcion que agrega las filas segunda parte :
    {
    cont++;
    //autocompletar
    var indiceFila=1;
    myNewRow = document.getElementById('tabla').insertRow(-1);
    myNewRow.id=indiceFila;
    myNewCell=myNewRow.insertCell(-1);
    myNewCell.innerHTML='<div class="col-md-12"><div class="form-group has-feedback"><label class="control-label">Nombre de Acción: <span class="symbol required"></span></label><input type="text" class="form-control" name="nomaccion[]'+cont+'" id="nomaccion'+cont+'" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Nombre de Acción" title="Ingrese Nombre de Acción" autocomplete="off" required="" aria-required="true"><i class="fa fa-pencil form-control-feedback"></i></div></div>';
    indiceFila++;
    }

    //FUNCION BORRAR ACCION
    function BorrarAccion() {
        var table = document.getElementById('tabla');
        if(table.rows.length > 1)
        {
            table.deleteRow(table.rows.length -1);
            cont--;
        }
    }


    ////////////FUNCION ASIGNA VALOR DE CONT PARA EL FOR DE MOSTRAR DATOS MP-MOD-TT////////
    function asigna()
    {
        valor=document.form.var_cont.value=cont;
    }