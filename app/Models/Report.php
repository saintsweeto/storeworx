<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    const FIELDS = [
        'item_code' => 'Item Code',
        'item_type' => 'Item Type',
        'item_sku' => 'Item SKU',
        'description' => 'Description',
        'comments' => 'Comments',
        'finishes' => 'Finishes',
        'dimensions' => 'Dimensions',
        'current_location' => 'Current Location',
        'total_quantity' => 'Total Quantity',
        'total_available' => 'Total Available',
        'total_damaged' => 'Total Damaged',
        'total_reserved' => 'Total Reserved',
        'movement_type' => 'Movement Type',
        'date_time' => 'Date & Time',
        'job_status' => 'Job Status',
        'job_instructions' => 'Job Instructions',
        'site_contact' => 'Site Contact',
    ];
}
