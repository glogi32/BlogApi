<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orderBy = $request->input("orderBy","date");
        $order = $request->input("order","DESC");
        $perPage = $request->input("per_page",10);
        $page = $request->input("page",1);
        $includeCat = $request->input("include");
        $searchByCat = $request->input("category");

        $posts = Post::select();

        if(!empty($searchByCat)){
            $posts = $posts->whereHas("categories", function(Builder $query) use ($searchByCat){
                $query->where("name","like","%".$searchByCat."%");
            });
        }

        if(($orderBy == "date" || $orderBy == "title") && ($order == "ASC" || $order == "DESC")){
            $orderBy = $orderBy == "date" ? "created_at" : $orderBy;
            $posts = $posts->orderBy($orderBy,$order);
        }

        $totalCount = $posts->count();
        $skip = $perPage * ($page - 1);
        $totalPages = ceil($totalCount/$perPage);

        return response([
            "totalPages" => $totalPages,
            "nextPage" => $totalPages-$page == 0 ? false : true,
            "data" => PostResource::collection($posts->skip($skip)->take($perPage)->get())
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
