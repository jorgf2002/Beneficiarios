 <!-- ADMINISTRACION DE USUARIOS <script type="text/javascript" src="Modulos/admon/configuracion/js/funciones.usuarios.js"></script>--> 
 <?php @session_start(); require_once("../config.php"); ?>
<script type="text/javascript">
  $(document).ready(function(){ 
  var parametros;  
                  $('#guarda_actividad').hide();
                  function  recojo_dato(){     
                                   parametros = {
                                                           "tipo_dni":$("#tipdni").val(),
                                                            "num_dni":$("#dni").val(),
                                                           "p_nombre":$("#pnom").val(),
                                                           "s_nombre":$("#snom").val(),
                                                         "p_apellido":$("#pap").val(),
                                                         "s_apellido":$("#sap").val(),
                                                         "sexo":$("#sx").val(),
                                                         "etnia":$('#etn').val(),
                                                               "edad":$("#edad").val(),
                                                        "condicion_d":$("#condi").val(),
                                                       "discapacidad":$("#test6").val(),
                                                    "iniciatica_pace":$("#iniciativ").val(),
                                                         "comunidad ":$("#comunidad_id").val(),
                                                     "proyecto_bene ":$(".proyect_s").val(),
                                                     "accion":"insertar"
                                                     };    
                                                  }
                  $('.btn_guarda').click(function(){alert("hola mundo");
                                                      recojo_dato();
                                                       $.ajax({
                                                      type: 'POST',
                                                      url: './Usuarios/usuarios_op.php',
                                                      data: parametros,
                                                      success: function(data){                                                      
                                                        
                                                     }
                                                }); 
                                                    })
                  $('.proyect_s').change(function(){ dat=$(this).val();
                                            $.ajax({
                                                      type: 'POST',
                                                      url: './Usuarios/usuarios_op.php',
                                                      data:'dat='+dat +'&accion=busca',
                                                      dataType: "json",      
                                                      success: function(data){
                                                        $('#entid_ejec').val(data.c1);
                                                        $('#nom_act').val(data.c2);
                                                        
                                                     }
                                                });          
                                                    });
                  $('#activ').change(function () { var con=$("#activ").val();
                                      if (con==5){ $('#activi_otro').prop('disabled', false);
                                                   $('#guarda_actividad').show();}
                                            else { $('#activi_otro').prop('disabled', true);
                                                   $('#guarda_actividad').hide(); }});
                  $('#dni').focusout(function(){ var dat=$("#dni").val();
                                             $.ajax({
                                                      type: 'POST',
                                                      url: './Usuarios/usuarios_op.php',
                                                      data:'dat='+dat +'&accion=busca_u',
                                                      dataType: "json",      
                                                      success: function(data){                                                        
                                                        $('#nom_act').val(data.c2);
                                                        $('#pnom').val(data.c3);
                                                        $('#snom').val(data.c4);
                                                        $('#pap').val(data.c5);
                                                        $('#sap').val(data.c6);
                                                        $('#edad').val(data.c8);
                                                          $('#sx').val(data.c7);
                                                        
                                                     }
                                                });  });
                  $('select').material_select();
                  //configuracion del INscrito::::                          
                  $('#test1').prop('disabled', true);
                  $("#condici").change(function () { var con=$("#condici").val();
                                                    if (con==1)
                                                    { $('#test1').prop('disabled', false);}
                                                    else {     
                                                    if(($("#test1").attr("checked"))=="checked")
                                                       {$('#test1').prop('checked', false);}
                                                        $('#test1').prop('disabled', true);}
                                                   });
                 //fin de Inscrito:::::
                    $('input.autocomplete').autocomplete({ data: {
                                                              "Mejoramiento de Internet": null,
                                                              "Contruccion de Cancha": null,
                                                              "Hola Mundo": 'http://placehold.it/250x250'
                                                              } });
               /*   
                 $("#ins_usu").click(function() {var url_ins=$(this).attr('dato1'); 
                                                var direc='<iframe class="" style="border:0px; width:450px; height:450px;" src="'+url_ins+'"></iframe>';
                                                         $('.modal-content').html(direc);  $('#modal122').openModal();
                                               });                                        
              $("p").on("click", function(){ var url_ins=$(this).attr('data'); 
                                                 var direc='<iframe class="modal-content"  marginwidth="0" marginheight="0" scrolling="no" border="0" frameborder="0"   style=" align:center; border:0px; width:750px; height:650px;" src="'+url_ins+'"></iframe>';
                                                 $('.modal-content').html(direc);   $('#modal122').openModal();});

              

               $(".modal-close").click(function() { $(".calendar").load('./Modulos/admon/Usuarios/admin_usuarios.php');}); */  
                
             
                 
                 
              });
</script>  
      <!-- Titulo del Cargue de Archivo. -->
  <h4 class="color_azul card-panel lime lighten-5 efecto3d" align="center">Administracion de Beneficiarios Directos</h4> 
      <div class="fixed-action-btn horizontal click-to-toggle" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red">
          <i class="material-icons">menu</i>
        </a>
        <ul>
          <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
          <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
          <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
          <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
        </ul>
      </div>
  <!-- Contenido Cargue de Archivo. -->
   <div  id="content" class="card row" align="center">       
      <form class="col s12">
         <div class="row">
                <div class="input-field col s1">
                      <select id="tipdni">
                        <?php   $query_tpdni=$db->query("SELECT * FROM tipo_dni ORDER BY tipo_dni ASC");              
                                              while ($tpdni=$query_tpdni->fetch_array())
                                                { echo "<option value='".$tpdni[0]."'>".utf8_encode($tpdni[1])."</option>"; }
                                            ?>
                      </select>
                      <label>Tipo DNI</label>
                </div>
                <div class="input-field col s2">
                        <input id="dni" type="text" class="validate">
                        <label for="last_name">DNI</label>
                </div>    
                <div class="input-field col s2">
                        <input id="pnom" type="text" class="validate">
                        <label for="last_name">1° Nombre</label>
                </div>
                <div class="input-field col s2">
                        <input id="snom" type="text" class="validate">
                        <label for="">2° Nombre</label>
               </div>
               <div class="input-field col s2">
                        <input  id="pap" type="text" class="validate">
                        <label for="first_name">1° Apellido</label>
               </div>
               <div class="input-field col s2">
                        <input id="sap" type="text" class="validate">
                        <label for="last_name">2° Apellido</label>
               </div>
         </div>
         <div class="row">
               <div class="input-field col s1">
                         <select id="sx">
                               <?php   $query_sx=$db->query("SELECT * FROM sexo ORDER BY sexo ASC");              
                                          while ($sxo=$query_sx->fetch_array())
                                            { echo "<option value='".$sxo[0]."'>".utf8_encode($sxo[1])."</option>"; }
                                ?>
                         </select>
                         <label>Sexo:</label>
               </div>
               <div class="input-field col s2">
                        <select id="etn">
                            <?php   $query_etni=$db->query("SELECT * FROM etnia ORDER BY etnia ASC");              
                                          while ($etni=$query_etni->fetch_array())
                                            { echo "<option value='".$etni[0]."'>".utf8_encode($etni[1])."</option>"; }
                            ?>
                        </select>
                        <label>Etnia:</label>
               </div>
               <div class="input-field col s1">
                        <input id="edad" type="text" class="validate">
                        <label for="edad">Edad</label>
               </div>
               <div class="input-field col s2">
                         <select id="condici">
                            <?php   $query_condi=$db->query("SELECT * FROM condicion ORDER BY condicion ASC");              
                                          while ($condi=$query_condi->fetch_array())
                                            { echo "<option value='".$condi[0]."'>".utf8_encode($condi[1])."</option>"; }
                            ?>
                         </select>
                          <label>Condicion:</label>
               </div> 
               <div class="input-field col s2" hidden="true">
                          <input type="checkbox" id="test1" checked="checked" />
                          <label for="test1">RUV Inscrito::</label>
               </div>
               <div class="input-field col s2">
                          <input type="checkbox" id="test6"  />
                          <label for="test6">Discapacidad::</label>
               </div>
               <div class="input-field col s2">
                     <select id="comunidad_id">
                        <option value="" disabled selected>Seleccione Una Opncion</option>
                         <?php   $query_eventos1=$db->query("SELECT * FROM municipio ORDER BY municipio ASC");
                                        while ($eventos1=$query_eventos1->fetch_array())
                                            { echo "<option value='".$eventos1[0]."'disabled selected>".utf8_encode($eventos1[1])."</option>"; 
                            $query_eventos =$db->query("SELECT * FROM comunidad comunidad where id_municipio='".$eventos1[0]."' ");
                                          while ($eventos=$query_eventos->fetch_array())
                                            { echo "<option value='".$eventos[0]."'>".utf8_encode($eventos[1])."</option>"; 
                                             }}
                                        ?>
                     </select>
                     <label>Seleccione Comunidad:</label>
               </div>
         </div> 
         <div class="row">
              <div class="input-field col s3">
                    <input type="date"  class="datepicker">           
              </div>  
              <div class="input-field col s3">
                      <select id="iniciativ">
                        <?php   $query_actividad=$db->query("SELECT * FROM iniciativapace ORDER BY iniciativa_c ASC");              
                                while ($q_acti=$query_actividad->fetch_array())
                                  { echo "<option value='".$q_acti[0]."'>".utf8_encode($q_acti[1])."</option>"; }
                          ?>
                      </select>                   
              </div>            
              <div class="input-field col s2">
                      <select id="activ">
                        <?php   $query_actividad=$db->query("SELECT * FROM actividad ORDER BY nombre_act ASC");              
                                while ($q_acti=$query_actividad->fetch_array())
                                  { echo "<option value='".$q_acti[0]."'>".utf8_encode($q_acti[1])."</option>"; }
                          ?>
                      </select>                   
              </div>
              <div class="input-field col s2">
                <input disabled id="activi_otro" type="text" class="validate">
                
              </div> 
              <div class="col s2"><a id="guarda_actividad" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a> 
              </div> 
         </div>         
         <div class="row">
              <div class="input-field col s2">
               <select class="proyect_s">
                   <?php   $query_proyecto=$db->query("SELECT * FROM proyecto ORDER BY codigo ASC");              
                      while ($q_proy=$query_proyecto->fetch_array())
                      { echo "<option value='".$q_proy[0]."'>".utf8_encode($q_proy[1])."</option>"; }
                    ?>
               </select>
                 <label>Proyecto</label>
              </div>                
              <div class="input-field col s3">
                <input disabled id="entid_ejec" type="text" class="validate">
              </div>    
              <div class="input-field col s4">
                <input disabled id="nom_act" type="text" class="validate">
              </div>
         </div>
      </form>
      <div class="row">
      <a class="btn_guarda waves-effect waves-light btn"><i class="material-icons left">save</i>button</a>
      </div>
  </div> 
   <!--ESPACION PARA LA CONSULTA Y LA TABLA DE  LOS BENEFICIARIOS -->
    <div  id="content" class="card" align="center">
  <table class="" >
        <tr>
           <th>Identificación</th>
           <th>Número</th>                                
           <th style='width:auto;'>Nombres</th>
           <th style='width:auto;'>Apellidos</th>
           <th>Sexo</th>
           <th>Edad</th>
           <th>Etnia</th>
           <th>Condición</th>
           <th>Inscrito</th>
           <th></th>
        </tr> 
         <?php @session_start(); require_once("../config.php"); //AND id_beneficiario='".$_SESSION['usua']."'
            $query_eventos=$db->query("SELECT * FROM beneficiario  WHERE id_beneficiario<>0 ");
                       while ($row=$query_eventos->fetch_array())
                        { 
                            echo "<tr>";
                            echo "<td >".$row['2']."</td>";
                            echo "<td >".$row['2']."</td>";
                            echo "<td >".$row['2']."</td>";
                            echo "<td>".utf8_encode($row['3'])."</td>";
                         ?>
                            <td> 
                                <p class="waves-effect waves-green btn-flat" data='./Modulos/Usuario/usuario.php?accion=edicion&idusuario=<?php echo $row['0']; ?>'>Editar <img src='images/026.png' width='22px' height='22px'></p>

                            </td> 
                            <td>
                               <p class="waves-effect waves-green btn-flat" data='./Modulos/Usuario/usuario.php?accion=eliminar&idusuario=<?php echo $row['0']; ?>'>Eliminar <img src='images/020.png' width='22px' height='22px'></p>
                           </td>
                            </tr> <?php } ?>
                        </table>
                       </div>
          </div>      </div>            
         <!-- FIN ADMINISTRACION DE USUARIOS --> 

           <!-- AUTOCOMPLETE <div class="input-field col s6">
                        <i class="material-icons prefix">textsms</i>
                        <input type="text" id="autocomplete-input" class="autocomplete">
                        <label for="autocomplete-input">Iniciativas O PACE</label>
               </div>  -->