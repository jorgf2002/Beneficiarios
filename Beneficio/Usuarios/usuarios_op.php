<?php
 session_start();
require_once("../config.php");

if($_POST){
   	 						$tipo_dni=$_POST['tipo_dni'];
                           $num_dni=$_POST['num_dni'];
                          $p_nombre=$_POST['p_nombre'];
                         $s_nombre= $_POST['s_nombre'];
                        $p_apellido=$_POST['p_apellido'];
                        $s_apellido=$_POST['s_apellido'];
                             $edad= $_POST['edad'];
                             $sexo= $_POST['sexo'];
                             $etnia= $_POST['etnia'];
                //     $condicion_d= $_POST['condicion_d'];
                      $discapacidad=$_POST['discapacidad'];
                   $iniciatica_pace=$_POST['iniciatica_pace'];
                     //   $comunidad=$_POST['comunidad'];
                    //$proyecto_bene=$_POST['proyecto_bene'];

 switch ($_POST['accion'])
		{
			case "insertar":
			{ 		     
		     $res = mysql_query("INSERT INTO `sianda`.`beneficiario` (`id_tp_dni`, `dni`, `apellido1`, `apellido2`, `nombre1`,'nombre2', `id_sex`, `edad`, `id_etnia`, `id_condicion`, `id_comunidad`, `id_beneficio`, `eliminado`) VALUES ('".$tipo_dni."', '".$num_dni."', '".$p_apellido."', '".$s_apellido."', '".$p_nombre."', '".$s_nombre."', '".$sexo."', '".$edad."', '".$etnia."', '".$condicion_d."', '".$comunidad."', '".$proyecto_bene."',0);");
		if(mysql_affected_rows()>0)
			{	echo "1";}else{	echo "2";}
			}
 			break;
			case "editar":
			{ 			
			
			//$ide=$_POST['ide'];
			$res = mysql_query("UPDATE usuario SET cedula='".$_POST["cedula"]."',nombre_u='".$_POST["nombre"]."',usuario='".$_POST["usuar"]."',password='".$_POST["password"]."',id_operador='".$_POST['operador']."',Idcargo='".$_POST['cargo']."' WHERE  id_usuario ='".$_POST['ide']."'");
		if(mysql_affected_rows()>0)
			{	echo "1";}else{	echo "2";}
			}
 			break;
			case "eliminar":
					{ 
			
					$ide=$_POST['ide'];
					$res = mysql_query("UPDATE usuario SET estado='1'  WHERE  id_usuario ='".$_POST['ide']."'");
				if(mysql_affected_rows()>0)
					{	echo "1";}else{	echo "2";}
			}
 			break;
 			case 'encontro';
								if($_POST['ced']!='undefined')
									{ $sql="SELECT  * FROM  usuario WHERE cedula ='".$_POST['ced']."' and estado=0;";
										$qc=mysql_query($sql,$con);
											if(mysql_fetch_array($qc)>0)
											{echo "1";}else{	echo mysql_fetch_array($qc);}}
								if($_POST["usua"]!='undefined')
									{ $sql="SELECT  * FROM  usuario WHERE usuario ='".$_POST['usua']."'and estado=0;";
										$qc=mysql_query($sql,$con);
											if(mysql_fetch_array($qc)>0)
											{echo "1";}else{	echo mysql_fetch_array($qc);}}
										

								
 			break;
			case "busca":
			{
				$ide=$_POST['dat'];
				$sql="SELECT  * FROM  proyecto WHERE idproyecto ='$ide'and eliminado=0;";
				//echo $sql;
				$qc=mysql_query($sql,$con);
				$fil=mysql_fetch_array($qc);
				$jsondata = array();
				$i = 0;
							$jsondata['c0'] = $fil[0];  
							$jsondata['c1'] = utf8_encode($fil[1]);   
							$jsondata['c2'] = utf8_encode($fil[2]);   
							$jsondata['c3'] = utf8_encode($fil[3]);   
							$jsondata['c4'] = utf8_encode($fil[4]);   
							$jsondata['c5'] = utf8_encode($fil[5]);   
							$jsondata['c6'] = utf8_encode($fil[6]);   
					echo json_encode($jsondata);
			}
 			break;
 			case "busca_u":
			{
				$ide=$_POST['dat'];
				$sql="SELECT  * FROM  beneficiario WHERE dni ='$ide'and eliminado=0;";
				//echo $sql;
				$qc=mysql_query($sql,$con);
				$fil=mysql_fetch_array($qc);
				$jsondata = array();
				$i = 0;
							$jsondata['c0'] = $fil[0];  
							$jsondata['c1'] = utf8_encode($fil[1]);   
							$jsondata['c2'] = utf8_encode($fil[2]);   
							$jsondata['c3'] = utf8_encode($fil[3]);   
							$jsondata['c4'] = utf8_encode($fil[4]);   
							$jsondata['c5'] = utf8_encode($fil[5]);   
							$jsondata['c6'] = utf8_encode($fil[6]);   
							$jsondata['c7'] = utf8_encode($fil[7]);   
							$jsondata['c8'] = utf8_encode($fil[8]);   
							$jsondata['c9'] = utf8_encode($fil[9]);   
							$jsondata['c10'] = utf8_encode($fil[10]);   
							$jsondata['c11'] = utf8_encode($fil[11]);   
					echo json_encode($jsondata);
			}
 			break;
 		}
 	}
?>