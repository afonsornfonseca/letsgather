<?php
$current_file = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img style="max-height: 80px;width: auto;" src="imgs/logo-min.png" alt="Logo Let'sGather">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu-principal">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu-principal">
            <div class="navbar-nav nav-underline ms-auto align-items-center">
                <a class="nav-link <?php echo ($current_file == 'index.php') ? 'active' : ''; ?>" href="index.php">Home</a>
                <a class="nav-link <?php echo ($current_file == 'eventos.php') ? 'active' : ''; ?>" href="eventos.php">Eventos</a>
                
                <?php if(isset($_SESSION['user_id'])): ?>
                    <a class="nav-link <?php echo ($current_file == 'criar-evento.php') ? 'active' : ''; ?>" href="criar-evento.php">Criar Evento</a>    
                <?php endif; ?>

                <a class="nav-link <?php echo ($current_file == 'contactos.php') ? 'active' : ''; ?>" href="contactos.php">Sobre Nós</a>

                <div class="vr mx-3 d-none d-lg-block text-white"></div> <?php if(isset($_SESSION['user_id'])): ?>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-warning fw-bold" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i> <?php echo htmlspecialchars($_SESSION['user_nome']); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="criar-evento.php">Meus Eventos</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="logout.php">Sair</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a class="btn btn-outline-light btn-sm me-2" href="login.php">Login</a>
                    <a class="btn btn-warning btn-sm" href="registar.php">Registar</a>
                <?php endif; ?>

            </div>
        </div>
    </div>
</nav>