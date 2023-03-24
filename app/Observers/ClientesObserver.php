<?php

namespace App\Observers;

use App\Models\Clientes;
use App\Models\historial_curso_client;
class ClientesObserver
{
    /**
     * Handle the Clientes "created" event.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return void
     */
    public function created(Clientes $clientes)
    {
        historial_curso_client::create([
	  "client_id"=>$clientes->id,
	  "curso_id"=>$clientes->curso_id ?? null
	]);
    }

    /**
     * Handle the Clientes "updated" event.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return void
     */
    public function updated(Clientes $clientes)
    {
        if($clientes->isDirty('curso_id')){
	  historial_curso_client::create([
            "client_id"=>$clientes->id,
            "curso_id"=>$clientes->curso_id ?? null
	  ]);
	}
    }

    /**
     * Handle the Clientes "deleted" event.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return void
     */
    public function deleted(Clientes $clientes)
    {
        //
    }

    /**
     * Handle the Clientes "restored" event.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return void
     */
    public function restored(Clientes $clientes)
    {
        //
    }

    /**
     * Handle the Clientes "force deleted" event.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return void
     */
    public function forceDeleted(Clientes $clientes)
    {
        //
    }
}
