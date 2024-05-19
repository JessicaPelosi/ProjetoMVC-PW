<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
   </head>
  <body>
    <main class="container">
        <h1>Produto de Limpeza</h1>
        <a href="/limpeza/inserir" class="btn btn-primary">Novo Produto de Limpeza</a>
        <p><?= $mensagem ?> </p>
        <table class="table table-stripped table-hover" id="tabela">
            <thead>
                <tr>
                    <th> Aplicação </th>
                    <th> Nome </th>
                    <th> Preço </th>
                    <th> Quantidade </th>
                    <th> Ações </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($c = $resultado->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        <tr>
                            <td><?= $c['aplicacao']?></td>
                            <td><?= $c['nome']?></td>
                            <td><?= $c['preco']?></td>
                            <td><?= $c['quantidade']?></td>
                            
                            <td>
                                <a href="/limpeza/alterar/id/<?= $c["id"]?>" class="btn btn-warning">
                                    Alterar
                                </a>
                                <a href="/limpeza/excluir/id/<?= $c["id"]?>" class="btn btn-danger">
                                    Excluir
                                </a>
                            </td>
                        </tr>
                    <?php    
                    }
                ?>
            </tbody>
        </table>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        var table = new DataTable('#tabela', {
            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.0.6/i18n/pt-BR.json',
            },
        });
    </script>
  </body>
</html>