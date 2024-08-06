<?php
require __DIR__ . '/vendor/autoload.php';

use app\RomanConverter;

$converter = new RomanConverter();
$converter->handleRequest();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Números Romanos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            min-height: 100vh !important;
        }
    </style>
</head>
<body class="bg-gray-800 p-6 flex justify-center items-center min-h-full">
    <main class="w-[530px] mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Conversor de números romanos</h1>

        <form method="post" class="space-y-4">
            <div>
                <label for="conversion_type" class="block text-md font-medium text-gray-700">Selecione o tipo de conversão:</label>
                <select id="conversion_type" name="conversion_type" class="mt-1 block w-full h-[40px] border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 pl-3">
                    <option value="roman_to_integer" <?= $converter->getConversionType() === 'roman_to_integer' ? 'selected' : '' ?>>Romano para Inteiro</option>
                    <option value="integer_to_roman" <?= $converter->getConversionType() === 'integer_to_roman' ? 'selected' : '' ?>>Inteiro para Romano</option>
                </select>
            </div>

            <div>
                <label for="input_value" class="block text-md font-medium text-gray-700">Valor:</label>
                <input type="text" id="input_value" name="input_value" value="<?= htmlspecialchars($_POST['input_value'] ?? '') ?>" class="mt-1 block w-full border border-gray-300 py-[6px] pl-3 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <?php if ($converter->getError()): ?>
                    <span class="font-medium mt-2 block text-red-700"><?= htmlspecialchars($converter->getError()) ?></span>
                <?php endif; ?>
            </div>

            <div class="text-end">
                <button type="submit" class="inline-flex items-center px-4 h-[40px] border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Converter
                </button>
            </div>
        </form>

        <?php if ($converter->getConversionResult() !== ''): ?>
            <div class="mt-4 p-4 border border-gray-300 rounded-md bg-gray-50 text-center">
                <?php if ($converter->getConversionType() === 'roman_to_integer'): ?>
                    O número romano <strong><?= htmlspecialchars($_POST['input_value']) ?></strong> corresponde ao valor <strong><?= htmlspecialchars($converter->getConversionResult()) ?></strong> em inteiro.
                <?php elseif ($converter->getConversionType() === 'integer_to_roman'): ?>
                    O número inteiro <strong><?= htmlspecialchars($_POST['input_value']) ?></strong> corresponde ao número romano <strong><?= htmlspecialchars($converter->getConversionResult()) ?></strong>.
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>
