			$(document).ready(function(){
				$("#cbx_tiponovedad").change(function () {

					$("#cbx_suceso").find("option").remove().end().append("<option value=`whatever`></option>").val(`whatever`);

					$("#cbx_tiponovedad option:selected").each(function () {
						tiponovedad_id = $(this).val();
						$.post("/includes/getTiposuceso.php", { tiponovedad_id: tiponovedad_id }, function(data){
							$("#cbx_tiposuceso").html(data);
						});            
					});
				})
			});
			
			$(document).ready(function(){
				$("#cbx_tiposuceso").change(function () {
					$("#cbx_tiposuceso option:selected").each(function () {
						tiposuceso_id = $(this).val();
						$.post("/includes/getSuceso.php", { tiposuceso_id: tiposuceso_id }, function(data){
							$("#cbx_suceso").html(data);
						});            
					});
				})
			});
		