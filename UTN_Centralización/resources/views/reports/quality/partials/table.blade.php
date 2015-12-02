    <?php          
    $cont = 0;  
    $info = "";      
    $numero = 1;

    $abajo = "</tbody>"."\n"."</table>";
    for ($i=0; $i < count($record); $i++) { 

     $parametro = $record[$i]->parameter;
     $unidad = $record[$i]->unit;
     $muestra = $record[$i]->value;
     $maxi = $record[$i]->maximum_allowable;
     $reporte = $record[$i]->report_number;                      
     if($cont == 0)
     {
       $id_muestra = $record[$i]->id;                                            
     }


     if($id_muestra == $record[$i]->id)
     {
       $info = $info. 
       "<tr>"."\n".
       "<td>".$parametro."</td>"."\n".
       "<td>".$unidad."</td>"."\n".
       "<td>".$muestra."</td>"."\n".
       "<td>".$maxi."</td>"."\n".
       "</tr>"; 
                     // var_dump($info);
       $cont = 1;
     }else{
      $arriba = "<h4 style='float:left;'> Muestra #".$numero."</h4>"."\n".
      "<h4 style='float:right'>No.Reporte : ".$reporte."</h4> <br>".
      "<table class='table table-striped table-bordered'>"."\n".
      "<thead>"."\n".
      "<tr>"."\n".
      "<th>Analisis</th>"."\n".
      "<th>Unidad</th>"."\n".
      "<th>Valor</th>"."\n".
      "<th>Maxima Cantidad</th>"."\n".
      "</tr>"."\n".
      "</thead>"."\n".
      "<tbody>";
      $numero ++;
      echo ("\n".$arriba."\n".$info."\n".$abajo."\n");
                                         // var_dump($record[$i]->id);
      $info = "<tr>"."\n".
      "<td>".$parametro."</td>"."\n".
      "<td>".$unidad."</td>"."\n".
      "<td>".$muestra."</td>"."\n".
      "<td>".$maxi."</td>"."\n".
      "</tr>"; 
      $cont = 0;
                                    //var_dump($info);
                                    //echo ($info);
    }              
  }    
  if(count($record) > 0){
    $arriba = "<h4 style='float:left;'> Muestra #".$numero."</h4>"."\n".
    "<h4 style='float:right'>No.Reporte : ".$reporte."</h4> <br>".
    "<table class='table table-striped table-bordered'>"."\n".
    "<thead>"."\n".
    "<tr>"."\n".
    "<th>Analisis</th>"."\n".
    "<th>Unidad</th>"."\n".
    "<th>Valor</th>"."\n".
    "<th>Maxima Cantidad</th>"."\n".
    "</tr>"."\n".
    "</thead>"."\n".
    "<tbody>";
    echo ("\n".$arriba."\n".$info."\n".$abajo."\n");    
  }         
  ?>  