<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    const FIELDS = [
        'entry_no' => 'Entry No.',
        'total_qty_avail' => 'Total Qty. Avail.',
        'item_status' => 'Item Status',
        'movement_from' => 'Movement From',
        'comments' => 'Comments',
        'user' => 'User',
        'movement_qty' => 'Movement Qty.',
        'pending_reserved' => 'Pending Reserved',
        'current_location' => 'Current Location',
        'movement_to' => 'Movement To',
        'status' => 'Status',
        'dimensions' => 'Dimensions',
    ];
}
