<?php
// Conexão com o banco de dados
$host = 'localhost';
$dbname = 'laessencee';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

// Consulta para buscar todos os produtos
$sql = "SELECT * FROM rgt_produto";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8"> <!-- Define o conjunto de caracteres como UTF-8 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Garante que o IE use a versão mais recente do motor de renderização -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Controla a responsividade em dispositivos móveis -->
  <title>LA ESSENCE</title> <!-- Título da página exibido na aba do navegador -->

  <!-- 
    - favicon: Ícone que aparece na aba do navegador
  -->
  <link rel="shortcut icon" href="assets/images/logo.PNG" type="image/PNG">

  <!--- Custom CSS link: Folha de estilo personalizada para o layout da página-->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!--- Google font link: Conexão com Google Fonts para utilizar a fonte Urbanist-->
  <link rel="preconnect" href="https://fonts.googleapis.com"> <!-- Pré-conexão para melhorar o carregamento da fonte -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> <!-- Pré-conexão com Cross-Origin para carregar fontes -->
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700;800&display=swap" rel="stylesheet"> <!-- Importa a fonte Urbanist -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">  <!-- - Remixicon: Link para a biblioteca de ícones Remixicon, utilizada para ícones de redes sociais-->

  <!-- - Preload images: Carrega imagens importantes antecipadamente para melhorar o desempenho-->
  <link rel="preload" as="image" href="./assets/images/logo.png"> <!-- Precarrega o logotipo -->
  <link rel="preload" as="image" href="./assets/images/hero-banner-1.jpg"> <!-- Precarrega o banner principal -->
  <link rel="preload" as="image" href="./assets/images/vaso3.jpg"> <!-- Precarrega a imagem vaso3 -->
  <link rel="preload" as="image" href="./assets/images/vaso3.jpg"> <!-- (repetido) Precarrega a imagem vaso3 novamente -->

</head>

<body id="top">
   
  <!-- 
    - Div do botão de Libras: Adiciona um botão de acessibilidade para Libras (Língua Brasileira de Sinais)
  -->
  <div vw class="enabled"> <!-- Início da div do botão de Libras -->
    <div vw-access-button class="active"></div> <!-- Botão de acesso ao plugin Libras -->
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div> <!-- Container para o plugin Libras -->
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script> <!-- Script do plugin Libras -->

  <!-- 
    - #HEADER: Cabeçalho da página
  -->
  <header class="header">

    <div class="header-top" data-header>
      <div class="container">

        
        <!-- parte alterada,por matheus-->

        <!-- Botão para abrir o menu de navegação -->
        <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
          <span class="line line-1"></span>
          <span class="line line-2"></span>
          <span class="line line-3"></span>
        </button>

        <!-- Campo de pesquisa -->
        <div class="input-wrapper">
          <input type="search" name="search" placeholder="Pesquisar produto" class="search-field"> <!-- Campo de busca de produtos -->

          <button class="search-submit" aria-label="search">
            <ion-icon name="search-outline" aria-hidden="true"></ion-icon> <!-- Ícone de pesquisa -->
          </button>
        </div>

        <!-- Logo da empresa -->
        <a href="#" class="logo">
          <img src="assets/images/logo.PNG" height="26" alt="LaEssence"> <!-- Imagem do logotipo -->
        </a>

    

<!-- Botões de ações do cabeçalho -->
<div class="header-actions">
  <!-- Botão de usuário -->
  <button class="header-action-btn" aria-label="user">
    <ion-icon name="person-outline" aria-hidden="true"></ion-icon> <!-- Ícone de usuário -->
  </button>

  <!-- Botão de carrinho -->
  <button class="header-action-btn" aria-label="cart item" onclick="location.href='sistema_loja/carrinho.php';">
    <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon> <!-- Ícone de carrinho -->
    <span class="btn-badge">0</span> <!-- Contador de itens no carrinho -->
  </button>
</div>


  <!-- Botão de registrar produto -->
  <button class="ai" aria-label="register product" onclick="location.href='registrar_pdt.html';">
    Registrar Produto
  </button>
</div>

       <!-- parte alterada,por matheus-->


        <!-- Menu de navegação principal -->
        <nav class="navbar">
          <ul class="navbar-list">
            <li>
            <a href="/NovaLA2.1/homepage.html" class="navbar-link has-after">Home</a><!-- Link para a seção Home -->
            </li><!-- Sempre que muda a versão tem que mudar esse diretorio aqui, atualizando para o nome da versão atual -->

            <li>
              <a href="#colecao-croche" class="navbar-link has-after">Destaques</a> <!-- Link para a seção Destaques -->
            </li>

            <li>
              <a href="#colecao-nova" class="navbar-link has-after">Produtos</a> <!-- Link para a seção Produtos -->
            </li>

          </ul>
        </nav>

      </div>
    </div>

  </header>

  <!-- -Menu de navegação para dispositivos móveis-->
  <div class="sidebar">
    <div class="mobile-navbar" data-navbar>
      <div class="wrapper">
        <a href="#" class="logo">
          <img src="./assets/images/logo.png" height="26" alt="LaEssence"> <!-- Imagem do logotipo para o menu móvel -->
        </a>

        <!-- Botão para fechar o menu de navegação -->
        <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
          <ion-icon name="close-outline" aria-hidden="true"></ion-icon> <!-- Ícone para fechar o menu -->
        </button>
      </div>

      <!-- Lista de navegação móvel -->
      <ul class="navbar-list">
        <li>
          <a href="#home" class="navbar-link" data-nav-link>Home</a> <!-- Link para a seção Home -->
        </li>
        <li>
          <a href="#produtos" class="navbar-link" data-nav-link>Produtos</a> <!-- Link para a seção Produtos -->
        </li>
        <li>
          <a href="#produtos" class="navbar-link" data-nav-link>Destaques</a> <!-- Link para a seção Destaques -->
        </li>
      </ul>

    </div>

    <!-- Sobreposição que fecha o menu quando clicado -->
    <div class="overlay" data-nav-toggler data-overlay></div>
  </div>

  <main>  <!---Conteúdo principal da página-->

    <article>  <!---Encapsula as seções de destaque e coleção, criando um contêiner lógico-->

      <!--- #HERO: Seção principal de destaque-->
      <section class="section hero" id="home" aria-label="hero" data-section>
        <div class="container">
    
          <!--- Lista de itens com barra de rolagem: Cada item representa um cartão de destaque-->
          <ul class="has-scrollbar">
    
            <!--- Cada item da lista é um cartão de destaque com imagem de fundo e conteúdo-->
            <li class="scrollbar-item">
              <div class="hero-card has-bg-image" style="background-image: url('./assets/images/hero-banner-1.jpg')">
                <div class="card-content">
                  <h1 class="h1 hero-title">
                    Traços que refletem a <br>
                    essência do espaço!
                  </h1>
                  <p class="hero-text">
                    Transforme seu lar em uma obra de arte com La Essence, venha conhecer nosso produtos.
                  </p>
                </div>
              </div>
            </li>
    
            <li class="scrollbar-item">
              <div class="hero-card has-bg-image" style="background-image: url('./assets/images/vaso3.jpg')">
                <div class="card-content">
                  <h1 class="h1 hero-title">
                    A história <br>
                    contada pelas mãos
                  </h1>
                  <p class="hero-text">
                    Venha conhecer o nosso trabalho e se encantar com as belezas maranhenses.
                  </p>
                  <p class="price">A partir de R$34,99</p>
                  <a href="#" class="btn btn-primary">Compre Agora</a>
                </div>
              </div>
            </li>
    
            <li class="scrollbar-item">
              <div class="hero-card has-bg-image" style="background-image: url('./assets/images/vaso3.jpg')">
                <div class="card-content">
                  <h1 class="h1 hero-title">
                    Reveal The <br>
                    Beauty of Skin
                  </h1>
                  <p class="hero-text">
                    Made using clean, non-toxic ingredients, our products are designed for everyone.
                  </p>
                  <p class="price">Starting at $7.99</p>
                  <a href="#" class="btn btn-primary">Shop Now</a>
                </div>
              </div>
            </li>
    
          </ul>
    
        </div>
      </section>
    
      <!--- #COLLECTION: Seção para exibir coleções de produtos ou categorias-->
      <section class="section collection" id="collection" aria-label="collection" data-section>
        <div class="container">
    
          <!--- Lista de cartões de coleção: Cada item representa uma coleção ou categoria de produtos-->
          <ul class="collection-list">
    
            <!--- Cada item da lista é um cartão de coleção com imagem de fundo e informações-->
            <li>
              <div class="collection-card has-before hover:shine">
                <h2 id="colecao-croche" class="h2 card-title">Coleção Crochê</h2>
                <p class="card-text">A partir de R$ 69,99</p>
                <a href="#" class="btn-link">
                  <span class="span">Veja Agora</span>
                  <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon> <!-- Ícone de seta para indicar o link -->
                </a>
                <div class="has-bg-image" style="background-image: url('./assets/images/destaquecroche.PNG')"></div>
              </div>
            </li>
    
            <li>
              <div class="collection-card has-before hover:shine">
                <h2 class="h2 card-title">E as Novidades?</h2>
                <p class="card-text">Obtenha informações</p>
                <a href="#" class="btn-link">
                  <span class="span">Veja agora</span>
                  <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon> <!-- Ícone de seta para indicar o link -->
                </a>
                <div class="has-bg-image" style="background-image: url('./assets/images/destaquebarro.jpeg')"></div>
              </div>
            </li>
    
            <li>
              <div class="collection-card has-before hover:shine">
                <h2 class="h2 card-title">Aproveite as promoções</h2>
                <p class="card-text">A partir de R$ 37,99</p>
                <a href="#" class="btn-link">
                  <span class="span">Veja Agora</span>
                  <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon> <!-- Ícone de seta para indicar o link -->
                </a>
                <div class="has-bg-image" style="background-image: url('./assets/images/destaquebiojoia.jpeg')"></div>
              </div>
            </li>
    
          </ul>
    
        </div>
      </section>
    
    </article>
    

      <!--- #SHOP-->

           
<section>
    <div>
        <h2 id="colecao-nova" class="h2 section-title">Coleção Nova</h2>
        <a href="#" class="btn-link">
            <span class="span">Olhe todos os produtos</span>
            <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
        </a>
    </div>

    <ul class="has-scrollbar">
        <?php foreach ($produtos as $produto): ?>
            <li class="scrollbar-item">
                <div class="shop-card">
                    <div class="card-banner img-holder" style="--width: 540; --height: 720;">
                        <!-- Imagem do produto -->
                        <img 
                        src="<?php echo $produto['imagem'] ? 'sistema_loja/' . $produto['imagem'] : 'sistema_loja/uploads/sem-imagem.jpg'; ?>"
                        width="540" 
                            height="720" 
                            loading="lazy" 
                            alt="<?php echo htmlspecialchars($produto['nome']); ?>" 
                            class="img-cover"
                        >
                        
                        <!-- Desconto, se aplicável -->
                        <?php if (!empty($produto['desconto'])): ?>
                            <span class="badge" aria-label="<?php echo $produto['desconto']; ?>% off">
                                -<?php echo $produto['desconto']; ?>%
                            </span>
                        <?php endif; ?>

                        <div class="card-actions">
    <!-- Botão "Adicionar ao Carrinho" com redirecionamento -->
    <a href="sistema_loja/adicionar_ao_carrinho.php?id=<?php echo $produto['id']; ?>" class="action-btn" aria-label="add to cart">
        <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
    </a>

    <button class="action-btn" aria-label="add to whishlist">
        <ion-icon name="star-outline" aria-hidden="true"></ion-icon>
    </button>

    <button class="action-btn" aria-label="compare">
        <ion-icon name="repeat-outline" aria-hidden="true"></ion-icon>
    </button>
</div>

                    </div>

                    <div class="card-content">
                        <div class="price">
                            <!-- Preço com e sem desconto -->
                            <?php if (!empty($produto['preco_antigo'])): ?>
                                <del class="del">R$ <?php echo number_format($produto['preco_antigo'], 2, ',', '.'); ?></del>
                            <?php endif; ?>
                            <span class="span">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></span>
                        </div>

                        <h3>
                            <a href="detalhes_produto.php?id=<?php echo $produto['id']; ?>" class="card-title">
                                <?php echo htmlspecialchars($produto['nome']); ?>
                            </a>
                        </h3>

                        <div class="card-rating">
                            <!-- Simulação de avaliação -->
                            <div class="rating-wrapper" aria-label="5 start rating">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <ion-icon name="star" aria-hidden="true"></ion-icon>
                                <?php endfor; ?>
                            </div>
                            <p class="rating-text">5170 comentários</p>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</section>

      <!-- 
        - #FEATURE
      -->

      <section class="section feature" aria-label="feature" data-section>
        <div class="container">

          <h2 class="h2-large section-title">Por que comprar com La Essence?</h2>

          <ul class="flex-list">

            <li class="flex-item">
              <div class="feature-card">

                <img src="./assets/images/selolocalizacao.PNG" width="204" height="236" loading="lazy" alt="Guaranteed PURE"
                  class="card-icon">

                <h3 class="h3 card-title">Indicação Geográfica</h3>

                <p class="card-text">
                  Certifica que nosso produto é originário da Ilha do Upan-Açu,
                   reconhecendo características culturais e tradições artesanais ligadas ao Maranhão.
                </p>

              </div>
            </li>

            <li class="flex-item">
              <div class="feature-card">

                <img src="./assets/images/selocomercio.PNG" width="204" height="236" loading="lazy"
                  alt="Completely Cruelty-Free" class="card-icon">

                <h3 class="h3 card-title">Comércio Justo </h3>

                <p class="card-text">
                  Garantimos que nossos produtos artesanais foram produzidos em condições justas,
                   promovendo a valorização dos artesãos e práticas sustentáveis.
                </p>

              </div>
            </li>

            <li class="flex-item">
              <div class="feature-card">

                <img src="./assets/images/selosustentavel.PNG" width="204" height="236" loading="lazy"
                  alt="Ingredient Sourcing" class="card-icon">

                <h3 class="h3 card-title">Produto Sustentável</h3>

                <p class="card-text">
                  Certificamos que o artesanato foi produzido com respeito ao meio ambiente, utilizando materiais ecológicos e métodos de produção sustentáveis.
                </p>

              </div>
            </li>

          </ul>

        </div>
      </section>




      <!-- 
        - #BLOG
      -->

      <section class="section blog" id="blog" aria-label="blog" data-section>
        <div class="container">




  <!-- 
    - #FOOTER
  -->

  <footer class="container1">
        
    <div class="column">
        <div class="logo1">
            <img src="./assets/images/logo.png">
        </div>
        <p>
            Todo artesanato tem sua essência.
        </p>
        <div class="socials">
            <a href="#"><i class="ri-youtube-line"></i></a>
            <a href="#"><i class="ri-instagram-line"></i></a>
            <a href="#"><i class="ri-twitter-line"></i></a>
        </div>
    </div>
    <div class="column">
        <h4>Navegação</h4>
        <a href="#">Artesanato</a>
        <a href="#">Eventos</a>
        <a href="#">Loja</a>
        <a href="sobrenos.html">Sobre Nós</a>
    </div>
    <br>
    <div class="column">
        <h4>Contatos</h4>
        <a href="#">Entre em contato</a>
        <a href="#">Política de Privacidade</a>
        <a href="#">Termos e Transmissão</a>
    </div>
</footer>

<div class="copyright">
    LAESSENCE © 2024 La Essence.Todos os direitos revervados.
</div>


<script src="javascript/script-home-sobrenos.js"></script>
</body>

</html>





  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="arrow-up" aria-hidden="true"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js" defer></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>