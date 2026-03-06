<?php session_start(); 

?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <script src="header.js" defer></script>
    <link rel="stylesheet" href="style1.css">
    <title>Mecatec</title>
</head>

<body>
    <header id="header">
        <div class="interface">
            <section class="logo">
                <img class="logo-branca" src="../Imagens/forma-lateral-preta-do-carro-esporte.png" alt="Logotipo do site">
                <img  class="logo-preta"  src="../Imagens/forma-lateral-preta-do-carro-esporte.png" alt="Logotipo do site">
            </section>
            <section class="menu-desktop">
                <nav>
                    <nav>
                        <ul>
                            <li><a href="Mecatec.php">Inicio</a></li>
                            <li><a href="#Servicos">Localização</a></li>
                            <li><a href="telaProduto.php">Produtos</a></li>
                            <li><a href="#Sobre">Sobre</a></li>
                        </ul>
                    </nav>
                </nav>
            </section>
            <section class="btn-contato">
    <div class="perfil-dropdown" id="perfilDropdown">
        <button class="btn-perfil" id="btnPerfil">
            <i class="fa-solid fa-user"></i>
        </button>
        <div class="perfil-menu" id="perfilMenu">
            <div style="padding: 10px 18px; color: #b30000; font-weight: 600;">
                Olá <?php echo isset($_SESSION['nome']) ? htmlspecialchars($_SESSION['nome']) : ''; ?>
            </div>
            <button onclick="abrirPerfil()">Meu perfil</button>
            <button onclick="abrirCarrinho()">Carrinho</button>
            <button onclick="confirmarLogout()">Sair</button>
        </div>
    </div>
</section>
        </div>
    </header>
    <section class="hero-site">
        <div class="interface">
            <div class="txt-hero">
                <h1 class="fade-in-left">Mecatec<span> Qualidade você encontra aqui!</span></h1>
                <p class="fade-in-left" style="animation-delay: 0.3s;">Velocidade e rapidez na reforma do seu carro!! <span>os melhores serviços você encontra na Mecatec.</span></p>
                <button class="fade-in-left" style="animation-delay: 0.6s;" onclick="abrirVideoModal()">Quero conhecer</button>
</div>
<!-- Modal do vídeo -->
<div id="videoModal" style="display:none;position:fixed;z-index:9999;top:0;left:0;width:100vw;height:100vh;align-items:center;justify-content:center;">
  <div id="videoModalOverlay" style="position:absolute;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.7);" onclick="fecharVideoModal()"></div>
  <div id="videoModalContent" style="position:relative;z-index:2;display:flex;flex-direction:column;align-items:center;">
    <button onclick="fecharVideoModal()" style="position:absolute;top:8px;right:12px;font-size:28px;background:none;border:none;color:#fff;cursor:pointer;z-index:3;">&times;</button>
    <iframe id="videoIframe" src="https://www-ccv.adobe.io/v1/player/ccv/5Zeid-rIrH_/embed?api_key=behance1&bgcolor=%23191919" height="716" width="704" allowfullscreen lazyload frameborder="0" style="border-radius:8px;max-width:80vw;max-height:60vh;"></iframe>
  </div>
</div>
<script>
function abrirVideoModal() {
  document.getElementById('videoModal').style.display = 'flex';
}
function fecharVideoModal() {
  const modal = document.getElementById('videoModal');
  const iframe = document.getElementById('videoIframe');
  // Pausa o vídeo removendo o src temporariamente
  const src = iframe.src;
  iframe.src = '';
  setTimeout(() => { iframe.src = src; }, 100);
  modal.style.display = 'none';
}
</script>
           
    </section>
    
    
<div class="scroller" data-speed="slow" data-animated="false" >
    
  <ul class="tag-list scroller__inner" >
    <li>Ford</li>
    <li>Chevrolet</li>
    <li>Volkswagen</li>
    <li>Toyota</li>
    <li>Honda</li>
    <li>Nissan</li>
    <li>Hyundai</li>
    <li>Kia</li>
    <li>Peugeot</li>
    <li>Renault</li>
    <li>Fiat</li>
    <li>Jeep</li>
    <li>BMW</li>
    <li>Mercedes-Benz</li>
    <li>Audi</li>
    <li>Porsche</li>
    <li>Lexus</li>
    <li>Subaru</li>
    <li>Mitsubishi</li>
    <li>Volvo</li>
    </ul>

</div>


    

    
    <section class="porque-escolher fade-in-section" id="porque-escolher">
  <div class="porque-escolher-container">
    <div class="porque-escolher-texto">
    <h2 style="text-align:center">Por que nos escolher?</h2>
      <p>
Na nossa oficina, trabalhamos com honestidade, qualidade e compromisso. Nossa equipe é experiente, utiliza peças confiáveis e oferece atendimento transparente. Cuidamos do seu carro com agilidade e atenção, sempre buscando sua confiança e satisfação.      </p>
    </div>
    <div class="porque-escolher-barras">
      <div class="barra-label">
        <span>Melhor serviço</span>
        <span class="barra-porcentagem" data-valor="98">0%</span>
      </div>
      <div class="barra-progresso">
        <div class="barra-preenchida" data-valor="98"></div>
      </div>
      <div class="barra-label">
        <span>Confiança</span>
        <span class="barra-porcentagem" data-valor="93">0%</span>
      </div>
      <div class="barra-progresso">
        <div class="barra-preenchida" data-valor="93"></div>
      </div>
      <div class="barra-label">
        <span>Funcionários capacitados</span>
        <span class="barra-porcentagem" data-valor="92">0%</span>
      </div>
      <div class="barra-progresso">
        <div class="barra-preenchida" data-valor="92"></div>
      </div>
    </div>
  </div>

</section>
    
    <section class="produtos-upgrade" id="produtos-upgrade">



        <section class="catalogo-pecas-video-section">
    <video autoplay muted loop playsinline preload="auto">
        <source src="https://cdn.mecanico.renault.com.br/banners/home/video-catalogo-de-pecas-desk.mp4" type="video/mp4">
        Seu navegador não suporta vídeo em HTML5.
    </video>
    <div class="catalogo-pecas-overlay">
        <h2>Catálogo de peças</h2>
        <p>Encontre a peça que você precisa</p>
        <a href="telaProduto.php">Ver tudo</a>
    </div>

    <div class="center">
  <div class="wrapper">
    <div class="inner">
      <div class="card">
        <img src="../Imagens/KitEsportivo.png" >
        <div class="content">
          <h1>Kit Esportivo</h1>          
          <span class="preco">R$ 749,99</span>
          <button class="btn-carrinho" onclick="comprarKit('Kit Acessórios Esportivos', 749,99)">Comprar</button>
        </div>
      </div>
      <div class="card">
        <img src="../Imagens/KitSom.png">
        <div class="content">
          <h1>Kit Som Automotivo</h1>          
          <span class="preco">R$ 735,90</span>
          <button class="btn-carrinho" onclick="comprarKit('Kit Som Automotivo', 735,90)">Comprar</button>
        </div>
      </div>
      <div class="card">
        <img src="../Imagens/KitLed.png">
        <div class="content">
          <h1>Kit LED Completo</h1>          
          <span class="preco">R$ 179,99</span>
          <button class="btn-carrinho" onclick="comprarKit('Kit LED Completo', 179,99)">Comprar</button>
        
        </div>
      </div>
      <div class="card">
        <img src="../Imagens/KitSuspensao.png">
        <div class="content">
          <h1>Kit Suspensao</h1>          
          <span class="preco">R$ 259,99</span>
          <button class="btn-carrinho" onclick="comprarKit('Kit Suspensao', 259,99)">Comprar</button>
        
        </div>
      </div>
      <div class="card">
        <img src="../Imagens/KitSegurança.png">
        <div class="content">
          <h1>Kit Segurança</h1>          
          <span class="preco">R$ 245,99</span>
          <button class="btn-carrinho" onclick="comprarKit('Kit Segurança', 245,99)">Comprar</button>
        
        </div>
      </div>
      <div class="card">
        <img src="../Imagens/KitEstetica (1).png">
        <div class="content">
          <h1>Kit Estetica</h1>          
          <span class="preco">R$ 119,99</span>
          <button class="btn-carrinho"  onclick="comprarKit('Kit Estetica', 119,99)">Comprar</button>
        
        </div>
      </div>
           <div class="card">
        <img src="../Imagens/KitPerformance.png">
        <div class="content">
          <h1>Kit Performance</h1>          
          <span class="preco">R$ 349,99</span>
          <button class="btn-carrinho" onclick="comprarKit('Kit Performance', 349,99)">Comprar</button>
        
        </div>
      </div>
             <div class="card">
        <img src="../Imagens/KitMultimidia.png">
        <div class="content">
          <h1>Kit Multimidia</h1>          
          <span class="preco">R$ 189,99</span>
          <button class="btn-carrinho" onclick="comprarKit('Kit Multimidia', 189,99)">Comprar</button>
        
        </div>
      </div>
        <div class="card">
        <img src="../Imagens/KitSom.png">
        <div class="content">
          <h1>Kit Som (Premium)</h1>          
          <span class="preco">R$ 935,90</span>
          <button class="btn-carrinho" onclick="comprarKit('Kit Som (Premium)', 935,90)">Comprar</button>        
        </div>
      </div>
    </div>
  </div>
  
  <div class="map">
    <button class="active first"></button>
    <button class="second"></button>
    <button class="third"></button>
  </div>
</div>
</section>
</section>
<div class="faixa-branca-destaque " id="Servicos">
        <div class="conteudo-faixa">            
            <div class="faixa-destaques ">
                <div class="faixa-item ">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                    <h4>Padrão Profissional</h4>
                    <p>Equipe qualificada e processos modernos para o melhor resultado.</p>
                </div>
                <div class="faixa-item">
                    <i class="fa-solid fa-shield-halved"></i>
                    <h4>Segurança Total</h4>
                    <p>Proteção de dados, backup diário e autenticação por níveis de acesso.</p>
                </div>
                <div class="faixa-item">
                    <i class="fa-solid fa-chart-line"></i>
                    <h4>Resultados Comprovados</h4>
                    <p>Até 40% mais eficiência e satisfação dos clientes após usar a Mecatec.</p>
                </div>                
            </div>
        </div>
    </div>

    <section id="mapa-localizacao" style="margin-top:50px;   padding:48px 0;background:linear-gradient(180deg, rgba(0,0,0,0.6), rgba(0,0,0,0.5));">
        <div class="interface" style="max-width:1100px;margin:0 auto;display:flex;gap:24px;align-items:flex-start;flex-wrap:wrap;">
            <div style="flex:1 1 440px;min-width:300px;color:#fff;padding:12px 16px;">
                <h2 style="margin-top:0;color:#fff;font-size:3rem;line-height:1.02;font-weight:800;">Nossa Loja</h2>
                <p style="font-size:1.3rem;line-height:1.6;margin:8px 0;">Endereço: Largo do bodegão - Santa Cruz</p>
                <p style="font-size:1.3rem;line-height:1.6;margin:8px 0;">Venha nos visitar! Clique em &quot;Abrir no Maps&quot; para navegação.</p>
                <p style="margin:12px 0 0 0;"><a href="https://www.google.com/maps/search/?api=1&query=Largo+do+bodeg%C3%A3o+Santa+Cruz" target="_blank" rel="noopener" style="display:inline-block;margin-top:12px;background:#b30000;color:#fff;padding:14px 20px;border-radius:8px;text-decoration:none;font-weight:800;font-size:1.15rem;">Abrir no Maps</a></p>
            </div>
            <div style="flex:1 1 520px;min-width:300px;">
                <div style="position:relative;padding-top:56.25%;height:0;overflow:hidden;border-radius:12px;box-shadow:0 8px 30px rgba(0,0,0,0.45);">
                    <iframe src="https://www.google.com/maps?q=Largo%20do%20bodeg%C3%A3o%20Santa%20Cruz&output=embed" style="position:absolute;top:0;left:0;width:100%;height:100%;border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>



    <section class="porque-escolher" aria-labelledby="objetivo-title" style="padding:36px 0 8px 0; margin-bottom:48px;" id="Sobre">
            <div class="porque-escolher-container" style="align-items:center;gap:32px;">
                <div class="porque-escolher-texto" style="flex:1 1 520px;text-align:center;">
                    <h2 id="objetivo-title">Qual o nosso objetivo?</h2>
                    <p>
                        Fundada com foco na inovação e modernização do setor automotivo, a Mecatec é uma empresa que busca unir tecnologia e eficiência na gestão de oficinas mecânicas. Para isso, desenvolvemos um sistema dividido em duas soluções interligadas a um mesmo banco de dados: uma plataforma desktop e um site institucional.
                    </p>
                </div>
                <div class="porque-escolher-texto" style="flex:1 1 360px;text-align:center;">
                    <h2 id="proposito-title">Nosso Propósito</h2>
                    <p>
                        Inovar os sistemas das oficinas, trazendo maior rentabilidade por meio do site e tornando a empresa mais fácil de escalar. Buscamos soluções práticas que aumentem eficiência e reduzam custos operacionais. Priorizamos um atendimento humano e sustentável, além de fortalecer parcerias locais para gerar confiança e crescimento mútuo com nossos clientes.
                    </p>
                </div>
            </div>
        </section>

<div id="carrinhoSidebar" class="carrinho-sidebar">
    <div class="carrinho-header">
        <h3>Carrinho</h3>
        <button onclick="fecharCarrinho()" class="fechar-carrinho">&times;</button>
    </div>
    <div id="carrinhoItens"></div>
    <div class="carrinho-footer">
        <span id="carrinhoTotal">Total: R$ 0,00</span>
        <button onclick="finalizarCompra()" class="finalizar-btn">Finalizar Compra</button>
    </div>
</div>
<div id="carrinhoOverlay" class="carrinho-overlay" onclick="fecharCarrinho()"></div>
</body>

    
   
    
    <footer>
        <div id="footer_content" >
            <div id="footer_contacts" id="Contato">
                
                <p>Devs<br> Gabriel Nunes <br> Carlos Eduardo</p>

                <div id="footer_social_media">
                    <a href="#" class="footer-link" id="instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="#" class="footer-link" id="facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <a href="#" class="footer-link" id="whatsapp">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>
            </div>
            
            <ul class="footer-list">
                <li>
                    <h3>Tópicos</h3>
                </li>
                <li>
                    <a href="#Servicos" class="footer-link">Serviços</a>
                </li>
                <li>
                    <a href="#Produtos" class="footer-link">Produtos</a>
                </li>
                <li>
                    <a href="telaSobre.php" class="footer-link">Sobre</a>
                </li>
            </ul>

            <ul class="footer-list">
                <li>
                    <h3>Produtos</h3>
                </li>
                <li>
                    <a href="#" class="footer-link">App</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Desktop</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Site</a>
                </li>
            </ul>

            <div id="footer_subscribe">
                <h3>Inscreva-se</h3>

                <p>
                    Caso deseja receber noticias ou atualizações, coloque seu e-mail abaixo!
                </p>

                <div id="input_group">
                    <input type="email" id="email">
                    <button>
                        <i class="fa-regular fa-envelope"></i>
                    </button>
                </div>
            </div>
        </div>

        <div id="footer_copyright">
            &#169
            2025 all rights reserved
        </div>
    </footer>

    

    <script>   
// https://colorlib.com/preview/theme/seogo/

const buttonsWrapper = document.querySelector(".map");
const slides = document.querySelector(".inner");

buttonsWrapper.addEventListener("click", e => {
  if (e.target.nodeName === "BUTTON") {
    Array.from(buttonsWrapper.children).forEach(item =>
      item.classList.remove("active")
    );
    if (e.target.classList.contains("first")) {
      slides.style.transform = "translateX(-0%)";
      e.target.classList.add("active");
    } else if (e.target.classList.contains("second")) {
      slides.style.transform = "translateX(-33.33333333333333%)";
      e.target.classList.add("active");
    } else if (e.target.classList.contains('third')){
      slides.style.transform = 'translatex(-66.6666666667%)';
      e.target.classList.add('active');
    }
  }
});

    
const scrollers = document.querySelectorAll(".scroller");

// If a user hasn't opted in for recuded motion, then we add the animation
if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
  addAnimation();
}

function addAnimation() {
  scrollers.forEach((scroller) => {
    // add data-animated="true" to every `.scroller` on the page
    scroller.setAttribute("data-animated", true);

    // Make an array from the elements within `.scroller-inner`
    const scrollerInner = scroller.querySelector(".scroller__inner");
    const scrollerContent = Array.from(scrollerInner.children);

    // For each item in the array, clone it
    // add aria-hidden to it
    // add it into the `.scroller-inner`
    scrollerContent.forEach((item) => {
      const duplicatedItem = item.cloneNode(true);
      duplicatedItem.setAttribute("aria-hidden", true);
      scrollerInner.appendChild(duplicatedItem);
    });
  });
}



      var userLoggedIn = <?php echo isset($_SESSION['usuario_id']) ? 'true' : 'false'; ?>;
// Dropdown do perfil
const perfilDropdown = document.getElementById('perfilDropdown');
const perfilMenu = document.getElementById('perfilMenu');
const btnPerfil = document.getElementById('btnPerfil');

btnPerfil.addEventListener('mouseenter', () => {
    perfilDropdown.classList.add('show');
});
perfilDropdown.addEventListener('mouseleave', () => {
    perfilDropdown.classList.remove('show');
});

// Função Meu Perfil


function abrirPerfil() {
    if (!userLoggedIn) {
        alert('Você precisa estar logado para acessar o perfil.');
        window.location.href = '../models/MecatecLogin.php'; // Redireciona para a página de login
        return;
    }
    else{window.location.href = 'perfil_usuario.php';}  // Redireciona para a página de perfil
   
}

// Função Carrinho (já existente)
function abrirCarrinho() {
    document.getElementById('carrinhoSidebar').classList.add('aberto');
    document.getElementById('carrinhoOverlay').classList.add('aberto');
}

// Função Sair
function confirmarLogout() {
    if (confirm('Deseja realmente sair da sua conta?')) {
        window.location.href = '../controllers/logout.php';
    }
}

// Carrossel simples com autoplay
let scrollPosition = 0;
let autoPlayInterval = null;

function moveCarousel(direction) {
    const carousel = document.getElementById('carousel');
    const kitWidth = carousel.children[0].offsetWidth + 24; // largura + margin
    const visibleKits = 3;
    const maxScroll = kitWidth * (carousel.children.length - visibleKits);
    scrollPosition += direction * kitWidth;
    if (scrollPosition < 0) scrollPosition = 0;
    if (scrollPosition > maxScroll) scrollPosition = 0; // volta ao início ao chegar no fim
    carousel.scrollTo({ left: scrollPosition, behavior: 'smooth' });
}

function startAutoPlay() {
    autoPlayInterval = setInterval(() => {
        moveCarousel(1);
    }, 2000);
}

function stopAutoPlay() {
    clearInterval(autoPlayInterval);
}

document.addEventListener('DOMContentLoaded', () => {
    startAutoPlay();
    // Pausa o autoplay ao passar o mouse
    const carousel = document.getElementById('carousel');
    carousel.addEventListener('mouseenter', stopAutoPlay);
    carousel.addEventListener('mouseleave', startAutoPlay);
});

// Simulação de verificação de login



let carrinho = [];

function comprarKit(nome, preco) {
    // Verifica se já existe o item no carrinho
    const idx = carrinho.findIndex(item => item.nome === nome);
    if (idx >= 0) {
        carrinho[idx].qtd += 1;
    } else {
        carrinho.push({ nome, preco, qtd: 1 });
    }
    abrirCarrinho();
    renderizarCarrinho();
}

function abrirCarrinho() {
    document.getElementById('carrinhoSidebar').classList.add('aberto');
    document.getElementById('carrinhoOverlay').classList.add('aberto');
}

function fecharCarrinho() {
    document.getElementById('carrinhoSidebar').classList.remove('aberto');
    document.getElementById('carrinhoOverlay').classList.remove('aberto');
}

function renderizarCarrinho() {
    const carrinhoItens = document.getElementById('carrinhoItens');
    carrinhoItens.innerHTML = '';
    let total = 0;
    if (carrinho.length === 0) {
        carrinhoItens.innerHTML = '<p>Seu carrinho está vazio.</p>';
    } else {
        carrinho.forEach((item, i) => {
            total += item.preco * item.qtd;
            carrinhoItens.innerHTML += `<div class="carrinho-item">
                    <span class="carrinho-item-nome">${item.nome}</span>
                    <div class="carrinho-qtd">
                        <button onclick="alterarQtd(${i}, -1)">-</button>
                        <input type="number" min="1" value="${item.qtd}" onchange="alterarQtdDireto(${i}, this.value)">
                        <button onclick="alterarQtd(${i}, 1)">+</button>
                    </div>
                    <span>R$ ${(item.preco * item.qtd).toFixed(2)}</span>
                    <button class="carrinho-remover" onclick="removerItem(${i})">&times;</button>
                
                    </div>
            `;
        });
    }
    document.getElementById('carrinhoTotal').innerText = 'Total: R$ ' + total.toFixed(2);
}

function alterarQtd(idx, delta) {
    carrinho[idx].qtd += delta;
    if (carrinho[idx].qtd < 1) carrinho[idx].qtd = 1;
    renderizarCarrinho();
}

function alterarQtdDireto(idx, value) {
    let v = parseInt(value);
    if (isNaN(v) || v < 1) v = 1;
    carrinho[idx].qtd = v;
    renderizarCarrinho();
}

function removerItem(idx) {
    carrinho.splice(idx, 1);
    renderizarCarrinho();
}

function finalizarCompra() {
    if (carrinho.length === 0) {
        alert('Seu carrinho está vazio!');
        return;
    }

    // Verifica se o usuário está logado
    if (!userLoggedIn) {
        alert('Você precisa estar logado para finalizar a compra.');
        window.location.href = '../models/MecatecLogin.php';
        return;
    }

    // Calcula o valor total do carrinho
    let total = 0;
    carrinho.forEach(item => {
        total += item.preco * item.qtd;
    });

    // Salva o carrinho na sessão PHP antes de redirecionar
    fetch('salvarCarrinho.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(carrinho)
    })
    .then(response => response.text())
    .then(() => {
        window.location.href = '../pixqr/telaPagamento.php?valor=' + encodeURIComponent(total.toFixed(2));
    })
    .catch(() => {
        alert('Erro ao salvar o carrinho. Tente novamente.');
    });
}
// Fade-in and progress bar animation on scroll
document.addEventListener('DOMContentLoaded', function () {
    const section = document.querySelector('.fade-in-section');
    let barsAnimated = false;

    function animateBars() {
        if (barsAnimated) return;
        barsAnimated = true;

        document.querySelectorAll('.barra-preenchida').forEach(function(barra, idx) {
            const valor = parseInt(barra.getAttribute('data-valor'));
            setTimeout(() => {
                barra.style.width = valor + '%';
            }, 400 + idx * 300);
        });

        document.querySelectorAll('.barra-porcentagem').forEach(function(span, idx) {
            const valor = parseInt(span.getAttribute('data-valor'));
            let atual = 0;
            const duracao = 1600;
            const delay = 400 + idx * 300;
            setTimeout(() => {
                const incremento = Math.max(1, Math.round(valor / (duracao / 16)));
                const timer = setInterval(() => {
                    atual += incremento;
                    if (atual >= valor) {
                        atual = valor;
                        clearInterval(timer);
                    }
                    span.textContent = atual + '%';
                }, 16);
            }, delay);
        });
    }

    function onScrollFadeIn() {
        const rect = section.getBoundingClientRect();
        if (rect.top < window.innerHeight - 80) {
            section.classList.add('visible');
            animateBars();
            window.removeEventListener('scroll', onScrollFadeIn);
        }
    }
    window.addEventListener('scroll', onScrollFadeIn);
    onScrollFadeIn();
});

// Fade-in para a faixa de destaques ao entrar na tela
document.addEventListener('DOMContentLoaded', function () {
    const faixa = document.querySelector('.faixa-branca-destaque');
    function onScrollFadeInFaixa() {
        if (!faixa) return;
        const rect = faixa.getBoundingClientRect();
        if (rect.top < window.innerHeight - 80) {
            faixa.classList.add('visible');
            window.removeEventListener('scroll', onScrollFadeInFaixa);
        }
    }
    window.addEventListener('scroll', onScrollFadeInFaixa);
    onScrollFadeInFaixa();
});

let carrosselPos = 0;
const carrosselLista = document.getElementById('carrosselLista');
const totalItens = carrosselLista.children.length;
const itensVisiveis = 3; // Quantos aparecem ao mesmo tempo
function moverCarrossel(dir) {
    carrosselPos += dir;
    if (carrosselPos < 0) carrosselPos = 0;
    if (carrosselPos > totalItens - itensVisiveis) carrosselPos = totalItens - itensVisiveis;
    const itemLargura = carrosselLista.children[0].offsetWidth + 18; // largura + gap
    carrosselLista.style.transform = `translateX(-${carrosselPos * itemLargura}px)`;
}
    </script>    
    <!-- Mapa de localização -->
    
</html>