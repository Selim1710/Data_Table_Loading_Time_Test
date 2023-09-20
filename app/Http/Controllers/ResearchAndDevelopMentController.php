<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Http;
use App\DataTables\UsersDataTable;

class ResearchAndDevelopMentController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('data_table');
    }

    public function paginateCheck(Request $request)
    {
        $datas = User::orderBy('id', 'desc')
            ->paginate(50);

        return view('paginate_check', compact('datas'));
    }

    public function log()
    {
        $client = new \GuzzleHttp\Client();
        $get_response = $client->request('GET', 'https://acquaintbd.net/test/eduNextSRM/user/log/view');
        $datas = json_decode($get_response->getBody(), true);

        return view('user_log', compact('datas'));
    }

    public function refreshLog()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://acquaintbd.net/test/eduNextSRM/user/log', [
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'user' => 'guest',
        ]);

        return back();
    }

    public function writingInTextFile()
    {
        $file_location = 'testing_file.text';

        // Open a file named - $file_location - in write mode
        $data = fopen($file_location, "w");

        // writing content to a file using fwrite() function
        echo fwrite($data, "hello");

        // closing the file
        fclose($data);
    }
}
