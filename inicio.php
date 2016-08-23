<?php @session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	  <head> 
      <title>PLATAFORMA -HOGARES -BENEFICIARIOS</title>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
           <link rel="icon" type="image/png" href="imagenes/hombre.png" />    
           <link type="text/css" rel="stylesheet" href="css/materialize.min.css" />
            <link rel="stylesheet" type="text/css" href="css/edicion.css">
            <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="css/edicion.css">
              <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
            <script type="text/javascript" src="js/materialize.min.js"></script>
          <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
            <script src="js/jquery.ui.shake.js"></script>    
            <script type="text/javascript" src="js/configuracion.js"></script> 
            <script type="text/javascript">
                     $(document).ready(function(){
                     $('.modal-trigger').leanModal();                
                     $('.dropdown-button').dropdown(); 
                     $('.button-collapse').sideNav();
                     $('a').on("click", function(){
	                       var url_ins=$(this).attr('data'); 
	                     if(url_ins!='undefined'){
	                   		$(".calendar").load(url_ins);
	                         	}else{return false;}
	                        });

                      }); 
            </script>
                   
    </head>             
<body> 
     
      <!--  ////////////MODAL ./Modulos/admon/Perfil/perfil.php-->  
            <div class="row">
                 <div class="modal modal-fixed-footer" id="sesion">
                              <?php
	                              if(!empty($_SESSION['login_user']))
	                              { echo " <div class='col s6 m12 card '>
	                                      <iframe name='frame12' id='botonera' src='' style=' display:inline-block' marginwidth='0' marginheight='0' scrolling='no' border='0'  frameborder='0' width='100%' height='270px'> </iframe></div>";                            

	                              }else{
	                                ?> <div id="box" style="width:50%; margin: 0 auto; padding: 10px 10px 10px 10px; ">
                                    <form action="" method="post">
                                        <div><label>Usuario:</label> 
                                        <input type="text" name="username" class="input" autocomplete="off" id="username"/>
                                         <label>Contraseña: </label>
                                        <input type="password" name="password" class="input" autocomplete="off" id="password"/></div>
                                        <input type="submit"  class="waves-effect btn secondary-content" value="Entrar" id="login"/> 
                                         <span class='msg'></span> 
                                        <div id="error"></div>
                                     </form>
                                   </div>
                             <?php 
                                }
                              ?>
                                <div class="modal-footer">
                      <a href="#" id="act_usuario" class="modal-action modal-close waves-effect waves-green btn-flat ">
                         <i class="large material-icons right">close</i></a>
                    </div>
                </div>  
            </div>

 
            <div class="navbar cabecera" >  
                  <div class="row">
		                 <div class="col s12 m4">
		                      <div class="icon-block">          
		                            <a href="inicio.php" title="Ir al Inicio">
		                            <img src="image/logo.png" class="responsive-img"  width='330' height='170'/>
		                            </a>
		                      </div>
		                 </div>
		                 <div class="col s12 m4">
		                     <div class="icon-block">           
		                          <h3 class="center color_azul efecto3d">PROGRAMA ANDA</h3>
		                          <h5 align="center" class="color_verde"> Registro de Beneficiarios.</h5>          
		                     </div>
		                  </div>
		                  <div class="col s12 m4">
		         	          <div class="icon-block">
		                         <a class="modal-trigger right brand-logo color_azul" href="#sesion">
		                              <br /> <img src="image/hombre.png" width="82px" height="82px" /> 
		                              <br /> <?php
		                                        if(!empty($_SESSION['login_user']))
		                                         {  $_SESSION['fecha'];
		                                            echo  $_SESSION['login_user'];    
		                                         }else{echo "Invitado";}                                 
		                                       ?><br /> 
		                         </a>
		                       </div>
		                  </div>
		           </div>  

					<?php
							function menuu() {
									 			echo '<li> <a id="crono" target="_self" href="crono.php">Cronograma</a></li>';
									 			echo '<li class="orange">
									 			<a href="logout.php"><i class="material-icons ">power_settings_new</i></a></li>';
										              if((@$_SESSION['opera'])==2 or (@$_SESSION['opera'])==1 and ($_SESSION['perfil']==0))
										                {  echo '<li><a href="#"">1</a>';
										                   echo '<li><a href="#" data="">2</a></li>';
										                   echo '<li><a id="s" data="">3</a></li>';
										                   echo '<li><a id="persona1"  data="" >4</a></li>';
										                   echo '<li><a id="sin_activ" data=".\Usuarios\admin_usuarios.php" href="#"">Cargar</a></li>';
										                } 
									             
											}
					 ?>     

					 	
           </div> 
             <nav class="nav-wrapper orange">
                             <a href="#" data-activates="mobile-demo" class="button-collapse">
                                <i class="material-icons">menu</i>
                             </a> 
                             <ul class="right hide-on-med-and-down">
                                     <?php menuu();  ?>
                             </ul>
                        <!--movil -->
                             <ul class="side-nav" id="mobile-demo">
                                    <?php menuu();  ?> 
                           </ul>
              </nav>


          <!-- ///////////MODAL -->
     
    
  

        <div id="contenid" class="calendar" >
       </div>




  <footer class="page-footer teal ">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">PROGRAMA ANDA - Plataforma - Beneficiarios Directos- M&E</h5>
           <p class="grey-text text-lighten-4">Esta plataforma fue diseñada para el registro de los beneficiario y otros componentes para el manejo de la informacion que llega M&E.</p>
          <p class="grey-text text-lighten-4">Software desarrollado para la programación de actividades en campo, del Programa ANDA. Esta herramienta fue diseñada por el Equipo de M&E, para el programa ANDA, Bajo la supervisión de todas las Coordinaciones y la Gerencia. El Cual se integro a la plataforma de M&E.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text ">Equipo M&E</h5>
          <ul>
            
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text"></h5>
          <ul>
           
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Diseñado por  <a class="brown-text text-lighten-3" href="#">Ing. M&E Jorge L Romero Fonseca</a>
      Correo: <a class="brown-text text-lighten-3" href="mailto:jromero@globalcommunities.org.co">jromero@globalcommunities.org.co</a>
      </div>
    </div>
  </footer>


</body>
</html>