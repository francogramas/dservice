$(document).ready(function(){
  $( function() {
    $( ".datepicker").datepicker({autoSize: true, dateFormat: "yy-mm-dd", });
  } );
  //--------------------------------------paises
    $("#paises").change(function(event){
  		$.get("departamentos/"+event.target.value+"", function(response,state){
  			$("#departamentos").empty();
  			for (i = 0; i < response.length; i++) {
  				$("#departamentos").append("<option value='" + response[i].id+ "'>" + response[i].name + "</option>")
  			}
  		});
    });
//-----------------------------------------departamentos
     $("#departamentos").change(function(event){
  		$.get("/ciudades/"+event.target.value+"", function(response,state){
        $("#ciudad_id").empty();
  			$("#ciudades_id").empty();
  			for (i = 0; i < response.length; i++) {
          $("#ciudad_id").append("<option value='" + response[i].id+ "'>" + response[i].name + "</option>");
  				$("#ciudades_id").append("<option value='" + response[i].id+ "'>" + response[i].name + "</option>");
  			}
  		});
    });

//-----------------------------------Buscar asesores----------------------------------------
$("#Buscarcontratistas").autocomplete({
      source: "/buscar/contratistas",
      minLength: 1,
      select: function(event, ui) {
        $('#Buscarcontratistas').val(ui.item.value);
        $('#contratistas_id').val(ui.item.id);
      }
   });

    $("#Buscarcontratistas").click(function(){
       $("#Buscarcontratistas").val("");
       $("#contratistas_id").val("0");                 
    });

//-----------------------------------Buscar asesores----------------------------------------
$("#serviciosContratistas").autocomplete({
      source: "/buscar/servicioscontratistas",
      minLength: 1,
      select: function(event, ui) {
        $('#serviciosContratistas').val(ui.item.value);
        $('#servicioscontratistas_id').val(ui.item.id);
      }
   });

    $("#serviciosContratistas").click(function(){
       $("#serviciosContratistas").val("");
       $("#servicioscontratistas_id").val("0");                 
    });

});