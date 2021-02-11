<?php 
/* Programa Desenvolvido Pelo Programador (Marco Silva) Propriedade Pertencete à ITZWOOD  */

//Secção 21 - Pintura_Primário (Tabela "Processo")
$section = 21;

//Obter ID Kanban para check-in
$Get_ID_Kanban_Check_out =  $_GET['id_kanban_check_out']; 

//TimeStamp
$date = new DateTime();
$epoch = $date->getTimestamp();
$dt = new DateTime("@$epoch");
$dt->format('Y-m-d H:i:s');
$Date_Check_out = $dt->format('Y-m-d H:i:s');


//------------- Verificação se foi efetuado anteriormente Check-in ou Não----------------------
$link = mysqli_connect("localhost", "admin", "admin", "mydb", 8889);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution, Validation If Check-In Exists
$sql = "SELECT * FROM GP_Test where id_kanban = '$Get_ID_Kanban_Check_out' ";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        //echo "<table>";
            //echo "<tr>";
                //echo "<th>id</th>";
                
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            //echo "<tr>";
                //echo "<td>" . $row['id'] . "</td>";
                $Row_id = $row['id'];
                $Row_date_check_out = $row['date_check_out'];
            echo "</tr>";
            
        }
        //echo "</table>";
        // Free result set
        mysqli_free_result($result);
       
    } else{
        

    }
} else{
    echo "ERROR: Processo não pode ser executado $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
 //--------------------------- END -----------------------------------------------


 /* Verificação se o TimeStamp Check-Out se existe ou não */
 $Status_Row_Check_out == NULL;

 if ($Row_date_check_out == NULL ) {

    $Status_Row_Check_out = 1; 
    /* 1 = TRUE, Significa coluna (date_check_out) da tabela "GP_test está vazia, Escreve o TimeSTAMP CHECK-OUT" */ 
} else {
    $Status_Row_Check_out = 0; 
    /* 0 = FALSE, Significa coluna (date_check_out) da tabela "GP_test está Preenchida, Não Escreve o TimeSTAMP CHECK-OUT" pois já existe */ 
}

// echo $Status_Row_Check_out;

/*--------------------------END--------------------------------------------------------------------------------------------- */


//---------------- Algoritmo Final de Decisão Check-Out -----------------------------------
/*------  Se validar a existencia de Check-In, Verifica o ID e escreve na linha da correspondencia do Check-In o TimeStamp Check-Out.
---------  Tambem verifica o estado ( 0/1 ) da existencia do TimeStamp do Check-out, se existe, reporta a dizer a existencia,
           se não existe e se existe check-in então escreve o TimeStamp Check-Out Correspondente.   */
$Row_id;

//Variavel que mostra se ja efetuou Check-Out
//echo $Row_date_check_out;

if ($Row_id != NULL and $Status_Row_Check_out == 0) {

   echo "Check-Out ja Foi Efetuado";
   header('Refresh: 3; index.html');

}
else if ($Row_id != NULL and $Status_Row_Check_out == 1) {

         //echo "WRITE";
    $link = mysqli_connect("localhost", "admin", "admin", "mydb", 8889);
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $sql = "UPDATE GP_Test SET date_check_out = '$Date_Check_out' WHERE id='$Row_id'";
        if(mysqli_query($link, $sql)){
            //echo "Sucess";
           
        } else{
            //echo "Error $sql. " . mysqli_error($link);
            
        }
        echo "CHECK-Out Efectuado com Sucesso";
        header('Refresh: 3; index.html');

}
else {

    echo "ERRO, CHECK-in Ainda não Efectuado. Necessário Efetuar Check-in Primeiro";
    header('Refresh: 3; index.html');
}
//---------------------------- END --------------------------------------------------------------------------

?>
