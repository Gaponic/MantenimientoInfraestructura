<?php
$home = '
    <div class="container">
    <div class="spinner-wrapper">
    <div class="spinner"></div>
    </div>
        <div class="row">
        <center class="center">
					<h1 class="black-text text-black" > MANTENIMIENTO </h1>
				</center>
        <br>
        <br>';
       // if ($_SESSION['usuario'] == 'Admin') {
           // $home .='<div class="col l2 offset-l1  m6 s6">     
            //  <div class="card small" style="height: 110px; border-radius: 10px;">     
            //    <div class="card-content blue center">
             //    <label for="" style="color:#FFFFFF; font-size: 17px;"><i class="material-icons left prefix hide-on-med-and-down" style="color:#FFFFFF;">view_compact</i>Modulo</label>
             //     <h4 class="center"></h4>
             //   </div>
              //  <div class="card-action">
              //    <a href="fichatecnica" title="" class="right blue-text"><span>Equipos</span></a>
              //  </div>
             // </div>
           // </div>'; 
         // }

            $home .='<div class="col m3">
            <div class="card"> 
              <div class="card-image">
                <img src="./Public/img/Matricula.png" class="responsive-img">
                <a href="notificacion_eventos" class=" btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
              </div>
              <div class="card-content  orange darken-1">
                <span class="card-title" style="color:#FFFFFF; font-size: 30px;">Notificar un evento</span>
                <p style="color:#FFFFFF; font-size: 17px;">Registra una novedad insegura que se encuentre en las instalaciones del SENA CIDT.</p>
              </div>
            </div>
          </div>';
         



          if ($_SESSION['usuario'] == 'User') {
            $home .='<div class="col l2 offset-l2  m6 s6">     
              <div class="card small" style="height: 110px; border-radius: 10px;">     
                <div class="card-content blue center">
                 <label for="" style="color:#FFFFFF; font-size: 17px;"><i class="material-icons left prefix hide-on-med-and-down" style="color:#FFFFFF;">view_compact</i>Modulo</label>
                  <h4 class="center"></h4>
                </div>
                <div class="card-action">
                  <a href="fichatecnica" title="" class="right blue-text"><span>Equipos</span></a>
                </div>
              </div>
            </div>'; 
          }

        if ($_SESSION['usuario'] == 'Admin') {
          $home .='<div class="col m3">
            <div class="card"> 
              <div class="card-image">
                <img src="./Public/img/Usuarios.jpg" class="responsive-img">
                <a href="usuarios" class=" btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
              </div>
              <div class="card-content  orange darken-1">
                <span class="card-title" style="color:#FFFFFF; font-size: 30px;">Usuarios</span>
                <p style="color:#FFFFFF; font-size: 17px;">Gestiona todos los usuarios registrados en el software de mantenimiento</p>
              </div>
            </div>
          </div>';
        }

          if ($_SESSION['usuario'] == 'Admin') {
            $home .='<div class="col l2  m6 s6  hide-on-med-and-down">
              <div class="card small" style="height: 110px; border-radius: 10px;">   
              <div class="card-content red center">
               <label for="" style="color:#FFFFFF; font-size: 17px;"><i class="material-icons left prefix hide-on-med-and-down" style="color:#FFFFFF;">view_stream</i>Modulo</label>
                <h4 class="center"></h4>
              </div>
              <div class="card-action">
                <a href="ordentrabajo-add" class="right red-text"><span>G. Reporte</span></a>
              </div>
             </div>
            </div>';
          } 
          $home .='<div class="col l2  m6 s6 ">
            <div class="card small" style="height: 110px; border-radius: 10px;">       
              <div class="card-content purple center">
               <label for="" style="color:#FFFFFF; font-size: 17px;"><i class="material-icons left prefix hide-on-med-and-down" style="color:#FFFFFF;">view_quilt</i>Modulo</label>
                <h4 class="center"></h4>
              </div>
              <div class="card-action">
                <a href="historial" title="" class="right purple-text"><span>H. Equipos</span></a>
              </div>
             </div>
          </div>
          <div class="col l2  m6 s6 ">
            <div class="card small" style="height: 110px; border-radius: 10px;">       
              <div class="card-content orange center">
               <label for="" style="color:#FFFFFF; font-size: 17px;"><i class="material-icons left prefix hide-on-med-and-down" style="color:#FFFFFF;">view_quilt</i>Modulo</label>
                <h4 class="center"></h4>
              </div>
              <div class="card-action">
                <a href="tipoaire" title="" class="right orange-text"><span>Tipo Aire</span></a>
              </div>
             </div>
          </div>
          </div>
        </div>

            



';
print($home);
?>