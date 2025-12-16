<?php 
$pageTitle = "Let'sGather - Registar"; 
include 'includes/header.php'; 
include 'includes/navbar.php'; 
?>

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="p-5 border rounded shadow bg-white">
                <h2 class="text-center text-letsgather-blue mb-4">Crie a sua conta</h2>
                
                <?php if(isset($_GET['erro']) && $_GET['erro'] == 'email_existe'): ?>
                    <div class="alert alert-danger">Este email já está registado.</div>
                <?php endif; ?>

                <form action="auth_register.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nome Completo</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-letsgather-blue w-100 btn-lg">Registar</button>
                </form>
                <div class="text-center mt-3">
                    <small>Já tem conta? <a href="login.php">Faça Login</a></small>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>