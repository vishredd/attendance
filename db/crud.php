<?php
    class crud{
        //Private database object
        private $db;

        //constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;

        }

        public function insert($fname, $lname, $dob, $email, $contact, $speciality){
            try{
                //define sql statement to be executed
                $sql = "INSERT INTO attendee (firstname, lastname, dateofbirth, emailaddress, contactnumber, speciality_id)  VALUES (:fname, :lname, :dob, :email, :contact, :speciality)";
                //prepare the sql statement execution
                $stmt = $this->db->prepare($sql);
                //bind all placeholders to the
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':speciality',$speciality);

                $stmt->execute();
                return true;

            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        

        }

        public function editAttendee($id,$fname, $lname, $dob, $email,$contact,$speciality){
            try{ 
                 $sql = "UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,`emailaddress`=:email,`contactnumber`=:contact,`speciality_id`=:speciality WHERE attendee_id = :id ";
                 $stmt = $this->db->prepare($sql);
                 // bind all placeholders to the actual values
                 $stmt->bindparam(':id',$id);
                 $stmt->bindparam(':fname',$fname);
                 $stmt->bindparam(':lname',$lname);
                 $stmt->bindparam(':dob',$dob);
                 $stmt->bindparam(':email',$email);
                 $stmt->bindparam(':contact',$contact);
                 $stmt->bindparam(':speciality',$speciality);
 
                 // execute statement
                 $stmt->execute();
                 return true;
            }catch (PDOException $e) {
             echo $e->getMessage();
             return false;
            }
             
         }

        public function getAttendees(){
            $sql = "SELECT * FROM `attendee` a inner join specialities s on a.speciality_id = s.speciality_id;";
            $result = $this->db->query($sql);
            return($result);
        }

        public function getAttendeeDetails($id){
            $sql = "select * from attendee a inner join specialities s on a.speciality_id = s.speciality_id where a.attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            $result = $stmt->fetch();
            return($result);
        }

        public function deleteAttendee($id){
            try{
                 $sql = "delete from attendee where attendee_id = :id";
                 $stmt = $this->db->prepare($sql);
                 $stmt->bindparam(':id', $id);
                 $stmt->execute();
                 return true;
             }catch (PDOException $e) {
                 echo $e->getMessage();
                 return false;
             }
         }

        public function getSpecialities(){
            $sql = "SELECT * FROM `specialities`;";
            $result = $this->db->query($sql);
            return($result);
        }

    }
?>