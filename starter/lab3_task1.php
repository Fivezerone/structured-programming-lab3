<?php
/**
 * ICS 2371 — Lab 3: Control Structures I
 * Task 1: Simple if and if-else — Warm-Up Exercises [5 marks]
 *
 * @author     Kibet
 * @student    ENE212-0084/2020
 * @lab        Lab 3 of 14
 * @unit       ICS 2371
 * @date       2026-04-02
 */

echo "<h2>Task 1 &mdash; Warm-Up Exercises</h2>";

// ══════════════════════════════════════════════════════════════
// EXERCISE A — Temperature Alert System
// ══════════════════════════════════════════════════════════════
echo "<h3>Exercise A &mdash; Temperature Alert System</h3>";

$temperature = 39.2; // change to 36.8, 39.2, 34.5 for each screenshot

if ($temperature >= 36.1 && $temperature <= 37.5) {
    echo "Temperature: {$temperature}&deg;C &mdash; <strong>Normal</strong><br>";
}
if ($temperature > 37.5) {
    echo "Temperature: {$temperature}&deg;C &mdash; <strong>Fever</strong><br>";
}
if ($temperature < 36.1) {
    echo "Temperature: {$temperature}&deg;C &mdash; <strong>Hypothermia Warning</strong><br>";
}


// ══════════════════════════════════════════════════════════════
// EXERCISE B — Even or Odd
// ══════════════════════════════════════════════════════════════
echo "<h3>Exercise B &mdash; Even or Odd</h3>";

$number = 47;

if ($number % 2 === 0) {
    echo "$number is EVEN<br>";
} else {
    echo "$number is ODD<br>";
}

if ($number % 3 === 0) {
    echo "$number is divisible by 3<br>";
} else {
    echo "$number is NOT divisible by 3<br>";
}

if ($number % 5 === 0) {
    echo "$number is divisible by 5<br>";
} else {
    echo "$number is NOT divisible by 5<br>";
}

if ($number % 3 === 0 && $number % 5 === 0) {
    echo "$number is divisible by BOTH 3 and 5<br>";
} else {
    echo "$number is NOT divisible by both 3 and 5<br>";
}


// ══════════════════════════════════════════════════════════════
// EXERCISE C — Comparison Chain
// ══════════════════════════════════════════════════════════════
// Run this code EXACTLY as written.
// Record all six outputs in your report and explain each result.
echo "<h3>Exercise C &mdash; Comparison Chain</h3>";

$x = 10;  $y = "10";  $z = 10.0;

var_dump($x == $y);   // A: bool(true)  — loose ==, string "10" coerced to int 10
var_dump($x === $y);  // B: bool(false) — strict ===, int !== string
var_dump($x == $z);   // C: bool(true)  — loose ==, float 10.0 == int 10
var_dump($x === $z);  // D: bool(false) — strict ===, int !== float
var_dump($y === $z);  // E: bool(false) — strict ===, string !== float
var_dump($x <=> $y);  // F: int(0)      — spaceship, loosely equal, returns 0

// Explanation of each result is in the PDF report.


// ══════════════════════════════════════════════════════════════
// EXERCISE D — Null & Default Values
// ══════════════════════════════════════════════════════════════
echo "<h3>Exercise D &mdash; Null &amp; Default Values</h3>";

$username = null;
$display  = $username ?? "Guest";
echo "Welcome, $display<br>";

// Chained null coalescing
$config_val = null;
$env_val    = null;
$default    = "system_default";
$result     = $config_val ?? $env_val ?? $default;
echo "Config: $result<br>";

// Custom chained ?? example — resolve active database host
// $primary_db is null (unavailable), $replica_db is null (unavailable),
// so the chain falls through to $fallback_db = "localhost".
$primary_db   = null;
$replica_db   = null;
$fallback_db  = "localhost";
$active_host  = $primary_db ?? $replica_db ?? $fallback_db;
echo "Active DB Host: $active_host<br>";
