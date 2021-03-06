<table>
    <thead>
    <tr>
        <th width="10">Tỉnh</th>
        <th width="10">Huyện</th>
        <th width="10">Xã</th>
        <th width="10">Tên Đường</th>
        <th width="15">Mô Hình Kinh Doanh</th>
        <th width="10">Loại Hình Kinh Doanh</th>
        <th width="10">Mã Số Thuế</th>
        <th width="10">Tên Doanh Nghiệp</th>
        <th width="10">Email</th>
        <th width="10">Điện Thoại</th>
        <th width="10">Website</th>
        <th width="10">Ngày Thành Lập</th>
        <th width="10">Hình Ảnh</th>
        <th width="10">Kinh Độ</th>
        <th width="10">Vĩ Độ</th>
        
    </tr>
    </thead>
    <tbody>

        @foreach($doanhnghiep as $value)
            <tr>
                <td>{{ $value->xa->huyen->tinh->tentinh }}</td>
                <td>{{ $value->xa->huyen->tenhuyen }}</td>
                <td>{{ $value->xa->tenxa }}</td>
                <td>{{ $value->tenduong }}</td>
                <td>{{ $value->mohinhkinhdoanh->tenmohinhkinhdoanh }}</td>
                <td>{{ $value->loaihinhkinhdoanh->tenloaihinhkinhdoanh }}</td>
                <td>{{ $value->masothue }}</td>
                <td>{{ $value->tendoanhnghiep }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->SDT }}</td>
                <td>{{ $value->website ?? ''}}</td>
                <td>{{ Carbon\Carbon::parse( $value->ngaythanhlap)->format('d-m-Y')}}</td>
                <td>{{ $value->hinhanh ?? 'N/A'}}</td>
                <td>{{ $value->kinhdo }}</td>
                <td>{{ $value->vido }}</td>
                
            </tr>
        @endforeach
    </tbody>
</table>