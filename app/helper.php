<?php 


if (!function_exists('get_api_response')) {
   function get_api_response($url = "", $method = "GET", $header = [], $body = [], $body_type = null)
   {
      $session = Session::all();
      if(isset($session['token']))
         $header['authorization'] = 'Bearer '.$session['token'];

      if($method == "GET")
         $body_type = "query";
      elseif ($body_type == null) 
         $body_type = "form_params";

      $data_send = [
         'headers'   => $header,
         $body_type  => $body
      ];

      $client = new \GuzzleHttp\Client();
      $url = env('URL_API').$url;        

      try {
         try {
            $res = json_decode($client->request($method, $url, $data_send)->getBody()->getContents());
         } catch (\GuzzleHttp\Exception\ClientException $exception) {
            $res = json_decode($exception->getResponse()->getBody()->getContents());
         }  
      } catch (Exception $e) {

      }

      $result_respon  = [
         'code'    => isset($res->status->code) ? $res->status->code : 200,
         'error'   => isset($res->status->error) ? $res->status->error : false,
         'message' => isset($res->status->message) ? $res->status->message : null,
         'data'    => isset($res->data) ? $res->data : null,
         'meta'    => isset($res->meta) ? $res->meta : null,
      ];

      if(isset($result_respon['meta']->token))
         Session::put('token', $result_respon['meta']->token);

      return (object) $result_respon;
   }
}

/**
 * [status_anggota description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
function status_anggota($id)
{
   $user = App\ModelUser::where('id', $id)->first();

   switch ($user->status) {
      case 1:
         return "<a class=\"btn btn-danger btn-xs\"><i class=\"fa fa-ban\"></i> Inactive</a>";
         break;
      case 2:
            return "<a class=\"btn btn-success btn-xs\"><i class=\"fa fa-check\"></i> Active</a>";
         break;
      case 3:
         return "<a class=\"btn btn-danger btn-xs\"><i class=\"fa fa-ban\"></i> Reject</a>";
         break;
      default:
         return "<a class=\"btn btn-warning btn-xs\"><i class=\"fa fa-ban\"></i> Inactive</a>";
         break;
   }
}