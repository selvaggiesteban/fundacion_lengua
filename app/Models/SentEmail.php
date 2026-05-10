<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SentEmail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_id',
        'email_template_id',
        'action_identifier',
        'recipient_email',
        'subject',
        'body',
        'sent_at',
        'success',
        'error_message',
        'entity_type',
        'entity_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'sent_at' => 'datetime',
        'success' => 'boolean',
    ];

    /**
     * Get the student that owns the email.
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    /**
     * Get the email template used.
     */
    public function emailTemplate()
    {
        return $this->belongsTo(EmailTemplate::class);
    }
}
