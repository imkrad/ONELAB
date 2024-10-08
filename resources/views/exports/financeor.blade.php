<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<body>
    <table>
        <thead style="background-color:#c8c8c8; padding: 5px; font-size: 9px;">
            <tr>
                <td style="width: 150px; text-align: center; font-weight: bold;">TSR Code</td>
                <td style="width: 350px; text-align: center; font-weight: bold;">Customer</td>
                <td style="width: 450px; text-align: center; font-weight: bold;">Address</td>
                <td style="width: 130px; text-align: center; font-weight: bold;">OR Number</td>
                <td style="width: 130px; text-align: center; font-weight: bold;">Subtotal</td>
                <td style="width: 130px; text-align: center; font-weight: bold;">Discount</td>
                <td style="width: 130px; text-align: center; font-weight: bold;">Total</td>
                <td style="width: 130px; text-align: center; font-weight: bold;">Status</td>
            </tr>
        </thead>
        <tbody>
        @foreach($lists as $list)
            <tr style="text-align: center; font-size: 9px; color: #072388;">
                <td>{{$list['code']}}</td>
                <td style="text-align: center;">
                    {{$list['customer']['customer_name']['name']}} {{($list['customer']['name'] == 'Main')  ? '' : ' - '.$list['customer']['name']}}
                </td>
                <td style="text-align: center;">
                @php 
                        $address = ($list['customer']['address']['address'] != '' ||$list['customer']['address']['address'] != NULL) ? $list['customer']['address']['address'].', ' : '';
                        if($list['customer']['address']['municipality']['name'] == 'Zamboanga City' || $list['customer']['address']['municipality']['name'] == 'Isabela City'){
                            $a = '';
                        }else if($list['customer']['address']['province']['name'] == 'Sulu'){
                            $a = ', '.$list['customer']['address']['province']['name'];
                        }else{
                            $a = ', '.$list['customer']['address']['province']['name'];
                        }
                        $barangay = $list['customer']['address']['barangay']['name'];
                        $municipality = $list['customer']['address']['municipality']['name'];
                        $province = $list['customer']['address']['province']['name'];

                    @endphp
                    {{ $address.$list['customer']['address']['barangay']['name'].', '.$list['customer']['address']['municipality']['name'].$a}}
                </td>
                <td style="text-align: center;">{{($list['payment']['or_number']) ? $list['payment']['or_number'] : '-'}}</td>
                <td style="text-align: center;"><span style="font-family: DejaVu Sans;">&#8369;</span>{{number_format(trim(str_replace(',','',$list['payment']['subtotal']),'₱ '),2,".",",")}}</td>
                <td style="text-align: center;"><span style="font-family: DejaVu Sans;">&#8369;</span>{{number_format(trim(str_replace(',','',$list['payment']['discount']),'₱ '),2,".",",")}}</td>
                <td style="text-align: center;"><span style="font-family: DejaVu Sans;">&#8369;</span>{{number_format(trim(str_replace(',','',$list['payment']['total']),'₱ '),2,".",",")}}</td>
                <td style="text-align: center;">{{$list['payment']['status']['name']}}</td>
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
                <td colspan="3"></td>
                <td style="text-align: center; font-weight: bold;"><span style="font-family: DejaVu Sans;">&#8369;</span>{{ number_format($totalSubtotal, 2, ".", ",") }}</td>
                <td style="text-align: center; font-weight: bold;"><span style="font-family: DejaVu Sans;">&#8369;</span>{{ number_format($totalDiscount, 2, ".", ",") }}</td>
                <td style="text-align: center; font-weight: bold;"><span style="font-family: DejaVu Sans;">&#8369;</span>{{ number_format($totalAmount, 2, ".", ",") }}</td>
                <td style="text-align: center; font-weight: bold;"><span style="font-family: DejaVu Sans;">&#8369;</span>{{ number_format($totalGratis, 2, ".", ",") }}</td>
            </tr>
        </tfoot> -->
    </table>
</body>
</html>
