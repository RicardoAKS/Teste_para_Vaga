
<section class="container my-5 py-5">
    <h1 class="text-center mb-5">Todos os seus filmes favoritos!</h1>
    <table class="table tabela table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Nome</th>
                <th></th>
            </tr>
        </thead>
        <?php foreach($lists as $list){?>
        <tr>
            <td><?=$list["nome"]?></td>
            <td>
            <div class="text-center">
                <div class="btn-group">
                    <form action="Delete" method="POST">
                        <input type="hidden" value="<?=$list["id"]?>" name="id"> 
                        <button class="btn btn-link" >Deletar</button>
                    </form>
                    <form action="<?=$url?>/Detalhes"method="POST">
                        <input type="hidden" name="idFilme" value="<?= $list["idFilme"] ?>">
                        <input type="hidden" name="nome" value="<?= $list["nome"] ?>">
                        <input type="hidden" name="idUsuario" value="<?= $list["idUsuario"]?>">
                        <button class="btn btn-link" type="submit">Detalhes</button>
                    </form>
                </div>
                </div>
            </td>
        </tr>
        <?php } ?>
    </table>
</section>