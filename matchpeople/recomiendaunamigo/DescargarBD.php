<?php

/*
Mysql To Excel
Generación de excel versión 1.0
Nicolás Pardo - 2007
*/
#Conexion a la db
include("../clavesbd.php");
/*
$servername = "localhost";
//$username = "dbu761266";
//$password = "#M4tch-2013!bd";
//$dbname = "dbs431888";
$username = "root";
$password = "";
$dbname = "matchpeo_vacantesBD";
*/

	// Crea la conexión
$conn = mysql_connect($servername, $username, $password);
//$conn = mysql_connect("localhost", "matchpeo_matchpeople","Match2013");
mysql_select_db($dbname,$conn);
#Sql, acá pone tu consulta a la tabla que necesites exportar filtrando los datos que creas necesarios.
$sql = "SELECT  * FROM candidatos";
$r = mysql_query( $sql ) or trigger_error( mysql_error($conn), E_USER_ERROR );
$return = '';
if( mysql_num_rows($r)>0){
    $return .= '<table border=1>';
    $cols = 0;
    while($rs = mysql_fetch_row($r)){
        $return .= '<tr>';
        if($cols==0){
            $cols = sizeof($rs);
            $cols_names = array();
            for($i=0; $i<$cols; $i++){
                $col_name = mysql_field_name($r,$i);
                //$return .= '<th>'.utf8_decode($col_name).'</th>';
				$return .= '<th>'.$col_name.'</th>';
                //$cols_names[$i] = utf8_decode($col_name);
				$cols_names[$i] = $col_name;
            }
            $return .= '</tr><tr>';
        }
        for($i=0; $i<$cols; $i++){
            #En esta iteración podes manejar de manera personalizada datos, por ejemplo:
            if($cols_names[$i] == 'fechaAlta'){ #Formateo el registro en formato Timestamp
                $return .= '<td>'.htmlspecialchars(date('d/m/Y H:i:s',$rs[$i])).'</td>';
            }else if($cols_names[$i] == 'activo'){ #Estado lógico del registro, en vez de 1 o 0 le muestro Si o No.
                $return .= '<td>'.htmlspecialchars( $rs[$i]==1? 'SI':'NO' ).'</td>';
            }else{
                //$return .= '<td>'.htmlspecialchars($rs[$i]).'</td>';
				$return .= '<td>'.$rs[$i].'</td>';
            }
        }
        $return .= '</tr>';
    }
    $return .= '</table>';
    mysql_free_result($r);
}
#Cambiando el content-type más las <table> se pueden exportar formatos como csv
header("Content-type: application/vnd-ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=Recomendaciones".date('d-m-Y').".xls");
echo $return;
?>
