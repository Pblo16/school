<?php

namespace App;

use WireUi\Traits\WireUiActions;

trait FormTrait
{
    use WireUiActions;

    public $fields;
    public $action;

    public function save()
    {
        $this->validate();
        try {
            if ($this->action == 'store') {
                $this->form->store();
            } else {
                $this->form->update();
            }
            $this->notification()->send([

                'icon' => 'success',

                'title' => 'Notificacion de exito!',

                'description' => 'Esto es una descripcion',

            ]);
            return $this->cancel();
        } catch (\Exception $th) {
            $this->notification()->send([

                'icon' => 'error',

                'title' => 'Notificacion de error!',

                'description' =>  $th,

            ]);
        }
    }

    public function cancel()
    {
        return $this->redirectIntended('index', navigate: true);
    }
}
