<!doctype html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <style>
            html * {
                font-family:Arial, Helvetica, sans-serif;
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
                top: 75; /* 4 cm from the top */
                left: 120; /* 7 cm from the left */
                font-size: 10pt; /* Adjust font size as needed */
            }
            .agency {
                position: absolute;
                top: 104; /* 4 cm from the top */
                left: 30; /* 7 cm from the left */
                font-size: 10pt; /* Adjust font size as needed */
            }
            .payor {
                position: absolute;
                top: 126; /* 4 cm from the top */
                left: 30; /* 7 cm from the left */
                font-size: 9pt; /* Adjust font size as needed */
            }
            .total {
                position: absolute;
                top: 316; /* 4 cm from the top */
                left: 190; /* 7 cm from the left */
                font-size: 10pt; /* Adjust font size as needed */
            }
            .word {
                position: absolute;
                top: 359; /* 4 cm from the top */
                left: 3; /* 7 cm from the left */
                font-size: 8pt; /* Adjust font size as needed */
            }
            .items {
                position: absolute;
                top: 169; /* 4 cm from the top */
                left: -16; /* 7 cm from the left */
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
                        <td style="border: hidden; width: 250px;">{{$item['name']}}</td>
                        <td style="border: hidden; text-align: center; width: 80px;">{{trim($item['amount'],'₱ ')}}</td>
                    </tr>
                @endforeach  
                </tbody>
            </table>
        </div>
        <div class="word">{{$word}}</div>
        <!-- <table style="border: 1px solid black; font-size: 10px; margin-top: 15px;">
            <tbody>
                <tr>
                    <td>{{$date}}</td>
                </tr>  
                <tr>
                    <td>{{$agency}}</td>
                </tr>   
                <tr>
                    <td>{{$customer}}</td>
                </tr>  
            </tbody>
        </table>

        <table style="border: 1px solid black; font-size: 10px; margin-top: 15px;">
            <tbody>
            @foreach($items as $index=>$item)
                <tr>
                    <td>{{$item['name']}}</td>
                    <td style="text-align: center;"><span style="font-family: DejaVu Sans;">&#8369;</span>{{trim($item['amount'],'₱ ')}}</td>
                </tr>
            @endforeach  
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td style="text-align: center;"><span style="font-family: DejaVu Sans;">&#8369;</span>{{trim($total,'₱ ')}}</td>
                </tr>
            </tfoot>
        </table>

        <table style="border: 1px solid black; font-size: 10px; margin-top: 15px;">
            <tbody>
                <tr>
                    <td>{{$word}}</td>
                </tr>
            </tbody>
        </table> -->

    </body>
</html>

