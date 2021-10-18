<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use App\User;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!key_exists('query', $_GET)) {
            $restaurants = User::all();

        } else {

            $query = $_GET['query'];
            $searchUsers = User::pluck('name', 'id');
            $searchTags = Tag::pluck('name', 'id');
    
            $dataSearchUsers = [];
            $dataSearchTags = [];
            foreach($searchUsers as $key => $user){
    
                if(strpos(strtolower($user), strtolower($query)) !== false){
                    $dataSearchUsers[] = $key;
                }
            };
    
            foreach ($searchTags as $key => $tag) {
                
                if (strpos(strtolower($tag), strtolower($query)) !== false) {
                    $dataSearchTags[] = $key;
                }
            };

            foreach($dataSearchTags as $tagId) {
                $tag = Tag::find($tagId);
                foreach ($tag->user as $user) {
                    if(!in_array($user->pivot->user_id, $dataSearchUsers)){

                        $dataSearchUsers[] = $user->pivot->user_id;
                    }
                }
            }
    
            $restaurants = User::whereIn('id', $dataSearchUsers)->get();
        }

      
        return UserResource::collection($restaurants);
        
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
    public function show(User $user)
    {
        //$idUser = $user->id;
        //$userNow = User::find($idUser);
        //dd($idUser);
        return new RestaurantResource($user);
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
    public function update(Request $request, User $user)
    {
        
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
