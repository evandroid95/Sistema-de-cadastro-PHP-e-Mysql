<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<?php 
error_reporting( E_ALL ^E_NOTICE );
require_once ('../Modelo/Produto.php');
require_once ('../Modelo/ProdutoDAO.php');
require_once ('../Modelo/BancoDados.php');

class Controle {

    public function inserir() {
        $nome = $_POST['nome'];
        $categoria = $_POST['categoria'];
        $valor = $_POST['valor'];
                            
        $produto = new Produto();
        $produto->setNome($nome);
        $produto->setCategoria($categoria);
        $produto->setValor($valor);

        $produtoDao = new ProdutoDao();
        $produtoDao->salvar($produto);
    }
    
    public function listartodos(){
        $produtoDao = new ProdutoDao();
        $produtoDao->ListarTodos();        
    }
    
    public function listar() {
        $nome = $_POST['nome'];
                            
        $produtoDao = new ProdutoDao();
        $produtoDao->ListarNome($nome);
    }
    
     public function remover() {
        $codigo = $_POST['codigo'];
                            
        $produtoDao = new ProdutoDao();
        $produtoDao->Remover($codigo);
    }
    
    public function atualizar(){
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $categoria = $_POST['categoria'];
        $valor = $_POST['valor'];
        
        $produtoDao = new ProdutoDao();
        $produtoDao->Atualizar($codigo,$nome,$categoria,$valor);
    }

}

$acao = $_POST['acao'];
$acao1= $_GET['acao1'];

if($acao=="inserir"){
$controle = new Controle();
$controle->inserir();
}else if($acao1=="listartodos"){
$controle = new Controle();
$controle->listartodos();
}else if($acao=="listar"){
$controle = new Controle();
$controle->listar();
}else if($acao=="excluir"){
$controle = new Controle();
$controle->remover();
}else if($acao=="atualizar"){
$controle = new Controle();
$controle->atualizar();
}else{
    echo "Ação inválida";
}
?>