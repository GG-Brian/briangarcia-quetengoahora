<html>
    <!--         <table>
            <tr>
                <th>Fecha y horas en PHP por Brian García Gómez</th>
            </tr>
            <tr>
                <td><?php echo strftime("%A %e %B %G"); ?></td>
                <td><?php echo date("h:i:sa"); ?></td>
            </tr>
        </table> -->
    <?php

        function detalles($horarioarray){
            foreach($horarioarray as $dia => $hora){
                echo("<h2>----- El día $dia de la semana hay..;</h2>");
                echo("<table>");
                foreach($hora as $dato => $valor){
                    echo("<tr><th><h3>-- A las $dato horas; </h3></th></tr>");
                    echo("<tr><td>"); 
                    foreach($valor as $tipo => $info){
                        echo("<b>$tipo</b> -> <i>$info</i> <br>");
                    }
                    echo("<br><br></td></tr>");
                }
                echo("</table><br><br><br>");
            }
        }
        

        function ahora($horarioarray, $dia, $horas, $minutos){
            # COMPROBACIÓN DE DATOS PASADOS CORRECTOS
            $error = false;
            if (is_string($dia)){ echo("ERR DIA: $dia no es un número de día de la semana correcto."); $error = true;}
            elseif ($dia < 0 || $dia > 6){ echo("ERR DIA: $dia no es uno de los 5 dias de educación semanal."); $error = true;}
            
            if (is_string($horas)){    echo("ERR HORA: $horas no es un valor numérco."); $error = true;}
            elseif ($horas < 8 || $horas > 13){ echo("No se está partiendo ninguna clase :O");    $error = true;}

            if (is_string($minutos)){      echo("ERR MINUTOS: $minutos no es un valor numérico."); $error = true;}
            elseif ($minutos < 0 || $minutos > 59){ echo("ERR MINUTOS: $minutos no es un valor lógicamente correcto."); $error = true;}

            # ACCEDIENTO AL LUGAR DEL ARRAY CORRECTO
            # El horario calcula como si cada hora durara 1 hora exacta, se requiere esta función para hacer cálculo previo
            function resultado($horarioarray, $dia, $horas, $minutos){
                $materia = $horarioarray[$dia][$horas]["materia"];
                $docente = $horarioarray[$dia][$horas]["docente"];
                $taller = $horarioarray[$dia][$horas]["taller"];
                return "Se está impartiendo $materia por $docente en el aula $taller";
            }
            if (!$error){
                echo("Hoy es el día $dia, a las $horas:$minutos horas -> ");
                if ($horas == 13){
                    if ($minutos > 4){ $horas++; echo(resultado($horarioarray, $dia, $horas, $minutos));}
                    else {                       echo(resultado($horarioarray, $dia, $horas, $minutos));}
                }
                if ($horas == 12){
                    if ($minutos > 9){ $horas++; echo(resultado($horarioarray, $dia, $horas, $minutos));}
                    else {                       echo(resultado($horarioarray, $dia, $horas, $minutos));}
                }
                if ($horas == 11){
                    if ($minutos > 14){ $horas++; echo(resultado($horarioarray, $dia, $horas, $minutos));}
                    else {                        echo(resultado($horarioarray, $dia, $horas, $minutos));}
                }
                if ($horas == 10){
                    if ($minutos < 44){ echo(resultado($horarioarray, $dia, $horas, $minutos));}
                    else {
                        $horas++;
                        echo(resultado($horarioarray, $dia, $horas, $minutos));
                        echo("<br>A las 11:15 horas, esto es lo que pasará;<br>");
                        $horas++;
                        echo(resultado($horarioarray, $dia, $horas, $minutos));
                    }
                }
                if ($horas == 9){
                    if ($minutos > 49){ $horas++; echo(resultado($horarioarray, $dia, $horas, $minutos));}
                    else {                        echo(resultado($horarioarray, $dia, $horas, $minutos));}
                }
                if ($horas == 8){
                    if ($minutos > 54){ $horas++; echo(resultado($horarioarray, $dia, $horas, $minutos));}
                    else {                        echo(resultado($horarioarray, $dia, $horas, $minutos));}
                }
           }
        }
        
                    
                  #dia    #hora
        $horario = [1 => [  8 => [ "materia" => "EMR", "docente" => "MarGac", "taller" => "G201", "Finaliza minuto" => 55],
                            9 => [ "materia" => "DSW", "docente" => "SerRam", "taller" => "G201", "Finaliza minuto" => 50],
                            10 => ["materia" => "DSW", "docente" => "SerRam", "taller" => "G201", "Finaliza minuto" => 45],
                            11 => ["materia" => "RECREO", "docente" => "Nadie", "taller" => "Edificio", "Finaliza minuto" => 15],
                            12 => ["materia" => "PRW", "docente" => "MarRod", "taller" => "G201", "Finaliza minuto" => 10],
                            13 => ["materia" => "PRW", "docente" => "MarRod", "taller" => "G201", "Finaliza minuto" => 5 ],
                            14 => ["materia" => "PRW", "docente" => "MarRod", "taller" => "G201", "Finaliza minuto" => 0 ]],
                    2 => [  8 => [ "materia" => "DPL","docente" => "MarRam","taller" => "G201", "Finaliza minuto" => 55],
                            9 => [ "materia" => "DPL","docente" => "MarRam","taller" => "G201", "Finaliza minuto" => 50],
                            10 => ["materia" => "DSW","docente" => "SerRam","taller" => "G201", "Finaliza minuto" => 45],
                            11 => ["materia" => "RECREO", "docente" => "Nadie", "taller" => "Edificio", "Finaliza minuto" => 15],
                            12 => ["materia" => "DSW","docente" => "SerRam","taller" => "G201", "Finaliza minuto" => 10],
                            13 => ["materia" => "DOR","docente" => "ErmPap","taller" => "G201", "Finaliza minuto" => 5 ],
                            14 => ["materia" => "DOR","docente" => "ErmPap","taller" => "G201", "Finaliza minuto" => 0 ]],
                    3 => [  8 => [ "materia" => "PRW","docente" => "MarRod","taller" => "G201", "Finaliza minuto" => 55],
                            9 => [ "materia" => "PRW","docente" => "MarRod","taller" => "G201", "Finaliza minuto" => 50],
                            10 => ["materia" => "DSW","docente" => "SerRam","taller" => "G201", "Finaliza minuto" => 45],
                            11 => ["materia" => "RECREO", "docente" => "Nadie", "taller" => "Edificio", "Finaliza minuto" => 15],
                            12 => ["materia" => "DSW","docente" => "SerRam","taller" => "G201", "Finaliza minuto" => 10],
                            13 => ["materia" => "DOR","docente" => "ErmPap","taller" => "G201", "Finaliza minuto" => 5 ],
                            14 => ["materia" => "DOR","docente" => "ErmPap","taller" => "G201", "Finaliza minuto" => 0 ]],
                    4 => [  8 => [ "materia" => "DPL","docente" => "MarRam","taller" => "G201", "Finaliza minuto" => 55],
                            9 => [ "materia" => "DPL","docente" => "MarRam","taller" => "G201", "Finaliza minuto" => 50],
                            10 => ["materia" => "DPL","docente" => "MarRam","taller" => "G201", "Finaliza minuto" => 45],
                            11 => ["materia" => "RECREO", "docente" => "Nadie", "taller" => "Edificio", "Finaliza minuto" => 15],
                            12 => ["materia" => "PRW","docente" => "MarRod","taller" => "G201", "Finaliza minuto" => 10],
                            13 => ["materia" => "PRW","docente" => "MarRod","taller" => "G201", "Finaliza minuto" => 5 ],
                            14 => ["materia" => "EMR","docente" => "MarGac","taller" => "G201", "Finaliza minuto" => 0 ]],
                    5 => [  8 => [ "materia" => "DOR","docente" => "ErmPap","taller" => "G201", "Finaliza minuto" => 55],
                            9 => [ "materia" => "DOR","docente" => "ErmPap","taller" => "G201", "Finaliza minuto" => 50],
                            10 => ["materia" => "DPL","docente" => "MarRam","taller" => "G201", "Finaliza minuto" => 45],
                            11 => ["materia" => "RECREO", "docente" => "Nadie", "taller" => "Edificio", "Finaliza minuto" => 15],
                            12 => ["materia" => "EMR","docente" => "MarGac","taller" => "G201", "Finaliza minuto" => 10],
                            13 => ["materia" => "DSW","docente" => "SerRam","taller" => "G201", "Finaliza minuto" => 5 ],
                            14 => ["materia" => "DSW","docente" => "SerRam","taller" => "G201", "Finaliza minuto" => 0 ]]
                    ];

        ahora($horario, 4, 13, 6);
        detalles($horario);
    ?>
</html>