<!DOCTYPE html>
<html>

<head>
    <title>Pesquisa de Satisfação</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= URL_CSS . 'bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= URL_CSS . 'geral.css' ?>">
</head>

<body>
    <div class="center-block site">
        <h1 class="text-center"> RELATÓRIO - Exportar tabela</h1>
        <nav>
            <a class="btn btn-primary" href="<?= URL_RAIZ . 'arquivos'?>">Passo-a-passo-para-pesquisa.pdf</a>
        </nav>
        <table class="table table-bordered">
            <thead>

            </thead>
            <tbody>
                <tr class="active">
                    <td>
                        <div>

                            <a class="btn btn-xs btn-default" href="<?= URL_RAIZ . 'exportar'?>">
                                <span class="glyphicon glyphicon-upload">EXPORTAR</span>
                            </a>
                        </div>
                        <div></div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>