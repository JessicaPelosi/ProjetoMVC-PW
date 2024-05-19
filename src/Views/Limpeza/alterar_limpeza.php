<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Alterar produto de Limpeza</title>
  </head>
  <body>
    <main class="container">
        <h3>Alterar produto de Limpeza</h3>
        <form action="/limpeza/editar" method="post">
            <input type="hidden" name="id" value="<?= $resultado['id'] ?>">
            <div class="row">
                <div class="col-6">
                     <label for="aplicacao" class="form-label">Local de aplicação:</label>
                    <input type="text" name="aplicacao" class="form-control" value="<?= $resultado['aplicacao'] ?>">
                </div>
                <div class="col-6">
                    <label for="nome" class="form-label">Nome do produto de limpeza:</label>
                    <input type="text" name="nome" class="form-control" value="<?= $resultado['nome'] ?>">
                </div>
                <div class="col-6">
                    <label for="preco" class="form-label">Preço do produto de limpeza:</label>
                    <input type="text" name="preco" class="form-control" value="<?= $resultado['preco'] ?>">
                </div>
                <div class="col-6">
                    <label for="quantidade" class="form-label">Quantidade do produto de limpeza:</label>
                    <input type="text" name="quantidade" class="form-control" value="<?= $resultado['quantidade'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary">
                        Salvar
                    </button>
                </div>
            </div>
        </form>
    </main>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>