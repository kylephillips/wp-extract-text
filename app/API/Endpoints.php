<?php
namespace ExtractText\API;

/**
* Defines our custom WP API endpoints used by the application
*/
class Endpoints
{
	public function __construct()
	{
		add_action( 'rest_api_init', [$this, 'registerRoutes']);
	}

	public function registerRoutes()
	{
		register_rest_route( 'extract-text/v1', '/all/', [
			'methods'  => 'GET',
			'callback' => [$this, 'dealers'],
			'permission_callback' => '__return_true'
		]);
	}

	/**
	* All Text
	* @param $request obj - WP Request object
	*/
	public function allText(\WP_REST_Request $request)
	{
		try {
			// return ( new DealerRepository() )->getDealers($request->get_query_params());
		} catch ( \Exception $e ){
			return [
				'status' => 'error',
				'message' => $e->getMessage()
			];
		}
	}
}