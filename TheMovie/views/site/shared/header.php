<?php

if(isset($_SESSION["User"])){
    $user = $_SESSION["User"];
}

?>
<div class="dark">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="<?=$url?>/">The Movie</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <div class="Filmes">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown text-decoration-none text-white btn btn-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filmes
                            </a>
                            <div class="dropdown-menu menuFilmes" id="dropdownFilmes" aria-labelledby="navbarDropdown">
                                <form action="Favoritos" method="POST">
                                    <input name="idUsuario" type="hidden" value="<?php if(isset($_SESSION["User"])){ echo($user["id"]); }else{ ?>0<?php } ?>">
                                    <button type="submit" class="btn btn-link dropdown-item">Favoritos</button>
                                </form>
                            </div>
                        </li>
                    </div>
                    <div class="Pessoas">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown text-white btn btn-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php if(isset($user)){ echo($user["nome"]);}else{?> Usuário <?php } ?>
                        </a>
                        <div class="dropdown-menu menuPessoas" id="dropdownPessoas" aria-labelledby="navbarDropdown2">
                            <?php if(isset($user)){?> <a href="<?=$url?>/Logout" class="dropdown-item">Logout</a> <?php }else{?> <a href="<?=$url?>/Login" class="dropdown-item">Login</a> <?php } ?>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>