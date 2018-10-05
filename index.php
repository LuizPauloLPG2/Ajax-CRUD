<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>AJAX</title>
    </head>
    <body>
        <br>
        <div class="container">
            <div id="erro">
            </div>
            <br>
            <table class="table table-sm table-hover table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NOME</th>
                        <th>DESCRIÇÃO</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php require_once("./conexao.php"); ?>
                    <?php
                    $sql = ("select * from tbestudo");
                    $stmt = Db::_conexao()->prepare($sql);
                    $stmt->execute();
                    ?>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">DETALHES</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>NOME</label>
                                            <input class="form-control" type="text" id="nome_estudo">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>DESCRIÇÃO</label>
                                            <input class="form-control" type="email" id="desc_estudo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="id_estudo" type="button" class="btn btn-sm btn-success updateIdEstudo">SALVAR ALTERAÇÕES</button>
                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">CANCELAR</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $row['id_estudo']; ?></td>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo $row['descricao']; ?></td>
                        <td class="text-right">
                            <button data-id="<?php echo $row['id_estudo']; ?>" type="button" class="btn btn-outline-primary btn-sm getIdEstudo" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-edit"></i> Detalhes
                            </button>
                            <button data-id="<?php echo $row['id_estudo']; ?>" type="button" class="btn btn-outline-danger btn-sm delIdEstudo">
                                <i class="fas fa-trash-alt"></i> Excluir
                            </button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <hr class="border border-primary">
            <div class="container">
                <form method="post" id="sendData">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label><code>*</code>NOME</label>
                            <input class="form-control" name="nome_estudo" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <label><code>*</code>DESCRIÇÃO</label>
                            <input class="form-control" name="desc_estudo" type="text">
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" form="sendData" class="btn btn-success">CADASTRAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="index.js"></script>
    </body>
</html>
