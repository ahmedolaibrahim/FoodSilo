<?php

class FoodSiloController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	 public function showIndex(){
	 	return View::make('index');
	 }
	 public function showForum(){
        return View::make('forum.index')->with('posts', Post::with('user')->get());
    }

    public function comment($post_id){

        $comment = new Comment;
        $comment->post_id = $post_id;
        $comment->user_email = Auth::user()->email;
        $comment->body = Input::get('comment');
        $comment->save();

        $comments = Comment::where('post_id', '=', $post_id)->get();
        return Redirect::to('forum/post/'.$post_id)->with('comments', $comments);
    }

    public function showPost($id){
        $post = Post::find($id);
        $comments = Comment::where('post_id', '=', $id)->get();
        return View::make('forum.article')->with('post', $post)->with('comments', $comments);
    }
    public function showAbout(){
        return View::make('about');
    }
	 public function doSearch(){
	 	$countryName = Input::get('countryName');
       	return Redirect::to('countryData/' . $countryName);
	 }

}
