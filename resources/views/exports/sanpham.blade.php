<table>
    <thead>
    <tr>
        <th width="15">Nhóm Sản Phẩm</th>
        <th width="15">Loại Sản Phẩm</th>
        <th width="15">Đơn Vị Tính</th>
        <th width="15">Quy Cách</th>
        <th width="70">Tên sản phẩm</th>
        <th width="15">Nguyên Liệu</th>
        <th width="15">Tiêu Chuẩn</th>
        <th width="15">Điều Kiện Lưu Trữ</th>
        <th width="15">Điều Kiện Vận Chuyển</th>
        <th width="15">Khối Lượng Riêng</th>
        <th width="15">Số lượng </th>
        <th width="15">Đơn giá</th>
        <th width="15">Hạn Sử Dụng</th>
        <th width="15">Hạn Sử Dụng Sau Mở Hộp</th>
        <th width="50">Hình ảnh</th>
    </tr>
    </thead>
    <tbody>

        @foreach($sanpham as $value)
            <tr>
                <td>{{ $value->loaisanpham->nhomsanpham_id }}</td>
                <td>{{ $value->loaisanpham_id }}</td>
                <td>{{ $value->quycach->donvitinh_id }}</td>
                <td>{{ $value->quycach_id }}</td>
                <td>{{ $value->tensanpham }}</td>
                <td>{{ $value->nguyenlieu }}</td>
                <td>{{ $value->tieuchuan }}</td>
                <td>{{ $value->dieukienluutru }}</td>
                <td>{{ $value->dieukienvanchuyen }}</td>
                <td>{{ $value->khoiluongrieng }}</td>
                <td>{{ $value->soluong }}</td>
                <td>{{ $value->dongia }}</td> 
                <td>{{ $value->hansudung }}</td> 
                <td>{{ $value->hansudungsaumohop }}</td> 
                @php
                    $chuoi = '';
                    $arr = array();
                @endphp
                @foreach($value->HinhAnh as $chitiet)
                    @php 
                        array_push($arr,$chitiet->hinhanh);  
                    @endphp
                @endforeach
                @php 
                    $chuoi = implode("?", $arr); 
                @endphp
                <td>{{ $chuoi }}</td>
            </tr>
        @endforeach
    </tbody>
</table>