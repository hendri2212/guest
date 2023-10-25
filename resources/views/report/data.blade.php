@extends('../index')

@section('header', 'Reports')

@section('content')

    <form action="/report" method="post">
        @method('get')
        @csrf
        {{-- <input type="radio" id="hari_ini" name="filter_tanggal" value="hari_ini">
        <label for="hari_ini">Hari ini</label>
        <input type="radio" id="minggu_ini" name="filter_tanggal" value="minggu_ini">
        <label for="minggu_ini">Minggu ini</label>
        <input type="radio" id="bulan_ini" name="filter_tanggal" value="bulan_ini">
        <label for="bulan_ini">Bulan ini</label> --}}

        <select name="filter_tanggal" id="filter_tanggal">
            <option value=""></option>
            <option value="hari_ini">Hari ini</option>
            <option value="kemaren">Kemaren</option>
            <option value="minggu_ini">Minggu ini</option>
            <option value="minggu_kemaren">Minggu kemaren</option>
            <option value="bulan_ini">Bulan ini</option>
            <option value="bulan_kemaren">Bulan kemaren</option>
        </select>
        <button type="submit" class="btn btn-primary">filter</button>
    </form>

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