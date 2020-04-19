<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS, PATCH');

require '../vendor/autoload.php';
Flight::register('db', 'PDO', array('mysql:host=remotemysql.com;dbname=tEYQ0vL2Rn','tEYQ0vL2Rn','Xwqg1jEEB0'));

Flight::route('GET /babys', function(){
 $babys = Flight::db()->query('SELECT * FROM babys', PDO::FETCH_ASSOC)->fetchAll();
 Flight::json($babys);
});

Flight::route('POST /babys', function(){
    $request = Flight::request()->data->getData();
    $insert = "INSERT INTO babys (mother, bdate, time, height, weight) VALUES(:mother, :bdate, :time, :height, :weight)";  // fname, lname, user_email and phone are names of input fields
    $stmt= Flight::db()->prepare($insert);
    $stmt->execute($request);
});

Flight::route('DELETE /babys/@id', function($id){
     $delete = "DELETE FROM babys WHERE id = :id";
     $stmt= Flight::db()->prepare($delete);
     $stmt->execute([":id" => $id]);
});

Flight::start();
?>
