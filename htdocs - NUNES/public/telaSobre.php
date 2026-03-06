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
    <link rel="stylesheet" href="style.css"> 
    <title>Mecatec - Documentação do Sistema</title>
    
    <style>
        .sobre-content {
            padding: 80px 0;
            min-height: 70vh;
            background-color: #f7f7f7;
            background-image: url('../Imagens/motor.jpg.jpg');
            background-size: cover; 
            background-position: center;
            background-attachment: fixed; 
            position: relative; 
        }
        .sobre-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6); 
            z-index: 1; 
        }

        .sobre-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative; 
            z-index: 2; 
        }
        .titulo-principal {
            font-size: 3.5rem;
            color: #fff; 
            text-align: center;
            margin-bottom: 50px;
            font-weight: 800;
        }

        .accordion {
            border-radius: 10px;
            overflow: hidden; 
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            background-color: #fff; 
        }

        .accordion-item {
            border-bottom: 1px solid #ddd;
        }
        .accordion-item:last-child {
            border-bottom: none;
        }

        .accordion-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            font-size: 1.25rem;
            font-weight: 600;
            color: #b30000; 
            background-color: #f9f9f9; 
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .accordion-header:hover {
            background-color: #f0f0f0;
        }
        
        .accordion-header i {
            font-size: 1.2rem;
            transition: transform 0.3s;
        }
        .accordion-header.active i {
            transform: rotate(180deg);
        }

        .accordion-content {
            padding: 0 20px;
            background-color: #fff;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-out, padding 0.4s ease-out; 
            color: #1a1a1a;
        }
        .accordion-content.open {
            max-height: 2000px; 
            padding: 20px; 
            padding-top: 0; 
        }
        
        .accordion-content p {
            margin-top: 15px;
            font-size: 1rem;
            line-height: 1.6;
            text-align: justify;
        }

        .accordion-content h3 {
            color: #1a1a1a;
            font-size: 1.4rem;
            margin-top: 25px;
            margin-bottom: 10px;
            border-bottom: 1px dashed #ccc;
            padding-bottom: 5px;
        }

        .accordion-content ul {
            list-style: none;
            padding: 0;
        }
        .accordion-content ul li {
            padding: 5px 0;
            font-size: 1rem;
            color: #444;
        }
        .accordion-content ul li strong {
            color: #b30000;
            font-weight: 700;
            display: inline-block;
            margin-right: 5px;
        }

        .rnf-item {
            border-left: 3px solid #b30000;
            padding-left: 15px;
            margin-bottom: 15px;
            background: #fcfcfc;
            padding: 10px 15px;
            border-radius: 4px;
        }
        .rnf-item strong {
            display: block;
            color: #1a1a1a;
            font-size: 1.1rem;
            margin-bottom: 5px;
        }
        .rnf-item p {
            margin-top: 5px;
            font-size: 0.95rem;
            line-height: 1.5;
            text-align: justify;
        }

        .diagramas-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 15px;
        }
        .diagrama-bloco {
            flex: 1 1 calc(50% - 20px); 
            min-width: 300px;
        }
        .diagrama-placeholder {
            border: 1px solid #ccc; 
            min-height: 300px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            background-color: #eee;
            color: #555; 
            font-style: italic;
            margin: 15px 0;
            text-align: center;
            overflow: hidden;
            padding: 10px;
        }
        .diagrama-placeholder img {
            max-width: 100%; 
            height: auto; 
            display: block;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <header id="header">
        <div class="interface">
            <section class="logo">
                <img class="logo-branca" src="../Imagens/forma-lateral-preta-do-carro-esporte.png" alt="Logotipo do site">
                <img class="logo-preta" src="../Imagens/forma-lateral-preta-do-carro-esporte.png" alt="Logotipo do site">
            </section>
            <section class="menu-desktop">
                <nav>
                    <ul>
                        <li><a href="Mecatec.php">Inicio</a></li>
                        <li><a href="Mecatec.php#Servicos">Localização</a></li>
                        <li><a href="telaProduto.php">Produtos</a></li>
                        <li><a href="telaSobre.php">Sobre</a></li> 
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

    <section class="sobre-content">
        <div class="sobre-container">
            <h1 class="titulo-principal">Documentação do Sistema Mecatec</h1>

            <div class="accordion">
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <span><i class="fas fa-search-location"></i> 1. DESCRIÇÃO DO CONTEXTO</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="accordion-content">
                        <p>
                            Fundada com foco na inovação e modernização do setor automotivo, a Mecatec é uma empresa que busca unir tecnologia e eficiência na gestão de oficinas mecânicas. Para isso, desenvolvemos um sistema dividido em duas soluções interligadas a um mesmo banco de dados: uma plataforma desktop e um site institucional.
                        </p>
                        <p>
                            A versão desktop é o núcleo do sistema, voltada ao controle interno da oficina. Nela, é possível gerenciar cadastros de funcionários, clientes e veículos, além de realizar o controle de ordens de serviço e do caixa. O acesso às funcionalidades é definido conforme o nível de permissão de cada funcionário, garantindo maior segurança e organização no uso do sistema.
                        </p>
                        <p>
                            Já o site da Mecatec tem como objetivo apresentar a empresa ao público, permitindo que os clientes conheçam melhor os serviços oferecidos e realizem seu cadastro de forma prática e segura. Dessa forma, criamos um canal de comunicação direto entre oficina e cliente, integrando informações de maneira simples e acessível.
                        </p>
                        <p>
                            O sistema foi projetado para ser intuitivo, seguro e escalável. Com interface amigável e organização clara, a Mecatec busca otimizar o tempo de trabalho dentro da oficina, facilitar a gestão e oferecer uma experiência moderna tanto para os gestores quanto para os clientes. Mais do que um sistema de controle, a Mecatec é uma solução completa para oficinas que desejam se destacar no mercado.
                        </p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <span><i class="fas fa-cogs"></i> 2. DESCRIÇÃO DO SISTEMA</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="accordion-content">
                        <p>
                            O Sistema Mecatec é uma solução híbrida desenvolvida para a gestão completa de oficinas mecânicas. Ele centraliza todas as operações em um único banco de dados, garantindo a consistência das informações em duas interfaces distintas:
                        </p>
                        
                        <h3>Sistema Desktop (Gestão Interna)</h3>
                        <p>
                            Plataforma robusta para uso dos funcionários e administradores, cobrindo: controle de funcionários, gestão de clientes e veículos, registro de ordens de serviço, gerenciamento de estoque de peças e controle financeiro (caixa e pagamentos).
                        </p>
                        
                        <h3>Site Institucional (Interface com o Cliente)</h3>
                        <p>
                            Este portal web permite aos clientes interagir diretamente com a oficina, incluindo cadastro, solicitação de serviços, consulta de produtos e realização de pagamentos online.
                        </p>
                        
                        <p>
                            A arquitetura suporta múltiplos níveis de acesso (Cliente, Funcionário, CEO), assegurando que cada usuário tenha acesso apenas às funcionalidades pertinentes à sua função.
                        </p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <span><i class="fas fa-clipboard-list"></i> 3. REQUISITOS DO SISTEMA</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="accordion-content">
                        <p>O sistema foi projetado para atender aos seguintes requisitos essenciais, divididos em funcionais (as ações que o sistema executa) e não-funcionais (os critérios de qualidade, desempenho e segurança):</p>
                        
                        <div class="requisitos-grid">
                            <div class="requisito-item">
                                <strong>REQUISITOS FUNCIONAIS (RF)</strong>
                                <p>Conjunto de funcionalidades que suportam diretamente as atividades de gestão, serviço, pagamento e interação do cliente.</p>
                            </div>
                            <div class="requisito-item">
                                <strong>REQUISITOS NÃO-FUNCIONAIS (RNF)</strong>
                                <p>Critérios de qualidade que garantem a usabilidade, segurança, desempenho e disponibilidade do sistema Mecatec.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <span><i class="fas fa-code"></i> 4. REQUISITOS FUNCIONAIS (RF)</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="accordion-content">
                        <p>As funcionalidades são agrupadas de acordo com o Ator (usuário) responsável por executá-las:</p>
                        
                        <h3>Ator: Funcionário</h3>
                        <ul>
                            <li><strong>RF01 controlar pagamento:</strong> O sistema deve permitir que o funcionário controle e visualize o pagamento.</li>
                            <li><strong>RF02 manter serviço:</strong> O sistema deve permitir que solicite o serviço e informe ao funcionário se o serviço foi aceito.</li>
                            <li><strong>RF03 manter peças:</strong> O sistema deve permitir que solicite peças, processe a solicitação e permita a consulta das peças.</li>
                        </ul>
                        
                        <h3>Ator: CEO (Administrador)</h3>
                        <ul>
                            <li><strong>RF04 Gerenciar relatórios:</strong> O sistema deve permitir que o CEO gerencie o relatório, visualize o pagamento dos clientes e consulte as peças (visualização do pagamento geral).</li>
                        </ul>
                        
                        <h3>Ator: Cliente</h3>
                        <ul>
                            <li><strong>RF05 Realizar pagamento:</strong> O sistema deve permitir que o cliente faça compras e serviços no site e processar serviços e confirmar compras.</li>
                            <li><strong>RF06 solicitar produto:</strong> O sistema deve permitir que o cliente peça um produto e informar se o produto tem no estoque.</li>
                        </ul>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header">
                        <span><i class="fas fa-file-invoice"></i> 5. REQUISITOS NÃO-FUNCIONAIS (RNF)</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="accordion-content">
                        <div class="rnf-item">
                            <strong>RNF01 – Usabilidade</strong>
                            <p>O sistema deve ter uma interface gráfica simples, direta e de fácil compreensão, adequada ao perfil dos usuários (funcionários de oficina, mecânicos, administradores e clientes).</p>
                        </div>
                        <div class="rnf-item">
                            <strong>RNF02 – Desempenho</strong>
                            <p>O sistema deve realizar o carregamento de telas e o processamento de ações (cadastros, consultas, geração de OS etc.) em no máximo 2 segundos sob uso normal.</p>
                        </div>
                        <div class="rnf-item">
                            <strong>RNF03 – Disponibilidade</strong>
                            <p>O sistema deve estar disponível para uso durante o horário de funcionamento da oficina (ex.: das 08h às 18h), com exceções apenas para manutenção previamente agendada.</p>
                        </div>
                        <div class="rnf-item">
                            <strong>RNF04 – Segurança da Informação</strong>
                            <p>O sistema deve implementar autenticação de usuários com níveis de permissão distintos e criptografia de dados sensíveis (ex.: pagamentos, senhas).</p>
                        </div>
                        <div class="rnf-item">
                            <strong>RNF05 – Backup e Recuperação de Dados</strong>
                            <p>Backups automáticos devem ser realizados diariamente para evitar perda de dados importantes (ordens de serviço, pagamentos, peças solicitadas, etc.).</p>
                        </div>
                        <div class="rnf-item">
                            <strong>RNF06 – Escalabilidade</strong>
                            <p>O sistema deve ser projetado para suportar o crescimento da empresa, possibilitando a adição de novas funcionalidades, usuários e integrações com sistemas externos (ex.: controle de estoque, pagamento online).</p>
                        </div>
                        <div class="rnf-item">
                            <strong>RNF07 – Compatibilidade e Acessibilidade</strong>
                            <p>O sistema deve ser compatível com sistemas Windows. A versão web deve ser responsiva e acessível por celulares e tablets.</p>
                        </div>
                        <div class="rnf-item">
                            <strong>RNF08 – Auditabilidade</strong>
                            <p>Toda alteração importante no sistema (criação/edição de ordens de serviço, registros de pagamento, etc.) deve ser registrada em log com usuário, data e hora.</p>
                        </div>
                        <div class="rnf-item">
                            <strong>RNF09 – Suporte Técnico e Manutenção</strong>
                            <p>Deve haver uma estrutura de suporte técnico para resolução de falhas ou dúvidas operacionais, com tempo de resposta de até 24 horas úteis.</p>
                        </div>
                         <div class="rnf-item">
                            <strong>RNF10 – Identidade Visual</strong>
                            <p>O sistema deve respeitar a identidade visual da empresa, como visto na imagem (preto, branco e vermelho), refletindo profissionalismo e estilo automotivo.</p>
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <span><i class="fas fa-users-cog"></i> 6. DIAGRAMA DE CASO DE USO</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="accordion-content">
                         <p>Representa a interação dos atores (usuários: Cliente, Funcionário, CEO) com as funcionalidades principais do sistema.</p>
                         <div class="diagramas-container">
                            <div class="diagrama-bloco">
                                <strong style="color: #1a1a1a;">Visão Geral do Sistema</strong>
                                <div class="diagrama-placeholder">
                                    <img src="../Imagens/diagramaCasosDeUso.png" alt="Diagrama de Casos de Uso do Sistema Mecatec">
                                    
                                </div>
                            </div>
                         </div>
                    </div>
                </div>

                 <div class="accordion-item">
                    <div class="accordion-header">
                        <span><i class="fas fa-sitemap"></i> 7. DIAGRAMA DE CLASSE</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="accordion-content">
                         <p>Representa a estrutura estática do sistema, mostrando as classes principais (Entidades: Cliente, Funcionário, Serviço, Peça, Pagamento, etc.), seus atributos e os relacionamentos entre elas.</p>
                         <div class="diagramas-container">
                            <div class="diagrama-bloco" style="flex: 1 1 100%;">
                                <strong style="color: #1a1a1a;">Estrutura e Relacionamento de Dados</strong>
                                <div class="diagrama-placeholder">
                                    <img src="../Imagens/diagramaDeClasse.png" alt="Diagrama de Classe do Sistema Mecatec">
                                </div>
                            </div>
                         </div>
                    </div>
                </div>

                 <div class="accordion-item">
                    <div class="accordion-header">
                        <span><i class="fas fa-database"></i> 8. DIAGRAMA CONCEITUAL</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="accordion-content">
                         <p>Mostra as entidades de negócio mais importantes (Entidade-Relacionamento) e como elas se relacionam logicamente, servindo como base para o projeto do banco de dados.</p>
                         <div class="diagramas-container">
                            <div class="diagrama-bloco" style="flex: 1 1 100%;">
                                <strong style="color: #1a1a1a;">Modelo de Entidade-Relacionamento (Alto Nível)</strong>
                                <div class="diagrama-placeholder">
                                    <img src="../Imagens/diagramaConceitual.png" alt="Diagrama Conceitual do Sistema Mecatec">
                                </div>
                            </div>
                         </div>
                    </div>
                </div>


            </div> 
            </div>
    </section>

    <div id="carrinhoSidebar" class="carrinho-sidebar">
        </div>
    <div id="carrinhoOverlay" class="carrinho-overlay" onclick="fecharCarrinho()"></div>

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
                <li><h3>Tópicos</h3></li>
                <li><a href="Mecatec.php#Servicos" class="footer-link">Serviços</a></li>
                <li><a href="telaProduto.php" class="footer-link">Produtos</a></li>
                <li><a href="telaSobre.php" class="footer-link">Sobre</a></li>
            </ul>

            <ul class="footer-list">
                <li><h3>Produtos</h3></li>
                <li><a href="#" class="footer-link">App</a></li>
                <li><a href="#" class="footer-link">Desktop</a></li>
                <li><a href="#" class="footer-link">Site</a></li>
            </ul>

            <div id="footer_subscribe">
                <h3>Inscreva-se</h3>
                <p>Caso deseja receber noticias ou atualizações, coloque seu e-mail abaixo!</p>
                <div id="input_group">
                    <input type="email" id="email">
                    <button>
                        <i class="fa-regular fa-envelope"></i>
                    </button>
                </div>
            </div>
        </div>

        <div id="footer_copyright">
            © 2025 all rights reserved
        </div>
    </footer>
    
    <script>
        
        document.addEventListener('DOMContentLoaded', function() {
            const accordionHeaders = document.querySelectorAll('.accordion-header');

            accordionHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const content = this.nextElementSibling;
                    const isActive = this.classList.contains('active');

                    
                    accordionHeaders.forEach(h => {
                        if (h !== this) {
                            h.classList.remove('active');
                            h.nextElementSibling.classList.remove('open');
                        }
                    });

                    if (isActive) {
                        this.classList.remove('active');
                        content.classList.remove('open');
                    } else {
                        this.classList.add('active');
                        content.classList.add('open');
                    }
                });
            });
        });
        
        var userLoggedIn = <?php echo isset($_SESSION['usuario_id']) ? 'true' : 'false'; ?>;
        const perfilDropdown = document.getElementById('perfilDropdown');
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

        function fecharCarrinho() {
            document.getElementById('carrinhoSidebar').classList.remove('aberto');
            document.getElementById('carrinhoOverlay').classList.remove('aberto');
        }
        
        function confirmarLogout() {
             if (confirm('Deseja realmente sair da sua conta?')) {
                 window.location.href = '../controllers/logout.php';
             }
         }
    </script> 
</body>
</html>