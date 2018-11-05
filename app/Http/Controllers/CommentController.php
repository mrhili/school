<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
  User,
  Comment,
  Post
};
use Auth;
class CommentController extends Controller
{
    //
    public function add(Request $request, $type, $id)
    {
      // code...
      $post = Post::find($id);

      $comment = $post->comment([
          'title' => 'no title',
          'body' => $request->body
      ], Auth::user());

      return response()->json($comment);
    }
}
