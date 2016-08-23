<?php require_once("../../../config.php");
			@session_start(); 
         if((@$_SESSION['opera'])==2 or (@$_SESSION['opera'])==1)  {  
 ?>
<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
     
       <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="../configuracion/css/jquery-ui.css"> 
		<script src="../configuracion/js/jquery-1.7.min.js"></script>
        <script src="../configuracion/js/funciones.usuarios.js"></script>
        <script src="../configuracion/js/jquery-ui.min.1.10.3.js"></script>
		<link type="text/css" rel="stylesheet" href="../configuracion/css/materialize.min.css" media="screen,projection"/>
 		<link type="text/css" rel="stylesheet" href="../configuracion/css/custom.css" />
		<script type="text/javascript" src="../configuracion/js/materialize.min.js"></script>

 </head>
 <script language="javascript" type="text/javascript">
					$(document).ready(function(){ var txt1,txt2;
						$("#ced").focusout(
							function(e) {txt1=$(this).val();busqueda1();					        
					    });
					    $("#us").focusout(
							function(e) { txt2=$(this).val();busqueda1();					        
					    });
					   	function busqueda1(){
											$.ajax({
													type: 'POST',
													url: '../../admon/Usuarios/usuarios_op.php',
													data:'ced=' + txt1+'&usua=' + txt2+'&accion=encontro',
													success: function(data){
														if(data == 1){ 
															$('#res').append("<b class='card-panel green lighten-4'>Este Usuario, Esta Registrado.</b>");
																			setTimeout(function() {	 $('#res').fadeOut(1500); },3000);
																		}
													
															}
													});
													}
					});
</script>
 <body>	
<div align="center" style="margin-top:30px;"> 
		<div id="b1" class="waves-effect waves-light btn"><img src='../configuracion/img/seleccion.png' width='21' height='21' />Crear-Usuarios</div>
</div>
<div id="dialogo" class="" title="Registro de Usuarios">
	  <table>
            <tr>
              
              <td>
			              <label>Cedula: </label>
			              <br>
			              <input id="ced" name="cedu" size="20" type="text" class="input" value="" />
			 </td>
            </tr>
            <tr>              
              <td>
			              <label>Nombre:</label>
			              <br>
			              <input id="nomb" type="text" value="" class="input"  />
			  </td>
            </tr>
            <tr>
               	<td>
			               	<label>Usuario: </label>
			               	<br>
			               	<input id="us" name="usuario" type="text" class="input" value="" />
               	</td>
       	    </tr>
            <tr>
				<td>
							<label>Contraseña:</label>
							<br>
							<input id="password" type="password" class="input" value=""></label>
				</td>
		    </tr>
            <tr>
	               <td > 
					              <label>Operadaor:</label>
					              <br> 
					              <select name='oper'  id='operador'>
					                                      <option value="0">Seleccione una Poblacion</option>
					                                      <?php 	$query_eventos=$db->query("SELECT * FROM operador ORDER BY nombre_op ASC");
															while ($eventos=$query_eventos->fetch_array())
					 											{ echo "<option value='".$eventos[0]."'>".utf8_encode($eventos[1])."</option>"; 
																 }
														?>
					              </select>
	              </td>            
            </tr>
            <tr>  
                <td> <label>Perfil:</label><br><select  id='cargo' name='carg' >
                                      <option value="0">Seleccione una Poblacion</option>
                                      <?php 	$query_eventos=$db->query("SELECT * FROM cargo order by nombre asc ");
										while ($eventos=$query_eventos->fetch_array())
 											{ 
												 echo "<option value='".$eventos[0]."'>".utf8_encode($eventos[1])."</option>"; 
											 }
									?>
                                  </select></td>                   
		    </tr>           
       </table>
         <table id="forma" width="auto">	
			<tr>
				<td colspan="2" align="center">
                <div id="botones">
                <a  id="boton" class="btn-floating btn-large waves-effect waves-light red"><i class="mdi-content-archive">N</i></a> 
                </div>
                <div id="botones">
				<a  id="edita"  class="btn-floating btn-large waves-effect waves-light red"><i class="mdi-content-add">E</i></a>
                </div>              
                
                </td>
			</tr>
		</table> 
	<span id="res" ></span>  
</div>
    <span>	
			<div id="content">
            <?php
			require_once("consulta_usuarios.php");
                ?>
			</div>
    </span> 
</body>

<?php } ?>