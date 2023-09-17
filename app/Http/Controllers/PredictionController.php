<?php

namespace App\Http\Controllers;

use App\Prediction;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PredictionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth()->user()->can('Show Landslides Predictions')){
        return view('Admin-lte.prediction.index');
        }
        return view('errors.401');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'start'=>'required|integer',
            'end'=>'required|integer'
        ]);
        /**$payload = ['start' => $request->get('start'),
                    'end' => $request->get('end')];
        $prams = json_encode($payload);
        $client = new Client([
            'headers' => ['Content-Type' => 'application/json']
        ]);;
        $res = $client->request('POST', 'http://localhost:5000/api', $prams);
        $prediction = $res->getBody()->getContents();
        return view('Admin-lte.prediction.result', compact('prediction'));
        **/
        // Make Post Fields Array
        $data1 = [
                    'start' => (int)$request->get('start'),
                    'end' => (int)$request->get('end')
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://localhost:5000/temp",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data1),
            CURLOPT_HTTPHEADER => array(
                // Set here requred headers
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $prediction = $response;
            $data['chart_data'] = $prediction;
            $data_arr = json_decode($prediction, true);
            $data2['chart_data'] = $prediction;
            
            return view('Admin-lte.prediction.result', compact('prediction','data', 'data_arr','data2'));
           
        }

    }
    public function pressure(Request $request)
    {
        $request->validate([
            'start'=>'required|integer',
            'end'=>'required|integer'
        ]);
        /**$payload = ['start' => $request->get('start'),
                    'end' => $request->get('end')];
        $prams = json_encode($payload);
        $client = new Client([
            'headers' => ['Content-Type' => 'application/json']
        ]);;
        $res = $client->request('POST', 'http://localhost:5000/api', $prams);
        $prediction = $res->getBody()->getContents();
        return view('Admin-lte.prediction.result', compact('prediction'));
        **/
        // Make Post Fields Array
        $data1 = [
                    'start' => (int)$request->get('start'),
                    'end' => (int)$request->get('end')
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://localhost:5001/pressure",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data1),
            CURLOPT_HTTPHEADER => array(
                // Set here requred headers
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $prediction = $response;
            $data['chart_data'] = $prediction;
            $data_arr = json_decode($prediction, true);
            $data2['chart_data'] = $prediction;
            
            return view('Admin-lte.prediction.pressure', compact('prediction','data', 'data_arr','data2'));
           
        }

    }
    public function humidity(Request $request)
    {
        $request->validate([
            'start'=>'required|integer',
            'end'=>'required|integer'
        ]);
        /**$payload = ['start' => $request->get('start'),
                    'end' => $request->get('end')];
        $prams = json_encode($payload);
        $client = new Client([
            'headers' => ['Content-Type' => 'application/json']
        ]);;
        $res = $client->request('POST', 'http://localhost:5000/api', $prams);
        $prediction = $res->getBody()->getContents();
        return view('Admin-lte.prediction.result', compact('prediction'));
        **/
        // Make Post Fields Array
        $data1 = [
                    'start' => (int)$request->get('start'),
                    'end' => (int)$request->get('end')
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://localhost:5002/humidity",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data1),
            CURLOPT_HTTPHEADER => array(
                // Set here requred headers
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $prediction = $response;
            $data['chart_data'] = $prediction;
            $data_arr = json_decode($prediction, true);
            $data2['chart_data'] = $prediction;
            
            return view('Admin-lte.prediction.humidity', compact('prediction','data', 'data_arr','data2'));
           
        }

    }
    public function rainfull(Request $request)
    {
        $request->validate([
            'start'=>'required|integer',
            'end'=>'required|integer'
        ]);
        /**$payload = ['start' => $request->get('start'),
                    'end' => $request->get('end')];
        $prams = json_encode($payload);
        $client = new Client([
            'headers' => ['Content-Type' => 'application/json']
        ]);;
        $res = $client->request('POST', 'http://localhost:5000/api', $prams);
        $prediction = $res->getBody()->getContents();
        return view('Admin-lte.prediction.result', compact('prediction'));
        **/
        // Make Post Fields Array
        $data1 = [
                    'start' => (int)$request->get('start'),
                    'end' => (int)$request->get('end')
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://localhost:5003/rainfull",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data1),
            CURLOPT_HTTPHEADER => array(
                // Set here requred headers
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $prediction = $response;
            $data['chart_data'] = $prediction;
            $data_arr = json_decode($prediction, true);
            $data2['chart_data'] = $prediction;
            
            return view('Admin-lte.prediction.rainfull', compact('prediction','data', 'data_arr','data2'));
           
        }

    }

    public function horizontal(Request $request)
    {
        $request->validate([
            'start'=>'required|integer',
            'end'=>'required|integer'
        ]);
        /**$payload = ['start' => $request->get('start'),
                    'end' => $request->get('end')];
        $prams = json_encode($payload);
        $client = new Client([
            'headers' => ['Content-Type' => 'application/json']
        ]);;
        $res = $client->request('POST', 'http://localhost:5000/api', $prams);
        $prediction = $res->getBody()->getContents();
        return view('Admin-lte.prediction.result', compact('prediction'));
        **/
        // Make Post Fields Array
        $data1 = [
                    'start' => (int)$request->get('start'),
                    'end' => (int)$request->get('end')
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://localhost:5004/horizontal",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data1),
            CURLOPT_HTTPHEADER => array(
                // Set here requred headers
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $prediction = $response;
        $data['chart_data'] = $prediction;
        $data_arr = json_decode($prediction, true);
        $data2['chart_data'] = $prediction;
            

        //////////
        $curl2 = curl_init();

        curl_setopt_array($curl2, array(
            CURLOPT_URL => "http://localhost:5005/vertical",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data1),
            CURLOPT_HTTPHEADER => array(
                // Set here requred headers
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
            ),
        ));

        $response2 = curl_exec($curl2);
        $err2 = curl_error($curl2);

        curl_close($curl2);

        if ($err2) {
            echo "cURL Error #:" . $err2;
        } else {
            $prediction2 = $response2;
            $data2['chart_data'] = $prediction2;
            $data_arr2 = json_decode($prediction2, true);
            $data22['chart_data'] = $prediction2;

            
            return view('Admin-lte.prediction.horizontal', compact('prediction2','data2', 'data_arr2','data22',
            'prediction','data', 'data_arr','data2'
        ));
           
        }

    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Prediction  $prediction
     * @return \Illuminate\Http\Response
     */
    public function show(Prediction $prediction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prediction  $prediction
     * @return \Illuminate\Http\Response
     */
    public function edit(Prediction $prediction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prediction  $prediction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prediction $prediction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prediction  $prediction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prediction $prediction)
    {
        //
    }
}
