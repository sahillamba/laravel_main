<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use PDF;
use Log;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PDFController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index(Request $request)
    {
        $date = new Carbon();
        $unique_name = $date->timestamp;
        Log::alert('Showing user profile for user: ');
        $data['grav_url'] = $this->get_gravatar($request->input('email'));
        $data['full_name'] = $request->input('full_name');
        $data['phone'] = $request->input('phone_number');
        $data['email'] = 'Mail me at : '.$request->input('email');
        $data['position'] = $request->input('position');
        $data['msg'] = $request->input('msg');
        $data['style'] = $request->input('style');

        $pdf = PDF::loadView('pdf/busniess_card_style_'.$data['style'],$data);
        $pdf->setpaper(array(0, 0, 200, 300), 'potrait')->save('processed_pdf/busniess_card_'.$unique_name.'.pdf');


        return response()->json(['data' => [
            'type' => 'text',
            'text' => url('/').'/processed_pdf/busniess_card_'.$unique_name.'.pdf'
        ]]);
    }


    private function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }

}
?>
