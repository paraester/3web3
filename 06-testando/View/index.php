<!DOCTYPE html>
<html>
<head>
    <title>CONTATO RÁPIDO</title>
    <style type="text/css">
        .negrito { font-weight: bold; }
    </style>
</head>
<body>
<form method="post">
<table width="450" border="0" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td><div id="mainform"><h2>ENTRE EM CONTATO</h2></div></td>
        </tr>

            <tr>
                <td align="left"><label>usuario: <span>*</span></label>
                    <input id="usuario" name="usuario" type="text" placeholder="Name" required>
                </td>
            </tr>
            <tr>
                <td align="left"><label>Email: <span>*</span></label>
                    <input id="email" name="email" type="text"  placeholder="Email" required>
                </td>
            </tr>
            <tr>
                <td align="left"><label>Telefone: <span>*</span></label>
                    <input id="telefone" name="telefone" type="text" maxlength = "10"  placeholder="10 digitos no. fone" required>
                </td>
                </tr>
            <tr>
                <td align="left"><label>Mensagem:</label>
                    <textarea id="conteudo" name="conteudo" placeholder="Message......." required></textarea>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <input type="submit" value="Enviar mensagem" name="submit">
                </td>
            </tr>
    </tbody>
</table>
</form>
    <h1>CONTATOS SALVOS</h1>
<?php foreach ($mensagens as $mensagem) : ?>
    <p>
        <span class="negrito">Usuário: <?= $mensagem->getUsuario() ?></span>
        <br>Email:
        <?= $mensagem->getEmail() ?>
        <br>Telefone:
        <?= $mensagem->getTelefone() ?>
        <br>Conteúdo da mensagem: 
        <?= $mensagem->getConteudo() ?>
    </p>
<?php endforeach ?>
</body>
</html>
