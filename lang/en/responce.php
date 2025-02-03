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


    'non' => 'No message recorded.'
];
