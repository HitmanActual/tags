<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class TagController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return List of Rates
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tag::all();
        return $this->successResponse($tags);
    }

    /**
     * Create one new Rate
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[

            
            'category_id'=>'required|integer',

        ]);
        
        $tag = Tag::create($request->all());
        return $this->successResponse($tag,Response::HTTP_CREATED);
    }

    /**
     * get one Tag
     *
     * @return Illuminate\Http\Response
     */
    public function show($tag)
    {
        //
        $tag = Tag::findOrFail($tag);
        return $this->successResponse($tag);
    }

    /**
     * update an existing one Tag
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request,$tag)
    {
        //

        $this->validate($request,[

            
            'category_id'=>'required|integer',

        ]);
        $tag = Tag::findOrFail($tag);
        //--allow to update tag fields only
        $tag->fill([
            $tag->tag_name = $request->tag_name,
            
            ]);

        if($tag->isClean()){
            return $this->errorResponse("you didn't change any value",Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $tag->save();
        return $this->successResponse($tag);
    }

     /**
     * remove an existing one Rate
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($tag)
    {
        //
        $tag = Tag::findOrFail($tag);
        $tag->delete();
        return $this->successResponse($tag);
    }
}

