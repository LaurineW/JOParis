<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MessageInfo extends Component
{
    /**
     * The information titre.
     *
     * @var string
     */
    public $titre;

    /**
     * The information message.
     *
     * @var string
     */
    public $message;

    /**
     * Create the component instance.
     *
     * @param string $titre
     * @param string $message
     * @return void
     */
    public function __construct($titre, $message) {
        $this->titre = $titre;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render() {
        return view('components.message-info');
    }
}
