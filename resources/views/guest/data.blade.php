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
                    <th scope="col">Status</th>
                    
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
                        <form method="POST" action='/guest/' {{ $data->id }}>
                            @csrf
                            <button type="submit" class="btn btn-sm {{ $data->insentive ? 'btn-success' : 'btn-danger' }}">
                                {{ $data->insentive ? 'Done' : 'Undone' }}
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection