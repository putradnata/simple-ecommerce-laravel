<html>
    <body>
        <label>Informasi Order :</label><br>
        <label>Pembayaran : {{$data->payment}}</label><br/>
        <label>Nama Penerima : {{$data->name}}</label><br>
        <label>Alamat Pengiriman : {{$data->address}}</label><br>
        <label>Ekspedisi : {{$detail[0]->shipper}}</label><br>

        <label>Daftar Barang :</label><br>
        @foreach ($detail as $d => $detail)
        <li>No. {{ ++$d }}. | {{ $detail->product_name }} | {{ $detail->qty }} | Rp. {{ $detail->price }}</li>
        @endforeach

        <label>Total : Rp. {{$data->total}}</label><br>

        <form action="{{ route('buyer.payment-upload', $id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Bukti Pembayaran</label>
            <input type="file" name="attachment" />
            <button type="submit">Upload</button>
        </form>
    </body>
</html>
