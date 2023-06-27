<?php
    $auxiliar2 = new loginControlador();
    $permisos= $auxiliar2 -> permisos_controlador();

    $agregar=false;
    $ver=false;
    $actualizar=false;


    foreach ($permisos as $key) {
      if($key['CodigoSubModulo']==8 && $key['CodPrivilegio']==1){
        $agregar=true;
      }

      if($key['CodigoSubModulo']==8 && $key['CodPrivilegio']==2){
        $ver=true;
      }

      if($key['CodigoSubModulo']==8 && $key['CodPrivilegio']==3){
        $actualizar=true;
      }
    }


    if($ver==false){
        echo $lc->redireccionar_home_controlador();
        exit();
    }

?>

<!-- Page header -->
<div class="full-box page-header">
                <h3 class="text-left">
                    <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PACIENTES
                </h3>
                <p class="text-justify">
                    Se mostraran todos los pacientes registrados
                </p>
            </div>

            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">

                    <?php   
                    if($agregar==true){ ?> 
                    <li>
                        <a href="<?php echo SERVERURL; ?>paciente-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR PACIENTE</a>
                    </li>
                    <?php } ?>
                    
                    <li>
                        <a class="active" href="<?php echo SERVERURL; ?>paciente-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PACIENTE</a>
                    </li>
                    <li>
						<a  href="<?php echo SERVERURL; ?>paciente-search/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR PACIENTE</a>
					</li>
                </ul>
            </div>
            
            
            <!--CONTENT-->
            <div class="container-fluid">
			<?php 
					require_once "./controladores/pacienteControlador.php";
					$ins_paciente = new pacienteControlador();
					echo $ins_paciente->paginador_persona_controlador($pagina[1],15,$_SESSION['privilegio_spm'],$_SESSION['id_spm'],$pagina[0],"","", "", "");

				?>
			</div>