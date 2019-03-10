<?php
/**
 * Created by PhpStorm.
 * User: LaptopAZ.vn
 * Date: 10/11/2018
 * Time: 12:21 AM
 */
include 'db.php';
class Sach
{

    /**
     * Sach constructor.
     */
    public function __construct()
    {
    }

    public function getAllSach(){
        GLOBAL $conn;
        $sql = "SELECT * from dangky";
        return $conn->query($sql);
    }

    public function getSachByID($Id){
        GLOBAL $conn;
        $sql = "select itemsach.sach_id,tensach,tenfile,image_name from dangky inner join itemsach on dangky.sach_id = itemsach.sach_id where dangky.sach_id = {$Id}";
        return $conn->query($sql);
    }
}