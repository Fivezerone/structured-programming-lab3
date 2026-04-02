<?php
/**
 * ICS 2371 — Lab 3: Control Structures I
 * Task 4: Nested Conditions — Loan Eligibility Checker [6 marks]
 *
 * IMPORTANT: Pseudocode and flowchart are completed in the PDF report
 * before this code was written.
 *
 * @author     Kibet
 * @student    ENE212-0084/2020
 * @lab        Lab 3 of 14
 * @unit       ICS 2371
 * @date       2026-04-02
 */

echo "<h2>Task 4 &mdash; HELB Loan Eligibility Checker</h2>";

// ── Test data (change to test all branches) ───────────────────────────────
$enrolled       = true;
$gpa            = 3.1;
$annual_income  = 180000; // KES
$previous_loan  = false;

// ── STEP 1: Outer enrollment check ────────────────────────────────────────
if (!$enrolled) {
    $decision = "Not eligible &mdash; must be an active student";
    $renewal  = "N/A";
} else {
    // ── INNER CHECK 1: GPA requirement ────────────────────────────────────
    if ($gpa < 2.0) {
        $decision = "Not eligible &mdash; GPA below minimum (2.0)";
        $renewal  = "N/A";
    } else {
        // ── INNER CHECK 2: Household income bracket ────────────────────────
        if ($annual_income < 100000) {
            $loan_type = "Eligible &mdash; Full loan award";
            $eligible  = true;
        } elseif ($annual_income < 250000) {
            $loan_type = "Eligible &mdash; Partial loan (75%)";
            $eligible  = true;
        } elseif ($annual_income < 500000) {
            $loan_type = "Eligible &mdash; Partial loan (50%)";
            $eligible  = true;
        } else {
            $loan_type = "Not eligible &mdash; household income exceeds threshold";
            $eligible  = false;
        }

        // ── Ternary: Renewal vs New application (only when eligible) ───────
        if ($eligible) {
            $renewal  = ($previous_loan) ? "Renewal application" : "New application";
            $decision = $loan_type . " | " . $renewal;
        } else {
            $renewal  = "N/A";
            $decision = $loan_type;
        }
    }
}

// ── STEP 2: Display formatted result ──────────────────────────────────────
$enrolled_str  = $enrolled      ? "Yes"  : "No";
$prev_loan_str = $previous_loan ? "Yes"  : "No";

echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse:collapse;font-family:monospace;'>";
echo "<tr style='background:#1a1a2e;color:white;'><th colspan='2'>HELB Loan Eligibility Result</th></tr>";
echo "<tr><td>Enrolled</td><td>$enrolled_str</td></tr>";
echo "<tr><td>GPA</td><td>$gpa / 4.0</td></tr>";
echo "<tr><td>Annual Household Income</td><td>KES " . number_format($annual_income) . "</td></tr>";
echo "<tr><td>Previous Loan</td><td>$prev_loan_str</td></tr>";
echo "<tr><td><strong>Decision</strong></td><td><strong>$decision</strong></td></tr>";
echo "</table><br>";

// ── Required Test Data Sets ────────────────────────────────────────────────
// Set A: enrolled=true,  gpa=3.1, income=180000,  previous=false → Partial 75% | New application
// Set B: enrolled=true,  gpa=1.8, income=80000,   previous=false → GPA below minimum
// Set C: enrolled=false, gpa=3.5, income=60000,   previous=true  → Not enrolled
// Set D: enrolled=true,  gpa=2.5, income=600000,  previous=true  → Income exceeds threshold
// Set E: enrolled=true,  gpa=2.0, income=50000,   previous=true  → Full loan | Renewal application
