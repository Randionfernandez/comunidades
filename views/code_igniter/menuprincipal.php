<!-- Fixed-top navbar -->

<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
    <a class="navbar-brand">
        <img src="/images/favicon.ico" width=30" height="30" class="d-inline-block align-top" alt="">
        Comunidad de propietarios</a>
    <button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#navbarSupportedContent" aria-controls = "navbarSupportedContent" aria-expanded = "false" aria-label = "Toggle navigation">
        <span class = "navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav">

            <li class="nav-item nav-link"><a href="/login"><?= $this->lang->line('login_menu_home'); ?></a></li>
            <?php
            if (isset($_SESSION['access_level']) and $_SESSION['access_level'] === 'Admin') {  //corregir esta instrucción
              ?>
              <!--Configuración -->
              <li class = "nav-item dropdown">
                  <a class = "nav-link dropdown-toggle" href = "#" id = "navbarDropdown1" 
                     role = "button" data-toggle = "dropdown" aria-haspopup = "true" aria-expanded = "false">
                        <?= $this->lang->line('login_menu_setting');?>
                  </a>
                  <div class = "dropdown-menu" aria-labelledby = "navbarDropdown">
                      <a class = "dropdown-item" onclick="solicitar(COMUNIDADES)">Comunidades</a>
                      <a class = "dropdown-item" href = "#">Propiedades</a>
                      <a class = "dropdown-item" href = "#">Propietarios</a>

                      <div class = "dropdown-divider"></div>
                      <h5 class="dropdown-header">Asignaciones</h5>

                      <a class = "dropdown-item" href = "#">Propiedades a propietarios</a>

                      <div class = "dropdown-divider"></div>
                      <h5 class="dropdown-header">Otros datos</h5>

                      <a class = "dropdown-item" href="#">Formas de pago</a>
                      <a class = "dropdown-item" onclick="solicitar(PROVEEDORES)">Proveedores</a>
                      <a class = "dropdown-item" href="#">Tipos de propiedad</a>
                  </div>
              </li>

              <li class='nav-item'>
                  <button type='button' class='btn' onclick="location.href = '/login/readUsers'"><?= $this->lang->line('login_menu_users');?></button>
              </li>
            <?php };?>
              <!--  Botón desplegable de Movimientos-->      

              <!--Movimientos -->
              <li class = "nav-item dropdown">
                  <a class = "nav-link dropdown-toggle" href = "#" id = "navbarDropdown2" role = "button" data-toggle = "dropdown" aria-haspopup = "true" aria-expanded = "false">
                     <?= $this->lang->line('login_menu_movements'); ?>
                  </a>
                  <div class = "dropdown-menu" aria-labelledby = "navbarDropdown">
                      <a class = "dropdown-item" onclick="solicitar(LISTADO_MOVIMIENTOS)">Listar movimientos</a>
                      <a class = "dropdown-item" href = "#">Another action</a>
                      <div class = "dropdown-divider"></div>
                      <a class = "dropdown-item" href = "#">Something else here</a>
                  </div>
              </li>

              <!--Administración -->
              <li class = "nav-item dropdown">
                  <a class = "nav-link dropdown-toggle" href = "#" id = "navbarDropdown3" role = "button" data-toggle = "dropdown" aria-haspopup = "true" aria-expanded = "false">
                      <?= $this->lang->line('login_menu_accounting');?>
                  </a>
                  <div class = "dropdown-menu" aria-labelledby = "navbarDropdown">
                      <a class = "dropdown-item" onclick="solicitar(LISTADO_INGRESOS)">Ingresos</a>
                      <a class = "dropdown-item" onclick="solicitar(LISTADO_GASTOS)">Gastos</a>
                      <div class = "dropdown-divider"></div>
                      <h5 class="dropdown-header">Otros</h5>
                      <a class = "dropdown-item" href = "#">Something else here</a>
                  </div>
              </li>
          </ul>

          <!--  Botones de barra navegación ubicados a derecha -->             

          <!--                        <li><a href="../navbar/">Default</a></li>
                                 <li><a href="../navbar-static-top/">Static top</a></li>-->
          <ul class="nav navbar-nav float-right">
              <li class="nav-item dropdown">
                  <a class = "nav-link dropdown-toggle" href = "#" id = "navbarDropdown3" role = "button" data-toggle = "dropdown" aria-haspopup = "true" aria-expanded = "false">
                      <i class="fas fa-user"></i><?php echo ' ' . $_SESSION['usuario']; ?>
                </a>

                <div class="dropdown-menu"> 
                    <a class="nav-link" href="/login/editProfile"><?= $this->lang->line('login_menu_edit_profile');?></a>
                    <a class="nav-link" href="/login/changePasswordUser"><?= $this->lang->line('login_menu_change_pass');?></a>
                    <a class="nav-link active" href="/login/logout"><i class='fas fa-sign-out-alt'></i><?= $this->lang->line('login_menu_logout'); ?><span class="sr-only">(current)</span></a>
                </div>
            </li>
        </ul>
    </div>
</nav>