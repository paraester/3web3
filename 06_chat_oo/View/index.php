<!DOCTYPE html>
<html>
<head>
    <title>Chat Online</title>
    <style type="text/css">
        .negrito { font-weight: bold; }
    </style>
</head>
<body>
    <h1>Envie a sua mensagem</h1>
    <form method="post">
        Usuário: <input name="usuario">
        Mensagem: <textarea name="conteudo"></textarea>
        <input type="submit" value="Enviar mensagem" name="submit">
    </form>
    <h1>Mensagens</h1>
    <?php foreach ($mensagens as $mensagem) : ?>
        <p>
            <span class="negrito"><?= $mensagem->getUsuario() ?></span>:
            <?= $mensagem->getConteudo() ?>
        </p>
    <?php endforeach ?>
</body>
</html>
