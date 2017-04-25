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
        <h1 class="text-center"> Etapa 01.1 - Upload tabela do PGAdmin</h1>
        <nav>
            <a class="btn btn-primary" href="<?= URL_ARQ . 'index.odt'?>">Passo-a-passo-para-pesquisa.odt</a>
        </nav>
        <table class="table table-bordered">
            <thead>

            </thead>
            <tbody>
                <tr class="active">
                    <td>
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <!--action="pagina2.php"-->
                            <form action="<?= URL_RAIZ . 'importar'?>" method="POST" enctype="multipart/form-data" name="form" id="form">
                                <span class="fileupload-new">
                                    <label for=”arquivo”><font size="4"><br> BUSCAR ARQUIVO <input type="file" name="arquivo" id="arquivo" /></font></label>
                                </span>
                                <div>
                                    <button class="btn btn-success" type=”submit”>ENVIAR</button>
                                </div>
                            </form>
                        </div>
                        <div>

                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div>A TABELA DEVE TER: </div>
                        <div> 1 - OS CAMPOS LISTADOS NESTE MODELO:
                            <a href="<?= URL_ARQ . 'bi4-17-10-teste-MODELO.csv'?>">MODELO DE ARQUIVO </a></div>

                        <div> 2 - FORMATO DE ARQUIVO .csv</div>
                        <div> 2.1 - SALVANDO ARQUIVO .CSV CONFORME MODELO ABAIXO:</div>
                        <div> <img src="<?= URL_IMG . 'upload_planilha_salvar_csv.png'?>"></div>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
