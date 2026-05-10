<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Conversation;

class ConversationList extends Component
{
    use WithPagination;

    public $statusFilter = 'all';
    public $search = '';

    public function render()
    {
        $query = Conversation::with(['topic', 'student', 'assignedAdmin', 'tags']);

        if ($this->statusFilter !== 'all') {
            $query->where('status', $this->statusFilter);
        }

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('subject', 'like', '%' . $this->search . '%')
                  ->orWhereHas('student', function ($sq) {
                      $sq->where('name', 'like', '%' . $this->search . '%');
                  })
                  ->orWhereHas('messages', function ($mq) {
                      $mq->where('message_body', 'like', '%' . $this->search . '%');
                  });
            });
        }

        $conversations = $query->latest('last_message_at')->paginate(10);

        return view('livewire.admin.conversation-list', [
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
