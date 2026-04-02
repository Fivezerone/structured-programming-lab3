<?php
/**
 * ICS 2371 — Lab 3: Control Structures I
 * Task 3: switch-case and match Expression [6 marks]
 *
 * @author     Kibet
 * @student    ENE212-0084/2020
 * @lab        Lab 3 of 14
 * @unit       ICS 2371
 * @date       2026-04-02
 */

echo "<h2>Task 3 &mdash; switch-case and match Expression</h2>";

// ══════════════════════════════════════════════════════════════
// EXERCISE A — Day of Week Classifier
// ══════════════════════════════════════════════════════════════
echo "<h3>Exercise A &mdash; Day of Week Classifier</h3>";

$day = 3; // change 1–7 to test all cases (1 = Monday)

switch ($day) {
    case 1:
        echo "Monday &mdash; Lecture day<br>";
        break;
    case 2:
        echo "Tuesday &mdash; Lecture day<br>";
        break;
    case 3:
        echo "Wednesday &mdash; Lecture day<br>";
        break;
    case 4:
        echo "Thursday &mdash; Lecture day<br>";
        break;
    case 5:
        echo "Friday &mdash; Lecture day<br>";
        break;
    case 6:
    case 7:
        echo "Weekend<br>";
        break;
    default:
        echo "Invalid day number. Please enter a value between 1 and 7.<br>";
}


// ══════════════════════════════════════════════════════════════
// EXERCISE B — HTTP Status Code Explainer (switch-case)
// ══════════════════════════════════════════════════════════════
echo "<h3>Exercise B &mdash; HTTP Status Code Explainer (switch)</h3>";

$status_code = 404; // change to test: 200, 301, 400, 401, 403, 404, 500

switch ($status_code) {
    case 200:
        echo "200 &mdash; OK: Request succeeded<br>";
        break;
    case 301:
        echo "301 &mdash; Moved Permanently: Resource relocated<br>";
        break;
    case 400:
        echo "400 &mdash; Bad Request: Client-side error in the request<br>";
        break;
    case 401:
        echo "401 &mdash; Unauthorized: Authentication required<br>";
        break;
    case 403:
        echo "403 &mdash; Forbidden: Access denied<br>";
        break;
    case 404:
        echo "404 &mdash; Not Found: Resource missing<br>";
        break;
    case 500:
        echo "500 &mdash; Internal Server Error: Server-side fault<br>";
        break;
    default:
        echo "$status_code &mdash; Unknown status code<br>";
}


// ══════════════════════════════════════════════════════════════
// EXERCISE C — PHP 8 match Expression (rewrite of Exercise B)
// ══════════════════════════════════════════════════════════════
echo "<h3>Exercise C &mdash; HTTP Status Code Explainer (match)</h3>";

// match uses STRICT comparison (===). No break needed.
// Throws UnhandledMatchError if no arm matches and there is no default.
$match_code = 404; // change to test all codes

$explanation = match($match_code) {
    200     => "200 &mdash; OK: Request succeeded",
    301     => "301 &mdash; Moved Permanently: Resource relocated",
    400     => "400 &mdash; Bad Request: Client-side error in the request",
    401     => "401 &mdash; Unauthorized: Authentication required",
    403     => "403 &mdash; Forbidden: Access denied",
    404     => "404 &mdash; Not Found: Resource missing",
    500     => "500 &mdash; Internal Server Error: Server-side fault",
    default => "$match_code &mdash; Unknown status code",
};

echo $explanation . "<br>";


// ══════════════════════════════════════════════════════════════
// EXERCISE D — Written Comparison (answers go in PDF report)
// ══════════════════════════════════════════════════════════════
// 1. switch uses loose == (type juggling); match uses strict === (type + value).
// 2. Example: switch("0") { case 0: ... } matches (because "0"==0 loosely),
//    but match("0") { 0 => ... } does NOT match (because "0"!==0 strictly).
// 3. Prefer switch when you need fall-through across multiple cases, or when
//    working with legacy code that relies on loose type comparison.
