<?php
    require_once 'conexao/conexao.php';
    
    $pesquisar = $_POST['pesquisar'];
    $result_cursos = "SELECT * FROM pessoa WHERE nome LIKE '%$pesquisar%' LIMIT 5";
    $resultado_cursos = mysqli_query($conn, $result_cursos);
    
    while($rows_cursos = mysqli_fetch_array($resultado_cursos)){
        echo "Nome do curso: ".$rows_cursos['nome']."<br>";
    }
?>
