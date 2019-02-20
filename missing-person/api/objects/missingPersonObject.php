<?php
class MissingPersons{
  private $connection;
  private $table_name = "peoplelost";


  public $id;
  public $pname;
  public $fname;
  public $lname;
  public $gender;
  public $age;
  public $place;
  public $subdistrict;
  public $district;
  public $city;
  public $height;
  public $weight;
  public $shape;
  public $hairtype;
  public $haircolor;
  public $skintone;
  public $upperwaist;
  public $lowerwaist;
  public $detail_etc;
  public $specific;
  public $type_id;
  public $guest_id;
  public $status;
  public $reg_date;

  public function __construct($connection){
    $this->connection = $connection;

  }

  function read(){

     $query = "SELECT *  FROM " . $this->table_name ;
     $stmt = $this->connection->prepare($query);
     $stmt->execute();

     return $stmt;
   }

   function delete(){

       // delete query
       $query = "DELETE FROM " . $this->table_name . " WHERE plost_id = ?";

       // prepare query
       $stmt = $this->connection->prepare($query);

       // sanitize
       $this->id=htmlspecialchars(strip_tags($this->plost_id));

       // bind id of record to delete
       $stmt->bindParam(1, $this->plost_id);

       // execute query
       if($stmt->execute()){
           return true;
       }
       return false;
     }

     function create(){
       
    // query to insert record
      $query = "INSERT INTO
                " . $this->table_name . "
            SET
                plost_id = :plost_id,
                pname = :pname,
                fname = :fname,
                lname = :lname,
                gender = :gender,
                age = :age,
                place = :place,
                subdistrict = :subdistrict,
                district = :district,
                city = :city,
                height = :height,
                weight = :weight,
                shape = :shape,
                hairtype = :hairtype,
                haircolor = :haircolor,
                skintone = :skintone,
                upperwaist = :upperwaist,
                lowerwaist = :lowerwaist,
                detail_etc = :detail_etc,
                specific = :specific,
                type_id = :type_id,
                guest_id = :guest_id,
                status = :status,
                reg_date = :reg_date";

    // prepare query
    $stmt = $this->connection->prepare($query);

    // sanitize
    $this->plost_id=htmlspecialchars(strip_tags($this->plost_id));
    $this->pname=htmlspecialchars(strip_tags($this->pname));
    $this->fname=htmlspecialchars(strip_tags($this->fname));
    $this->lname=htmlspecialchars(strip_tags($this->lname));
    $this->gender=htmlspecialchars(strip_tags($this->gender));
    $this->age=htmlspecialchars(strip_tags($this->age));
    $this->place=htmlspecialchars(strip_tags($this->place));
    $this->subdistrict=htmlspecialchars(strip_tags($this->subdistrict));
    $this->district=htmlspecialchars(strip_tags($this->district));
    $this->city=htmlspecialchars(strip_tags($this->city));
    $this->height=htmlspecialchars(strip_tags($this->height));
    $this->weight=htmlspecialchars(strip_tags($this->weight));
    $this->shape=htmlspecialchars(strip_tags($this->shape));
    $this->hairtype=htmlspecialchars(strip_tags($this->hairtype));
    $this->haircolor=htmlspecialchars(strip_tags($this->haircolor));
    $this->skintone=htmlspecialchars(strip_tags($this->skintone));
    $this->upperwaist=htmlspecialchars(strip_tags($this->upperwaist));
    $this->lowerwaist=htmlspecialchars(strip_tags($this->lowerwaist));
    $this->detail_etc=htmlspecialchars(strip_tags($this->detail_etc));
    $this->specific=htmlspecialchars(strip_tags($this->specific));
    $this->type_id=htmlspecialchars(strip_tags($this->type_id));
    $this->guest_id=htmlspecialchars(strip_tags($this->guest_id));
    $this->status=htmlspecialchars(strip_tags($this->status));
    $this->reg_date=htmlspecialchars(strip_tags($this->reg_date));


    // bind values
    $stmt->bindParam(":plost_id", $this->plost_id);
    $stmt->bindParam(":pname", $this->pname);
    $stmt->bindParam(":fname", $this->fname);
    $stmt->bindParam(":lname", $this->lname);
    $stmt->bindParam(":gender", $this->gender);
    $stmt->bindParam(":age", $this->age);
    $stmt->bindParam(":place", $this->place);
    $stmt->bindParam(":subdistrict", $this->subdistrict);
    $stmt->bindParam(":district", $this->district);
    $stmt->bindParam(":city", $this->city);
    $stmt->bindParam(":height", $this->height);
    $stmt->bindParam(":weight", $this->weight);
    $stmt->bindParam(":shape", $this->shape);
    $stmt->bindParam(":hairtype", $this->hairtype);
    $stmt->bindParam(":haircolor", $this->haircolor);
    $stmt->bindParam(":skintone", $this->skintone);
    $stmt->bindParam(":upperwaist", $this->upperwaist);
    $stmt->bindParam(":lowerwaist", $this->lowerwaist);
    $stmt->bindParam(":detail_etc", $this->detail_etc);
    $stmt->bindParam(":specific", $this->specific);
    $stmt->bindParam(":type_id",$this->type_id);
    $stmt->bindParam(":guest_id",$this->guest_id);
    $stmt->bindParam(":status", $this->status);
    $stmt->bindParam(":reg_date",$this->reg_date);

    if($stmt->execute()){
        return true;
    }

    return false;
   }

  function emailExists(){

    $query = "SELECT guest_id, guest_name, guest_pass, guest_email
    FROM  $this->table_name
    WHERE guest_email = ?
    LIMIT 0,1";

    // prepare the query
    $stmt = $this->connection->prepare($query);
    $this->guest_email=htmlspecialchars(strip_tags($this->guest_email));
    $stmt->bindParam(1, $this->guest_email);

    $stmt->execute();
    $num = $stmt->rowCount();

  if($num>0){
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $this->guest_id = $row['guest_id'];
    $this->guest_name = $row['guest_name'];
    $this->guest_email = $row['guest_email'];
    $this->guest_pass = $row['guest_pass'];
    return true;
  }
  return false;
}

  function update(){

                  $query = "UPDATE $this->table_name
                  SET pname = :pname,
                  fname = :fname,
                  lname = :lname,
                  gender = :gender,
                  age = :age,
                  place = :place,
                  subdistrict = :subdistrict,
                  district = :district,
                  city = :city,
                  height = :height,
                  weight = :weight,
                  shape = :shape,
                  hairtype = :hairtype,
                  haircolor = :haircolor,
                  skintone = :skintone,
                  upperwaist = :upperwaist,
                  lowerwaist = :lowerwaist,
                  detail_etc = :detail_etc,
                  specific = :specific,
                  type_id = :type_id,
                  guest_id = :guest_id,
                  status = :status,
                  reg_date = NOW()
                  WHERE
                plost_id = :plost_id";


      // prepare query statement
      $stmt = $this->connection->prepare($query);

      // sanitize
      $this->plost_id=htmlspecialchars(strip_tags($this->plost_id));
      $this->pname=htmlspecialchars(strip_tags($this->pname));
      $this->fname=htmlspecialchars(strip_tags($this->fname));
      $this->lname=htmlspecialchars(strip_tags($this->lname));
      $this->gender=htmlspecialchars(strip_tags($this->gender));
      $this->age=htmlspecialchars(strip_tags($this->age));
      $this->place=htmlspecialchars(strip_tags($this->place));
      $this->subdistrict=htmlspecialchars(strip_tags($this->subdistrict));
      $this->district=htmlspecialchars(strip_tags($this->district));
      $this->city=htmlspecialchars(strip_tags($this->city));
      $this->height=htmlspecialchars(strip_tags($this->height));
      $this->weight=htmlspecialchars(strip_tags($this->weight));
      $this->shape=htmlspecialchars(strip_tags($this->shape));
      $this->hairtype=htmlspecialchars(strip_tags($this->hairtype));
      $this->haircolor=htmlspecialchars(strip_tags($this->haircolor));
      $this->skintone=htmlspecialchars(strip_tags($this->skintone));
      $this->upperwaist=htmlspecialchars(strip_tags($this->upperwaist));
      $this->lowerwaist=htmlspecialchars(strip_tags($this->lowerwaist));
      $this->detail_etc=htmlspecialchars(strip_tags($this->detail_etc));
      $this->specific=htmlspecialchars(strip_tags($this->specific));
      $this->type_id=htmlspecialchars(strip_tags($this->type_id));
      $this->guest_id=htmlspecialchars(strip_tags($this->guest_id));
      $this->status=htmlspecialchars(strip_tags($this->status));
      $this->reg_date=htmlspecialchars(strip_tags($this->reg_date));



      // bind values
      $stmt->bindParam(":plost_id", $this->plost_id);
      $stmt->bindParam(":pname", $this->pname);
      $stmt->bindParam(":fname", $this->fname);
      $stmt->bindParam(":lname", $this->lname);
      $stmt->bindParam(":gender", $this->gender);
      $stmt->bindParam(":age", $this->age);
      $stmt->bindParam(":place", $this->place);
      $stmt->bindParam(":subdistrict", $this->subdistrict);
      $stmt->bindParam(":district", $this->district);
      $stmt->bindParam(":city", $this->city);
      $stmt->bindParam(":height", $this->height);
      $stmt->bindParam(":weight", $this->weight);
      $stmt->bindParam(":shape", $this->shape);
      $stmt->bindParam(":hairtype", $this->hairtype);
      $stmt->bindParam(":haircolor", $this->haircolor);
      $stmt->bindParam(":skintone", $this->skintone);
      $stmt->bindParam(":upperwaist", $this->upperwaist);
      $stmt->bindParam(":lowerwaist", $this->lowerwaist);
      $stmt->bindParam(":detail_etc", $this->detail_etc);
      $stmt->bindParam(":specific", $this->specific);
      $stmt->bindParam(":type_id",$this->type_id);
      $stmt->bindParam(":guest_id",$this->guest_id);
      $stmt->bindParam(":status", $this->status);
      $stmt->bindParam(":reg_date",$this->reg_date);


      // execute the query
      if($stmt->execute()){
              return true;
          }

          return false;
      }

      // search products
function search(){

    // select all query
    $query = "SELECT p.fname,p.lname,p.city,p.detail_etc,t.type_name as type_type_name FROM
                 . $this->table_name  p
                 LEFT JOIN
                     type t
                         ON p.type_id = t.type_id
            WHERE
                fname LIKE :fname OR lname LIKE :lname OR city LIKE :city
            ORDER BY
                fname DESC";

    // prepare query statement
    $stmt = $this->connection->prepare($query);

    // sanitize
    $this->fname=htmlspecialchars(strip_tags($this->fname));
    $this->lname=htmlspecialchars(strip_tags($this->lname));
    $this->city=htmlspecialchars(strip_tags($this->city));
    //$this->type=htmlspecialchars(strip_tags($this->type));
    //$this->missing_person=htmlspecialchars(strip_tags($this->missing_person));

    $this->fname = "%{$this->fname}%";
    $this->lname = "%{$this->lname}%";
    $this->fname = "%{$this->city}%";
    //$this->lname = "%{$this->type}%";
    //$this->missing_person = "%{$this->missing_person}%";
    // bind

    $stmt->bindParam(":fname", $this->fname);
    $stmt->bindParam(":lname", $this->lname);
    $stmt->bindParam(":city", $this->city);
   //$stmt->bindParam(":type", $this->type);
   //$stmt->bindParam(":missing_person", $this->missing_person);
    //$stmt->bindParam(1, $keywords);
    //$stmt->bindParam(2, $keywords);
    //$stmt->bindParam(3, $keywords);

    $stmt->execute();

    return $stmt;

  }

  function read_one($keywords){

      $query = "SELECT * FROM
                   . $this->table_name
              WHERE
                  id =$keywords
                  ORDER BY id DESC";

      // prepare query statement
      $stmt = $this->connection->prepare($query);

      $stmt->execute();

      return $stmt;
    }
}
?>
