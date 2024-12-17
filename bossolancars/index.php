<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
    $acao = $_POST['acao'];

    if ($acao === 'inserir') {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $imagem = $_POST['imagem'];

        $sql = "INSERT INTO carros (nome, descricao, imagem) VALUES ('$nome', '$descricao', '$imagem')";
        $conn->query($sql);
    } elseif ($acao === 'atualizar') {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $imagem = $_POST['imagem'];

        $sql = "UPDATE carros SET nome='$nome', descricao='$descricao', imagem='$imagem' WHERE id=$id";
        $conn->query($sql);
    } elseif ($acao === 'deletar') {
        $id = $_POST['id'];
        $sql = "DELETE FROM carros WHERE id=$id";
        $conn->query($sql);
    }
}

$sql = "SELECT * FROM carros";
$result = $conn->query($sql);
$carros = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Bossolan cars</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Bossolan cars</h1>
        <button id="loginBtn">Login</button> 
    </header>
    
    <div id="loginPopup" class="popup">
        <div class="popup-content">
            <span class="close">&times;</span>
            <h2>Login</h2>
            <form id="loginForm">
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" required>
               
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required>
               
                <button type="submit">Entrar</button>
            </form>
        </div>
    </div>
    
    <div class="search-container">
        <input type="text" id="carSearch" placeholder="Buscar carro...">
    </div>
    
    <section id="carros">
        <h2>Marcas de Carros</h2>
        <button id="sortButton">Ordenar A-Z</button>
        <div class="grid-container" id="carGrid">
            <div class="carro" data-name="Ferrari">
                <h3>Ferrari</h3>
                <img src="img/ferrari.png" alt="Ferrari">
                <p>A Ferrari foi fundada em 1939 por Enzo Ferrari, inicialmente como uma divisão de corridas da Alfa Romeo. Em 1947, a marca produziu seu primeiro carro de rua com o nome Ferrari. Desde então, tornou-se uma das marcas mais icônicas do automobilismo, reconhecida por sua excelência em desempenho e design.</p>
            </div>
            <div class="carro" data-name="Lamborghini">
                <h3>Lamborghini</h3>
                <img src="img/lamborghini.png" alt="Lamborghini">
                <p>A Lamborghini foi fundada em 1963 por Ferruccio Lamborghini, inicialmente como fabricante de tratores. Após desentendimentos com Enzo Ferrari sobre a qualidade de seus carros, Ferruccio decidiu criar sua própria marca de automóveis esportivos de luxo. A Lamborghini se destacou por seus designs arrojados e motores potentes, competindo diretamente com a Ferrari.</p>
            </div>
            <div class="carro" data-name="Porsche">
                <h3>Porsche</h3>
                <img src="img/porsche.png" alt="Porsche">
                <p>A Porsche foi fundada em 1931 por Ferdinand Porsche como uma empresa de consultoria e desenvolvimento automotivo. Em 1948, lançou seu primeiro carro, o Porsche 356. A marca é reconhecida por seus esportivos de alta performance, como o icônico 911, e por sua combinação de engenharia de precisão e design elegante.</p>
            </div>
            <div class="carro" data-name="Pagani">
                <h3>Pagani</h3>
                <img src="img/pagani.jpg" alt="Pagani">
                <p>A Pagani, fundada por Horacio Pagani em 1992, é uma fabricante italiana de carros superesportivos exclusivos, conhecidos por seu design inovador e uso de materiais leves como fibra de carbono. Seus modelos mais icônicos são o Zonda e o Huayra, ambos famosos por sua alta performance e produção limitada.</p>
            </div>
            <div class="carro" data-name="Chevrolet">
                <h3>Chevrolet</h3>
                <img src="img/chevrolet.jpeg" alt="Chevrolet">
                <p>A Chevrolet foi fundada em 1911 por Louis Chevrolet e William C. Durant. Em 1918, foi incorporada à General Motors e se tornou uma das marcas mais populares da GM. Conhecida por veículos icônicos como o Corvette e o Camaro, a Chevrolet se destacou pela inovação e acessibilidade, tornando-se uma das maiores fabricantes de automóveis do mundo.</p>
            </div>
            <div class="carro" data-name="Alfa Romeo">
                <h3>Alfa Romeo</h3>
                <img src="img/alfa.png" alt="Alfa Romeo">
                <p>A Alfa Romeo foi fundada em 1910, na Itália, inicialmente sob o nome ALFA (Anonima Lombarda Fabbrica Automobili). Em 1915, o empresário Nicola Romeo assumiu a empresa, e ela foi renomeada para Alfa Romeo. Ao longo de sua história, uma marca se destacou no automobilismo, com vitórias importantes em competições como a Fórmula 1. Conhecida por seus carros esportivos e design elegante, a Alfa Romeo é símbolo de desempenho e estilo italianos no mundo automotivo.</p>
            </div>
            <div class="carro" data-name="Bugatti">
                <h3>Bugatti</h3>
                <img src="img/bugatti.png" alt="Bugatti">
                <p>A Bugatti foi fundada em 1909 pelo italiano Ettore Bugatti, na França. Conhecida por seus carros luxuosos e de alta performance, a marca se destacou no automobilismo nas primeiras décadas do século XX. Após um período de declínio, a Bugatti foi revitalizada no final dos anos 1990 pela Volkswagen, que lançou modelos icônicos como o Bugatti Veyron e Chiron. A marca é reconhecida por fabricar alguns dos carros mais rápidos e caros do mundo, combinando engenharia de ponta com design sofisticado.</p>
            </div>
            <div class="carro" data-name="Aston Martin">
                <h3>Aston Martin</h3>
                <img src="img/aston.png" alt="Aston Martin">
                <p>A Aston Martin foi fundada em 1913 por Lionel Martin e Robert Bamford, no Reino Unido. A marca ganhou fama pela fabricação de carros de luxo e alto desempenho, tornando-se sinônimo de elegância britânica. Ao longo dos anos, o Aston Martin ficou conhecido por seus veículos esportivos, sendo especialmente reconhecido como o carro preferido de James Bond nos filmes. Com uma história marcada por desafios financeiros e sucessos no automobilismo, a marca continua a produzir carros exclusivos e de luxo internacional.</p>
            </div>
        </div>
    </section>    
 
   <section id="contato">
       <h2>Contato</h2>
       <p>Entre em contato com um dos nossos revendedores.</p>
       <form id="contatoForm">
           <label for="nome">Nome:</label>
           <input type="text" id="nome" name="nome" required>
         
           <label for="email">Email:</label>
           <input type="email" id="email" name="email" required>
         
           <label for="mensagem">Mensagem:</label>
           <textarea id="mensagem" name="mensagem" required></textarea>
         
           <button type="submit">Enviar</button>
       </form>
   </section>
   
   <script src="script.js"></script>

</body>
</html>