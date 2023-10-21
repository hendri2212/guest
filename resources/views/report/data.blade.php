@extends('../index')

@section('header', 'Reports')

@section('content')
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Company Name</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($guest as $key => $data)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $data->full_name }}</td>
                    <td>{{ $data->company }}</td>
                </tr>
                @endforeach
                <tr>
                    <td>Totals</td>
                    <td>{{ $guestFull_name }}</td>
                    <td>{{ $guestCompany }}</td>
                </tr> --}}
            <?php $i = 1; ?>
            @foreach ($guest as $company => $guestCompany)
            <tr>
                <td valign="middle" >{{ $i }}</td>
                <td>
                    @foreach ($guestCompany as $guest)
                        {{ $guest->full_name }} <br>
                    @endforeach
                </td>
                <td valign="middle"> {{ $company }}</td>
            </tr>
            <?php $i++; ?>
            @endforeach
            <tr>
                <td>Totals</td>
                <td>{{ $guestFull_name }}</td>
                <td>belum😁</td>
            </tr>

            </tbody>
        </table>
    </div>
@endsection