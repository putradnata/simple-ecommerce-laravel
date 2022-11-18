@foreach ($data as $b => $data)
    <tr>
        <td>{{$data->name}}</td>
        @php
            $image = json_decode($data->image);
        @endphp
        <td>@for ($i=0; $i<count($image); $i++)
            <img src="{{ url('/product_image/' . $image[$i]) }}" width="150px" height="150px">
        @endfor</td>
        <td>{{$data->description}}</td>
        <td>{{$data->qty}}</td>
        <td>{{$data->price}}</td>
        <td>{{$data->status}}</td>
    </tr>
@endforeach
