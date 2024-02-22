<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ProcessSubmission;
use Illuminate\Validation\ValidationException;

class SubmissionController extends Controller
{
    public function __invoke(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required',
            ]);

            ProcessSubmission::dispatch($request->only('name', 'email', 'message'));

            return response()->json(['message' => 'Submission received'], 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Invalid data input', 'details' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while processing your request'], 500);
        }
    }
}
