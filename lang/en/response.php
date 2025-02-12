<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Response Messages
    |--------------------------------------------------------------------------
    |
    | This file contains common response messages used throughout the API.
    | Keeping responses centralized improves maintainability and consistency.
    |
    */

    'non' => 'No message recorded.',

    'success' => [
        'index' => ':items list retrieved successfully.',
        'show' => ':item details retrieved successfully.',
        'store' => ':item created successfully.',
        'update' => ':item updated successfully.',
        'deleted' => ':item deleted successfully.',
    ],

    'error' => [
        'index' => 'Failed to retrieve :items list.',
        'show' => 'Failed to retrieve :item details.',
        'store' => 'Failed to create :item.',
        'update' => 'Failed to update :item.',
        'deleted' => 'Failed to delete :item.',
    ],

    'status' => [
        200 => 'Request was successful.',
        201 => 'Successfully created.',
        202 => 'Request accepted for processing.',
        204 => 'Request successful, but no content returned.',
        400 => 'Bad request. Please check your input.',
        404 => ':item not found.',
        429 => 'Too many requests. Please slow down.',
        500 => 'Internal server error. Please try again later.',
    ],

    'file' => [
        'error' => [
            'upload' => 'Failed to upload :item.',
            'retrieve' => 'Failed to retrieve :item file.',
            'delete' => 'Failed to delete :item file.',
            'rename' => 'Failed to rename :item file.',
            'move' => 'Failed to move :item file.',
            'store' => 'Failed to store :item file.',
        ],

        'success' => [
            'upload' => ':item uploaded successfully.',
            'retrieve' => ':item retrieved successfully.',
            'delete' => ':item deleted successfully.',
            'rename' => ':item renamed successfully.',
            'move' => ':item moved successfully.',
            'store' => ':item stored successfully.',
        ],
    ],

];
