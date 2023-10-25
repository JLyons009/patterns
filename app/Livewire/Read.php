<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Paragraph;

class Read extends Component
{
    public $end;
    public $index      = 1;
    public $paragraphs = [];
    public $steps      = 10;

    public function mount()
    {
        // Determine last index
        $this->end = Paragraph::count();

        // Get first paragraphs
        $this->paragraphs = Paragraph::getNext($this->index, $this->steps, $this->end);

        // Increment index
        $this->index += $this->steps;
    }

    #[Title('Patterns')]
    public function render()
    {
        return view('livewire.read');
    }

    public function scroll()
    {
        // Get next paragraphs
        $new = Paragraph::getNext($this->index, $this->steps, $this->end);

        // Add to current page
        $this->paragraphs = array_merge($this->paragraphs, $new);

        // Increment index
        $this->index += $this->steps;

        // If index is greater than end, wrap the index
        if ($this->index > $this->end) {
            $this->index = $this->index - $this->end;
        }
    }
}
