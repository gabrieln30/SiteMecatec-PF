<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

<!-- Google fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 

     <!-- /Google fonts  -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <title>Produtos - Mecatec</title>   
    <link rel="stylesheet" href="style.css">
    <script src="header.js" defer></script>
    
    <style>
        body {
            background-image: url('../Imagens/ImgProduto.png');
            background-size: cover;
            background-position: center top;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-color: rgba(0,0,0,0.55);
            background-blend-mode: overlay;
            font-family: 'Poppins', Arial, sans-serif;
            color: #fff;
            min-height: 100vh;
        }
        .produtos-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #232323;
            color: #fff;
            padding: 24px 36px;
            border-radius: 16px;
            margin: 100px auto 0 auto;
            max-width: 1300px;
            
            gap: 32px;
        }
        .produtos-bar .departamentos {
            display: none;
        }
        .produtos-bar .search {
            flex: 1;
            margin: 0 32px;
        }
        .produtos-bar .search input {
            width: 100%;
            padding: 14px 22px;
            border-radius: 8px;
            border: none;
            font-size: 1.1rem;
            background: #181818;
            color: #fff;
            
            transition: box-shadow 0.2s;
        }
        .produtos-bar .search input:focus {
            outline: 2px solid #d32f2f;
            
        }
        .produtos-bar .carrinho-btn {
            background: linear-gradient(90deg, #21c521 60%, #1e8c1e 100%);
            color: #fff;
            font-weight: 700;
            border: none;
            border-radius: 8px;
            padding: 14px 36px;
            font-size: 1.15rem;
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
           
            transition: background 0.2s, box-shadow 0.2s;
        }
        .produtos-bar .carrinho-btn:hover {
            background: linear-gradient(90deg, #1e8c1e 0%, #21c521 100%);
            
        }
        .produtos-lista {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            margin: 48px auto 0 auto;
            max-width: 1400px;
            justify-content: flex-start;
        }
        .produto-card {
            background: #232323;
            border-radius: 18px;
            
            width: 320px;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 0 0 22px 0;
            position: relative;
            transition: transform 0.18s, box-shadow 0.18s;
        }
        .produto-card:hover {
            transform: translateY(-8px) scale(1.025);
           
        }
        .produto-card .img-bg {
            width: 100%;
            height: 190px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #222222;
            border-radius: 18px 18px 0 0;
            margin-bottom: 0;
        }
        .produto-card img {
            max-width: 92%;
            max-height: 170px;
            object-fit: contain;
            border-radius: 10px;
           
        }
        .produto-card .titulo {
            font-size: 1.15rem;
            font-weight: 600;
            margin: 22px 0 6px 22px;
            min-height: 48px;
        }
        .produto-card .preco-antigo {
            text-decoration: line-through;
            color: #ff8888;
            font-size: 1.02rem;
            margin-left: 22px;
        }
        .produto-card .preco-novo {
            color: #21c521;
            font-size: 1.35rem;
            font-weight: 700;
            margin-left: 22px;
        }
        .produto-card .avista {
            color: #21c521;
            font-size: 1.05rem;
            margin-left: 22px;
        }
        .produto-card .pix {
            color: #b2ff59;
            font-size: 1.01rem;
            margin-left: 22px;
        }
        .produto-card .parcelado {
            color: #fff;
            font-size: 1.01rem;
            margin-left: 22px;
        }
        .produto-card .entrega {
            color: #21a1ff;
            font-size: 1.01rem;
            margin-left: 22px;
            margin-top: 8px;
        }
        .btn-carrinho {
            display: block;
            width: calc(100% - 44px);
            margin: 18px 0 0 22px;
            background: linear-gradient(90deg, #d32f2f 60%, #b30000 100%);
            color: #fff;
            font-weight: 700;
            border: none;
            border-radius: 8px;
            padding: 12px 0;
            font-size: 1.08rem;
            cursor: pointer;
            box-shadow: 0 2px 8px #d32f2f22;
            transition: background 0.2s, box-shadow 0.2s;
            text-align: center;
        }
        .btn-carrinho:hover {
            background: linear-gradient(90deg, #b30000 0%, #d32f2f 100%);
            box-shadow: 0 4px 16px #d32f2f44;
        }
        @media (max-width: 900px) {
            .btn-carrinho {
                width: 90%;
                margin: 18px auto 0 auto;
            }
        }
        @media (max-width: 900px) {
            .produtos-lista {
                gap: 24px;
                max-width: 98vw;
            }
            .produto-card {
                width: 98vw;
                max-width: 340px;
            }
            .produtos-bar {
                flex-direction: column;
                gap: 18px;
                padding: 18px 8vw;
            }
        }
    </style>
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
                    <ul>
                        <li><a href="Mecatec.php">Inicio</a></li>
                        <li><a href="Mecatec.php#Servicos">Localização</a></li>
                        <li><a href="telaProduto.php">Produtos</a></li>
                        <li><a href="Mecatec.php#Sobre">Sobre</a></li>
                    </ul>
                </nav>
            </section>
            <section class="btn-contato">
                <div class="perfil-dropdown" id="perfilDropdown">
                    <button class="btn-perfil" id="btnPerfil">
                        <i class="fa-solid fa-user"></i>
                    </button>
                    <div class="perfil-menu" id="perfilMenu">
                        <div style="padding: 10px 18px; color: #b30000; font-weight: 600;">
                            Olá, <?php echo isset($_SESSION['nome']) ? htmlspecialchars($_SESSION['nome']) : ''; ?>
                        </div>
                        <button onclick="abrirPerfil()">Meu perfil</button>
                        <button onclick="abrirCarrinho()">Carrinho</button>
                        <button onclick="confirmarLogout()">Sair</button>
                    </div>
                </div>
            </section>
        </div>
    </header>
<body>
    <div class="produtos-bar">
        <button class="departamentos"><i class="fa fa-bars"></i> DEPARTAMENTOS</button>
        <div class="search"><input type="text" placeholder="Digite o que você procura..."></div>
        <button class="carrinho-btn" onclick="abrirCarrinho()"><i class="fa fa-shopping-cart"></i> CARRINHO <span id="carrinho-contador" style="font-weight:400;">0 produto</span> <i class="fa fa-chevron-down"></i></button>
    </div>

    <h1 style="margin-left: 50px;margin-top: 40px;">Kits</h1>
    <div class="produtos-lista">
        

        <div class="produto-card">           
            <div class="img-bg" style="background:#222222;">
                <img src="../Imagens/KitEsportivo.png" alt="Placa de Vídeo Duex Radeon RX580">
            </div>
            <div class="titulo">Kit Esportivo para pilotos - luvas e acessórios</div>
            <div class="preco-antigo">de R$ 1.011,75 por</div>
            <div class="preco-novo">R$ 749,99</div>
            <div class="avista">À vista</div>
            <div class="pix">15% de desconto no PIX</div>
            <div class="parcelado">Em até 12x de R$ 73,53<br>Sem juros no cartão</div>
            <button class="btn-carrinho"  onclick="comprarKit('Kit Esportivo', 749,99)">Comprar</button>
            </div>
        <div class="produto-card">
            <div class="img-bg" style="background:#222222;">
                <img src="../Imagens/KitSuspensao.png" alt="Suporte Para TV Zinnia STV700L">
            </div>
            <div class="titulo">Kit Suspensao para carros - 2 molas</div>
            <div class="preco-antigo">de R$ 799,99 por</div>
            <div class="preco-novo">R$ 259,99</div>
            <div class="avista">À vista</div>
            <div class="pix">15% de desconto no PIX</div>
            <div class="parcelado">Em até 12x de R$ 25,49<br>Sem juros no cartão</div>
            <button class="btn-carrinho"  onclick="comprarKit('Kit Suspensao ', 259,99)">Comprar</button>
        </div>
        <div class="produto-card">
            
            <div class="img-bg" style="background:#222222;">
                <img src="../Imagens/KitSom.png" alt="Placa de Vídeo MSI GeForce RTX 5070 Ti">
            </div>
            <div class="titulo">Kit Som Digital Com Regulador De Volume</div>
            <div class="preco-antigo">de R$ 1.057,45 por</div>
            <div class="preco-novo">R$ 735,90</div>
            <div class="avista">À vista</div>
            <div class="pix">15% de desconto no PIX</div>
            <div class="parcelado">Em até 12x de R$ 637,25<br>Sem juros no cartão</div>
            <button  class="btn-carrinho"   onclick="comprarKit('Kit Som Digital ', 735,90)">Comprar</button>
        </div>
        <div class="produto-card">
            
            <div class="img-bg" style="background:#222222;">
                <img src="../Imagens/KitMultimidia.png" alt="Gabinete Gamer Acegeek Aquarium M345">
            </div>
            <div class="titulo">Kit Multimidia Digital Com GPS 3.0</div>
            <div class="preco-antigo">de R$ 329,40 por</div>
            <div class="preco-novo">R$ 189,99</div>
            <div class="avista">À vista</div>
            <div class="pix">15% de desconto no PIX</div>
            <div class="parcelado">Em até 12x de R$ 18,63<br>Sem juros no cartão</div>
            <button  class="btn-carrinho" onclick="comprarKit('Kit Multimidia Digital', 189,99)">Comprar</button>
        </div>
        <div class="produto-card">
            
            <div class="img-bg" style="background:#222222;">
                <img src="../Imagens/KitLed.png" alt="Kit LED Completo">
            </div>
            <div class="titulo">Kit LED Completo para Carros, 6000K, Universal</div>
            <div class="preco-antigo">de R$ 199,99 por</div>
            <div class="preco-novo">R$ 179,99</div>
            <div class="avista">À vista</div>
            <div class="pix">10% de desconto no PIX</div>
            <div class="parcelado">Em até 6x de R$ 30,00<br>Sem juros no cartão</div>
            <button class="btn-carrinho"  onclick="comprarKit('Kit LED Completo', 179,99)">Comprar</button>
        </div>
        <div class="produto-card">
           
            <div class="img-bg" style="background:#222222;">
                <img src="../Imagens/KitEstetica (1).png" alt="Kit Estética Automotiva">
            </div>
            <div class="titulo">Kit Estética Automotiva Completo, Limpeza e Proteção</div>
            <div class="preco-antigo">de R$ 149,99 por</div>
            <div class="preco-novo">R$ 119,99</div>
            <div class="avista">À vista</div>
            <div class="pix">20% de desconto no PIX</div>
            <div class="parcelado">Em até 4x de R$ 30,00<br>Sem juros no cartão</div>
            <button class="btn-carrinho"  onclick="comprarKit('Kit Estética Automotiva', 119,99)">Comprar</button>
        </div>
        <div class="produto-card">
            
            <div class="img-bg" style="background:#222222;">
                <img src="../Imagens/KitPerformance.png" alt="Kit Performance">
            </div>
            <div class="titulo">Kit Performance Esportivo, Aumento de Potência</div>
            <div class="preco-antigo">de R$ 399,99 por</div>
            <div class="preco-novo">R$ 349,99</div>
            <div class="avista">À vista</div>
            <div class="pix">12% de desconto no PIX</div>
            <div class="parcelado">Em até 10x de R$ 35,00<br>Sem juros no cartão</div>
            <button class="btn-carrinho"  onclick="comprarKit('Kit Performance', 349,99)">Comprar</button>
        </div>
        <div class="produto-card">
            
            <div class="img-bg" style="background:#222222;">
                <img src="../Imagens/KitSegurança.png" alt="Kit Segurança">
            </div>
            <div class="titulo">Kit Segurança Veicular, Alarmes e Travas</div>
            <div class="preco-antigo">de R$ 299,99 por</div>
            <div class="preco-novo">R$ 245,99</div>
            <div class="avista">À vista</div>
            <div class="pix">18% de desconto no PIX</div>
            <div class="parcelado">Em até 8x de R$ 31,00<br>Sem juros no cartão</div>
            <button class="btn-carrinho"  onclick="comprarKit('Kit Estética Automotiva', 245,99)">Comprar</button>
        </div>
    </div>


    


        <footer style="margin-top: 30px;">
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
<script>
let carrinho = [];

function comprarKit(nome, preco) {
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
    let qtdTotal = 0;
    if (carrinho.length === 0) {
        carrinhoItens.innerHTML = '<p>Seu carrinho está vazio.</p>';
    } else {
        carrinho.forEach((item, i) => {
            total += item.preco * item.qtd;
            qtdTotal += item.qtd;
            carrinhoItens.innerHTML += `<div class="carrinho-item">
                    <span class="carrinho-item-nome">${item.nome}</span>
                    <div class="carrinho-qtd">
                        <button onclick="alterarQtd(${i}, -1)">-</button>
                        <input type="number" min="1" value="${item.qtd}" onchange="alterarQtdDireto(${i}, this.value)">
                        <button onclick="alterarQtd(${i}, 1)">+</button>
                    </div>
                    <span>R$ ${(item.preco * item.qtd).toFixed(2)}</span>
                    <button class="carrinho-remover" onclick="removerItem(${i})">&times;</button>
                </div>`;
        });
    }
    document.getElementById('carrinhoTotal').innerText = 'Total: R$ ' + total.toFixed(2);
    const contador = document.getElementById('carrinho-contador');
    if (contador) {
        if (qtdTotal === 1) {
            contador.textContent = '1 produto';
        } else {
            contador.textContent = qtdTotal + ' produtos';
        }
    }
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

    if (!userLoggedIn) {
        alert('Você precisa estar logado para finalizar a compra.');
        window.location.href = '../models/MecatecLogin.php';
        return;
    }

    let total = 0;
    carrinho.forEach(item => {
        total += item.preco * item.qtd;
    });

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




var userLoggedIn = <?php echo isset($_SESSION['usuario_id']) ? 'true' : 'false'; ?>;
     
const perfilDropdown = document.getElementById('perfilDropdown');
const perfilMenu = document.getElementById('perfilMenu');
const btnPerfil = document.getElementById('btnPerfil');

btnPerfil.addEventListener('mouseenter', () => {
    perfilDropdown.classList.add('show');
});
perfilDropdown.addEventListener('mouseleave', () => {
    perfilDropdown.classList.remove('show');
});


function abrirPerfil() {
    if (!userLoggedIn) {
        alert('Você precisa estar logado para acessar o perfil.');
        window.location.href = '../models/MecatecLogin.php'; 
        return;
    }
    else{window.location.href = 'perfil_usuario.php';} 
   
}


function abrirCarrinho() {
    document.getElementById('carrinhoSidebar').classList.add('aberto');
    document.getElementById('carrinhoOverlay').classList.add('aberto');
}

function confirmarLogout() {
    if (confirm('Deseja realmente sair da sua conta?')) {
        window.location.href = '../controllers/logout.php';
    }
}

    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('.produtos-bar .search input');
        const cards = document.querySelectorAll('.produto-card');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const termo = searchInput.value.trim().toLowerCase();
                cards.forEach(card => {
                    const titulo = card.querySelector('.titulo')?.textContent.toLowerCase() || '';
                    if (titulo.includes(termo)) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        }
    });
    </script>
</html>
