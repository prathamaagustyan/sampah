<!-- partial:partials/_sidebar.html -->

<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        <?php if($_SESSION['email']=='sacibatekaje@gmail.com'):?>
          <li class="nav-item">
            <a class="nav-link" href="beranda">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="riwayatsetor">
              <i class="icon-cloud menu-icon"></i>
              <span class="menu-title">Riwayat Setor</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="datasampah">
              <i class="icon-trash menu-icon"></i>
              <span class="menu-title">Data Sampah</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="datasetor">
              <i class="icon-trash menu-icon"></i>
              <span class="menu-title">Data Setor</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="datatarik">
              <i class="icon-trash menu-icon"></i>
              <span class="menu-title">Data Tarik</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gudang">
              <i class="icon-trash menu-icon"></i>
              <span class="menu-title">Gudang</span>
            </a>
          </li>
          <?php endif;?>
          <?php if($_SESSION['email']=='prathamaagustyan@gmail.com'):?>
          <li class="nav-item">
            <a class="nav-link" href="berandakasir">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="riwayat">
              <i class="icon-cloud menu-icon"></i>
              <span class="menu-title">Riwayat Saldo</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="riwayat">
              <i class="icon-cloud menu-icon"></i>
              <span class="menu-title">Penarikan Saldo</span>
            </a>
          </li>
          <?php endif;?>
          <?php if($_SESSION['usertype']==''):?>
          <li class="nav-item">
            <a class="nav-link" href="berandauser">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tambahsetor">
              <i class="icon-cloud menu-icon"></i>
              <span class="menu-title">Setor Sampah</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="riwayatsetoruser">
              <i class="icon-cloud menu-icon"></i>
              <span class="menu-title">Riwayat Setor</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="saldouser">
              <i class="icon-cloud menu-icon"></i>
              <span class="menu-title">Saldo</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="riwayatpenarikanuser">
              <i class="icon-cloud menu-icon"></i>
              <span class="menu-title">Riwayat Penarikan</span>
            </a>
          </li>
          <?php endif;?>
          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basik" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Riwayat Setor</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basik">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Form elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Charts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Tables</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Icons</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="icon-ban menu-icon"></i>
              <span class="menu-title">Error pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- partial -->