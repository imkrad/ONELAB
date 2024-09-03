<!doctype html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <style>
            html * {
                font-family: Calibri, sans-serif;
                /* font-weight: bold; */
            }
            table,
            td,
            th {
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

            td {
                padding: 3px;
                /* vertical-align: top; */
                /* text-align: center; */
            }
            .text {
                position: absolute;
                top: 87; /* 4 cm from the top */
                left: 112; /* 7 cm from the left */
                font-size: 10pt; /* Adjust font size as needed */
            }
            .agency {
                position: absolute;
                top: 112; /* 4 cm from the top */
                left: 33; /* 7 cm from the left */
                font-size: 10pt; /* Adjust font size as needed */
            }
            .payor {
                position: absolute;
                top: 134; /* 4 cm from the top */
                left: 33; /* 7 cm from the left */
                font-size: 9pt; /* Adjust font size as needed */
            }
            .total {
                position: absolute;
                top: 309; /* 4 cm from the top */
                left: 190; /* 7 cm from the left */
                font-size: 10pt; /* Adjust font size as needed */
            }
            .word {
                position: absolute;
                top: 348; /* 4 cm from the top */
                left: -6; /* 7 cm from the left */
                font-size: 9pt; /* Adjust font size as needed */
            }
            .word2 {
                position: absolute;
                top: 333; /* 4 cm from the top */
                left: -5; /* 7 cm from the left */
                font-size: 9pt; /* Adjust font size as needed */
            }
            .items {
                position: absolute;
                top: 170; /* 4 cm from the top */
                left: -6; /* 7 cm from the left */
                font-size: 9pt; /* Adjust font size as needed */
            }
        </style>
    </head>
    <body style="color: black;">
        <div class="text">{{$date}}</div>
        <div class="agency">{{$agency}}</div>
        <div class="payor">{{$customer}}</div>
        <div class="total">{{trim($total,'₱ ')}}</div>
        <div class="items">
            <table style="border: hidden; font-size: 10px; margin-top: 15px;">
                <tbody>
                @foreach($items as $index=>$item)
                    <tr>
                        <td style="border: hidden; width: 240px;">{{$item['name']}}</td>
                        <td style="border: hidden; text-align: center; width: 80px;">{{trim($item['amount'],'₱ ')}}</td>
                    </tr>
                @endforeach  
                </tbody>
            </table>
        </div>
        @if(strlen($word) >= 50)
            <div class="word2" style="text-indent: 110px;">{{$word}}</div>
        @else
            <div class="word">{{$word}}</div>
        @endif
    </body>
</html>

