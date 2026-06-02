<?php
/**
 * Classe simples de cálculo aritmético.
 * Teremos 4 operações: soma, subtrai, multiplica e divide.
 */
class Calculator
{
    /**
     * Soma dois números inteiros.
     */
    public static function soma(int $a, int $b): int
    {
        return $a + $b;
    }

    /**
     * Subtrai o segundo número do primeiro.
     */
    public static function subtrai(int $a, int $b): int
    {
        return $a - $b;
    }

    /**
     * Multiplica dois números inteiros.
     */
    public static function multiplica(int $a, int $b): int
    {
        return $a * $b;
    }

    /**
     * Divide o primeiro número pelo segundo.
     * Se o divisor for zero, lança uma exceção.
     */
    public static function divide(int $a, int $b): float
    {
        if ($b === 0) {
            throw new InvalidArgumentException('Divisão por zero não é permitida.');
        }

        return $a / $b;
    }
}