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
        <div class="">
            <h3 class="mb-3 text-center">User Log </h3>
            <h5 class="mb-3 text-center d-flex">
                Loading time: &nbsp;
                <p class="time_showing"></p>
            </h5>
        </div>
        <div class="d-flex justify-content-between my-2">
            {{-- <a href="{{ url('/refresh/log') }}" class="mt-2 ms-2">Refresh</a> --}}
            <a href="testing_file.text" target="_blank" class="mt-2 ms-2">view text file</a>
        </div>
        <div class="row">
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Time</th>
                        {{-- <th>User</th> --}}
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($datas); --}}
                    @php
                        $string_data = '';
                    @endphp
                    @forelse ($datas as $key=>$data)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $data['date'] }}</td>
                            <td>{{ $data['time'] }}</td>
                            {{-- <td>{{ $data['user'] }}</td> --}}
                        </tr>

                        @php
                            $string_data .= implode('', [$key]) . ' - ' . implode('', [$data['date']]) . ' ' . implode('', [$data['time']]) . " \n";
                        @endphp
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-danger">No data</td>
                        </tr>
                    @endforelse

                    @php
                        $file_location = ('testing_file.text');
                        $file_open = fopen($file_location, 'w+');
                        // writing in text file
                        fwrite($file_open, $string_data);
                        // echo fwrite($file_open, $string_data);
                        fclose($file_open);
                    @endphp
                </tbody>
            </table>
        </div>
    </div>

    <div class="container d-flex justify-content-between">
        <a href="{{ route('index') }}" class="ps-4">data-table-check</a>
        <a href="{{ url('/log') }}" class="my-4">user-log</a>
    </div>

    <div class="d-flex justify-content-end">
        {{-- <div>{!! $datas->links() !!}</div> --}}
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script>
        var beforeload = (new Date()).getTime();

        function getPageLoadTime() {

            //calculate the current time in afterload
            var afterload = (new Date()).getTime();

            // now use the beforeload and afterload to calculate the seconds
            seconds = (afterload - beforeload) / 1000;

            // Place the seconds in the innerHTML to show the results
            $(".time_showing").text(seconds + ' sec(s).');
        }

        window.onload = getPageLoadTime;
    </script>

</body>

</html>
