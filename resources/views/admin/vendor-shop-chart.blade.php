<div>
    <h3>Vendor Shops</h3>
    <table border="solid">
        <thead>
        <tr>
            <th>Shop ID</th>
            <th>Shop Name</th>
            <th>Shop Owner Name</th>
            <th>Level</th>
            <th>Status</th>
            <th>Expiration Days</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($shops as $shop)
            <tr>
                <td>{{$shop->shop_id}}</td>
                <td>{{$shop->shop_name}}</td>
                <td>{{$shop->shop_owner_name}}</td>
                <td>{{$shop->shop_level}}</td>
                <td>
                    @if($shop->status == 1)
                        Active
                    @elseif($shop->status == 0)
                        Inactive
                    @endif
                </td>
                <td>Days</td>
                <td><a href="">Active</a> | <a href="">Inactive</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
