<?php 
$pageTitle = "Let'sGather - Login"; 
include 'includes/header.php'; 
include 'includes/navbar.php'; 
?>

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="p-5 border rounded shadow bg-white">
                <h2 class="text-center text-letsgather-blue mb-4">Bem-vindo de volta</h2>

                <?php if(isset($_GET['sucesso'])): ?>
                    <div class="alert alert-success">Conta criada! Faça login.</div>
                <?php endif; ?>
                
                <?php if(isset($_GET['erro'])): ?>
                    <div class="alert alert-danger">Email ou password incorretos.</div>
                <?php endif; ?>

                <form action="auth_login.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-warning w-100 btn-lg">Entrar</button>
                </form>
                <div class="text-center mt-3">
                    <small>Ainda não tem conta? <a href="registar.php">Registe-se aqui</a></small>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>