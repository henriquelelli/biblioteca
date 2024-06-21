<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca de livros</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
            color: white;
            position: relative;
            height: 57px;
            width: 100%;
            display: flex;
            justify-content: center; /* Centraliza horizontalmente */
            align-items: center; /* Centraliza verticalmente */
            background-color: #004085;
            padding-right: 20px;
            margin-bottom: 20px;
        }

        .card img {
            height: 200px;
            object-fit: cover;
        }
        .card {
            width: 23%; /* Ajuste conforme necessário */
            margin: 0 1%; /* Espaçamento entre os cartões */
            float: left; /* Faz com que os cartões fiquem lado a lado */
            margin-bottom: 20px; /* Espaçamento entre os cards na vertical */
        }
        .fixed-button-container {
            position: relative;
            height: 57px; /* Altura para reservar espaço */
            width: 100%;
            display: flex;
            justify-content: flex-end; /* Alinha o botão à direita */
            align-items: center; /* Centraliza verticalmente */
            background-color: #f8f9fa; /* Fundo claro */
            padding-right: 20px; /* Espaçamento da borda direita */
            margin-bottom: 20px; /* Espaço abaixo do botão fixo */
        }
        .fixed-button {
            position: fixed;
            top: 103px; /* Ajuste conforme a altura do cabeçalho */
            right: 20px; /* Distância da borda direita */
            z-index: 1000;
            background-color: #004085;
            color: white;
            padding: 7px 22px;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s;
        }
        .fixed-button:hover {
            background-color: #e0a800;
        }
        .container-cards {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap; /* Permite que os cards quebrem linha conforme necessário */
        }
        .card-container {
            width: 100%;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            gap: 20px;
        }
        .card {
            width: calc(25% - 20px); /* 25% da largura do contêiner, menos o espaçamento */
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 6px;
            margin-bottom: 10px;
        }
        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .card-description {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }
        .card-buttons {
            display: flex;
            justify-content: space-between;
        }
        .card-buttons a {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .card-buttons a:hover {
            background-color: #f0f0f0;
        }
        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .btn-warning {
            background-color: #ffc107;
            color: #333;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="header text-center">
            <h1 class="my-4">Biblioteca de livros</h1>
        </div>
    </div>

    <!-- Botão Fixo -->
    <div class="fixed-button-container">
        <button class="fixed-button" onclick="window.location.href='/favorites'">Favoritos</button>
    </div>

    <!-- Contêiner para os cards -->
    <div class="container">
        <div class="container-cards" id="cardsContainer">
            <!-- Aqui serão adicionados os cards dinamicamente -->
        </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simulação de dados do banco de dados
        var cards = [
            { 
                id: 1,
                image_url: 'https://via.placeholder.com/300',
                title: 'Livro 1',
                description: 'Descrição do Livro 1',
                is_favorite: false
            },
            { 
                id: 2,
                image_url: 'https://via.placeholder.com/300',
                title: 'Livro 2',
                description: 'Descrição do Livro 2',
                is_favorite: true
            },
            { 
                id: 3,
                image_url: 'https://via.placeholder.com/300',
                title: 'Livro 3',
                description: 'Descrição do Livro 3',
                is_favorite: false
            },
            { 
                id: 4,
                image_url: 'https://via.placeholder.com/300',
                title: 'Livro 4',
                description: 'Descrição do Livro 4',
                is_favorite: true
            },
            { 
                id: 5,
                image_url: 'https://via.placeholder.com/300',
                title: 'Livro 5',
                description: 'Descrição do Livro 5',
                is_favorite: false
            },
            { 
                id: 6,
                image_url: 'https://via.placeholder.com/300',
                title: 'Livro 6',
                description: 'Descrição do Livro 6',
                is_favorite: true
            }
        ];

        // Função para criar os cards dinamicamente
        function criarCards() {
            var container = document.getElementById('cardsContainer');

            cards.forEach(function(card) {
                var cardHTML = `
                    <div class="card">
                        <img src="${card.image_url}" class="card-img-top" alt="Imagem do Livro">
                        <div class="card-body">
                            <h5 class="card-title">${card.title}</h5>
                            <p class="card-text">${card.description}</p>
                            <div class="card-buttons">
                                <a href="/delete?id=${card.id}" class="btn btn-danger">Excluir</a>
                                <a href="/favorite?id=${card.id}" class="btn ${card.is_favorite ? 'btn-warning' : 'btn-outline-warning'}">
                                    ${card.is_favorite ? 'Desfavoritar' : 'Favoritar'}
                                </a>
                            </div>
                        </div>
                    </div>
                `;
                container.innerHTML += cardHTML;
            });
        }

        // Chama a função para criar os cards ao carregar a página
        window.onload = function() {
            criarCards();
        };
    </script>
</body>
</html>
