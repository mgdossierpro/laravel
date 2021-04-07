<?php

namespace App\Exceptions;

use Exception;

class InvalidBdException extends Exception
{
     /**
     * Report the exception.
     *
     * @return bool|null
     */
    public function report($e)
    {
        dd($e->getMessage());
        $this->render($e);
      //  return 'Exception reçue : ',  $e->getMessage(), "\n";
    }

    /**
     * Render the exception into a view
     */
    public function render($exception)
    {
        return view('errors.400', ['exception'=>$exception]);
    }
}
