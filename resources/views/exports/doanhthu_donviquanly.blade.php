<h4 class="text-center" >Tổng doanh thu các doanh nghiệp thuộc {{$taikhoan->donviquanly->tendonviquanly}}</h4>
<table>
    <thead>
    <tr>
        <th width="60">Doanh Nghiệp</th>                        
        <th width="15">Số Lượng</th>
        <th width="25">Tổng Tiền</th>
        
    </tr>
    </thead>
    <tbody>
    @php $tong = 0; @endphp   
        @foreach($doanhthu as $value)
            <tr>
                <td>{{ $value->tendoanhnghiep }}</td>
                <td>{{ $value->tongsoluongban }} sản phẩm</td>
                <td>{{ number_format($value->tongdongiaban)  }} VNĐ</td>
                @php $tong += $value->tongdongiaban ; @endphp
                
            </tr>
        @endforeach
        <tr >
            <td colspan="2" class="fw-bold" >Tổng doanh thu</td>
            <td colspan="1" class="fw-bold">{{number_format( $tong) }} VNĐ</td>

        </tr>
    </tbody>
</table>