<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
}
