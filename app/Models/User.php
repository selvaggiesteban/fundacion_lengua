<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Role constants
     */
    const ROLE_SUPERADMIN = 'superadmin';
    const ROLE_ADMIN = 'admin';
    const ROLE_STUDENT = 'student';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'student_id',
        'password',
        'role', // Atributo 'role' añadido para asignación masiva
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Check if the user is a SuperAdmin.
     *
     * @return bool
     */
    public function isSuperAdmin(): bool
    {
        return $this->role === self::ROLE_SUPERADMIN;
    }

    /**
     * Check if the user is an Admin.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    /**
     * Check if the user is a Student.
     *
     * @return bool
     */
    public function isStudent(): bool
    {
        return $this->role === self::ROLE_STUDENT;
    }

    /**
     * Get the conversations associated with the user.
     */
    public function conversations()
    {
        // Asumiendo que hay una columna user_id en la tabla de conversaciones
        // que referencia al usuario que inició la conversación.
        // Si el usuario puede ser un admin asignado, se necesita una relación polimórfica
        // o relaciones separadas para 'startedConversations' y 'assignedConversations'.
        // Para este contexto, asumiremos que 'conversations' se refiere a las conversaciones iniciadas por el usuario
        // o donde el usuario es un participante clave.
        return $this->hasMany(Conversation::class, 'user_id');
    }

    /**
     * Get the avatar URL for the user.
     */
    public function getAvatarUrlAttribute(): string
    {
        if ($this->avatar && \Storage::disk('public')->exists($this->avatar)) {
            return asset('storage/' . $this->avatar);
        }
        
        return asset('assets/img/avatars/1.png');
    }

    /**
     * Generate a unique student ID for students
     */
    public function generateStudentId(): string
    {
        if (!$this->isStudent()) {
            return '';
        }

        $year = date('Y');
        $randomNumber = str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT);
        $studentId = 'FLE' . $year . $randomNumber;

        // Ensure uniqueness
        while (self::where('student_id', $studentId)->exists()) {
            $randomNumber = str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT);
            $studentId = 'FLE' . $year . $randomNumber;
        }

        $this->update(['student_id' => $studentId]);
        return $studentId;
    }

    /**
     * Generate a random password for students
     */
    public function generateRandomPassword(): string
    {
        $characters = 'ABCDEFGHJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz23456789';
        $password = '';
        for ($i = 0; $i < 8; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $password;
    }
}