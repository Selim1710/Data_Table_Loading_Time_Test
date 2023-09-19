<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('data_table');
    }

    public function data(Request $request)
    {
        $data = User::orderBy('id', 'desc')
            ->get();

        $table = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $table;
    }
    public function paginateCheck(Request $request)
    {
        $datas = User::orderBy('id', 'desc')
            ->paginate(10);

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
}
