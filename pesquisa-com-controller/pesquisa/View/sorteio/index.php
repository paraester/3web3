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
        <h1 class="text-center">Pesquisa de Satisfação - Etapa 02 - Sorteio</h1>
        <nav>
            <a class="btn btn-primary" href="./Passo-a-passo-para-pesquisa.odt">Passo-a-passo-para-pesquisa.odt</a>

        </nav>
        <table class="table table-bordered">
            <thead>
                <tr class="active">
                    <th class="coluna-botoes">GO</th>
                    <th>DESCRIÇÃO</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <!--href="./sorteioso/sorteio.php"-->
                        <a class="btn btn-xs btn-default" href="<?= URL_RAIZ . 'fazsorteio'?>">
                            <span class="glyphicon glyphicon-upload">Fazendo o sorteio</span>
                        </a>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <a class="btn btn-xs btn-default" href="./sorteioso/imprimir-arquivo-sorteio.php">
                            <span class="glyphicon glyphicon-eye-open"></span>
                        </a>
                    </td>
                    <td>Após sorteio Planilha Pesquisa</td>
                </tr>
                <tr>
                    <td>
                        <a class="btn btn-xs btn-default" href="./sorteioso/imprimir-arquivo-sorteio_formatado.php">
                            <span class="glyphicon glyphicon-align-justify"></span>
                        </a>
                    </td>
                    <td>Planilha pesquisa formatada</td>
                </tr>
                <tr>
                    <td>
                        <a class="btn btn-xs btn-default" href="./sorteioso/imprimir-arquivo-sorteio_formatado_contatos_ja_enviados.php">
                            <span class="glyphicon glyphicon-align-justify"></span>
                        </a>
                    </td>
                    <td>PLANILHA PESQUISA FORMATADA CONTATOS JA ENVIADOS</td>
                </tr>
                <tr>
                    <td>
                        <a class="btn btn-xs btn-default" href="./sorteioso/imprimir-arquivo-sorteio_formatado-2.php">
                            <span class="glyphicon glyphicon-align-justify"></span>
                        </a>
                    </td>
                    <td>PLANILHA PESQUISA FORMATADA sem DER, SEFA</td>
                </tr>
                <tr>
                    <td>
                        <!-- href="./02-import_para_rel_planilha_pesquisa_amostras_enviadas/pagina1.php"-->
                        <a class="btn btn-xs btn-default" href="<?= URL_RAIZ . 'amostra'?>">
                            <span class="glyphicon glyphicon-list-alt"></span>
                        </a>
                    </td>
                    <td>CADASTRAR AMOSTRAS ENVIADAS</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div> </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</body>

</html>