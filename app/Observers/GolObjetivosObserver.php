<?php

namespace App\Observers;

use App\Models\{
    golobjetivos,
    User,
    historial_objetivos
};
class GolObjetivosObserver
{
    /**
     * Handle the golobjetivos "created" event.
     *
     * @param  \App\Models\golobjetivos  $golobjetivos
     * @return void
     */
    public function created(golobjetivos $golobjetivos)
    {
        $data = [
            "user_id" => $golobjetivos->user_id,
            "curso_id" => $golobjetivos->curso_id,
            "objetiveOne" => $golobjetivos->objetiveOne,
            "howToMeasureOne" => $golobjetivos->howToMeasureOne,
            "whyOne" => $golobjetivos->whyOne,
            "howToCelebrateOne" => $golobjetivos->howToCelebrateOne,
            "percentageOne" => $golobjetivos->percentageOne,
            "approvedOne" => $golobjetivos->approvedOne,
            "objetiveTwo" => $golobjetivos->objetiveTwo,
            "howToMeasureTwo" => $golobjetivos->howToMeasureTwo,
            "whyTwo" => $golobjetivos->whyTwo,
            "howToCelebrateTwo" => $golobjetivos->howToCelebrateTwo,
            "percentageTwo" => $golobjetivos->percentageTwo,
            "approvedTwo" => $golobjetivos->approvedTwo,
            "objetiveThree" => $golobjetivos->objetiveThree,
            "howToMeasureThree" => $golobjetivos->howToMeasureThree,
            "whyThree" => $golobjetivos->whyThree,
            "howToCelebrateThree" => $golobjetivos->howToCelebrateThree,
            "percentageThree" => $golobjetivos->percentageThree,
            "approvedThree" => $golobjetivos->approvedThree,
            "comment" => $golobjetivos->comment,
            "comment2" => $golobjetivos->comment2,
            "comment3" => $golobjetivos->comment3,
            "approved" => $golobjetivos->approved,
        ];
        
        historial_objetivos::create($data);
    }

    /**
     * Handle the golobjetivos "updated" event.
     *
     * @param  \App\Models\golobjetivos  $golobjetivos
     * @return void
     */
    public function updated(golobjetivos $golobjetivos)
    {

    }

    /**
     * Handle the golobjetivos "deleted" event.
     *
     * @param  \App\Models\golobjetivos  $golobjetivos
     * @return void
     */
    public function deleted(golobjetivos $golobjetivos)
    {
        //
    }

    /**
     * Handle the golobjetivos "restored" event.
     *
     * @param  \App\Models\golobjetivos  $golobjetivos
     * @return void
     */
    public function restored(golobjetivos $golobjetivos)
    {
        //
    }

    /**
     * Handle the golobjetivos "force deleted" event.
     *
     * @param  \App\Models\golobjetivos  $golobjetivos
     * @return void
     */
    public function forceDeleted(golobjetivos $golobjetivos)
    {
        //
    }
}
