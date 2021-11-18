<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh lý hợp đồng</title>
    <style>
        .container {
            width: 80%;
            margin: auto;
        }

        p {
            font-size: 1.3rem;
        }

        .sign {
            display: flex;
            text-align: center;
            justify-content: space-evenly;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center;">Cộng hòa xã hội chủ nghĩa Việt Nam</h1>
        <h3 style="text-align: center;text-decoration: underline;">Độc lập - Tự do - Hạnh phúc</h3>
        <h2 style="text-align: center;margin-top: 3rem;">Biên bản thanh lý hợp đồng</h2>
        <h4 style="text-align: center;">(Thanh lý hợp đồng ... số ...)</h4>

        <p><i>- Căn cứ Bộ luật Dân sự của Quốc Hội nước CHXHCN Việt Nam năm 2015.</i></p>
        <p><i>- Căn cứ vào Hợp đồng ({{ $order->id }}) mua bán hàng hóa công ty TNHH Vân Long.</i></p>
        <p><i>- Căn cứ nhu cầu và khả năng của các Bên;</i></p>
        <p> Hôm nay, ngày {{ date('d') }} tháng {{ date('m') }} năm {{ date('Y') }} , tại thành phố Hải Phòng, chúng tôi gồm : </p>
        <p>Bên A:<i>Công ty TNHH Vân Long</i></p>
        <p>
            Địa chỉ trụ sở chính: <i>Số 15a Dầu Lửa, Hùng Vương, Hồng Bàng, Hải Phòng</i>
        </p>
        <p>
            Đại diện bởi ông: <i>Trần Tuấn Khanh</i>
        </p>
        <p>
            Chức danh: <i>Giám đốc công ty</i>
        </p>
        <p>
            Điện thoại: +(84) 977.418.888 Fax: <i>(+84) 225.3798.887</i>
        </p>
        <p>
            MST: <i>0200367100</i>
        </p>
        <br>
        <br>
        <p>Bên B:<i>Công ty {{ $order->company_name }}</i></p>
        <p>
            Địa chỉ trụ sở chính: <i>{{ $order->address }}, {{ $order->ward->name }}, {{ $order->district->name }}, {{ $order->province->name }}</i>
        </p>
        <p>
            Đại diện bởi ông: <i>{{ $order->name }}</i>
        </p>
        <p>
            Điện thoại: {{ $order->phone }} 
        </p>
        <p>
            MST: <i>…………………………………………………</i>
        </p>
        <br><br>
        <p><i>Hai bên thống nhất ký biên bản thanh lý Hợp đồng mua bán số: ....../......../....../….. ký
                ngày {{ date('d') }}/{{ date('m') }}/{{ date('Y') }} với nội dung sau:</i></p>
        <h2>Điều 1: </h2>
        <p>Bên B đã tiến hành thanh toán cho Bên A theo hợp đồng ........... số: ....../......../...... ký ngày
            {{ date('d') }}/{{ date('m') }}/{{ date('Y') }}</p>
        <h2>Điều 2: Giá trị hợp đồng và phương thức thanh toán:</h2>
        <p>Bên A đồng ý thanh toán cho Bên B mức phí dịch vụ như sau:
        </p>
        <p>+ Giá trị hợp đồng trước thuế: {{ number_format($order->total - $order->tax) }} đồng
        </p>
        <p>+ Thuế VAT: {{ number_format($order->tax) }} đồng</p>
        <p>+ Giá trị hợp đồng sau thuế: {{ number_format($order->total) }} đồng</p>
        <h2>Điều 3:</h2>
        <p>Bên A đồng ý thanh toán toàn bộ số tiền trên cho Bên B theo như quy định tại Điều 2 của Biên bản này.</p>
        <p>Hai bên thống nhất thanh lý Hợp đồng ............. số: ....../......../....../200. ký ngày
            {{ date('d') }}/{{ date('m') }}/{{ date('Y') }} giữa Công ty TNHH Vân Long và Công ty {{ $order->company_name }}p>
        <p><i>Biên bản thanh lý này được lập thành 02 bản mỗi bên giữ 01 (một) bản và có giá trị pháp lý như nhau.</i>
        </p>

        <div class="sign">
            <div>
                <h2>Đại diện bên A</h2>
                <p>Giám đốc</p>
            </div>
            <div>
                <h2>Đại diện bên B</h2>
                <p>Giám đốc</p>
            </div>
        </div>
    </div>
</body>

</html>