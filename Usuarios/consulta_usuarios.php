 <meta charset="UTF-8">  
<table >
                    <tr >
                        <th >Cedula</th>
                        <th >Nombre Usuario</th>
                        <th >Usuario</th>
                        <th >Operador</th>
                        <th >Cargo</th>
                             <th>Editar</th>
                        <th>Elimar</th>
                    </tr> 
                     <?php 
				 require_once("./config.php"); 
					//consulta todos los operadores
					$sql=mysql_query("SELECT * FROM usuario where estado=0",$con);
                  while($row = mysql_fetch_array($sql)){ ?>
              
                    <tr>
                    <td ><?php echo utf8_encode($row['1']);?></td>
                    <td ><?php echo utf8_encode($row['2']);?></td>
                    <td ><?php echo utf8_encode($row['3']);?></td>
                    <?php 
                     $sql2=mysql_query("SELECT * FROM operador where id_operador='".$row['5']."'",$con);
                     $sql3=mysql_query("SELECT * FROM cargo where idcargo='".$row['6']."' ",$con);
                    while($row2 = mysql_fetch_array($sql3)){echo "<td style='width:auto;'>".utf8_encode($row2[1])."</td>";}
                    while($row1 = mysql_fetch_array($sql2)){echo "<td style='width:200px;'>".$row1[2]."( ".utf8_encode($row1[1]).")</td>";}
                      ?>
                       <td><a id='edi' href='#' ided='<?php echo utf8_encode($row['0']);?>'>
                                  <img src='../configuracion/img/editar.png' width='22' height='22' /></a></td> 
                       <td><a id='eli' href='#' idel='<?php echo utf8_encode($row['0']);?>'>
                                  <img src='../configuracion/img/elimina.png' width='22' height='22' /></a></td> 
                    </tr>
                <?php  } ?>
                 </table>