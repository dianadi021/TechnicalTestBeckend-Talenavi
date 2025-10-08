<?php

namespace App\Models;

use App\Traits\Tools;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TodoList extends Model
{
    use Notifiable, HasFactory, Tools;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'assignee',
        'due_date',
        'time_tracked',
        'status',
        'priority',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function SchemaDataModel(object $req) {}
}
