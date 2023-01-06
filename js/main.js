 $(document).ready(function() {
	tablaIncidencias = $("#tablaIncidencias").DataTable({
		"columnDefs":[{ 
			"targets": -1,
			"data":null,
			"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnSolucionado'>Solucionado</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"
		}],
		
		"language": {
			"lengthMenu": "Mostrar _MENU_ registros",
			"zeroRecords": "No se encontraron resultados",
			"info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
			"infoFiltered": "(filtrado de un total de _MAX_ registros)",
			"sSearch": "Buscar:",
			"oPaginate": {
				"sFirst": "Primero",
				"sLast": "Ultimo",
				"sNext": "Siguiente",
				"sPrevious": "Anterior"
			},
			"sProcesing": "Procesando...",
		}		
	});

var fila;

$(document).on("click", ".btnBorrar" , function(){
	fila = $(this);
	id = parseInt($(this).closest("tr").find('td:eq(0)').text());
	opcion = 2
	var respuesta = confirm("¿Estas seguro de Eliminar la incidencia:" +id+ "?");
	
	if(respuesta){
		$.ajax({
			url:"php/crud.php",
			type: "POST",
			dataType: "html",
			data: { opcion:opcion, id:id},
			success: function(){
				tablaIncidencias.row(fila.parents('tr')).remove().draw();
			}
		});
	}
	
});

$(document).on("click",".btnSolucionado", function(){
	fila=$(this).closest("tr");
	id = parseInt(fila.find('td:eq(0)').text());
	usuario = fila.find('td:eq(6)').text();
	Comentarios = fila.find('td:eq(5)').text();
	opcion = 3
	
	$("#usuario").val(usuario);
	$("#Comentarios").val(Comentarios);
	
	$(".modal-header").css("background-color","green");
	$(".modal-header").css("color", "white");
	$(".modal-title").text("Solucionar Incidencia");
	$("#modalCRUD2").modal("show");
	$("#formIncidencias2").submit(function(e){
	e.preventDefault();
	vComentarios = $.trim($("#vComentarios").val());
	$.ajax({
		url:"php/crud.php",
		type: "POST",
		dataType: "json",
		data: { id:id,vComentarios:vComentarios, opcion:opcion},
		success: function(data){
			console.log(data);
			tablaIncidencias.row(fila.parents('tr')).remove().draw();
		}
	
	//$("#modalCRUD").modal("hide");	
		
	});
	$("#modalCRUD2").modal("hide");	
	});
});

$("#btnNuevo").click(function(){
	$("#formIncidencias").trigger("reset");
	$(".modal-header").css("background-color","green");
	$(".modal-header").css("color", "white");
	$(".modal-title").text("Nueva Incidencia");
	$("#modalCRUD").modal("show");
	id=null;
	opcion = 1;
});


$("#formIncidencias").submit(function(e){
	e.preventDefault();
	fecha = $.trim($("#fecha").val());
	id_colonia = $.trim($("#id_colonia").val());
	id_calle = $.trim($("#id_calle").val());
	Tipo = $.trim($("#Tipo").val());
	Comentarios = $.trim($("#Comentarios").val());
	usuario = $.trim($("#usuario").val());
	$.ajax({
		url:"php/crud.php",
		type: "POST",
		dataType: "json",
		data: { id:id, fecha:fecha, id_colonia:id_colonia, id_calle:id_calle, Tipo:Tipo, Comentarios:Comentarios,usuario:usuario, opcion:opcion},
		success: function(data){
			console.log(data);
			vid= data[0].id;
			vfecha = data[0].fecha;
			vdatos = data[0].id_colonia;
			vubicacion = data[0].id_calle;
			vtipo = data[0].Tipo;
			vcomentarios = data[0].Comentarios;
			usuario = data[0].usuario;
			if(opcion == 1){tablaIncidencias.row.add([id,fecha,id_colonia,id_calle,Tipo,Comentarios,usuario]).draw();}
			
		}
	
	//$("#modalCRUD").modal("hide");	
		
	});
	$("#modalCRUD").modal("hide");	
});


});

