<?php

namespace App\Http\Livewire\Traits;

trait WithConfirmation
{
    public function confirm($callback, ...$argv)
    {
        $this->emit('confirm', compact('callback', 'argv'));
    }
}