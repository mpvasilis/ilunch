<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class feedback_guest_form extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('comment', 'textarea')
            ->add('submit', 'submit', ['label' => 'Save form']);
    }
}
