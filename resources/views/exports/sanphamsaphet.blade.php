<table>
    <thead>
    <tr>
        <th width="15">Nhóm Sản Phẩm</th>
        <th width="15">Loại Sản Phẩm</th>
        <th width="15">Đơn Vị Tính</th>
        <th width="15">Quy Cách</th>
        <th width="15">Tên sản phẩm</th>
        <th width="15">Nguyên Liệu</th>
        <th width="15">Tiêu Chuẩn</th>
        <th width="15">Điều Kiện Lưu Trữ</th>
        <th width="15">Điều Kiện Vận Chuyển</th>
        <th width="15">Khối Lượng Riêng</th>
        <th width="15">Số lượng </th>
        <th width="15">Đơn giá</th>
        <th width="15">Hạn Sử Dụng</th>
        <th width="15">Hạn Sử Dụng Sau Mở Hộp</th>
        <th width="15">Hình ảnh sản phẩm đại diện</th>
        <th width="15">Hình ảnh sản phẩm đính kèm</th>
        <th width="15">Phân hạng</th>
        <th width="15">Ngày bắt đầu</th>
        <th width="15">Ngày kết thúc</th>
    </tr>
    </thead>
    <tbody>

        @foreach($sanpham as $value)
        <tr>
                <td>{{ $value->loaisanpham->nhomsanpham->tennhom }}</td>
                <td>{{ $value->loaisanpham->tenloai }}</td>
                <td>{{ $value->quycach->donvitinh->tendonvitinh }}</td>
                <td>{{ $value->quycach->tenquycach }}</td>
                <td>{{ $value->tensanpham }}</td>
                <td>{{ $value->nguyenlieu ?? ''}}</td>
                <td>{{ $value->tieuchuan ?? ''}}</td>
                <td>{{ $value->dieukienluutru ?? ''}}</td>
                <td>{{ $value->dieukienvanchuyen ?? ''}}</td>
                <td>{{ $value->khoiluongrieng }}</td>
                <td>{{ $value->soluong }}</td>
                <td>{{ $value->dongia }}</td> 
                <td>{{ $value->hansudung ?? ''}}</td> 
                <td>{{ $value->hansudungsaumohop ?? ''}}</td> 
                <td>{{ $value->hinhanh ?? ''}}</td>
                <td>{{ $value->thumuc ?? ''}}</td>  
                @php
                    $phanhang = '';
                    $ngaybatdau = '';
                    $ngayketthuc = '';
                @endphp
                @foreach($value->ChiTiet_PhanHang_SanPham as $chitiet)
                    @php 
                        $phanhang = $chitiet->phanhang_id; 
                        $ngaybatdau = $chitiet->ngaybatdau; 
                        $ngayketthuc = $chitiet->ngayketthuc; 
                    @endphp
                @endforeach
                
                <td>{{ $phanhang }}</td>
                <td>{{ Carbon\Carbon::parse( $ngaybatdau)->format('d-m-Y')}}</td>
                @if( $ngayketthuc != null)
                <td>{{ Carbon\Carbon::parse( $ngayketthuc)->format('d-m-Y')}}</td>
                @else
                <td></td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>