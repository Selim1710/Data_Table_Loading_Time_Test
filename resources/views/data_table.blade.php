<!DOCTYPE html>
<html>

<head>
    <title> Yajra Datatables Export to Excel Button in Laravel </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <script src="/vendor/datatables/buttons.server-side.js"></script>
</head>

<body>

    <div class="container">
        <h1> Yajra Datatables</h1>
        <h5 class="mb-3 text-center d-flex">
            Loading time: &nbsp;
            <p class="time_showing"></p>
        </h5>
    </div>

    <div class="container">
        {!! $dataTable->table() !!}
    </div>

    <div class="container d-flex justify-content-between">
        <a href="{{ route('laravel.paginate.check') }}" class="my-4">paginate-check</a>
        <a href="{{ url('/log') }}" class="my-4">user-log</a>
    </div>

</body>
{!! $dataTable->scripts() !!}


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

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

</html>
