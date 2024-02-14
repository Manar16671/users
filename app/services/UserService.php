<?php 
namespace App\Services;

use Illuminate\Support\Facades\Http;

class UserService
{
    public function getUserName($userId)
    {
        $response = Http::get('http://user-service-url/user/' . $userId);

        if ($response->successful()) {
            return $response->json()['name'];
        }

        return null;
    }
}
