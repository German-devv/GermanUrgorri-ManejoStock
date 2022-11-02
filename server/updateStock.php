<?php
include('accesoBase.php');

if (isset($_POST['newStore'])) $newStore = intval($_POST['newStore']);

if (isset($_POST['numberUnits'])) $numberUnits = intval($_POST['numberUnits']);

if (isset($_POST['idProducto'])) $idProducto = intval($_POST['idProducto']);

if (isset($_POST['oldStore'])) $oldStore = intval($_POST['oldStore']);





$select = "SELECT unidades FROM stocks WHERE producto=?  AND tienda=?";




function oldStock($base, $select, $idProducto, $oldStore ,$numberUnits){



    $oldStoreStock = $base->prepare($select);
    $oldStoreStock->execute([$idProducto, $oldStore]);

    $oldStoreStock = $oldStoreStock->fetch(PDO::FETCH_ASSOC);

    $oldStoreStock = $oldStoreStock['unidades'];


    $oldStoreStock = $oldStoreStock - $numberUnits;


    if($oldStoreStock > 0){

        $updateOldStore = $base->prepare("UPDATE stocks SET unidades=? WHERE producto=? AND tienda=?");
        $updateOldStore->execute([$oldStoreStock, $idProducto, $oldStore]);

    }
    else{

        $updateOldStore = $base->prepare("DELETE FROM stocks WHERE producto=? AND tienda=? ");
        $updateOldStore->execute([$idProducto, $oldStore]);

    }

}


$checkStock = $base->prepare($select);
$checkStock->execute([$idProducto, $newStore]);

if ($checkStock->rowCount() > 0) {



    $newStoreStock = $base->prepare($select);
    $newStoreStock->execute([$idProducto, $newStore]);


    $newStoreStock = $newStoreStock->fetch(PDO::FETCH_ASSOC);
    $newStoreStock = $newStoreStock['unidades'];

    
    
    $newStoreStock = $newStoreStock + $numberUnits;
    

    $updateNewStore = $base->prepare("UPDATE stocks SET unidades=? WHERE producto=? AND tienda=?");
    $updateNewStore->execute([$newStoreStock, $idProducto, $newStore]);

    oldStock($base, $select, $idProducto, $oldStore ,$numberUnits);


} else {
    
    $create = $base->prepare("INSERT INTO stocks VALUES (?,?,?)");
    $create ->execute([$idProducto,$newStore,$numberUnits]);

    oldStock($base, $select, $idProducto, $oldStore ,$numberUnits);

}





header("Location: ../listado.php", true, 301);
exit();

