<?php

namespace App\Http\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{
    public $title;
    public $options = ['First'];
    protected $rules = [
        'title' => 'required|min:3|max:255',
        //min 1 element and max 10
        'options' => 'required|array|min:1|max:10',
        //every item in the array
        'options.*' => 'required|min:1|max:255'
    ];
    protected $messages = [
        'options.*' => 'The option cannot be empty'
    ];
    public function render()
    {
        return view('livewire.create-poll');
    }

    public function addOption()
    {
        $this->options[] = '';
    }
    public function removeOption($index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }
    public function createPoll()
    {
        $this->validate();
        //create a poll, get its options (children) and create many, organize a collection
        //have the collection mapped by going through the array and pulling out a singular
        //then having that singular assigned to a name variable
        //then outputting all of the created options
        $poll = Poll::create([
            'title' => $this->title
        ])->options()->createMany(
            collect($this->options)
                ->map(fn ($option) => ['name' => $option])
                ->all()
        );

        $this->reset(['title', 'options']);
        $this->emit('pollCreated');
    }
}
