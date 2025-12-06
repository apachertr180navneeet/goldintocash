<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Gold Release – Bank Payment Confirmation Form</title>
    <style>
        @page {
            margin: 20px 25px;
        }

        @font-face {
            font-family: 'NotoSansDevanagari';
            src: url("{{ storage_path('fonts/NotoSansDevanagari-Regular.ttf') }}") format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'NotoSansDevanagari', sans-serif;
            font-size: 11px;
        }
        .text-center { text-align: center; }
        .text-right  { text-align: right; }
        .text-left   { text-align: left; }

        .mt-5  { margin-top: 5px; }
        .mt-10 { margin-top: 10px; }
        .mt-15 { margin-top: 15px; }
        .mt-20 { margin-top: 20px; }

        .mb-5  { margin-bottom: 5px; }
        .mb-10 { margin-bottom: 10px; }
        .mb-15 { margin-bottom: 15px; }

        table { width: 100%; border-collapse: collapse; }
        .table-border th,
        .table-border td {
            border: 1px solid #000;
            padding: 4px 6px;
            vertical-align: top;
        }

        .header {
            border: 1px solid #000;
            padding: 5px 8px;
        }
        .header-top {
            border-bottom: 2px solid #000;
            padding-bottom: 4px;
        }
        .logo-box {
            width: 15%;
            text-align: center;
            font-size: 9px;
        }
        .firm-name {
            font-size: 16px;
            font-weight: bold;
        }
        .firm-sub {
            font-size: 10px;
        }
        .title-bar {
            margin-top: 5px;
            padding: 4px 0;
            border-top: 1px solid #000;
            border-bottom: 1px solid #000;
            font-weight: bold;
            font-size: 11px;
        }

        .label-strong {
            font-weight: bold;
        }

        .line {
            display: inline-block;
            border-bottom: 1px solid #000;
            min-width: 120px;
        }
        .line-long {
            min-width: 250px;
        }

        .small { font-size: 9px; }

        .section-title {
            font-weight: bold;
            text-decoration: underline;
            margin-top: 8px;
            margin-bottom: 4px;
        }

        .sign-table td {
            padding-top: 40px;
            text-align: center;
            font-size: 10px;
        }
        .sign-line {
            border-top: 1px solid #000;
            width: 70%;
            margin: 0 auto 3px auto;
        }

        .page-break {
            page-break-after: always;
        }

        .bullet-list {
            margin-top: 5px;
            margin-left: 15px;
        }
        .bullet-list li {
            margin-bottom: 4px;
        }

        .footer-bar {
            margin-top: 6px;
            padding-top: 3px;
            border-top: 1px solid #000;
            font-size: 9px;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- ===================== PAGE 1 ===================== -->
    <div class="page">

        <!-- HEADER -->
        <div class="header">
            <table class="header-top">
                <tr>
                    <td class="text-center">
                        <div class="firm-name">VIJAY ABHUSHAN BUY &amp; ASSOCIATES</div>
                        <div class="firm-sub">
                            OPP. SESSION COURT, NEAR SAMRUDDHI HELPLINE, PALI
                        </div>
                    </td>
                    <td class="text-right small" style="width: 20%;">
                        Date : <span>{{ date('d-m-Y') }}</span>
                    </td>
                </tr>
            </table>

            <div class="title-bar text-center">
                GOLD RELEASE – BANK PAYMENT CONFIRMATION FORM
            </div>

            <!-- CUSTOMER DETAILS -->
            <div class="section-title">Customer Details</div>
            <table>
                <tr>
                    <td class="label-strong" style="width: 28%;">Name:</td>
                    <td><span class="line line-long">{{ $data->name }}</span></td>
                </tr>
                <tr>
                    <td class="label-strong">Address:</td>
                    <td><span class="line line-long">{{ $data->address }}</span></td>
                </tr>
                <tr>
                    <td class="label-strong">Mobile No.:</td>
                    <td><span class="line">{{ $data->phone }}</span></td>
                </tr>
                <tr>
                    <td class="label-strong">Family No.:</td>
                    <td><span class="line">{{ $data->family_phone }}</span></td>
                </tr>
                <tr>
                    <td class="label-strong">ID Proof:</td>
                    <td><span class="line line-long">{{ $data->id_proof }}</span></td>
                </tr>
            </table>

            <!-- BANK LOAN DETAILS -->
            <div class="section-title">Bank Loan Details</div>
            <table>
                <tr>
                    <td class="label-strong" style="width: 28%;">Bank Name:</td>
                    <td><span class="line line-long">{{ $data->bank_name }}</span></td>
                </tr>
                {{--  <tr>
                    <td class="label-strong">Bank Address:</td>
                    <td><span class="line line-long">{{ $data->bank_address }}</span></td>
                </tr>  --}}
                <tr>
                    <td class="label-strong">Bank A/C No.:</td>
                    <td><span class="line line-long">{{ $data->bank_account_number }}</span></td>
                </tr>
                {{--  <tr>
                    <td class="label-strong">Branch:</td>
                    <td><span class="line"></span>{{ $data->bank_branch }}</td>
                </tr>  --}}
                <tr>
                    <td class="label-strong">Loan Amount:</td>
                    <td><span class="line">{{ $data->total_loan_amount }}</span></td>
                </tr>
                <tr>
                    <td class="label-strong">Gold Weight &amp; Purity:</td>
                    <td><span class="line line-long">{{ $data->gold_net_weight }}</span></td>
                </tr>
            </table>

            <!-- PAYMENT TRANSFER DETAILS -->
            <div class="section-title">Payment Transfer Details</div>
            <table>
                <tr>
                    <td class="label-strong" style="width: 35%;">Amount Transferred (₹):</td>
                    <td><span class="line line-long">{{ $data->total_loan_amount }}</span></td>
                </tr>
                {{--  <tr>
                    <td class="label-strong">Amount in words:</td>
                    <td><span class="line line-long"></span></td>
                </tr>  --}}
                <tr>
                    <td class="label-strong">Payment Transferred in favour of:</td>
                    <td>VIJAY ABHUSHAN BUY &amp; ASSOCIATES</td>
                </tr>
                <tr>
                    <td class="label-strong">Mode of Payment:</td>
                    <td><span class="small"> {{ $data->payment_mode }} </span></td>
                </tr>
                <tr>
                    <td class="label-strong">Transfer From A/C No.:</td>
                    <td><span class="line line-long"></span></td>
                </tr>
                <tr>
                    <td class="label-strong">Account Holder Name:</td>
                    <td><span class="line line-long"></span></td>
                </tr>
                <tr>
                    <td class="label-strong">Bank Name:</td>
                    <td><span class="line line-long"></span></td>
                </tr>
                <tr>
                    <td class="label-strong">IFSC Code:</td>
                    <td><span class="line"></span></td>
                </tr>
                <tr>
                    <td class="label-strong">Transaction Reference No.:</td>
                    <td><span class="line line-long"></span></td>
                </tr>
                <tr>
                    <td class="label-strong">Date &amp; Time of Transfer:</td>
                    <td><span class="line line-long"></span></td>
                </tr>
            </table>

            <!-- CUSTOMER CONFIRMATION -->
            <div class="section-title">Customer Confirmation</div>
            <p class="small">
                I confirm that the above mentioned details are true and correct to the best of my knowledge.
                I have transferred the above mentioned amount to Vijay Abhushan Buy &amp; Associates. In case any
                information is found incorrect, I shall be responsible for the same.
            </p>

            <table class="sign-table" width="100%">
                <tr>
                    <td style="width: 50%;">
                        <div class="sign-line"></div>
                        <div>Authorized Signatory</div>
                        <div class="small">(Vijay Abhushan Buy &amp; Associates)</div>
                    </td>
                    <td style="width: 50%;">
                        <div class="sign-line"></div>
                        <div>Customer Signature</div>
                    </td>
                </tr>
            </table>

            <div class="mt-5 small">
                Date: <span class="line">{{ date('d-m-Y') }}</span>
            </div>

            <div class="footer-bar">
                Phone : 0000000000 &nbsp; | &nbsp; Email : info@vijayabhushan.com
            </div>
        </div>
    </div>

    <div class="page-break"></div>

    <!-- ===================== PAGE 2 ===================== -->
    <div class="page">

        <div class="header">
            <table class="header-top">
                <tr>
                    
                    <td class="text-center">
                        <div class="firm-name">VIJAY ABHUSHAN BUY &amp; ASSOCIATES</div>
                        <div class="firm-sub">OPP. SESSION COURT, NEAR SAMRUDDHI HELPLINE, PALI</div>
                    </td>
                    <td class="text-right small" style="width: 20%;">
                        Date : <span>{{ date('d-m-Y') }}</span>
                    </td>
                </tr>
            </table>

            <div class="title-bar text-center">GOLD RELEASE – BANK PAYMENT CONFIRMATION FORM</div>

            <!-- TERMS & CONDITIONS -->
            <div class="section-title">TERMS &amp; CONDITIONS</div>

            <ul class="bullet-list small">
                <li>All details must be filled accurately by the customer.</li>
                <li>The firm shall not take responsibility for any incorrect information submitted by the customer.</li>
                <li>Gold release payment will only be accepted through bank transfer.</li>
                <li>Bank confirmation of payment is mandatory.</li>
                <li>The customer is responsible for any technical/banking error during transfer.</li>
                <li>Legal jurisdiction lies in Pali court.</li>
                <li>This form is only a payment confirmation document and not a guarantee/loan document.</li>
                <li>If any information is found incorrect, legal action may be taken and services may be stopped.</li>
                <li>The customer shall verify safe receipt of gold from bank after release.</li>
                <li>The firm is not liable for any criminal activity or fraud associated.</li>
            </ul>

            <!-- CUSTOMER DECLARATION -->
            <div class="section-title mt-15">CUSTOMER DECLARATION</div>
            <p class="small">
                I hereby declare that I have read and agree to the above terms &amp; conditions. All information provided by me is true and correct.
            </p>

            <table class="sign-table" width="100%">
                <tr>
                    <td style="width: 50%;">Date: <span class="line">{{ date('d-m-Y') }}</span></td>
                    <td style="width: 50%;"></td>
                </tr>
                <tr>
                    <td><div class="sign-line"></div>Customer's Signature</td>
                    <td><div class="sign-line"></div>Authorized Bank Signatory</td>
                </tr>
            </table>

            <div class="footer-bar">
                Phone : 0000000000 &nbsp; | &nbsp; Email : info@vijayabhushan.com
            </div>
        </div>

    </div>

</body>
</html>
