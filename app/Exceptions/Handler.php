<?php namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;

class Handler extends ExceptionHandler {

	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		'Symfony\Component\HttpKernel\Exception\HttpException'
	];

	/**
	 * Report or log an exception.
	 *
	 * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
	 *
	 * @param  \Exception  $e
	 * @return void
	 */
	public function report(Exception $e)
	{
		return parent::report($e);
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Exception  $e
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $e)
	{
		if ($e instanceof TokenMismatchException){
			notify()->flash('Session expired, please click F5','error',[
				'timer' => 3000,
				'text'  => ''
			]);
			return redirect()->to('/');
		}

		if ($this->isHttpException($e))
		{

			switch($e->getStatusCode()){
				case 404:
					notify()->flash('this page no exists','warning',[
						'timer' => 3000,
						'text'  => ''
					]);
					return redirect()->to('/');
					break;
				case 500:
					return redirect()->guest('/500');
			}
		}
		else
		{
			return parent::render($request, $e);
		}
	}

}
