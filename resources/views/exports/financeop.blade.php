<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<body>
    <table>
        <thead style="background-color:#c8c8c8; padding: 5px; font-size: 9px;">
            <tr>
                <td style="width: 150px; text-align: center; font-weight: bold;">Code</td>
                <td style="width: 350px; text-align: center; font-weight: bold;">Customer</td>
                <td style="width: 400px; text-align: center; font-weight: bold;">TSR Code</td>
                <td style="width: 150px; text-align: center; font-weight: bold;">OR Date</td>
                <td style="width: 150px; text-align: center; font-weight: bold;">Created By</td>
                <td style="width: 250px; text-align: center; font-weight: bold;">OP No.</td>
                <td style="width: 160px; text-align: center; font-weight: bold;">OR No.</td>
                <td style="width: 160px; text-align: center; font-weight: bold;">Amount</td>
            </tr>
        </thead>
        <tbody>
        @foreach($lists as $index=>$list)
                <tr style="text-align: center; font-size: 9px; color: #072388;">
                    <td style="text-align: center;">{{$list['code']}}</td>
                    <td style="text-align: center;">{{$list['payorable']['customer_name']['name']}} {{($list['payorable']['name'] == 'Main')  ? '' : ' - '.$list['payorable']['name']}}</td>
                    <td style="text-align: center;">
                    @foreach($list['items'] as $index=>$a)
                        {{$a['itemable']['code']}}@if(!$loop->last), @endif
                    @endforeach
                    </td>
                    <td style="text-align: center;">{{$list['created_at']}}</td>
                    <td style="text-align: center;">{{$list['createdby']['profile']['firstname']}} {{$list['createdby']['profile']['middlename'][0]}}. {{$list['createdby']['profile']['lastname']}}</td>
                    <td style="text-align: center;">{{$list['code']}}</td>
                    <td style="text-align: center;">{{$list['or']['number']}}</td>
                    <td style="text-align: center;"><span style="font-family: DejaVu Sans;">&#8369;</span>{{number_format(trim(str_replace(',','',$list['total']),'₱ '),2,".",",")}}</td>
                </tr>
            @endforeach
        </tbody>
        <!-- <tfoot>
            @php
                $totalSubtotal = 0;
                $totalDiscount = 0;
                $totalAmount = 0;
                $totalGratis = 0;

                foreach ($lists as $list) {
                    $subtotal = str_replace(['₱ ', '₱', ',', ' '], '', $list['subtotal']);
                    $discount = str_replace(['₱ ', '₱', ',', ' '], '', $list['discount']);
                    $total = str_replace(['₱ ', '₱', ',', ' '], '', $list['total']);
                    $gratis = str_replace(['₱ ', '₱', ',', ' '], '', $list['gratis']);


                    $totalSubtotal += floatval($subtotal);
                    $totalDiscount += floatval($discount);
                    $totalAmount += floatval($total);
                    $totalGratis += floatval($gratis);
                }
            @endphp
            <tr style="font-weight: bold; text-align: center;">
                <td colspan="1"></td>
                <td style="text-align: center; font-weight: bold;"><span style="font-family: DejaVu Sans;">&#8369;</span>{{ number_format($totalSubtotal, 2, ".", ",") }}</td>
                <td style="text-align: center; font-weight: bold;"><span style="font-family: DejaVu Sans;">&#8369;</span>{{ number_format($totalDiscount, 2, ".", ",") }}</td>
                <td style="text-align: center; font-weight: bold;"><span style="font-family: DejaVu Sans;">&#8369;</span>{{ number_format($totalAmount, 2, ".", ",") }}</td>
                <td style="text-align: center; font-weight: bold;"><span style="font-family: DejaVu Sans;">&#8369;</span>{{ number_format($totalGratis, 2, ".", ",") }}</td>
            </tr>
        </tfoot> -->
    </table>
</body>
</html>
