
////////////////////LOGIN
			$(document).ready(function() {	
								$('#login').click(function()
								{
								var username=$("#username").val();
								var password=$("#password").val();			
							    var dataString = 'username='+username+'&password='+password;
								if($.trim(username).length>0 && $.trim(password).length>0)
								{
										$.ajax({
					            type: "POST",
					            url: "ajaxLogin.php",
					            data: dataString,
					            cache: false,
					            beforeSend: function(){ $("#login").val('Conectando...');},
					            success: function(data){
					            if(data)
					            {
					           			location.reload(true);
					            }
					            else
					            {
					             $('#box').shake();
								 $("#login").val('Login')
								 $("#error").html("<span style='color:#cc0000'>Error:</span> Verifique su Informacion ");
					            } 
								//alert(data);
					            }
					            });
								
								}
								return false;
								});
										});
			////////FIN LOGIN

			$('#persona1').click(function(){
				$("#contenid").load('./Modulos/Beneficia/menu_bene.php')});
		
		$( document ).ready(function() {
			   
		//Registro de Usuario
						$('#usuario').click(function(){
								$("#contenid").load('Modulos/RegUsuario/reg_usuario.php');
						});
						
						//Registro Persona
						$('#persdsona').click(function(){
							alert("121");
								$("#contenid").load('Modulos/RegPersona/reg_persona.php');
						});	
						//Registro Administracion
						$('#admins').click(function(){
								$("#contenid").load('Modulos/admon/3.php');
						});	
		});

							 
		

		$(document).ready(function() {	 
				$('#persona1').click(function(){
     			$("#contenid").load('./Modulos/Beneficia/menu_bene.php')
           								});
				//---lista
				
			});


										

