<?php
        include("conexao.php");
        $mes = isset($_GET['mes']) ? str_pad($_GET['mes'], 2, "0", STR_PAD_LEFT) : '';


        $curso = $_GET['curso'];
        $turma = $_GET['turma'];
        $materia = $_GET['materia'];
        
        
        // Calcular o número total de dias no mês atual
            $mes_atual = date('m');
            $ano_atual = date('Y');
            $total_dias = cal_days_in_month(CAL_GREGORIAN, $mes_atual, $ano_atual);

            echo "<table>
            <tr>
            <th colspan='32'>";             
            if($mes == '01'){ echo "Janeiro";} else
            if($mes == '02'){ echo "Fevereiro";} else
            if($mes == '03'){ echo "Março";} else
            if($mes == '04'){ echo "Abril";} else
            if($mes == '05'){ echo "Maio";} else
            if($mes == '06'){ echo "Junho";} else
            if($mes == '07'){ echo "Julho";} else
            if($mes == '08'){ echo "Agosto";} else
            if($mes == '09'){ echo "Setembro";} else
            if($mes == '10'){ echo "Outubro";} else
            if($mes == '11'){ echo "Novembro";} else
            if($mes == '12'){ echo "Dezembro";}
            echo "</th>
            </tr>";
            echo "<tr>
            <th>Nome</th>";
            
            for ($dia = 1; $dia <= $total_dias; $dia++) {
                $data = "$ano_atual-$mes-" . sprintf("%02d", $dia);
            
                echo "<th>". date('d', strtotime($data)) . "</th>";            
            }
            echo "</tr>";
            $query = "SELECT * FROM aluno WHERE turma = '$turma' ORDER BY nome ASC";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {                
                while ($row = $result->fetch_assoc()) {   
                    echo "<tr>";
                    echo "<td>" . $row['nome'] . "</td>";
                    $id_aluno = $row['id_aluno'];
                    
                    
                    $datas_presentes = array();
                    $sql = "SELECT * FROM frequencia WHERE idaluno = $id_aluno";
                    $resultado = $conn->query($sql);
                    if ($resultado->num_rows > 0) {                
                        while ($row = $resultado->fetch_assoc()) {
                            $datas_presentes[] = $row["data"];
                        }
                    }           
                    
                    for ($dia = 1; $dia <= $total_dias; $dia++) {
                        $data = "$ano_atual-$mes-" . sprintf("%02d", $dia);
                    
                        echo "<td>";
                        $dia_semana = date('w', strtotime($data));

                        // Verifica se é sábado (6) ou domingo (0)
                        if($data <= date('Y-m-d')){                        
                            if ($dia_semana == 0 || $dia_semana == 6) {
                                echo "";
                            } else {
                                if (in_array($data, $datas_presentes)) {
                                    echo "<input type='checkbox' id='".$id_aluno."_".$data."' name='presenca' onchange='atualizar(\"$id_aluno\",\"$data\")' checked>";                            
                                } else {
                                    echo "<input type='checkbox' id='".$id_aluno."_".$data."' name='presenca' onchange='atualizar(\"$id_aluno\",\"$data\")'>";
                                }
                            }
                        } else {
                            echo "";
                        }
                        echo "</td>";      
                    }
                    echo "</tr>";
                }
            }
            echo "</table>";
           
        ?>