	
					</div><!--dashboard left-->
				</div><!--row-fluid END -->
					
				<div class="footer">
					<div class="footer-left">
						<span>&copy; 2013. .</span>
					</div>
					<div class="footer-right">
						<span>Desarrollado por: <a href="#">BISA S.A. de C.V.</a></span>
					</div>
				</div><!--footer END-->
				
			</div><!--maincontentinner END-->
			
		</div><!--maincontent END-->
		
	</div><!--rightpanel END-->
	
</div><!-- global-container END -->
	
</div><!--mainwrapper-->


<script type="text/javascript">
    jQuery(document).ready(function($) {
		$(".leftmenu .nav-tabs.nav-stacked > li.dropdown > a").click(function(){
			
			if($(this).parent().hasClass("active"))
				$(this).parent().removeClass("active")
			else
				$(this).parent().addClass("active");
		});  

		$(window).scroll(function(){
			
			$(".msj_scroll").hide();
		    
		    if($(this).scrollTop() > 150){
		        //console.log( $(this).scrollTop() );
		        $(".msj_scroll").animate({display:"block", right: "-5px"}, 300 );
		    }	
		    else{
		    	$(".msj_scroll").animate({display:"none", right: "-50px"}, 300 );
		    }
		});
		
		$(".btn_up").click(function(){
			 $('html, body').animate({ scrollTop: 0 }, 0);
			 $(".msj_scroll").animate({display:"none", right: "-50px"}, 300 );
			 return false;
		});

		// Cambiar tamaño de contenido central
		document.onkeyup = mostrarLateral;	
		function mostrarLateral(elEvento) {
			var evento = window.event || elEvento;
			var mensaje = 	"Tipo de evento: " + evento.type + "<br>" +
							"Propiedad keyCode: " + evento.keyCode + "<br>" +
							"Propiedad charCode: " + evento.charCode + "<br>" +
							"Carácter pulsado: " + String.fromCharCode(evento.charCode);

			if(evento.keyCode == 113){
				$(".rightpanel").removeAttr("style"); // Remover estilo inicial de rightpanel

				if( $(".leftpanel").hasClass("hide") ){
					$(".leftpanel").removeClass("hide");			
					$(".rightpanel").removeClass("expandir-rightpanel");
					$(".btn_expandir").html("Ocultar men&uacute; lateral");
					$(".btn_expandir").attr("title","Maximizar el espacio de trabajo");
					return false;
				}
				else{
					$(".leftpanel").addClass("hide");
					//$(".rightpanel").css("margin-left",'260px');
					$(".rightpanel").addClass("expandir-rightpanel");
					$(".btn_expandir").html("Mostrar men&uacute; lateral");
					$(".btn_expandir").attr("title","Devolver el espacio de trabajo original");
					return false;
				}
			}
		}

    });
</script>

<div class="msj_scroll" style="display:none;">
	<a href="" class="btn_up btn btn-success btn-small"><span class="icon-arrow-up icon-white"></span></a>
</div>


<style type="text/css">
	.msj_scroll{
		position: fixed;
		bottom: 90px;
		right: -50px;
		height: 24px;
		z-index: 1800;
	}
	.btn_up{
		opacity: 0.5;
		border-radius: 10px 0px 0px 10px;
		-moz-border-radius: 10px 0px 0px 10px;
		-webkit-border-radius: 10px 0px 0px 10px;
		border: 0px solid #000000;
	}
	.btn_up:hover{
		opacity: 1;
	}
	.expandir-rightpanel{
		margin-left:0;
	}
</style>

</body>
</html>