<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Excluir CFOP</title>
  </head>
  <body>
    <main class="container">
        <h3>Excluir CFOP</h3>
        <form action="/cfop/deletar" method="post">
            <input type="hidden" name="id_CFOP" value="<?= $resultado['id_CFOP'] ?>">
            <div class="row">
                <div class="col-6">
                    <label for="entradaSaida" class="form-label">Entrada ou Saída:</label>
                    <input type="number" disabled name="entradaSaida" class="form-control" value="<?= $resultado['entradaSaida'] ?>">
                </div>
                <div class="col-6">
                    <label for="grupoOuOperacao" class="form-label">Grupo ou Operação:</label>
                    <input type="number" disabled name="grupoOuOperacao" class="form-control" value="<?= $resultado['grupoOuOperacao'] ?>">
                </div>
                <div class="col-6">
                    <label for="tipoPrestacao" class="form-label">Tipo da prestação:</label>
                    <input type="number" disabled name="tipoPrestacao" class="form-control" value="<?= $resultado['tipoPrestacao'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Você deseja realmente excluir esse registro?</p>
                    <button type="submit" class="btn btn-danger">
                        Excluir
                    </button>
                </div>
            </div>
        </form>
    </main>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>