<?php 
	print('
	
		<script type="text/javascript">
		$(document).ready(function(){
		    $(".modal").modal();
	  	});
		</script>
		<script type="text/javascript">
		// Solo permite ingresar numeros.
		function soloNumeros(e){
			var key = window.Event ?  e.which : e.keyCode
			return (key >= 48 && key <= 57)
		}
		</script>			 
		<script>
		    let spinnerWrapper = document.querySelector(".spinner-wrapper");

		    window.addEventListener("load", function () {
		         spinnerWrapper.style.display = "none";
		        spinnerWrapper.parentElement.removeChild(spinnerWrapper);
		    });
		</script>

		


		<script>
			function Habilitar() {
				var campo1 = document.getElementById("pass2");
				var campo2 = document.getElementById("inputPass");
				var boton = document.getElementById("boton");
				if (campo1.value != campo2.value) {
					boton.disabled=true;
				}else{
					boton.disabled=false;
				}
			}
		</script>
		
		
  		<script src="./public/js/form.js"></script>			
		
		

			
	</body>
	</html>
	');
