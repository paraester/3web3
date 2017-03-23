<?php
define('ARQUIVO_DE_DADOS', 'dados.txt');

if (!file_exists(ARQUIVO_DE_DADOS)) {
    $arrayVazio = serialize([]);
    file_put_contents(ARQUIVO_DE_DADOS, $arrayVazio);
}

$precisaCadastrar = array_key_exists('usuario', $_POST) && array_key_exists('conteudo', $_POST);
if ($precisaCadastrar) {
    $dadosString = file_get_contents(ARQUIVO_DE_DADOS);
    $dados = unserialize($dadosString);
    $dados[] = [
        'usuario' => $_POST['usuario'],
        'conteudo' => $_POST['conteudo'],
    ];
    $dadosString = serialize($dados);
    file_put_contents(ARQUIVO_DE_DADOS, $dadosString);
}

$mensagensString = file_get_contents(ARQUIVO_DE_DADOS);
$mensagens = unserialize($mensagensString);

?>
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
            <span class="negrito"><?= $mensagem['usuario'] ?></span>:
            <?= $mensagem['conteudo'] ?>
        </p>
    <?php endforeach ?>
</body>
</html>
