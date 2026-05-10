<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NotificationCounter extends Component
{
    public $unreadCount = 0;

    public function mount()
    {
        $this->getUnreadCount();
    }

    public function getListeners()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            return [
                "echo:private.App.Models.User.{$userId},.Illuminate\\Notifications\\Events\\BroadcastNotificationCreated" => 'refreshNotifications',
            ];
        }

        return []; // Retorna un array vacío si el usuario no está autenticado
    }

    public function getUnreadCount()
    {
        if (Auth::check()) {
            $this->unreadCount = Auth::user()->unreadNotifications->count();
        }
    }

    public function refreshNotifications()
    {
        $this->getUnreadCount();
    }

    public function render()
    {
        return view('livewire.notification-counter', [
            'unreadCount' => $this->unreadCount,
        ]);
    }
}
