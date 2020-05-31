<?php

namespace App\Http\Controllers;

use App\OrderService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOSRequest;
use App\Http\Requests\UploadOSRequest;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class OrderServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['os'=>'osList','data'=>OrderService::all()], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOSRequest $request)
    {
        $os = new OrderService([
            'os'     => $request->os,
            'client_nic'    => $request->client_nic,
            'user_id'    => 1,
            
        ]);
        if($os->save()){
            $hw = ['message'=>'OS guardada exitosamente',];
        }else{
            $hw = ['message'=>'Error guardando la OS',];
        }
        
        return $hw;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderService  $orderService
     * @return \Illuminate\Http\Response
     */
    public function show(OrderService $orderService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderService  $orderService
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderService $orderService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderService  $orderService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderService $orderService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderService  $orderService
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderService $orderService)
    {
        //
    }
    public function saveBase64ToImage($image,$path,$filename) {
        $path = storage_path($path);// base_path('traffic/upload/users/img/profile/');
        //$base = $_REQUEST['image'];
        $base = $image;
        $binary = base64_decode($base);
        //$binary = base64_decode(urldecode($base));
        header('Content-Type: bitmap; charset=utf-8');

        $f = finfo_open();
        $mime_type = finfo_buffer($f, $binary, FILEINFO_MIME_TYPE);
        $mime_type = str_ireplace('image/', '', $mime_type);

        //$filename = md5(\Carbon\Carbon::now()) . '.' . $mime_type;
        $file = fopen($path . $filename, 'wb');
        if (fwrite($file, $binary)) {
            return $filename;
        } else {
            return FALSE;
        }
        fclose($file);
    }
    public function upload(Request $request)
    {
        
        if ($request->has('nic')) {
            $nic = $request->nic;
        }else{
            return ["message"=>"nic is required"];
        }
        if ($request->has('os')) {
            $os = $request->os;
        }else{
            return ["message"=>"os is required"];
        }
        
        if ($request->hasFile('pic')) {
            $image = $request->file("pic");
            $image->move(storage_path("/app/public/evidencias/".$nic."/".$os."/"),$image->getClientOriginalName());
        }else{
            return ["message"=>"pic is required"];
        }
        
        return ["message"=>"Evidencia subida correctamente"];
    }
    
    public function search(Request $request){
        $q = $request->nic;
        $nic = OrderService::where('client_nic',$q)->orWhere('os',$q)->get();//
        if(count($nic) > 0)
            return view('search')->withDetails($nic)->withQuery ( $q );
        else return view ('search')->withMessage('No item found '.$q);
    }

    public function viewer($nic,$os){
        $data =Storage::files('evidencias/'.$nic.'/'.$os);
        return view('search')->with('images', $data)->with('nic', $nic)->with('os', $os);
        //$path="/";
        //return ['dir'=>Storage::directories($path),'files'=>Storage::files($path)];
        //return $data;
    }

    public function listar(){
        return view('listar')->withDetails(OrderService::all());
    }
}
