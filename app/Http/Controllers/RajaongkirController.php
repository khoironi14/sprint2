<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Http;
use Mockery\Exception\InvalidOrderException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RajaongkirController extends Controller
{
    protected $API_KEY = '0df6d5bf733214af6c6644eb8717c92c';
    public function getProvinces(Request $request){

        try {
            $getdata=Http::withHeaders([
                'key'=>$this->API_KEY

            ])->get("https://api.rajaongkir.com/starter/province?id=$request->id");
            $provinces = $getdata['rajaongkir']['results'];
            if($provinces){
                $response=[
                    'message'=>'Data Provinces',
                    'data'=>$provinces

                ];
            }else{
                $response=[
                    'message'=>'Data Provinces Not Available',
                ];

            }

            return response()->json($response, Response::HTTP_OK);

        } catch (InvalidOrderException $th) {
            return response()->json($th, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function getCities(Request $request){

        try {

        $getdata= Http::withHeaders([
            'key'=>$this->API_KEY
        ])->get("https://api.rajaongkir.com/starter/city?province=$request->id");
        $cities=$getdata['rajaongkir']['results'];
            if($cities){
                $response=[
                    'message'=>'Data Cities Available',
                    'data'=>$cities
                ];
            }else{
                $response=[
                'message'=>'Data Cities Not Available',

                ];
            }
            return response()->json($response, Response::HTTP_OK);
        } catch (InvalidOrderException $th) {
            return response()->json($th, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
