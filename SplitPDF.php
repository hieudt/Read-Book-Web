<?php
include 'Pdf.php';
include 'db.php';
class SplitPDF
{

    /**
     * SplitPDF constructor.
     */

    public function __construct()
    {

    }

    public function splitName($nameFile){
        $a =  explode(".",$nameFile);
        $this->createFolder("data/".$a[0]);
        return $a[0];
    }
    public function createFolder($nameFolder){
        if (!file_exists($nameFolder)) {
            mkdir($nameFolder, 0777, true);
        }
    }



    public function split($fileName,$TenSach){
        GLOBAL $conn;
        $nameSplit = $this->splitName($fileName);
        $sql = "INSERT INTO dangky (tensach,tenfile)
              VALUES ('{$TenSach}','{$nameSplit}')";
        $conn->query($sql);


        $pathFile = $_SERVER['DOCUMENT_ROOT'] . '/DocSach/data/'.$fileName;
        $pathJPG = $_SERVER['DOCUMENT_ROOT'] . '/DocSach/data/'.$nameSplit.'/img';
        $pdf = new Spatie\PdfToImage\Pdf($pathFile);
        $last_id = $conn->insert_id;
        for ($i = 1;$i <= $pdf->getNumberOfPages();$i++) {
            $pdf->setPage($i)
                ->saveImage($pathJPG.$i.".jpg");

            $sql = "INSERT INTO itemsach (sach_id,image_name)
                VALUES ('{$last_id}','img{$i}.jpg')";
            $conn->query($sql);

        }




    }


}