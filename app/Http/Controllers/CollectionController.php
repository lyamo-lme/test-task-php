<?php

namespace App\Http\Controllers;

use App\Http\Requests\V1\CreateCollectionRequest;
use App\Models\Collection;
use App\Models\Contributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollectionController extends Controller
{
    public function CreateCollection(CreateCollectionRequest $request)
    {
        if ($request->get('target_amount') > 1) {
            $id = DB::table("collections")->insertGetId($request->validated());
            $link = $request->getHttpHost() . "\\collections\\$id";
            $collectionQuery = DB::table("collections")->where('id', '=', $id);
            $collectionQuery->update(['link' => $link]);
            return $collectionQuery->get();
        }
        return response()->json("amount have to be greater than 1", 200);
    }

    public function GetCollections(): array
    {
        return DB::select("select * from collections");
    }

    public function GetCollectionById(int $id)
    {
        $contributors = Collection::find($id)->contributors()->select('user_name','amount')->get();
        $collection =  DB::selectOne("select * from collections where id =?", [$id]);
        $collection->contributors = $contributors;
        return $collection;
    }
    public function GetFilteredCollectionByAmounts(){
        $collections = Collection::where('target_amount', '>', DB::raw('IFNULL((SELECT SUM(amount) FROM contributors WHERE collection_id = collections.id), 0)'))
            ->get();
        return $collections;
    }
}

