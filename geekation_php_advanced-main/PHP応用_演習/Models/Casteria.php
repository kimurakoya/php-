<?php
require_once(ROOT_PATH .'Models/Db.php');

class Casteria extends Db {
    public function __construct($dbh = null) {
        parent::__construct($dbh);
    }

  public function findAll():Array {
      $sql = 'SELECT * FROM contacts';
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $result;
  }

  public function insertdata($data) {
 // var_dump($data);
      $sql = $this->dbh->prepare("INSERT INTO contacts (name, kana, tel, email, body) VALUES (:name, :kana, :tel, :email, :body)");
      $sql->bindValue(':name', $data['name']);
      $sql->bindValue(':kana', $data['kana']);
      $sql->bindValue(':tel', $data['tel']);
      $sql->bindValue(':email', $data['mail']);
      $sql->bindValue(':body', $data['body']);
      $sql->execute();
  }

  public function getdata($id) {
      // var_dump($id);
      $sql = $this->dbh->prepare("SELECT * FROM contacts WHERE id = :id");
      $sql->bindValue(':id', $id, PDO::PARAM_INT);
      $sql->execute();
      $result = $sql->fetchAll(PDO::FETCH_ASSOC);
      return $result;
  }

  public function updatedata($data) {
      $sql = $this->dbh->prepare("UPDATE contacts SET name = :name, kana = :kana, tel = :tel, email = :email, body = :body WHERE id = :id");
      $sql->bindParam(':id', $data['id']);
      $sql->bindParam(':name', $data['fullname']);
      $sql->bindParam(':kana', $data['furigana']);
      $sql->bindParam(':tel', $data['tel']);
      $sql->bindParam(':email', $data['mail']);
      $sql->bindParam(':body', $data['body']);
      $sql->execute();
  }

  public function deletedata($data) {
    $sql = $this->dbh->prepare("DELETE FROM contacts WHERE id = :id");
    $sql->bindValue(':id', $data, PDO::PARAM_INT);
    $sql->execute();
    //var_dump($data);
  }

}
