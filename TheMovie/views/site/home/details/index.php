<?php

if(isset($_SESSION["User"])){
    $user = $_SESSION["User"];
}
if(isset($_POST["idFilme"])){
$uri = "https://api.themoviedb.org/3/movie/".$_POST["idFilme"]."?api_key=17aff5528b06426b8fd73adaa066c168&language=pt-BR";

$ch = curl_init($uri);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$rateds = json_decode(curl_exec($ch));
?>
<section class="container pt-5">
    <div class="border border-dark">
    <?php $src = explode(" \ ", $rateds->poster_path);
            $img = "//image.tmdb.org/t/p/w220_and_h330_face/" . $src[0];
            $sem_foto = "$url/assets/img/sem-foto.png";?>
        <div class="text-center pt-3">
            <img class="justify-content-center" width="25%" src=<?php if($rateds->poster_path == null || !isset($rateds->poster_path)){ echo($sem_foto); }else{ echo($img); } ?> alt="Card image">
                <h1><?php echo($rateds->title); ?></h1></div>
                <p class="text-justify px-5"><?php echo($rateds->overview)?></p>
                <p class="text-center"><small class="text-muted">Data de Lançamento: <?php if(isset($rateds->release_date)){ if($rateds->release_date == ""){ ?>Sem Data de Lançamento<?php }else{ echo($rateds->release_date);} }else{ ?>Sem Data de Lançamento no sistema<?php } ?></small></p>
                    <?php if(isset($_SESSION["User"])){ ?>
                        <form name="formFav" class="text-center" method="POST">
                            <input type="hidden" name="idFilme" value="<?= $rateds->id ?>">
                            <input type="hidden" name="nome" value="<?= $rateds->title ?>">
                            <input type="hidden" name="idUsuario" value="<?= $user["id"]?>">
                            <div class="btn-group">
                                <div class="btn btn-success mb-3" id="btnSubmitFav" type="submit">Favoritar</div>
                                <a href="<?=$url?>/" class="btn btn-secondary mb-3" >Inicio</a>
                            </div>
                        </form>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }else{ ?>
<section class="container">
    <div class="text-center pt-5 mt-5">
        <h1>Nenhum Filme foi escolhido</h1>
        <form action="<?=$url?>/" method="POST">
            <button type="submit" class="btn btn-success">Voltar</button>
        </form>
    </div>
</section>
<?php } ?>