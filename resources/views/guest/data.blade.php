@extends('../index')

@section('header', 'Data Guest')

@section('content')
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Insentive</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guests as $key => $data)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $data->full_name }}</td>
                    {{-- <td>{{ $data->phone }}</td> --}}
                    <td>{{ substr_replace($data->phone, " * * * * * * *", -7) }}</td>
                    <td>{{ $data->company }}</td>
                    <td>
                        <form method="POST" action={{ url('guest/' . $data->id) }}>
                            @method('PUT')
                            @csrf
                            <button type="submit" onClick="take_snapshot()" class="btn btn-sm {{ $data->insentive ? 'btn-success' : 'btn-danger' }}">
                                {{ $data->insentive ? 'True' : 'False' }}
                            </button>
                            <input type="hidden" name="image" class="image-tag">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div id="my_camera" style="position: absolute; left: -500px; top: 0px; z-index: -3;"></div>
    </div>
    <script language="JavaScript">
        Webcam.set({
            width: 490,
            height: 350,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        
        Webcam.attach( '#my_camera' );
        
        function take_snapshot() {
            Webcam.snap( function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
            } );
        }
    </script>
@endsection