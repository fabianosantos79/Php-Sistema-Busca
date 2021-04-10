<?php

$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$bancoDados = 'canal_ti_busca';

$conexao = mysqli_connect($servidor, $usuario, $senha, $bancoDados) or die ("Não foi possivel conectar ao banco de dados");

$nome = '%'.trim($_GET['busca_livro']).'%';
$sql = "SELECT * FROM livros WHERE nome LIKE '$nome'";
$resultado = mysqli_query($conexao, $sql);
$busca = mysqli_num_rows($resultado);

if($busca > 0){
    while($linha = mysqli_fetch_array($resultado)){
        echo "<strong>ID: ".$linha['id']. " - Nome: " .$linha['nome']."</strong>";
        echo "<hr />";
    }
}
else{
    echo "Não foram encontrados livros.";
}
?>
<a href="index.php">Nova busca</a>