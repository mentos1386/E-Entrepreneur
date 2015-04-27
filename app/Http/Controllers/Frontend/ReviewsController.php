<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\ReviewService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class ReviewsController extends Controller
{

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
        if (Auth::guest()) {
            $createReview = new ReviewService;

            $validator = $createReview->validator_guest($request->all());

            if ($validator->fails()) {
                $this->throwValidationException(
                    $request, $validator
                );
            }

            $createReview->create_guest($request->all());

            return redirect(back()->getTargetUrl() . '#reviews')
                ->with('message_success', '<strong>Success!</strong> Review successfully created!');
        }

        $createReview = new ReviewService;

        $validator = $createReview->validator_user($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $createReview->create_user($request->all());

        return redirect(back()->getTargetUrl() . '#reviews')
            ->with('message_success', '<strong>Success!</strong> Review successfully created!');
    }


}
