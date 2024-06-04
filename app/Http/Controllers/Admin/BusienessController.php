<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Busieness;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BusienessController extends Controller
{
    public function index()
    {
        $Busieness = Busieness::paginate(10);
        return response()->json($Busieness);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'user_id' => 'required',
            'status' => 'required',
            'opening_hourse' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }
        Busieness::create(array_merge($validator->validated()));
        return response()->json('Busieness is added');
    }
    public function update(Request $request, $id)
    {
        $Busieness = Busieness::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'user_id' => 'required',
            'opening_hourse' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }
        $Busieness->update(array_merge($validator->validated()));
        return response()->json('Busieness is updated');
    }

    public function destroy($id)
    {
        $Busieness = Busieness::findOrFail($id);
        $Busieness->delete();
        return response()->json('Busieness is deleted');
    }
}
