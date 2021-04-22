<?php

session_start();                    // Start session variables
include("connect-to-db.php");       // Connect to database
include("helper-functions.php");    // Include helper functions

if (!isLoggedIn()) {                // Page only accessible to logged in users
    changePage("login.php");
}

if (!isAdmin($con)) {               // Page only accessible to admins
    changePage("index.php");
}

include("header.php");

// CLAIM DATA:

$claimId = $_GET["claim"]; // Get claim ID

// Select data from the submitted claim
$sqlQuery = "SELECT dem_id, module_id, start_time, duration FROM claims WHERE claim_id = ?";
$stmt = $con->prepare($sqlQuery);
$stmt->bind_param("s", $claimId);
$stmt->execute();

$claimData = $stmt->get_result();
$claimData = $claimData->fetch_all();

// Separate claim data
foreach ($claimData as $claim) {
    // Assign variables based on query response
    $instructorID = $claim[0];
    $moduleName = $claim[1];
    $startDatetime = new DateTime($claim[2]);
    $startDay = $startDatetime->format("D");
    $duration = $claim[3];

    // Get instructor data
    $sqlQuery = "SELECT name FROM accounts WHERE id = ?";
    $stmt = $con->prepare($sqlQuery);
    $stmt->bind_param("s", $instructorID);
    $stmt->execute();

    $demName= $stmt->get_result();
    $demName= $demName->fetch_all();
}

// Get instructor data



// CLAIM FORM:

// import TCPDF
require_once('libraries/tcpdf_min/tcpdf.php'); // point this to tcpdf location - get it from https://github.com/tecnickcom/tcpdf

// create PDF document
$pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Trinity College Dublin - Human Resources Division');
$pdf->SetTitle('Claim Form for Undergraduate Demonstration');
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(5, 5, 5);
$pdf->SetAutoPageBreak(TRUE, 5);

$pdf->AddPage();
$pdf->SetFont('helvetica','', 9);

$html = '
    <style>
        h1, h2, h3, p {
            text-align:center;
        }
        table, tr, td {
            border:2px solid black;
            border-collapse: collapse;
            margin:0;
        }
        table {
            width:100%;
        }
        td {
            padding:10px;
        }
        .formLabel {
            background-color:lightblue;
        }
        .formInput {
            background-color:lightyellow;
            font-weight:bold;
        }
        .formOfficial {
            background-color:grey;
        }
    </style>

    <h1>Trinity College Dublin - Human Resources Division</h1>
    <h1>Claim Form for -UG- Demonstration (Maximum-22 hours per semester)</h1>

    <h2>Section A</h2>

    <h3 style="color:red">It is important to complete all sections of this form, otherwise you may receive incorrect or no payment.</h3>

    <table>
        <!-- ASSUME MONTHLY PAYROLL -->
        <tr>
            <td class="formLabel">Surname:</td>
            <td class="formInput">' . $demName[0][0] . '</td>
            <td class="formLabel">First Names:</td>
            <td class="formInput">' . $demName[0][0] . '</td>
            <td class="formLabel">PPS No:</td>
            <td class="formInput"><!--PPS NO--></td>
            <td class="formLabel">Staff No:</td>
            <td class="formInput"><!--STAFF NO--></td>
        </tr>
    </table>

    <h2>Section B</h2> <p>(Please complete this section <strong>only if it is your first claim in the current academic year</strong> or the information required has changed since your last claim in the current academic year.)</p>

    <table>
        <tr>
            <td class="formLabel">Home Address:</td>
            <td class="formInput"><!--HOME ADDRESS--></td>
        </tr>
        <tr>
            <td class="formLabel">Address to send Pay Advice (if different):</td>
            <td class="formInput"><!--PAY ADVICE ADDRESS?--></td>
        </tr>
    </table>

    <p>(Payment will be made directly to your bank account so please provide the following information)</p>

    <table>
        <tr>
            <td class="formLabel">Bank Name:</td>
            <td class="formInput"><!--BANK NAME--></td>
            <td class="formLabel">Bank Address:</td>
            <td class="formInput"><!--BANK ADDRESS--></td>
            <td class="formLabel">Account Name:</td>
            <td class="formInput"><!--ACCOUNT NAME--></td>
        </tr>
        <tr>
            <td class="formLabel">Account No:</td>
            <td class="formInput"><!--ACCOUNT NO--></td>
            <td class="formLabel">Bank Sort Code:</td>
            <td class="formInput"><!--BANK SORT CODE--></td>
            <td class="formLabel">Dept/School where work was performed:</td>
            <td class="formInput">School of Computer Science and Statistics</td>
        </tr>
        <tr>
            <td class="formLabel">IBAN No. <br> <small>(SEPA Requirement)</small></td>
            <td class="formInput" colspan="3"><!--IBAN No.--></td>
            <td class="formLabel">Swift/BIC Address<br> <small>(SEPA Requirement)</small></td>
            <td class="formInput"><!--BIC ADDRESS--></td>
        </tr>
        <tr>
            <td class="formLabel" colspan="4">Are you in receipt of any other payments from Trinity College? (If yes, please specify)</td>
            <td class="formInput" colspan="2"><!--OTHER TRINITY PAYMENTS--></td>
        </tr>
        <tr>
            <td class="formLabel" colspan="4">If you are employed in the Public Sector paying modified PRSI (i.e. Class B, C, D or H), please tick this box:</td>
            <td class="formInput" colspan="2"><input type="checkbox" name="publicSector"></td>
        </tr>
    </table>

    <h2>Section C</h2>
    <h3>Periods Worked for which Payment is being Claimed</h3>
    <p>(To be completed by person making the claim) This form should be completed for periods up to Friday of each week and up to the last Friday of the month in which work was performed, unless work ceased earlier.</p>

    <table>
        <tr>
            <td class="formLabel" colspan="13">Periods for which work is being claimed <small>(to be completed by person making the claim)</small></td>
            <td class="formOfficial" colspan="2">Official Use Only</td>
        </tr>
        <tr>
            <td class="formLabel">Course Title:</td>
            <td class="formInput" colspan="3"><!--COURSE TITLE--></td>
            <td class="formLabel" colspan="3">Course Module:</td>
            <td class="formInput" colspan="3">' . $moduleName . '</td>
            <td class="formLabel">Signature of Course Director/Lecturer:</td>
            <td class="formInput" colspan="2"><!--COURSE DIRECTOR/LECTURER--></td>
            <td class="formOfficial" colspan="2"></td>
        </tr>
        <tr>
            <td class="formLabel" colspan="4">Course Module Name:</td>
            <td class="formLabel" colspan="6"><!--COURSE MODULE NAME--></td>
            <td class="formLabel" rowspan="2">Total Hours/Items</td>
            <td class="formLabel" colspan="2">Faculty/School</td>
            <td class="formOfficial" colspan="2">Salaries & Wages Office</td>
        </tr>
        <tr>
            <td class="formLabel">Period Worked</td>
            <td class="formLabel">Select Date</td>
            <td class="formLabel">Sat</td>
            <td class="formLabel">Sun</td>
            <td class="formLabel">Mon</td>
            <td class="formLabel">Tues</td>
            <td class="formLabel">Wed</td>
            <td class="formLabel">Thur</td>
            <td class="formLabel">Fri</td>
            <td class="formLabel">Description of Work</td>
            <td class="formLabel">Hourly Rate etc. (if applicable)</td>
            <td class="formLabel">Gross Pay Euro</td>
            <td class="formOfficial">PRSI Class</td>
            <td class="formOfficial">Comments/Calculations</td>
        </tr>
        <tr>
            <td class="formLabel">Week Ended:</td>
            <td class="formInput">' . $startDatetime->format('d-m Y') . '</td>
            <td class="formInput">' . ($startDay == "Sat" ? $duration : '0.00') . '</td>
            <td class="formInput">' . ($startDay == "Sun" ? $duration : '0.00') . '</td>
            <td class="formInput">' . ($startDay == "Mon" ? $duration : '0.00') . '</td>
            <td class="formInput">' . ($startDay == "Tue" ? $duration : '0.00') . '</td>
            <td class="formInput">' . ($startDay == "Wed" ? $duration : '0.00') . '</td>
            <td class="formInput">' . ($startDay == "Thu" ? $duration : '0.00') . '</td>
            <td class="formInput">' . ($startDay == "Fri" ? $duration : '0.00') . '</td>
            <td class="formInput"><!--DESCRIPTION OF WORK 1--></td>
            <td>' . $duration . '</td>
            <td><!--HOURLY RATE 1--></td>
            <td><!--GROSS PAY 1--></td>
            <td class="formOfficial"><!--PRSI CLASS 1--></td>
            <td class="formOfficial"><!--COMMENTS 1--></td>
        </tr>
        <tr>
            <td class="formLabel">Week Ended:</td>
            <td class="formInput"><!--WEEK ENDED 2--></td>
            <td class="formInput"><!--SATURDAY 2--></td>
            <td class="formInput"><!--SUNDAY 2--></td>
            <td class="formInput"><!--MONDAY 2--></td>
            <td class="formInput"><!--TUESDAY 2--></td>
            <td class="formInput"><!--WEDNESDAY 2--></td>
            <td class="formInput"><!--THURSDAY 2--></td>
            <td class="formInput"><!--FRIDAY 2--></td>
            <td class="formInput"><!--DESCRIPTION OF WORK 2--></td>
            <td><!--TOTAL HOURS 2--></td>
            <td><!--HOURLY RATE 2--></td>
            <td><!--GROSS PAY 2--></td>
            <td class="formOfficial"><!--PRSI CLASS 2--></td>
            <td class="formOfficial"><!--COMMENTS 2--></td>
        </tr>
        <tr>
            <td class="formLabel">Week Ended:</td>
            <td class="formInput"><!--WEEK ENDED 3--></td>
            <td class="formInput"><!--SATURDAY 3--></td>
            <td class="formInput"><!--SUNDAY 3--></td>
            <td class="formInput"><!--MONDAY 3--></td>
            <td class="formInput"><!--TUESDAY 3--></td>
            <td class="formInput"><!--WEDNESDAY 3--></td>
            <td class="formInput"><!--THURSDAY 3--></td>
            <td class="formInput"><!--FRIDAY 3--></td>
            <td class="formInput"><!--DESCRIPTION OF WORK 3--></td>
            <td><!--TOTAL HOURS 3--></td>
            <td><!--HOURLY RATE 3--></td>
            <td><!--GROSS PAY 3--></td>
            <td class="formOfficial"><!--PRSI CLASS 3--></td>
            <td class="formOfficial"><!--COMMENTS 3--></td>
        </tr>
        <tr>
            <td class="formLabel">Week Ended:</td>
            <td class="formInput"><!--WEEK ENDED 4--></td>
            <td class="formInput"><!--SATURDAY 4--></td>
            <td class="formInput"><!--SUNDAY 4--></td>
            <td class="formInput"><!--MONDAY 4--></td>
            <td class="formInput"><!--TUESDAY 4--></td>
            <td class="formInput"><!--WEDNESDAY 4--></td>
            <td class="formInput"><!--THURSDAY 4--></td>
            <td class="formInput"><!--FRIDAY 4--></td>
            <td class="formInput"><!--DESCRIPTION OF WORK 4--></td>
            <td><!--TOTAL HOURS 4--></td>
            <td><!--HOURLY RATE 4--></td>
            <td><!--GROSS PAY 4--></td>
            <td class="formOfficial"><!--PRSI CLASS 4--></td>
            <td class="formOfficial"><!--COMMENTS 4--></td>
        </tr>
        <tr>
            <td class="formLabel">Week Ended:</td>
            <td class="formInput"><!--WEEK ENDED 5--></td>
            <td class="formInput"><!--SATURDAY 5--></td>
            <td class="formInput"><!--SUNDAY 5--></td>
            <td class="formInput"><!--MONDAY 5--></td>
            <td class="formInput"><!--TUESDAY 5--></td>
            <td class="formInput"><!--WEDNESDAY 5--></td>
            <td class="formInput"><!--THURSDAY 5--></td>
            <td class="formInput"><!--FRIDAY 5--></td>
            <td class="formInput"><!--DESCRIPTION OF WORK 5--></td>
            <td><!--TOTAL HOURS 5--></td>
            <td><!--HOURLY RATE 5--></td>
            <td><!--GROSS PAY 5--></td>
            <td class="formOfficial"><!--PRSI CLASS 5--></td>
            <td class="formOfficial"><!--COMMENTS 5--></td>
        </tr>
        <tr>
            <td class="formLabel" colspan="9"><small><u>NB</u> (Please note the <u>number of hours</u> worked each day, otherwise payment may be delayed)</small></td>
            <td class="formLabel">Totals</td>
            <td><!--TOTAL HOURS TOTAL--></td>
            <td></td>
            <td><!--GROSS PAY TOTAL--></td>
            <td class="formOfficial"></td>
            <td class="formOfficial"></td>
        </tr>
    </table>

    <!--SECTION D GOES HERE, IF WE NEED IT (PROBABLY NOT)-->
    <br>

    <table>
        <tr>
            <td class="formLabel">Signature of person seeking payment:</td>
            <td class="formInput">' . $demName[0][0] . '</td>
            <td class="formLabel">Date:</td>
            <td class="formInput">' . date("d-m-Y") . '</td>
            <td class="formLabel">Signature of Head of School/TRI or Project A/C Holder:</td>
            <td class="formInput"><!--ADMIN NAME--></td>
            <td class="formLabel">Date:</td>
            <td class="formInput"><!--DATE--></td>
        </tr>
    </table>
    ';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// Close and output PDF document
ob_end_clean();
$pdf->Output('claim-form.pdf', 'I'); // this opens the finished PDF in the browser - user can download if they wish.

?>