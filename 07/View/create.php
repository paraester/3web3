<!DOCTYPE html>
<html>
<head>
    <title>Pizzaria Delivery</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= URL_CSS . 'bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= URL_CSS . 'geral.css' ?>">
</head>
<body>
    <div class="center-block site">
        <h1 class="text-center">Faça o seu pedido</h1>
        <form method="post">
            <div class="form-group">
                <label for="clienteNome">Nome do cliente</label>
                <input id="clienteNome" name="clienteNome" class="form-control" autofocus>
            </div>
            <div class="form-group">
                <label for="pizzaTamanho">Tamanho da pizza</label>
                <select id="pizzaTamanho" name="pizzaTamanho" class="form-control">
                    <option value="pequena">Pequena</option>
                    <option value="media">Média</option>
                    <option value="grande">Grande</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pizzaSabor">Sabor da pizza</label>
                <select id="pizzaSabor" name="pizzaSabor" class="form-control">
                    <option value="mussarela">Mussarela</option>
                    <option value="calabresa">Calabresa</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Finalizar</button>
        </form>
    </div>
</body>
</html>
