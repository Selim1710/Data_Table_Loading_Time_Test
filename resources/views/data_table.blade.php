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
    <div class="container">
        <div class="row">
            <h3 class="mb-3 text-center">Datatable: </h3>
            <h5 class="mb-3 text-center d-flex">
                Loading time: &nbsp;
                <p class="time_showing"></p>
                {{-- This page took {{ microtime(true) - LARAVEL_START }} seconds --}}
            </h5>
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        {{-- <th width="100px">Action</th> --}}
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="container d-flex justify-content-between">
        <a href="{{ route('laravel.paginate.check') }}" class="my-4">paginate-check</a>
        <a href="{{ url('/log') }}" class="my-4">user-log</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            // var startTime = 10;
            var startTime = @json(microtime(true));

            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                "ajax": {
                    "type": "GET",
                    "url": "/data",
                    // "success": function() {
                    //     alert("Done!");
                    // }
                },
                "drawCallback": function() {
                    // var endTime = 15;
                    var endTime = @json(microtime(true));
                    
                    var executionTime = parseFloat(endTime) - parseFloat(startTime);
                    $('.time_showing').text(executionTime + ' Second');

                    // $('.time_showing').text('startTime: ' + startTime+' endTime: ' + endTime + ' executionTime: ' + executionTime);
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    // {data: 'action', name: 'action', orderable: false, searchable: false},
                ]

            });
            // var endTime = @json(microtime(true));
            // var executionTime = parseFloat(endTime) - parseFloat(startTime);
            // $('.time_showing').text(executionTime);

            // console.log(table);

            // var time = @json(microtime(true) - LARAVEL_START);
            // $('.time_showing').text(time);
        });
    </script>


    {{-- 
        $startTime = microtime(true);
        $users = User::get();
        $endTime = microtime(true);  
        $executionTime = $endTime - $startTime;

  --}}
</body>

</html>
