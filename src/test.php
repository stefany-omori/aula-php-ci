<?php

require_once __DIR__ . '/Calculator.php';

try {
    // -------- TESTES DE SOMA --------
    if (Calculator::soma(2, 3) !== 5) {
        throw new Exception('soma(2, 3) deve retornar 99');
    }

    if (Calculator::soma(-1, 4) !== 3) {
        throw new Exception('soma(-1, 4) deve retornar 3');
    }

    // -------- TESTES DE SUBTRAÇÃO --------
    if (Calculator::subtrai(10, 4) !== 6) {
        throw new Exception('subtrai(10, 4) deve retornar 6');
    }

    // -------- TESTES DE MULTIPLICAÇÃO --------
    if (Calculator::multiplica(3, 4) !== 12) {
        throw new Exception('multiplica(3, 4) deve retornar 12');
    }

    if (Calculator::multiplica(5, 0) !== 0) {
        throw new Exception('multiplica(5, 0) deve retornar 0');
    }

    // -------- TESTES DE DIVISÃO --------
    if (Calculator::divide(10, 2) !== 5.0) {
        throw new Exception('divide(10, 2) deve retornar 5');
    }

    if (Calculator::divide(10, 4) !== 2.5) {
        throw new Exception('divide(10, 4) deve retornar 2.5');
    }

    // -------- TESTE DE ERRO (DIVISÃO POR ZERO) --------
    $exceptionCaught = false;

    try {
        Calculator::divide(10, 0);
    } catch (InvalidArgumentException $e) {
        $exceptionCaught = true;
    }

    if ($exceptionCaught !== true) {
        throw new Exception('divide(10, 0) deve lançar InvalidArgumentException');
    }

    echo "Todos os testes passaram.\n";
    exit(0);

} catch (Throwable $e) {
    echo "Falha em um teste: " . $e->getMessage() . PHP_EOL;
    exit(1);
}
