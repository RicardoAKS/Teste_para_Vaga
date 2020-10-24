<?php

if(isset($_POST["pagina"])){
$pagina = $_POST["pagina"];
$search = $_POST["search"];
if($search == " "){
    $search = "Espaço";
}
ini_set('display_errors', 0 );
error_reporting(0);

$uri = "https://api.themoviedb.org/3/search/movie?api_key=17aff5528b06426b8fd73adaa066c168&language=pt-BR&page=". $pagina ."&include_adult=false&query=" . $search;

$ch = curl_init($uri);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$rateds = json_decode(curl_exec($ch));
$page = $rateds->total_pages;
?>

<section class="container column pt-5">
    <div class="card-columns">
        <?php foreach($rateds->results as $rated){
            $src = explode(" \ ", $rated->poster_path);
            $img = "//image.tmdb.org/t/p/w220_and_h330_face/" . $src[0];
            $sem_foto = "$url/assets/img/sem-foto.png";?>
            <div class="card text-center">
                <img class="card-img-top" src=<?php 
                if($rated->poster_path == null || !isset($rated->poster_path)){
                    echo($sem_foto);
                }else{
                    echo($img);
                }
            ?> alt="Card image">
                <div class="card-body">
                    <h6 class="card-title"><?php echo($rated->title); ?></h6></div>
                    <p class="card-text pb-3"><small class="text-muted">Data de Lançamento: <?php if(isset($rated->release_date)){ if($rated->release_date == ""){ ?>Sem Data de Lançamento<?php }else{ echo($rated->release_date);} }else{ ?>Sem Data de Lançamento no sistema<?php } ?></small></p>
                    <form action="<?=$url?>/Detalhes"method="POST">
                        <input type="hidden" name="idFilme" value="<?= $rated->id ?>">
                        <input type="hidden" name="nome" value="<?= $rated->title ?>">
                        <input type="hidden" name="idUsuario" value="<?= $user["id"]?>">
                        <button class="btn btn-success mb-3" type="submit">Detalhes</button>
                    </form>
                </div>
        <?php } ?>
        </div>
    </div>
</section>
<?php if($page == 0)
{?>
<div class="text-center py-5 my-5">
    <h1>Nada Foi Encontrado</h1>
    <h2>Tente pesquisar de outra forma</h2>
    <br>
    <a href="<?=$url?>/" class="btn btn-success" >Voltar</a>
</div>
<?php } ?>
<div class="container">
    <div class="row justify-content-center">
        <form action="<?=$url?>/search" class="mt-5" method="POST">
            <input type="hidden" name="pagina" value="1">
            <input type="hidden" name="search" value="<?= $_POST["search"] ?>">
            <button class="btn btn-dark" type="submit">1</button>
        </form>
        <form action="<?=$url?>/search" class="mt-5" method="POST">
            <input type="hidden" name="pagina" value="<?php if(($pagina-1) < 1){ ?>1<?php }else{ echo($pagina-1);} ?>">
            <input type="hidden" name="search" value="<?= $_POST["search"] ?>">
            <button class="btn btn-dark" type="submit"><?php if(($pagina-1) < 1){ ?>Inicio<?php }else{?> <-- <?php } ?></button>
        </form>
        <a class="btn btn-dark text-white mt-5" href="#"><?php echo($pagina); ?></a>
        <form action="<?=$url?>/search" class="mt-5" method="POST">
            <input type="hidden" name="pagina" value="<?php if(($pagina+1) > $page){ ?>1<?php }else{ echo($pagina+1);} ?>">
            <input type="hidden" name="search" value="<?= $_POST["search"] ?>">
            <button class="btn btn-dark" type="submit"><?php if(($pagina+1) > $page){ ?>Inicio<?php }else{?> --> <?php } ?></button>
        </form>
        <form action="<?=$url?>/search" class="mt-5" method="POST">
            <input type="hidden" name="pagina" value="<?php if($page == 0){ ?>1<?php }else{ echo($page); }?>">
            <input type="hidden" name="search" value="<?= $_POST["search"] ?>">
            <button class="btn btn-dark" type="submit"><?php if($page == 0){ ?>1<?php }else{ echo($page); }?></button>
        </form>
    </div>
</div>
<?php }else{ ?>
<section class="container">
    <div class="text-center py-5 my-5">
        <h1>Não foi passado nenhum valor de busca</h1>
        <form action="<?=$url?>/" method="POST">
            <button type="submit" class="btn btn-success">Voltar</button>
        </form>
    </div>
</section>
<?php } ?>