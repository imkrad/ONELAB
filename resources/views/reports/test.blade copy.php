<!doctype html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
        html * {
            font-family:Arial, Helvetica, sans-serif;
        }
        .results table,
        .results td,
        .results th {
            border: .5px solid black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 3px;
            vertical-align: top;
        }

        .results td {
            padding: 3px;
            /* vertical-align: top; */
            /* text-align: center; */
        }
        input[type=checkbox] {
            transform: scale(.7);
        }
         .a {
            width: 55px; 
            height: 55px;
         }
         label {
        display: block;
        padding-left: 15px;
        text-indent: -15px;
        }
        input {
        width: 13px;
        height: 13px;
        padding: 0;
        margin:0;
        vertical-align: bottom;
        position: relative;
        top: -5px;
        left: 7px;
        *overflow: hidden;
        
        }
        .spec_table td {
margin-left: -20px;
font-size: .9em;
line-height: 1.1em;
border-top: none !important;
}

.page-break {
  page-break-after: always;
}
input[type=checkbox] { display: inline; }
input[type=checkbox]:before { font-family: DejaVu Sans; }
label {
  display: inline-block;
}

    </style>
    </head>

    <body>
        <?php 
            $configuration = json_encode($configuration); 
            $configuration = json_decode($configuration, true);   
            
        ?>

        <div style="font-family:Arial;">
            <img src="{{ public_path('images/logo-sm.png') }}" alt="tag" style="position: absolute; top: -4; left: 0; width: 60px; height: 60px;">
            <center style="font-size: 9px; margin-bottom: 0px;">Republic of the Philippines</center>
            <center style="font-size: 10px; margin-bottom: 0px; text-transform: uppercase; font-weight: bold;">{{$configuration['name']}}</center>
            <center style="font-size: 11px; margin-bottom: 0px; font-weight: bold; color: #4290f5;">REGIONAL STANDARDS AND TESTING LABORATORIES</center>
            <center style="font-size: 9px;">Pettit Baracks, Zamboanga City | (062) 991-1024</center>
            <hr style="color: #4290f5; margin-top: 15px;"/>
            <br/>
            
            <center style="font-size: 13px; color:#000; font-weight: bold; padding: 2px; margin-top: -10px;">TEST REPORT</center>
            
            <table style="border: none; font-size: 11px; margin-top: 0px;">
                <tbody>
                    <tr style="border: none;">
                        <td width="25%">TSR Number</td>
                        <td width="2%">:</td>
                        <td>{{$sample->tsr->code}}</td>
                    </tr>
                    <tr style="border: none;">
                        <td>Date Submitted</td>
                        <td>:</td>
                        <td>{{$sample->tsr->created_at}}</td>
                    </tr>
                    <tr>
                        <td>Date Analyzed</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Sample Submitted</td>
                        <td>:</td>
                        <td>{{$sample->name}}</td>
                    </tr>
                    <tr>
                        <td>Sample Descriptions</td>
                        <td>:</td>
                        <td><em>{{$sample->description}}</em>, {{$sample->customer_description}}</td>
                    </tr>
                    <tr>
                        <td>Submitted by</td>
                        <td>:</td>
                        <td style="text-transform: uppercase; font-weight: bold;"><em>{{($sample->tsr->customer->is_main) ? $sample->tsr->customer->customer_name->name : $sample->tsr->customer->customer_name->name.' - '.$sample->tsr->customer->name}}</em></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td>{{$sample->tsr->customer->address->address}}, {{$sample->tsr->customer->address->barangay->name}}, {{$sample->tsr->customer->address->municipality->name}}, , {{$sample->tsr->customer->address->province->name}}, {{$sample->tsr->customer->address->region->region}}</td>
                    </tr>
                </tbody>
            </table>
            <h6 style="font-size: 11px; margin-top: 12px;">CHEMICAL / MECHANICAL TEST RESULT(S):</h6>
            <table style="border: 1px solid black; margin-top: -22px;" class="results">
                <thead style="background-color:#edf1f5; padding: 5px; font-size: 11px;">
                    <tr>    
                        <th width="30%">PARAMETER</th>
                        <th width="20%">RESULT</th>
                        <th width="50%">METHOD</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sample['analyses'] as $index=>$analysis)
                    <tr style="font-size: 11px; text-align:center;">
                        <td>{{$analysis['testservice']['testname']['name']}}</td>
                        <td></td>
                        <td>{{$analysis['testservice']['method']['method']['name']}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td style="font-size: 9px;" colspan="3"><center>***** NOTHING FOLLOWS *****</center></td>
                    </tr>
                </tbody>
            </table>
            <h6 style="font-size: 11px; margin-top: 12px;">REMARKS:</h6>
            <ul style="font-size: 10px; margin-top: -20px; margin-left: -15px;"> 
                <li>This report is based on the samples received by this office and should not be used for advertising purposes or sales promotion nor as a basis for tariff or customs classification of imported commodity.</li>
                <li>Information in italics is provided by the customer.</li>
                <li>This report is not valid without dry seal and QR code.</li>
                <li>This report shall not be reproduced except in full, without the written approval of the laboratory.</li>
            </ul>
        </div>

    </body>
</html>