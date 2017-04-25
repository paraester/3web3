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
        <h1 class="text-center">Pesquisa de Satisfação - Etapa fim - CADASTRAR AMOSTRAS ENVIADAS</h1>
        <nav>
            <a class="btn btn-primary" href="<?= URL_RAIZ . 'arquivos'?>">Passo-a-passo-para-pesquisa.pdf</a>
        </nav>
        <table class="table table-bordered">
            <thead>
                <tr class="active">
                    <th></th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <!--action="pagina2.php"-->
                        <form action="pagina2.php" method="post" enctype="multipart/form-data" name="form" id="form">
                            <label for=”arquivo”>
                                <font size="4">CADASTRAR AMOSTRAS ENVIADAS BUSCAR ARQUIVO&nbsp;<input type="file" name="arquivo" id="arquivo" /></font></label>
                            <button type=”submit”>ENVIAR PARA BANCO DE DADOS &nbsp;</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            A planilha dever&aacute; ter os campos mostrados, como por exemplo, na figura abaixo: Desconsidere a formata&ccedil;&atilde; o pois o arquivo deve ser salvo em .csv conforme modelo:
                            <img src="../imgs/upload_planilha_enviadas.png" height="60%" width="60%">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>A TABELA DEVE TER: 1 - OS CAMPOS LISTADOS NESTE MODELO:</div>
                        <div><a href="./newODSModelo-MODELO.csv">MODELO DE ARQUIVO </a> </div>
                        <div>2 - FORMATO DE ARQUIVO .csv 2.1 - SALVANDO ARQUIVO .CSV CONFORME MODELO ABAIXO:</div>
                        <div>
                            <img src="../imgs/upload_planilha_salvar_csv.png" height="60%" width="60%"> >2.2 - LEMBRE-SE DO ponto-e-v&iacute;rgula como DELIMITADOR DE CAMPO, AO SALVAR EM FORMATO .csv
                        </div>
                    </td>
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