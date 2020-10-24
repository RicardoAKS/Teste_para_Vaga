<?php
if(isset($_SESSION["User"])){
    $user = $_SESSION["User"];
}
$uri = "https://api.themoviedb.org/3/movie/top_rated?api_key=17aff5528b06426b8fd73adaa066c168&language=pt-BR&page=1";

$ch = curl_init($uri);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$rateds = json_decode(curl_exec($ch));
?>
<section class="bg-dark border border-dark text-white">
    <div class="container py-5">
        <h1 class="text-center pb-5">Seja Bem-Vindo(a)!</h1>
        <form action="<?=$url?>/search" method="POST">
            <div class="form-inline">
                <input name="search" class="form-control col-md-10 ml-4 pr-5" type="text" placeholder="Procurar" required>
                <input name="pagina" type="hidden" value="1">
                <button type="submit" class="btn btn-success ml-4">Pesquisar</button>
            </div>
        </form>
    </div>
</section>
<section class="container pt-3">
    <div class="card-columns justify-content-center">
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
                    <?php if(isset($_SESSION["User"])){ ?>
                    <form action="<?=$url?>/Detalhes"method="POST">
                        <input type="hidden" name="idFilme" value="<?= $rated->id ?>">
                        <input type="hidden" name="nome" value="<?= $rated->title ?>">
                        <input type="hidden" name="idUsuario" value="<?= $user["id"]?>">
                        <button class="btn btn-success mb-3" type="submit">Detalhes</button>
                    </form>
                <?php } ?>
                </div>
        <?php } ?>
        </div>
    </div>
</section>