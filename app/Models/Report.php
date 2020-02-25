<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    const FIELDS = [
        'code' => 'Item Type / Code',
        'sku' => 'Item SKU',
        'description' => 'Description',
//        'comments' => 'Comments',
        'finishes' => 'Finishes',
        'dimensions' => 'Dimensions',
        'location' => 'Current Location',
        'quantity' => 'Total Quantity',
        'available' => 'Total Available',
        'damaged' => 'Total Damaged',
        'reserved' => 'Total Reserved',
//        'movement_type' => 'Movement Type',
//        'date_time' => 'Date & Time',
//        'job_status' => 'Job Status',
//        'job_instructions' => 'Job Instructions',
//        'site_contact' => 'Site Contact',
    ];
}
