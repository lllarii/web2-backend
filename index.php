<?php
$nome = "";
$email = "";
$telefone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"] ?? "";
    $email = $_POST["email"] ?? "";
    $telefone = $_POST["telefone"] ?? "";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Web II</title>
    <style>
        /* Reset e Estrutura Principal */
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background: radial-gradient(circle at 20% 50%, #1a1c2c 0%, #0a0b14 100%);
            color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Lado Esquerdo - Conteúdo */
        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            z-index: 2;
        }

        /* Lado Direito - Imagem da Pilha de Papel */
        .image-side {
            flex: 1;
            background-image: linear-gradient(to left, rgba(10, 11, 20, 0.4), #0a0b14), 
                              url('https://images.unsplash.com/photo-1517842645767-c639042777db?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
        }

        #titulo {
            margin-bottom: 25px;
            text-align: center;
        }

        /* Título com o mesmo tom de azul do botão (#1e1b4b) */
        #titulo h1 {
            font-size: 2rem;
            color: #6366f1; /* Tom mais claro para leitura no escuro, combinando com o hover */
            text-shadow: 0 4px 10px rgba(0,0,0,0.3);
            text-transform: uppercase;
        }

        #titulo p {
            color: #818cf8;
            font-weight: 500;
        }

        /* O Formulário - Efeito Folha de Papel */
        #formulario {
            background: #fdfdfd;
            background-image: linear-gradient(#e5e7eb 1px, transparent 1px);
            background-size: 100% 2.2rem;
            color: #1f2937;
            padding: 50px 60px; /* Aumentei o padding esquerdo */
            width: 100%;
            max-width: 480px;
            border-radius: 4px;
            box-shadow: -10px 10px 30px rgba(0,0,0,0.6);
            position: relative;
            transform: rotate(-0.5deg);
        }

        /* Linha vermelha da margem (ajustada para não ficar sob o texto) */
        #formulario::before {
            content: "";
            position: absolute;
            top: 0; 
            left: 40px; /* Posicionada na margem esquerda */
            height: 100%;
            width: 2px;
            background-color: rgba(239, 68, 68, 0.2);
        }

        label {
            font-weight: 700;
            font-size: 0.85rem;
            color: #4b5563;
        }

        input {
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 2px solid #cbd5e1;
            padding: 8px 0;
            font-family: 'Courier New', Courier, monospace;
            font-size: 1.1rem;
            margin-bottom: 5px;
            color: #111827;
            outline: none;
        }

        input:focus {
            border-bottom-color: #6366f1;
        }

        button {
            width: 100%;
            padding: 14px;
            background: #1e1b4b; /* Azul Indigo Profundo */
            color: #e0e7ff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 15px;
            transition: background 0.3s;
        }

        button:hover {
            background: #312e81;
        }

        /* Área de Resultado PHP */
        .resultado-servidor {
            margin-top: 30px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border: 2px dashed #94a3b8;
            color: #1f2937;
            font-family: 'Courier New', Courier, monospace;
        }

        .resultado-servidor h2 {
            font-size: 1rem;
            margin-bottom: 10px;
            border-bottom: 1px solid #ccc;
        }

        @media (max-width: 900px) {
            .image-side { display: none; }
        }
    </style>
</head>

<body>

    <main>
        <div id="titulo">
            <h1>Cadastro de Usuário</h1>
            <p>Preencha os dados abaixo.</p>
        </div>

        <form method="POST" action="" id="formulario">
            <label for="nome">Nome:</label><br>
            <input id="nome" type="text" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required><br><br>

            <label for="email">E-mail:</label><br>
            <input id="email" type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required><br><br>

            <label for="telefone">Telefone:</label><br>
            <input id="telefone" type="text" name="telefone" value="<?php echo htmlspecialchars($telefone); ?>" required><br><br>

            <button type="submit">Cadastrar</button>

            <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
                <div class="resultado-servidor">
                    <h2>Dados recebidos pelo servidor</h2>
                    <p><strong>Nome:</strong> <?php echo htmlspecialchars($nome); ?></p>
                    <p><strong>E-mail:</strong> <?php echo htmlspecialchars($email); ?></p>
                    <p><strong>Telefone:</strong> <?php echo htmlspecialchars($telefone); ?></p>
                </div>
            <?php endif; ?>
        </form>
    </main>

    <section class="image-side"></section>

</body>

</html>