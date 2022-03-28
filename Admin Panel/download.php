<?php 
    if(!empty($_GET['k']))
    {
        $file=$_GET['k'];

        $file_path='Notice Resources/'.$file;

        if(!empty($file) && file_exists($file_path))
        {
            //for pdf
            if(strpos($file,'.pdf'))
            {
                //header definition
                header("Cache-Control: public");
                header("Content-Description: File Transfer");
                header("Content-Deposition: attacment; filename=$file");
                header("Content-Type: application/pdf");
                header("Content-Transfer-Encoding: binary");

                //read/download
                readfile($file_path);
                exit;
            }

            //for jpeg
            else if(strpos($file,'.jpeg'))
            {
                header("Cache-Control: public");
                header("Content-Description: File Transfer");
                header("Content-Deposition: attacment; filename=$file");
                header("Content-Type: image/jpeg");
                header("Content-Transfer-Encoding: binary");

                //read/download
                readfile($file_path);
                exit;
            }
        }

        else{
            $result="File not found!";
            echo $result;
            exit;
        }
    }
?>