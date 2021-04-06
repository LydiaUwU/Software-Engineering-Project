<html>
	<head>
		<style>
			body {
				font-family:sans-serif;
			}
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
			}
			.formOfficial {
				background-color:grey;
			}
		</style>
	</head>
	<body>
		<h1>Trinity College Dublin - Human Resources Division</h1>
		<h1>Claim Form for -UG- Demonstration (Maximum-22 hours per semester)</h1>

		<h2>Section A</h2>

		<h3 style="color:red">It is important to complete all sections of this form, otherwise you may receive incorrect or no payment.</h3>

		<table>
			<tr>
				<td class="formLabel">Please tick the relevant payroll category to you:</td>
				<td class="formInput" colspan="7">
					<input type="checkbox" name="payrollWeekly" id="payrollWeekly"><label for="payrollWeekly">Weekly</label>
					<input type="checkbox" name="payrollMonthly" id="payrollMonthly"><label for="payrollMonthly">Monthly</label>
					<input type="checkbox" name="payrollCasual" id="payrollCasual"><label for="payrollCasual">Casual</label>
					<input type="checkbox" name="payrollFirst" id="payrollFirst"><label for="payrollFirst">First time to be paid</label>
				</td>
			</tr>
			<tr>
				<td class="formLabel">Surname:</td>
                <td class="formInput">
                    <input type="text" name="surname"/>
                </td>
                
                <td class="formLabel">First Names:</td>
                <td class="formInput">
                    <input type="text" name="first_name"/>
                </td>
				<td class="formLabel">PPS No:</td>
                <td class="formInput">
                    <input type="text" name="pps_num"/>
                </td>
				
                <td class="formLabel">Staff No:</td>
                <td class="formInput">
                    <input type="text" name="staff_num"/>
                </td>
			</tr>
		</table>

		<h2>Section B</h2> <p>(Please complete this section <strong>only if it is your first claim in the current academic year</strong> or the information required has changed since your last claim in the current academic year.)</p>

		<table>
			<tr>
				<td class="formLabel">Home Address:</td>
                <td class="formInput">
                    <input type="text" name="home_address"/>
                </td>
			</tr>
			<tr>
				<td class="formLabel">Address to send Pay Advice (if different):</td>
                <td class="formInput">
                    <input type="text" name="pay_advice"/>
                </td>
			</tr>
		</table>

		<p>(Payment will be made directly to your bank account so please provide the following information)</p>

		<table>
			<tr>
				<td class="formLabel">Bank Name:</td>
                <td class="formInput">
                    <input type="text" name="bank_name"/>
                </td>
                
                <td class="formLabel">Bank Address:</td>
                <td class="formInput">
                    <input type="text" name="bank_address"/>
                </td>
                
                <td class="formLabel">Account Name:</td>
                <td class="formInput">
                    <input type="text" name="account_name"/>
                </td>
            
                </tr>
			<tr>
				<td class="formLabel">Account No:</td>
                <td class="formInput">
                    <input type="text" name="account_num"/>
                </td>
                
                <td class="formLabel">Bank Sort Code:</td>
                <td class="formInput">
                    <input type="text" name="bank_sort_code"/>
                </td>
                
                <td class="formLabel">Dept/School where work was performed:</td>
                <td>School of Computer Science and Statistics</td>
			</tr>
			<tr>
				<td class="formLabel">IBAN No. <br> <small>(SEPA Requirement)</small></td>
                <td class="formInput" colspan="3">
                    <input type="text" name="iban_num"/>
                </td>
                
                <td class="formLabel">Swift/BIC Address<br> <small>(SEPA Requirement)</small></td>
                <td class="formInput">
                    <input type="text" name="bic_address"/>
                </td>
            
                </tr>
			<tr>
				<td class="formLabel" colspan="4">Are you in receipt of any other payments from Trinity College? (If yes, please specify)</td>
                <td class="formInput" colspan="2">
                    <input type="checkbox" name="receiving_payments"/>
                </td>
            
                </tr>
			<tr>
				<td class="formLabel" colspan="4">If you are employed in the Public Sector paying modified PRSI (i.e. Class B, C, D or H), please tick this box:</td>
                <td class="formInput" colspan="2">
                    <input type="checkbox" name="in_public_sector"/>
                </td>
            
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
                <td class="formInput" colspan="3">
                    <input type="text" name="course_title"/>
                </td>
                
                <td class="formLabel" colspan="3">Course Module:</td>
                <td class="formInput" colspan="3">
                    <input type="text" name="course_module"/>
                </td>
                
                <td class="formLabel">Signature of Course Director/Lecturer:</td>
                <td class="formInput" colspan="2">
                    <input type="text" name="signature"/>
                </td>
                
                <td class="formOfficial" colspan="2"></td>
			</tr>
			<tr>
				<td class="formLabel" colspan="4">Course Module Name:</td>
                <td class="formLabel" colspan="6">
                    <input type="text" name="course_module_name"/>
                </td>
                
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
                <td class="formInput">
                    <!--WEEK ENDED 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--SATURDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--SUNDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--MONDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--TUESDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--WEDNESDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--THURSDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--FRIDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--DESCRIPTION OF WORK 1-->
                </td>
                <td>
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--TOTAL HOURS 1-->
                </td>
                <td>
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--HOURLY RATE 1--></td>
                <td>
                <td class="formOfficial">
                    <!--GROSS PAY 1-->
                </td>
                <td class="formOfficial">
                    <!--PRSI CLASS 1-->
                </td>
                <td class="formOfficial">
                    <!--COMMENTS 1-->
                </td>
			</tr>
			<tr>
				<td class="formLabel">Week Ended:</td>
                <td class="formInput">

                    <!--WEEK ENDED 2-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--SATURDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--SUNDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--MONDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--TUESDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--WEDNESDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--THURSDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--FRIDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--DESCRIPTION OF WORK 1-->
                </td>
                <td>
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--TOTAL HOURS 1-->
                </td>
                <td>
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--HOURLY RATE 1--></td>
                </td>
                <td>

                    <!--GROSS PAY 2-->
                </td>
                <td class="formOfficial">

                    <!--PRSI CLASS 2-->
                </td>
                <td class="formOfficial">

                    <!--COMMENTS 2-->
                </td>
			</tr>
			<tr>
				<td class="formLabel">Week Ended:</td>
                <td class="formInput">

                    <!--WEEK ENDED 3-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--SATURDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--SUNDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--MONDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--TUESDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--WEDNESDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--THURSDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--FRIDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--DESCRIPTION OF WORK 1-->
                </td>
                <td>
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--TOTAL HOURS 1-->
                </td>
                <td>
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--HOURLY RATE 1--></td>
                </td>
                <td>

                    <!--GROSS PAY 3-->
                </td>
                <td class="formOfficial">

                    <!--PRSI CLASS 3-->
                </td>
                <td class="formOfficial">

                    <!--COMMENTS 3-->
                </td>
			</tr>
			<tr>
				<td class="formLabel">Week Ended:</td>
                <td class="formInput">

                    <!--WEEK ENDED 4-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--SATURDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--SUNDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--MONDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--TUESDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--WEDNESDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--THURSDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--FRIDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--DESCRIPTION OF WORK 1-->
                </td>
                <td>
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--TOTAL HOURS 1-->
                </td>
                <td>
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--HOURLY RATE 1--></td>
                </td>
                <td>

                    <!--GROSS PAY 4-->
                </td>
                <td class="formOfficial">

                    <!--PRSI CLASS 4-->
                </td>
                <td class="formOfficial">

                    <!--COMMENTS 4-->
                </td>
			</tr>
			<tr>
				<td class="formLabel">Week Ended:</td>
                <td class="formInput">

                    <!--WEEK ENDED 5-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--SATURDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--SUNDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--MONDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--TUESDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--WEDNESDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--THURSDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--FRIDAY 1-->
                </td>
                <td class="formInput">
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--DESCRIPTION OF WORK 1-->
                </td>
                <td>
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--TOTAL HOURS 1-->
                </td>
                <td>
                    <input style="width:60px;" type="number" name="saturday_one"/>
                    <!--HOURLY RATE 1--></td>
                </td>
                <td>

                    <!--GROSS PAY 5-->
                </td>
                <td class="formOfficial">

                    <!--PRSI CLASS 5-->
                </td>
                <td class="formOfficial">

                    <!--COMMENTS 5-->
                </td>
			</tr>
			<tr>
				<td class="formLabel" colspan="9"><small><u>NB</u> (Please note the <u>number of hours</u> worked each day, otherwise payment may be delayed)</small></td>
				<td class="formLabel">Totals</td>
                <td>

                    <!--TOTAL HOURS TOTAL-->
                </td>
				<td></td>
                <td>

                    <!--GROSS PAY TOTAL-->
                </td>
				<td class="formOfficial"></td>
				<td class="formOfficial"></td>
			</tr>
		</table>

		<!--SECTION D GOES HERE, IF WE NEED IT (PROBABLY NOT)-->
		<br>

		<table>
			<tr>
				<td class="formLabel">Signature of person seeking payment:</td>
                <td class="formInput">

                    <!--DEMONSTRATOR NAME-->
                </td>
				<td class="formLabel">Date:</td>
                <td class="formInput">

                    <!--DATE-->
                </td>
				<td class="formLabel">Signature of Head of School/TRI or Project A/C Holder:</td>
                <td class="formInput">

                    <!--ADMIN NAME-->
                </td>
				<td class="formLabel">Date:</td>
                <td class="formInput">

                    <!--DATE-->
                </td>
			</tr>
		</table>
	</body>
</html>
