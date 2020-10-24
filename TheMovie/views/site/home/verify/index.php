<?php
    $senha = md5(md5($_POST["senha"]));
    foreach($list as $listValue){
        if($_POST["nome"] == $listValue["nome"] && $senha == $listValue["senha"])
        {
            $_SESSION["User"] = $listValue;
            ?><script>window.location.href="<?=$url?>/"</script><?php
        }

        if(!isset($_SESSION["User"])){
            $_SESSION["error"] = "Usuário ou senha inválidos";
        }
    }
?>
<script>setTimeout(function() {
    window.location.href = "<?=$url?>/Login";
}, 1000);</script>