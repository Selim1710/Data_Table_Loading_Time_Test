<!DOCTYPE html>
<html>

<head>
    <title>Laravel Datatable Loading test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" rel="stylesheet">
</head>

<body>
    @php
        use Carbon\Carbon;
    @endphp
    <div class="container">
        <div class="d-flex">
            <h3 class="mb-3 text-center">User Log: </h3>
            <a href="{{ url('/refresh/log') }}" class="mt-2 ms-2">Refresh</a>
        </div>
        <div class="row">
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>User</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $startTime = microtime(true);
                    @endphp

                    {{-- @dd($datas); --}}

                    @php
                        $string_data = '';
                    @endphp
                    @forelse ($datas as $key=>$data)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $data['date'] }}</td>
                            <td>{{ $data['time'] }}</td>
                            <td>{{ $data['user'] }}</td>
                        </tr>

                        @php
                            $string_data .= implode(' ', [$key]) . ' - ' . implode(' ', [$data['date']]) . ' ' . implode('', [$data['time']]) . ", \n";
                        @endphp
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-danger">No data</td>
                        </tr>
                    @endforelse

                    @php
                        $file_location = 'testing_file.text';
                        $file_open = fopen($file_location, 'w+');
                        // writing in text file
                        fwrite($file_open, $string_data);
                        // echo fwrite($file_open, $string_data);
                        fclose($file_open);
                    @endphp


                    @php
                        $endTime = microtime(true);
                        $executionTime = $endTime - $startTime;
                    @endphp

                </tbody>
            </table>
        </div>

        <h5 class="mb-3 text-center d-flex">
            Loading time: &nbsp;
            <p>{{ $executionTime ?? 0 }}</p>
        </h5>
    </div>

    <div class="container d-flex justify-content-between">
        <a href="{{ route('index') }}" class="ps-4">data-table-check</a>
        <a href="{{ url('/log') }}" class="my-4">user-log</a>
    </div>

    <div class="d-flex justify-content-end">
        {{-- <div>{!! $datas->links() !!}</div> --}}
    </div>


</body>

</html>
