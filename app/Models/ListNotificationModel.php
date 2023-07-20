<?php

namespace App\Models;

use CodeIgniter\Model;

class ListNotificationModel extends Model
{
    protected $table      = 'list_notification';
    protected $primaryKey = 'id_notif';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'to_member_id', 'to_fullname', 'to_user_image',
        'from_member_id', 'from_fullname', 'from_user_image',
        'notification', 'read_status',
    ];
}
