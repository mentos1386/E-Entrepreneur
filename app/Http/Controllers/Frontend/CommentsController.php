<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class CommentsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Store newly created resource.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        if (Auth::guest())
        {
            $createComment = new CommentService;

            $validator = $createComment->validator_guest($request->all());

            if ($validator->fails())
            {
                $this->throwValidationException(
                    $request, $validator
                );
            }

            $createComment->create_guest($request->all());

            return redirect(back()->getTargetUrl() . '#comments')
                ->with('message_success', '<strong>Success!</strong> Comment successfully created!');
        }

        $createComment = new CommentService;

        $validator = $createComment->validator_user($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $createComment->create_user($request->all());

        return redirect(back()->getTargetUrl() . '#comments')
            ->with('message_success', '<strong>Success!</strong> Comment successfully created!');
    }


}
