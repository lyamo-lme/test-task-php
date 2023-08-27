<?php

namespace App\Http\Controllers;

use App\Http\Requests\V1\CreateContributionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContributorsController extends Controller
{
    public function CreateContribution(CreateContributionRequest $request){
        if($request->get('$amount')>1) {
            $id = DB::table("contributors")->insertGetId($request->validated());
            $cont = DB::table("contributors")->find($id);
            return $cont;
        }
        return response()->json("amount have to be greater than 1", 200);
    }
}
