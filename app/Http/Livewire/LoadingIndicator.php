<?php

namespace App\Http\Livewire;


use Livewire\Component;

class LoadingIndicator extends Component
{
    public $isLoading = false;

    public function startLoading()
    {
        $this->isLoading = true;

        $this->dispatch(function () {
            sleep(3);
            $this->stopLoading();
        });
    }

    public function stopLoading()
    {
        $this->isLoading = false;
    }

    public function render()
    {
        return view('livewire.loading-indicator');
    }
}
