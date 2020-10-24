<div class="container mt-5 pt-5">
    <form name="login" class="login" method="POST" action="<?=$url?>/verifica">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" placeholder="Digite o seu Nome">
        </div>
        <div class="form-group">
            <label>Senha</label>
            <input type="password" name="senha" class="form-control" placeholder="Digite a sua Senha">
        </div>
        <div class="text-center">
            <div class="btn-group">
                <button type="submit" class="btn btn-success">Entrar</button>
                <a href="<?=$url?>/Registrar" class="btn btn-primary">Cadastrar-se</a>
            </div>
        </div>
    </form>
    <p class="text-center text-danger"><?php if(isset($_SESSION["error"])){ echo($_SESSION["error"]); unset($_SESSION["error"]); } ?><p>
</div>