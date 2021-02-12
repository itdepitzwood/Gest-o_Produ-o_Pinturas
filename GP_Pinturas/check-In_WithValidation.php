<?php
/* Programa Desenvolvido Pelo Programador (Marco Silva) Propriedade Pertencete à ITZWOOD  */

//Importação do ficheiro de Conexção com a base de dados
$db = parse_ini_file("conection/config_file.ini");
/* leitura dos dados de acesso à base de dados*/
$user = $db['user'];
$pass = $db['pass'];
$name_db = $db['name_db'];
$host = $db['host'];
$type = $db['type'];
$port = $db['port'];



//Secção 21 - Pintura_Primário (Tabela "Processo")
$section = 21;

//Obter ID Kanban para check-in
$Get_ID_Kanban_Check_in =  $_GET['id_kanban_check_in']; 
//echo $Get_ID_Kanban_Check_in;

//TimeStamp
$date = new DateTime();
$epoch = $date->getTimestamp();
$dt = new DateTime("@$epoch");
$dt->format('Y-m-d H:i:s');
$Date_Check_in = $dt->format('Y-m-d H:i:s');

//Verificação do Numero de Kanban, pois contem 3x( - )
$data = $Get_ID_Kanban_Check_in;
$Verify_Id_Kanban =  substr_count($data, '-');
//echo $Verify_Id_Kanban;


//Status = Estado de Check-In ( 0 == Não efetua Check-In;  1 == Efetua Check-In )
$Status = NULL;

//Verificação se foi efetuado anteriormente Check-in Existe, Se existir impede da fazer de novo Check-In, caso contrario efetua o novo Check-In
$link = mysqli_connect($host, $user, $pass, $name_db, $port );
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution, Validation If Check-In Exists
$sql = "SELECT * FROM GP_Test where id_kanban = '$Get_ID_Kanban_Check_in' ";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        //echo "<table>";
            //echo "<tr>";
                //echo "<th>id</th>";   
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            //echo "<tr>";
                //echo "<td>" . $row['id'] . "</td>";
                $Row_id_Kanban = $row['id_kanban'];
            echo "</tr>";
        }
        //echo "</table>";
        // Free result set
        mysqli_free_result($result);
        $Status = 0;
        echo "ERRO, Este Kanban já foi efetuado o CHECK-in";
        header('Refresh: 3; index.html');
    } else{
        $Status = 1;
    }
} else{
    echo "ERRO: Processo não pode ser executado $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

//--------------------------------------END---------------------------------------

//Variaveis de confirmação do resultado da verificaçao da existencia de Check-In
$Row_id_Kanban;
//echo $Status; // 0 = não Regista  1 = Regista



//---------------- Processo de Vericação e Escrita do Check-In em caso do processo anterior for 1 -----------------------

/* ID Kanban contem 3x( - ) , se tiver 3 significa ID Kanban válido, caso contrario não é um ID Kanban */
if ($Status == 1 and $Verify_Id_Kanban >= 3) {

        /* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    $link = mysqli_connect($host, $user, $pass, $name_db, $port );
    
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    // Attempt insert query execution
    $sql = "INSERT INTO GP_Test (id_kanban, section, date_check_in) VALUES ('$Get_ID_Kanban_Check_in', '$section', '$Date_Check_in')";
    mysqli_query($link, $sql); 
     echo "CHECK-IN Efetuado com Sucesso";
     header('Refresh: 3; index.html');
    // Close connection
    mysqli_close($link);
        
}
else if ($Verify_Id_Kanban < 3) {
    echo "Identificação Errada, Coloque o Nº KANBAN";
     header('Refresh: 3; index.html');
}

//-------------------------END--------------------------------------------

?>