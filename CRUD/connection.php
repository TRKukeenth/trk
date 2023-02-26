<?php
    class crud{
        public static function connect()
        {
           try {
            $con=new PDO('mysql:localhost=host; dbname=CRUD','root','');
            return $con;
           } catch (PDOException $error1) {

            echo 'cant connect db'.$error1->getMessage();
           }catch (Exception $error2){
            echo 'genectic error'.$error2->getMessage();
           }
        }
        public static function SelectData()
        {   
            $data=array();
            $p=crud::connect()->prepare('SELECT *FROM crudtable ');
            $p->execute();
            $data=$p->fetchAll(PDO::FETCH_ASSOC);
            return $data;
             
        }
        public static function delete($id)
        {
            $p=crud::connect()->prepare('DELETE FROM crudtable WHeRE id=:id');
            $p->bindValue(':id',$id);
            $p->execute();
        }
    }
?>