<?php

namespace App\Http\Controllers\Busieness;

use App\Http\Controllers\Controller;
use App\Models\Busieness;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index()
    {
        dd('services');
        $busieness = Busieness::where('user_id',Auth::id())->first();
        $services = Service::where('busieness_id', $busieness)->paginate(10);
        return response()->json($services);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'price' => 'required'
        ]);
        $busieness =  Busieness::where('user_id',Auth::id())->first();
        $service = new Service();
        $service->busieness_id	= 3;
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
       
        $service->save();
        return response()->json('Service is Added');
    }

       public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'price' => 'required'
        ]);
        if($validator->fails())
        {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->save();
        return response()->json('Service is updated');

    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return response()->json('Service is deleted');
    }

 
}
