<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\DTOs\UserDTO;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\Api\UpdateFbTokenRequest;
use App\Http\Traits\SuccessResponse;
use App\Http\Traits\ExceptionHandler;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    use SuccessResponse, ExceptionHandler;

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Get current authenticated user's profile
     */
    public function show(Request $request)
    {
        $user = $request->user();

        return $this->resourceResponse(
            UserDTO::fromModel($user)->toArray(),
            'تم جلب الملف الشخصي بنجاح'
        );
    }

    /**
     * Update current authenticated user's profile
     */
    public function update(UpdateUserRequest $request, UserService $userService)
    {
        $user = $request->user();

        $data = $request->validated();

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar');
        }

        $updated = $userService->update($user->id, $data);

        return $this->resourceResponse(
            UserDTO::fromModel($updated)->toArray(),
            'تم تحديث الملف الشخصي بنجاح'
        );
    }

    /**
     * Store or refresh Firebase Cloud Messaging token for push notifications.
     */
    public function updateFbToken(UpdateFbTokenRequest $request, UserService $userService)
    {
        $user = $request->user();

        $userService->update($user->id, [
            'fb_token' => $request->validated('fb_token'),
        ]);

        $user->refresh();

        return $this->successResponse(
            [
                'fb_token_updated' => true,
            ],
            'تم حفظ رمز الإشعارات بنجاح'
        );
    }

    /**
     * Delete current authenticated user's profile
     */
    public function destroy(Request $request, UserService $userService)
    {
        $user = $request->user();

        $userService->delete($user->id);

        return $this->deletedResponse('تم حذف الملف الشخصي بنجاح');
    }
}
