@extends('layouts.base')

@section('content')
<main class="main cart">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li class="active"><a href="{{ route('policy.purchase') }}">Hợp đồng</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container mb-5">
            <h2 align="center">
                <br />
                <strong>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</strong>
            </h2>
            <p align="center">
                <em>Độc lập - Tự do - Hạnh phúc</em>
            </p>
            <p align="center">
                -------------------
            </p>
            <p align="center">
                <strong>
                    <a href="https://luatminhkhue.vn/mau-hop-dong-mua-ban-hang-hoa.aspx" target="_blank">
                        HỢP ĐỒNG MUA BÁN HÀNG HÓA
                    </a>
                </strong>
            </p>
            <p align="center">
                Số: …../20.../HĐMB
            </p>
            <p>
                <strong><i>Căn cứ:</i></strong>
            </p>
            <p>
                <em>- </em>
                <i>
                    <a href="https://luatminhkhue.vn/dich-vu-luat-su-tu-van-phap-luat-dan-su-truc-tuyen-qua-tong-dai-dien-thoai-.aspx"
                        target="_blank">
                        Bộ luật Dân sự số 91/2015/QH13
                    </a>
                </i>
                <em> ngày 24/11/2015 và các văn bản pháp luật liên quan;</em>
            </p>
            <p>
                <em>- </em>
                <i>
                    <a href="https://luatminhkhue.vn/luat--thuong-mai-so-36-2005-qh11.aspx" target="_blank">
                        Luật Thương mại số 36/2005/QH11
                    </a>
                </i>
                <em> ngày 14/06/2005 và các văn bản pháp luật liên quan;</em>
            </p>
            <p>
                <em>- Nhu cầu và khả năng của các bên;</em>
            </p>
            <p>
                Hôm nay, ngày …… tháng …… năm …… , Tại ……
            </p>
            <p>
                Chúng tôi gồm có:
            </p>
            <div class="row">
                <div class="col-lg-6">
                    <p>
                        <b>BÊN BÁN (Bên A)</b>
                    </p>
                    <p>
                        Tên doanh nghiệp: <i>……………………………………………………</i>
                    </p>
                    <p>
                        Mã số doanh nghiệp: ..<i>...……………………………………………</i>
                    </p>
                    <p>
                        Địa chỉ trụ sở chính: <i>…………………………………………………</i>
                    </p>
                    <p>
                        Điện thoại: …………………… Fax: <i>………………………………</i>
                    </p>
                    <p>
                        Tài khoản số: <i>…………………………………………………………</i>
                    </p>
                    <p>
                        Mở tại ngân hàng: <i>……………………………………………………</i>
                    </p>
                    <p>
                        Đại diện theo pháp luật: <i>…………… </i>Chức vụ: .…<i>………………</i>
                    </p>
                    <p>
                        CMND/Thẻ CCCD số: <i>……… </i>Nơi cấp: ……… Ngày cấp: ………
                    </p>
                    <p>
                        (Giấy ủy quyền số: … ngày …. tháng … năm … do … chức vụ … ký)
                    </p>
                </div>
                <div class="col-lg-6">
                    <p>
                        <b>BÊN MUA (Bên B)</b>
                    </p>
                    <p>
                        Tên doanh nghiệp: <i>……………………………………………………</i>
                    </p>
                    <p>
                        Mã số doanh nghiệp: ..<i>...……………………………………………</i>
                    </p>
                    <p>
                        Địa chỉ trụ sở chính: <i>…………………………………………………</i>
                    </p>
                    <p>
                        Điện thoại: …………………… Fax: <i>…………………………………</i>
                    </p>
                    <p>
                        Tài khoản số: <i>…………………………………………………………</i>
                    </p>
                    <p>
                        Mở tại ngân hàng: <i>……………………………………………………</i>
                    </p>
                    <p>
                        Đại diện theo pháp luật: <i>……… </i>Chức vụ: <i>.………………………</i>
                    </p>
                    <p>
                        CMND/Thẻ CCCD số: <i>……… Nơi cấp: ……… Ngày cấp:………</i>
                    </p>
                    <p>
                        (Giấy ủy quyền số: ... ngày …. tháng ….. năm …….do … chức vụ …… ký).
                    </p>
                </div>
            </div>
            
            <p>
                Trên cơ sở thỏa thuận, hai bên thống nhất ký kết hợp đồng mua bán hàng hóa
                với các điều khoản như sau:
            </p>
            <p>
                <b>Điều 1: TÊN HÀNG - SỐ LƯỢNG - CHẤT LƯỢNG - GIÁ TRỊ HỢP ĐỒNG</b>
            </p>
            <p align="right">
                <i>Đơn vị tính: Việt Nam đồng </i>
            </p>
            <table style="width: 100%;" class="container" border="1px">
                <tbody>
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Tên hàng hóa</th>
                        <th>Đơn vị</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                        <th>Ghi chú</th>
                    </tr>
                    <tr align="center">
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr align="center">
                        <td>2</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr align="center">
                        <td>3</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr align="center">
                        <td>4</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr align="center">
                        <td>...</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr align="center">
                        <td>Tổng cộng</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <p>
                (<i>Số tiền bằng chữ: ............................... đồng)</i>
            </p>
            <p>
                <b>Điều 2: THANH TOÁN</b>
            </p>
            <p>
                1. Bên B phải thanh toán cho Bên A số tiền ghi tại Điều 1 của Hợp đồng này
                vào ngày ... tháng ... năm ........
            </p>
            <p>
                2. Bên B thanh toán cho Bên A theo hình thức
                ..................................
            </p>
            <p>
                <b>Điều 3: THỜI GIAN, ĐỊA ĐIỂM VÀ PHƯƠNG THỨC GIAO HÀNG</b>
            </p>
            <p>
                1. Bên A giao cho bên B theo lịch sau:
            </p>
            <table style="width: 100%;" class="container" border="1px">
                <tbody>
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Tên hàng hóa</th>
                        <th>Đơn vị</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                        <th>Ghi chú</th>
                    </tr>
                    <tr align="center">
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr align="center">
                        <td>2</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr align="center">
                        <td>3</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr align="center">
                        <td>4</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr align="center">
                        <td>...</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr align="center">
                        <td>Tổng cộng</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <p>
                2. Phương tiện vận chuyển và chi phí vận chuyển do bên ………………… chịu.
            </p>
            <p>
                Chi phí bốc xếp (mỗi bên chịu một đầu hoặc ………………………………………… )
            </p>
            <p>
                3. Quy định lịch giao nhận hàng hóa mà bên mua không đến nhận hàng thì phải
                chịu chi phí lưu kho bãi là ……………… đồng/ngày. Nếu phương tiện vận chuyển
                bên mua đến mà bên bán không có hàng giao thì bên bán phải chịu chi phí
                thực tế cho việc điều động phương tiện.
            </p>
            <p>
                4. Khi nhận hàng, bên mua có trách nhiệm kiểm nhận phẩm chất, quy cách hàng
                hóa tại chỗ. Nếu phát hiện hàng thiếu hoặc không đúng tiêu chuẩn chất lượng
                v.v… thì lập biên bản tại chỗ, yêu cầu bên bán xác nhận. Hàng đã ra khỏi
                kho bên bán không chịu trách nhiệm (trừ loại hàng có quy định thời hạn bảo
                hành).
            </p>
            <p>
                5. Trường hợp giao nhận hàng theo nguyên đai, nguyên kiện, nếu bên mua sau
                khi chở về nhập kho mới hiện có vi phạm thì phải lập biên bản gọi cơ quan
                kiểm tra trung gian (…………………….) đến xác nhận và phải gửi đến bên bán trong
                hạn 10 ngày tính từ khi lập biên bản. Sau 15 ngày nếu bên bán đã nhận được
                biên bản mà không có ý kiến gì thì coi như đã chịu trách nhiệm bồi thường
                lô hàng đó.
            </p>
            <p>
                6. Mỗi lô hàng khi giao nhận phải có xác nhận chất lượng bằng phiếu hoặc
                biên bản kiểm nghiệm; khi đến nhận hàng, người nhận phải có đủ:
            </p>
            <p>
                - Giấy giới thiệu của cơ quan bên mua;
            </p>
            <p>
                - Phiếu xuất kho của cơ quan bên bán;
            </p>
            <p>
                - Giấy chứng minh nhân dân.
            </p>
            <p>
                <b>Điều 4: TRÁCH NHIỆM CỦA CÁC BÊN</b>
            </p>
            <p>
                1. Bên bán không chịu trách nhiệm về bất kỳ khiếm khuyết nào của hàng hoá
                nếu vào thời điểm giao kết hợp đồng bên mua đã biết hoặc phải biết về những
                khiếm khuyết đó;
            </p>
            <p>
                2. Trừ trường hợp quy định tại khoản 1 Điều này, trong thời hạn khiếu nại
                theo quy định của Luật thương mại 2005, bên bán phải chịu trách nhiệm về
                bất kỳ khiếm khuyết nào của hàng hoá đã có trước thời điểm chuyển rủi ro
                cho bên mua, kể cả trường hợp khiếm khuyết đó được phát hiện sau thời điểm
                chuyển rủi ro;
            </p>
            <p>
                3. Bên bán phải chịu trách nhiệm về khiếm khuyết của hàng hóa phát sinh sau
                thời điểm chuyển rủi ro nếu khiếm khuyết đó do bên bán vi phạm hợp đồng.
            </p>
            <p>
                4. Bên mua có trách nhiệm thanh toán và nhận hàng theo đúng thời gian đã
                thỏa thuận.
            </p>
            <p>
                <b>Điều 5: BẢO HÀNH VÀ HƯỚNG DẪN SỬ DỤNG HÀNG HÓA</b>
            </p>
            <p>
                1. Bên A có trách nhiệm bảo hành chất lượng và giá trị sử dụng loại hàng
                ……………… cho bên mua trong thời gian là …………… tháng.
            </p>
            <p>
                2. Bên A phải cung cấp đủ mỗi đơn vị hàng hóa một giấy hướng dẫn sử dụng
                (nếu cần).
            </p>
            <p>
                <b>Điều 6: NGƯNG THANH TOÁN TIỀN MUA HÀNG</b>
            </p>
            <p>
                Việc ngừng thanh toán tiền mua hàng được quy định như sau:
            </p>
            <p>
                1. Bên B có bằng chứng về việc bên A lừa dối thì có quyền tạm ngừng việc
                thanh toán;
            </p>
            <p>
                2. Bên B có bằng chứng về việc hàng hóa đang là đối tượng bị tranh chấp thì
                có quyền tạm ngừng thanh toán cho đến khi việc tranh chấp đã được giải
                quyết;
            </p>
            <p>
                3. Bên B có bằng chứng về việc bên A đã giao hàng không phù hợp với hợp
                đồng thì có quyền tạm ngừng thanh toán cho đến khi bên A đã khắc phục sự
                không phù hợp đó;
            </p>
            <p>
                4. Trường hợp tạm ngừng thanh toán theo quy định tại khoản 2 và khoản 3
                Điều này mà bằng chứng do bên B đưa ra không xác thực, gây thiệt hại cho
                bên A thì bên B phải bồi thường thiệt hại đó và chịu các chế tài khác theo
                quy định của pháp luật.
            </p>
            <p>
                <b>Điều 7: ĐIỀU KHOẢN PHẠT VI PHẠM HỢP ĐỒNG</b>
            </p>
            <p>
                1. Hai bên cam kết thực hiện nghiêm túc các điều khoản đã thỏa thuận trên,
                không được đơn phương thay đổi hoặc hủy bỏ hợp đồng, bên nào không thực
                hiện hoặc đơn phương đình chỉ thực hiện hợp đồng mà không có lý do chính
                đáng thì sẽ bị phạt tới ………… % giá trị của hợp đồng bị vi phạm.
            </p>
            <p>
                2. Bên nào vi phạm các điều khoản trên đây sẽ phải chịu trách nhiệm vật
                chất theo quy định của các văn bản pháp luật có hiệu lực hiện hành về phạt
                vi phạm chất lượng, số lượng, thời gian, địa điểm, thanh toán, bảo hành
                v.v… mức phạt cụ thể do hai bên thỏa thuận dựa trên khung phạt Nhà nước đã
                quy định trong các văn bản pháp luật về loại hợp đồng này.
            </p>
            <p>
                <b>Điều 8: BẤT KHẢ KHÁNG VÀ GIẢI QUYẾT TRANH CHẤP</b>
            </p>
            <p>
                1. Bất khả kháng nghĩa là các sự kiện xảy ra một cách khách quan, không thể
                lường trước được và không thể khắc phục được mặc dù đã áp dụng mọi biện
                pháp cần thiết trong khả năng cho phép, một trong các Bên vẫn không có khả
                năng thực hiện được nghĩa vụ của mình theo Hợp đồng này; gồm nhưng không
                giới hạn ở: thiên tai, hỏa hoạn, lũ lụt, chiến tranh, can thiệp của chính
                quyền bằng vũ trang, cản trở giao thông vận tải và các sự kiện khác tương
                tự.
            </p>
            <p>
                2. Khi xảy ra sự kiện bất khả kháng, bên gặp phải bất khả kháng phải không
                chậm chễ, thông báo cho bên kia tình trạng thực tế, đề xuất phương án xử lý
                và nỗ lực giảm thiểu tổn thất, thiệt hại đến mức thấp nhất có thể.
            </p>
            <p>
                3. Trừ trường hợp bất khả kháng, hai bên phải thực hiện đầy đủ và đúng thời
                hạn các nội dung của hợp đồng này. Trong quá trình thực hiện hợp đồng, nếu
                có vướng mắc từ bất kỳ bên nào, hai bên sẽ cùng nhau giải quyết trên tinh
                thần hợp tác. Trong trường hợp không tự giải quyết được, hai bên thống nhất
                đưa ra giải quyết tại Tòa án có thẩm quyền. Phán quyết của tòa án là quyết
                định cuối cùng, có giá trị ràng buộc các bên. Bên thua phải chịu toàn bộ
                các chi phí giải quyết tranh chấp.
            </p>
            <p>
                <b>Điều 9: ĐIỀU KHOẢN CHUNG</b>
            </p>
            <p>
                1 . Hợp đồng này có hiệu lực từ ngày ký và tự động thanh lý hợp đồng kể từ
                khi Bên B đã nhận đủ hàng và Bên A đã nhận đủ tiền.
            </p>
            <p>
                2. Hợp đồng này có giá trị thay thế mọi giao dịch, thỏa thuận trước đây của
                hai bên. Mọi sự bổ sung, sửa đổi hợp đồng này đều phải có sự đồng ý bằng
                văn bản của hai bên.
            </p>
            <p>
                3. Trừ các trường hợp được quy định ở trên, Hợp đồng này không thể bị hủy
                bỏ nếu không có thỏa thuận bằng văn bản của các bên. Trong trường hợp hủy
                hợp đồng, trách nhiệm liên quan tới phạt vi phạm và bồi thường thiệt hại
                được bảo lưu.
            </p>
            <p>
                4. Hợp đồng này được làm thành …………… bản, có giá trị như nhau. Mỗi bên giữ
                ……… bản và có giá trị pháp lý như nhau.
            </p>
            <table border="0" cellspacing="0" cellpadding="0" width="0">
                <tbody>
                    <tr>
                        <td>
                            <p align="center">
                                <b>ĐẠI DIỆN BÊN A </b>
                            </p>
                        </td>
                        <td>
                            <p align="center">
                                <b>ĐẠI DIỆN BÊN B</b>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center">
                                Chức vụ
                            </p>
                            <p align="center">
                                <i>(Ký tên, đóng dấu) </i>
                            </p>
                        </td>
                        <td>
                            <p align="center">
                                Chức vụ
                            </p>
                            <p align="center">
                                <i>(Ký tên, đóng dấu)</i>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection