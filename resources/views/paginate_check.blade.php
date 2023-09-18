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
        <div class="row">
            <h3 class="mb-3 text-center">Laravel Pagination: </h3>

            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $startTime = microtime(true);
                    @endphp

                    @forelse ($datas as $key=>$data)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-danger">No data</td>
                        </tr>
                    @endforelse

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
            {{-- <p>{{  Carbon::parse($executionTime)->format('s') ?? 0 }}</p> --}}
        </h5>
    </div>
    <div class="d-flex justify-content-between">
        <div><a href="{{ route('index') }}" class="ps-4">Back</a></div>
        <div>{!! $datas->links() !!}</div>
    </div>


</body>

</html>
