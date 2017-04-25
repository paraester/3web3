<?php
namespace Controller;

use \Model\Inicio;

const PUBLIC_ARQUIVOS = APLICACAO_VIEW . 'arquivos/';

class ArquivoController
{
        public function index()
    {
        $local_file = PUBLIC_ARQUIVOS . 'index.pdf';
        $download_file = 'index.pdf';
        $download_rate = 20.5;
            header('Cache-control: private');
            header('Content-Type: application/octet-stream');
            header('Content-Length: '.filesize($local_file));
            header('Content-Disposition: filename='.$download_file);

            flush();
            $file = fopen($local_file, "r");
            while(!feof($file))
            {
                // send the current file part to the browser
                print fread($file, round($download_rate * 1024));
                // flush the content to the browser
                flush();
                // sleep one second
                sleep(1);
            }
            fclose($file);

            
        //require PUBLIC_ARQUIVOS . 'index.odt';
        //require_once(PUBLIC_ARQUIVOS . 'index.odt');
            /*
        $file = '01.jpg';
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }
            */
    }
    public function imagem_plan_salvar()
    {
            $file = PUBLIC_ARQUIVOS . 'upload_planilha_salvar_csv.png';
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
    }
    public function modelo_arquivo_csv()
    {
            $file = PUBLIC_ARQUIVOS . 'bi4-17-10-teste-MODELO.csv';
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
    }
}