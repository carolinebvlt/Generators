<?php
    // try{
    //     $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
    // }
    // catch (Exception $e){
    //     die('Erreur : ' . $e->getMessage());
    // }
    //
    // // $rq = $db->query('SELECT * FROM test');
    // //
    // // $data = $rq->fetchAll(PDO::FETCH_ASSOC);
    // //
    // // $rq->closeCursor();
    // //
    // // var_dump($data);
    //
    // $rq = $db->query('DESCRIBE test');
    // $data = $rq->fetchAll(PDO::FETCH_ASSOC);
    // $rq->closeCursor();
    // var_dump($data);

    $tab = ['a','b','c'];
    foreach ($tab as $one) {
        if($one == 'a')
            $cmd = $one;
    }
    var_dump($cmd);

 ?>
