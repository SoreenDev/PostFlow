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
