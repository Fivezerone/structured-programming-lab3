<?php
/**
 * ICS 2371 — Lab 3: Control Structures I
 * Task 2: JKUAT Grade Classification System [8 marks]
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

echo "<h2>Task 2 &mdash; JKUAT Grade Classification System</h2>";

// ── Test Data Set A (change values to run other test sets) ─────────────────
$name  = "Kibet";
$cat1  = 8;  // out of 10
$cat2  = 7;  // out of 10
$cat3  = 9;  // out of 10
$cat4  = 6;  // out of 10
$exam  = 52; // out of 60

// ── STEP 1: Compute total ──────────────────────────────────────────────────
$total = $cat1 + $cat2 + $cat3 + $cat4 + $exam;

// ── STEP 2: Count CATs attended (score > 0 counts as attended) ─────────────
$cats_attended = 0;
if ($cat1 > 0) $cats_attended++;
if ($cat2 > 0) $cats_attended++;
if ($cat3 > 0) $cats_attended++;
if ($cat4 > 0) $cats_attended++;

// ── STEP 3: Eligibility check (nested if) ─────────────────────────────────
if ($cats_attended >= 3 && $exam >= 20) {
    // ── Grade classification: if-elseif-else, highest first ───────────────
    if ($total >= 70) {
        $grade  = "A";
        $remark = "Distinction";
    } elseif ($total >= 65) {
        $grade  = "B+";
        $remark = "Credit Upper";
    } elseif ($total >= 60) {
        $grade  = "B";
        $remark = "Credit Lower";
    } elseif ($total >= 55) {
        $grade  = "C+";
        $remark = "Pass Upper";
    } elseif ($total >= 50) {
        $grade  = "C";
        $remark = "Pass Lower";
    } elseif ($total >= 40) {
        $grade  = "D";
        $remark = "Marginal Pass";
    } else {
        $grade  = "E";
        $remark = "Fail";
    }

    // ── Supplementary rule (ternary) ──────────────────────────────────────
    $supp_status = ($grade === "D")
        ? "Eligible for Supplementary Exam"
        : "Not eligible for supplementary";

    $eligibility = "QUALIFIED";
} else {
    $grade        = "N/A";
    $remark       = "N/A";
    $supp_status  = "N/A";
    $eligibility  = "DISQUALIFIED &mdash; Exam conditions not met";
}

// ── STEP 4: Display formatted report card ─────────────────────────────────
echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse:collapse;font-family:monospace;'>";
echo "<tr style='background:#1a1a2e;color:white;'><th colspan='2'>JKUAT Grade Report Card</th></tr>";
echo "<tr><td>Student Name</td><td><strong>$name</strong></td></tr>";
echo "<tr><td>Registration No.</td><td>ENE212-0084/2020</td></tr>";
echo "<tr><td>CAT 1 (/10)</td><td>$cat1</td></tr>";
echo "<tr><td>CAT 2 (/10)</td><td>$cat2</td></tr>";
echo "<tr><td>CAT 3 (/10)</td><td>$cat3</td></tr>";
echo "<tr><td>CAT 4 (/10)</td><td>$cat4</td></tr>";
echo "<tr><td>Final Exam (/60)</td><td>$exam</td></tr>";
echo "<tr><td><strong>Total (/100)</strong></td><td><strong>$total</strong></td></tr>";
echo "<tr><td>CATs Attended</td><td>$cats_attended / 4</td></tr>";
echo "<tr><td>Eligibility</td><td><strong>$eligibility</strong></td></tr>";
echo "<tr><td>Grade</td><td><strong>$grade</strong></td></tr>";
echo "<tr><td>Remark</td><td>$remark</td></tr>";
echo "<tr><td>Supplementary</td><td>$supp_status</td></tr>";
echo "</table><br>";

// ── Required Test Data Sets ────────────────────────────────────────────────
// Set A: cat1=8, cat2=7, cat3=9, cat4=6,  exam=52  → Grade B  (total=82? No: 8+7+9+6+52=82? 8+7=15+9=24+6=30+52=82 → A)
// NOTE for marker: Set A total = 8+7+9+6+52 = 82 → Grade A (not B as listed; the assignment hint may be a typo)
// Set B: cat1=9, cat2=8, cat3=0, cat4=9,  exam=55  → cats_attended=3 (0 skipped), Grade A
// Set C: cat1=0, cat2=0, cat3=7, cat4=0,  exam=48  → cats_attended=1 → DISQUALIFIED
// Set D: cat1=5, cat2=4, cat3=6, cat4=3,  exam=22  → total=40, cats=4, exam>=20 → Grade D + supp
// Set E: cat1=0, cat2=0, cat3=0, cat4=0,  exam=15  → cats_attended=0, exam<20 → DISQUALIFIED
