<table>
    <thead>
    <tr>
        <th width="10">Tỉnh</th>
        <th width="10">Huyện</th>
        <th width="10">Xã</th>
        <th width="15">Tên Đường</th>
        <th width="10">Tên Đơn Vị</th>
        <th width="10">Họ Tên Thủ Trưởng</th>
        <th width="10">Email</th>
        <th width="10">Điện Thoại</th>
        <th width="10">Website</th>
        <th width="10">Hình Ảnh</th>
        
    </tr>
    </thead>
    <tbody>

        @foreach($donviquanly as $value)
            <tr>
                <td>{{ $value->xa->huyen->tinh->tentinh }}</td>
                <td>{{ $value->xa->huyen->tenhuyen }}</td>
                <td>{{ $value->xa->tenxa }}</td>
                <td>{{ $value->tenduong }}</td>
                <td>{{ $value->tendonviquanly }}</td>
                <td>{{ $value->tenthutruong }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->SDT }}</td>
                <td>{{ $value->website ?? 'N/A'}}</td>
                <td>{{ $value->hinhanh ?? 'N/A'}}</td>
                
            </tr>
        @endforeach
    </tbody>
</table>