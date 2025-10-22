<?php

namespace App\Http\Controllers;

use App\Models\JogetUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Str;
use App\Models\Ticket;

class JogetApiController extends Controller
{
    /**
     * A private method to prepare the authenticated API client.
     * This is the reusable part.
     *
     * @return \Illuminate\Http\Client\PendingRequest
     */
    private function getApiClient(): PendingRequest
    {
        // Get credentials from the .env file
        $username = env('JOGET_API_USERNAME');
        $password = env('JOGET_API_PASSWORD');
        $apiId    = env('JOGET_API_ID');
        $apiKey   = env('JOGET_API_KEY');

        // Return the pre-configured HTTP client instance
        return Http::withBasicAuth($username, $password)
            ->withHeaders([
                'api_id' => $apiId,
                'api_key' => $apiKey,
            ]);
    }
    public function syncUser()
    {
        $apiUrl = env('JOGET_API_URL');
        $query = "SELECT * FROM app_fd_sa_ticket";
        $response = $this->getApiClient()
        ->asForm()
        ->post($apiUrl,[
            'query' => $query
        ]);

        if ($response->failed()) {
            // Log the error for debugging
            Log::error('Joget API sync failed.', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);
            // Return an error status
            return ['success' => false, 'message' => 'API request failed.'];
        }

        $usersFromApi = $response->json();
        $syncedCount = 0;

        foreach ($usersFromApi as $apiUser) {
            // Use updateOrCreate to avoid duplicates.
            // It finds a user by 'id' or creates a new one if not found.
            JogetUser::updateOrCreate(
                ['id' => $apiUser['id']], // Unique identifier to find the user
                [
                    // Map API fields to your database columns
                    'username'   => $apiUser['username'],
                    'first_name' => $apiUser['firstName'],
                    'last_name'  => $apiUser['lastName'],
                    'email'      => $apiUser['email'],
                    'password'   => $apiUser['password'], // The 'hashed' cast in your model will re-hash this
                    'is_active'  => $apiUser['active'] === '1', // Convert "1" to true
                    'timezone'   => $apiUser['timeZone'],
                    'locale'     => $apiUser['locale'],
                ]
            );
            $syncedCount++;
        }

        // Return a success status
        return [
            'success' => true,
            'message' => "Successfully synced {$syncedCount} users."
        ];
    }

    public function syncTicket()
    {
        $apiUrl = env('JOGET_API_URL');
        // The query to fetch all ticket records.
        $query = "select * from app_fd_sa_ticket"; 

        try {
            // Making an assumption about your getApiClient() method based on the example.
            // If you're using Laravel's standard HTTP client, this is how you'd do it.
            
            $response = $this->getApiClient()
            ->asForm()
            ->post($apiUrl,[
                'query' => $query
            ]);

            if ($response->failed()) {
                Log::error('Joget Ticket API sync failed.', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                return ['success' => false, 'message' => 'API request failed.'];
            }

            $ticketsFromApi = $response->json();
            $syncedCount = 0;

            foreach ($ticketsFromApi as $apiTicket) {
                $ticketData = [];

                // Map all 'c_' prefixed fields from the API response.
                foreach ($apiTicket as $key => $value) {
                    if (Str::startsWith($key, 'c_')) {
                        // Remove 'c_' prefix and convert the key to snake_case for the model.
                        $newKey = Str::snake(Str::substr($key, 2));
                        $ticketData[$newKey] = $value;
                    }
                }

                // Add the non-prefixed fields directly.
                $ticketData['id'] = $apiTicket['id'];
                $ticketData['dateCreated'] = $apiTicket['dateCreated'] ?? null;
                $ticketData['dateModified'] = $apiTicket['dateModified'] ?? null;
                $ticketData['createdBy'] = $apiTicket['createdBy'] ?? null;
                $ticketData['createdByName'] = $apiTicket['createdByName'] ?? null;
                $ticketData['modifiedBy'] = $apiTicket['modifiedBy'] ?? null;
                $ticketData['modifiedByName'] = $apiTicket['modifiedByName'] ?? null;

                // Use updateOrCreate to avoid duplicates and keep data fresh.
                Ticket::updateOrCreate(
                    ['id' => $apiTicket['id']], // Unique identifier to find the ticket
                    $ticketData
                );
                $syncedCount++;
            }

            return [
                'success' => true,
                'message' => "Successfully synced {$syncedCount} tickets."
            ];

        } catch (Exception $e) {
            Log::error('An exception occurred during ticket sync: ' . $e->getMessage());
            return ['success' => false, 'message' => 'An unexpected error occurred.'];
        }
    }
}
