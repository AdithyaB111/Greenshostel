<?php
class Common
{
    public function getAllRecords($connection) {
        $query = "SELECT * FROM bird_delete_records";
        $result = $connection->query($query) or die("Error in query1".$connection->error);
        return $result;
    }

    public function deleteRecordById($connection,$recordId) {
        $query = "DELETE FROM bird_delete_records WHERE id='$recordId'";
        $result = $connection->query($query) or die("Error in query2".$connection->error);
        return $result;
    }

    public function updategetAllRecords($connection,$recordId,$clike,$cdislike){
        $query = "UPDATE bird_delete_records SET clike = '$clike', cdislike = '$cdislike' WHERE id = $recordId";
        $result = $connection->query($query) or die("Error in query3".$connection->error);
        return $result;
    }

    public function Doctor_getAllRecords($connection) {
        $query = "SELECT * FROM doctors";
        $result = $connection->query($query) or die("Error in query1".$connection->error);
        return $result;
    }

    public function Doctor_deleteRecordById($connection,$recordIdoc) {
        $query = "DELETE FROM doctors WHERE id='$recordIdoc'";
        $result = $connection->query($query) or die("Error in query3".$connection->error);
        return $result;
    }

    public function Follow_getAllRecords($connection) {
        $query = "SELECT * FROM follows";
        $result = $connection->query($query) or die("Error in query4".$connection->error);
        return $result;
    }

    public function Admine_getAllRecords($connection){
        $query = "SELECT * FROM users";
        $result = $connection->query($query) or die("Error in query5".$connection->error);
        return $result;
    }


}