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
        <h1 class="text-center">Pesquisa de Satisfação - Etapa 01 - Inicio</h1>
        <nav>
            <a class="btn btn-primary" href="<?= URL_RAIZ . 'arquivos'?>">Passo-a-passo-para-pesquisa.pdf</a>
        </nav>
        <table class="table table-bordered">
            <thead>
                <tr class="active">
                    <th class="coluna-botoes">GO</th>
                    <th>ATIVIDADE</th>
                    <th>DESCRIÇÃO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <!-- href="./01-import_para_rel_planilha_principal/pagina1.php"-->
                        <a class="btn btn-xs btn-default" href="<?= URL_RAIZ . 'importar'?>">
                            <span class="glyphicon glyphicon-upload"></span>
                        </a>
                    </td>
                    <td>Carregar tabela do PGADMIN</td>
                    <td> </td>
                </tr>
                <tr>
                    <td>
                        <!-- href="./relatorio/EXPORT-PLANILHA/export_planilha.php"-->
                        <a class="btn btn-xs btn-default" href="<?= URL_RAIZ . 'exportar'?>">
                            <span class="glyphicon glyphicon-export"></span>
                        </a>
                    </td>
                    <td>Exportar tabela para Business Intelligence</td>
                    <td> </td>
                </tr>
                <tr>
                    <td>
                        <a class="btn btn-xs btn-default" href="<?= URL_RAIZ . 'sorteio'?>">
                            <span class="glyphicon glyphicon-sort"></span>
                        </a>
                    </td>
                    <td>Sorteio</td>
                    <td> </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div> Roteiro </div>
                        <div> 1- ACESSAR O PgADMIN - Exportar a "tabelona"</div>
                        <div> 2- ACESSAR 10.62.2.2/pesquisa </div>
                        <div> 3- Importar a "tabelona" </div>
                        <div> 4- Fazer o sorteio </div>
                        <div> 5- Planilha </div>
                        <div> 6- Validar os dados juntamente com a SOC </div>
                        <div>7- Enviar a planilha para DICAC </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</body>

</html>