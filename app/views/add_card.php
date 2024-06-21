<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Card</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .modal-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f7f7f7;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            width: 500px;
            padding: 20px;
            z-index: 1000;
        }
        .modal-header {
            width: 100%;
            background-color: #1f1f7a;
            color: white;
            padding: 10px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            text-align: center;
            font-size: 18px;
        }
        .form-group {
            margin-bottom: 15px;
            width: 100%;
        }
        .form-label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 20px;
        }
        .btn-primary, .btn-secondary {
            width: 48%;
        }
    </style>
</head>
<body>
    <div class="modal-form">
        <div class="modal-header">Adicionar livro</div>
        <form action="/add.php" method="post">
            <div class="form-group">
                <label for="title" class="form-label">Título:</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Descrição:</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="image_url" class="form-label">URL da Imagem:</label>
                <input type="url" id="image_url" name="image_url" class="form-control" required>
            </div>
            <div class="btn-container">
                <a href="/" class="cancelar-adicionar">Cancelar</a>
                <button type="submit" class="confirmar-adicionar">Confirmar</button>
            </div>
        </form>
    </div>
</body>
</html>
