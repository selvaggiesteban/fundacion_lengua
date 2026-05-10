<?php

namespace App\Livewire\Student;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;

class ConversationList extends Component
{
    use WithPagination;

    public $statusFilter = 'all';
    public $search = '';

    public function render()
    {
        $query = Auth::user()->conversations()->with(['topic', 'assignedAdmin', 'tags']);

        if ($this->statusFilter !== 'all') {
            $query->where('status', $this->statusFilter);
        }

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('subject', 'like', '%' . $this->search . '%')
                  ->orWhereHas('messages', function ($mq) {
                      $mq->where('message_body', 'like', '%' . $this->search . '%');
                  });
            });
        }

        $conversations = $query->latest('last_message_at')->paginate(10);

        return view('livewire.student.conversation-list', [
            'conversations' => $conversations,
        ]);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedStatusFilter()
    {
        $this->resetPage();
    }
}
