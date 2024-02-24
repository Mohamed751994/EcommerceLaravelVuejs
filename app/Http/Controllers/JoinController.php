<?php

namespace App\Http\Controllers;

use App\Http\Requests\JoinRequest;
use Illuminate\Http\Request;
use App\Traits\MainTrait;
use App\Models\Join;
class JoinController extends Controller
{
    use MainTrait;
    public function join(JoinRequest $request)
    {
        try {
            $data = $request->validated();
            Join::create($data);
            return $this->successResponse('تم إرسال الطلب بنجاح',  []);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }

}
