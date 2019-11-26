<?php

class FileFromDB {

    private $filename;
	private $doctypeid;
	private $etudiantid;
	private $description;

    public function __construct($filename, $doctypeid, $etudiantid, $description) {
        $this->filename = $filename;
		$this->doctypeid = $doctypeid;
		$this->etudiantid = $etudiantid;
		$this->description = $description;
    }
   
    public function upload($File) {
        global $con;
        $stmt = $con->prepare("REPLACE INTO documenttype ".
                              "(name, document, type, doctypeid, etudiantid, description) ".
                              "VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $this->filename);
		$stmt->bindParam(2, fopen($File['tmp_name'], 'rb'), PDO::PARAM_LOB);
		$stmt->bindParam(3, $file['type']);
        $stmt->bindParam(4, $this->doctypeid);
        $stmt->bindParam(5, $this->etudiantid);
        $stmt->bindParam(6, $this->description);
         return $stmt->execute();
    }

    public function headers() {
        global $con;
        $stmt = $con->prepare("SELECT name, type, UNIX_TIMESTAMP(updated_date) AS updated_date ".
                              "FROM etudiant_document_type ".
                              "WHERE name = ?");
        $stmt->bindParam(1, $this->filename);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function output($filename=null) {
        global $con;
        $stmt = $con->prepare("SELECT type, UNIX_TIMESTAMP(updated_date), document ".
                              "FROM etudiant_document_type ".
                              "WHERE name = ?");
        $stmt->bindParam(1, $this->filename);
        $stmt->execute();
        $stmt->bindColumn(1, $type, PDO::PARAM_STR, 256);
        $stmt->bindColumn(2, $updated_date, PDO::PARAM_INT);
        $stmt->bindColumn(3, $document, PDO::PARAM_LOB);
        $stmt->fetch(PDO::FETCH_BOUND);
        if (is_null($filename)) {
            header("Content-Type: $type");
            header("Content-Disposition: inline; filename={$this->filename}");
            header("Last-Modified: ".date('r', $updated_date));
            //return fpassthru($data);
            return print($document);
        } else {
            $hdle = fopen($filename, 'wb');
            //return stream_copy_to_stream($data, $hdle);
            return fwrite($hdle, $document);
        }
    }

}

?>