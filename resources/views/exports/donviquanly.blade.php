

<table>
            <thead>
            <tr>
                <th  width="5">STT</th>
                <th  width="20">Tỉnh</th>
                <th  width="20">Huyện</th>
                <th  width="20">Xã</th>
                <th  width="30">Tên Đường</th>
                <th  width="40">Tên Đơn Vị</th>
                <th  width="20">Họ Tên Thủ Trưởng</th>
                <th  width="30">Email</th>
                <th  width="20">Điện Thoại</th>
                <th  width="35">Website</th>
                <th  width="50">Hình Ảnh</th>
                
            </tr>
            </thead>
            <tbody>

                @foreach($donviquanly as $value)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
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