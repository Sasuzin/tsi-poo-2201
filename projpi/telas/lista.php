<link rel="stylesheet" href="../css/lista.css">
<main>

    <a clas="my-5" href="../telas/index.php">
        <img src="../imagens/logo-branco.png" style="width: 100px; margin-left: -150px;">
    </a>

    <div class="text-center justify-content-center d-flex align-items-center pb-3 ">
        <button class="btn botao btn-dark"><a href="../telas/formProduto.php" class="text-decoration-none text-reset"> Cadastrar Produto </a></button>
    </div>
    <section class="container fundo">
        <h2> Meus Produtos </h2>
        <form method="post" action="">
            <table class="table ">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Categoria</th>
                        <th>Preço</th>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Descrição</th>
                        <th>Imagem</th>
                        <th>Editar</th>
                        <th>Apagar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (is_null($lista)) {
                    ?>
                        <td class="text-center fs-3" colspan="10"> Sem Resgistros </td>
                        <?php
                    } else {
                        foreach ($lista as $id => $cadastroproduto) {
                        ?>
                            <tr>
                                <td><b><?php echo $cadastroproduto['titulo']; ?></b></td>
                                <td><?php echo $cadastroproduto['categoria']; ?></td>
                                <td><?php echo $cadastroproduto['preco']; ?></td>
                                <td><?php echo $cadastroproduto['modelo']; ?></td>
                                <td><?php echo $cadastroproduto['marca']; ?></td>
                                <td><?php echo $cadastroproduto['descricao']; ?></td>
                                <td><?php echo  '<img src= "../produto/' . $cadastroproduto['imagem'] . '" width="100px" heigth="100px" alt="imagem"> ' ?> </td>
                                <td><button name="editar" class="btn btn-success my-2" value="<?php echo $id; ?>">Editar</button></td>
                                <td><button name="excluir" class="btn btn-danger my-2" value="<?php echo $id; ?>">Excluir</button></td>
                            </tr>

                    <?php
                        }
                    }
                    ?>
                </tbody>

        </form>
    </section>
</main>