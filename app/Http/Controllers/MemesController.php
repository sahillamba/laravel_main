<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Log;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;

class MemesController extends Controller
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

        $data['style'] = $request->input('style');
        $data['top_line'] = strtoupper($request->input('top_line'));
        $data['bottom_line'] = strtoupper($request->input('bottom_line'));

        $image_width = Image::make('meme/meme_'.$data['style'].'.jpg')->width();
        $image_height = Image::make('meme/meme_'.$data['style'].'.jpg')->height();
        $pixels_to_start_top_line =  ($image_width / 2);

        $img = Image::make('meme/meme_'.$data['style'].'.jpg')->text($data['top_line'], $pixels_to_start_top_line, 30, function($font) {
          $font->file('fonts/Impact.ttf');
          $font->size(40);
          $font->color('#fdf6e3');
          $font->align('center');
          $font->valign('top');
        })->text($data['bottom_line'], $pixels_to_start_top_line, ($image_height - 30 ), function($font) {
          $font->file('fonts/Impact.ttf');
          $font->size(40);
          $font->color('#fdf6e3');
          $font->align('center');
          $font->valign('bottom');
        })->save('processed_meme/bar'.$unique_name.'.jpg');

        return response()->json(['data' => [
            'type' => 'text',
            'text' => url('/').'/processed_meme/bar'.$unique_name.'.jpg'
        ]]);
    }

}
?>
