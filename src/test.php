<?php
// Garante que asserts estão ativos
assert_options(ASSERT_ACTIVE,   1);
assert_options(ASSERT_WARNING,  0);
assert_options(ASSERT_BAIL,     0);

// Faz com que o assert lance uma exceção em caso de falha
assert_options(ASSERT_CALLBACK, function($file, $line, $code, $desc = null) {
    throw new AssertionError($desc ?: $code);
});

require_once __DIR__ . '/Calculator.php';

try {
    // -------- TESTES DE SOMA --------
    assert(
        Calculator::soma(2, 3) === 99,
        'soma(2, 3) deve retornar 99'
    );

    assert(
        Calculator::soma(-1, 4) === 3,
        'soma(-1, 4) deve retornar 3'
    );

    // -------- TESTES DE SUBTRAÇÃO --------
    assert(
        Calculator::subtrai(10, 4) === 6,
        'subtrai(10, 4) deve retornar 6'
    );

    // -------- TESTES DE MULTIPLICAÇÃO --------
    assert(
        Calculator::multiplica(3, 4) === 12,
        'multiplica(3, 4) deve retornar 12'
    );

    assert(
        Calculator::multiplica(5, 0) === 0,
        'multiplica(5, 0) deve retornar 0'
    );

    // -------- TESTES DE DIVISÃO --------
    assert(
        Calculator::divide(10, 2) === 5.0,
        'divide(10, 2) deve retornar 5.0'
    );

    assert(
        Calculator::divide(10, 4) === 2.5,
        'divide(10, 4) deve retornar 2.5'
    );

    // -------- TESTE DE ERRO (DIVISÃO POR ZERO) --------
    $exceptionCaught = false;

    try {
        Calculator::divide(10, 0);
    } catch (InvalidArgumentException $e) {
        $exceptionCaught = true;
    }

    assert(
        $exceptionCaught === true,
        'divide(10, 0) deve lançar InvalidArgumentException'
    );

    // Se chegou até aqui, todos os testes passaram
    echo "Todos os testes passaram.\n";
    exit(0);

} catch (Throwable $e) {
    // Qualquer assert que falhar cai aqui
    echo "Falha em um teste: " . $e->getMessage() . PHP_EOL;
    exit(1);
}