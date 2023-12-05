<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOSRequest;
use App\Http\Requests\UploadOSRequest;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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
     * @param  \App\Models\OrderService  $orderService
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderService=OrderService::findOrFail($id);
        return ['os'=>$orderService];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderService  $orderService
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderService=OrderService::findOrFail($id);
        return view('os.edit',compact('orderService'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderService  $orderService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderService $orderService)
    {
        $validatedData = $request->validate([
            'client_nic' => 'required||numeric',
            'os' => 'required|numeric',
        ]);
        //DB::table('order_services')->where('id', '=', $request->id)->delete();
        $order = OrderService::where('id',$request->id)->get();
        if(count($order)==1){
            if($order[0]->update(['client_nic' => $request->client_nic,
        'os' => $request->os])){

            //Storage::makeDirectory('evidencias/'.$request->client_nic.'/'.$request->os);
            Storage::move('evidencias/'.$request->onic.'/'.$request->oos, 'evidencias/'.$request->client_nic.'/'.$request->os);

            return view('listar')->withDetails($order)->withMessage('Se actualizo la orden de servicio');
        }else{
            return view('listar')->withDetails($order)->withMessage('No se pudo actualizar la orden de servicio ');
        }
        }
        
        return view('listar')->withMessage('No se pudo actualizar la orden de servicio ');
        //->delete();
        /*$orderService->user_id=1;
        $orderService->client_nic = $request->client_nic;
        $orderService->os = $request->os;
        $orderService->save();*/
        //OrderService::whereId($request->id)->update($validatedData);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderService  $orderService
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
        $newnic = OrderService::where('client_nic',$request->nic)->get();
        if(count($newnic) == 0){
            $newos = new OrderService([
                'os'     => $os,
                'client_nic'    => $nic,
                'user_id'    => 1,
                
            ]);
            if($newos->save()){
                $msg = ['message'=>'Evidencia subida correctamente a una nueva OS',];
            }else{
                $msg = ['message'=>'Error guardando la OS en la base de datos',];
            }
            
            return $msg;
        }
        $msg = 'Evidencia subida correctamente a la orden existente';
        return $msg;
    }
    public function uploadweb(Request $request)
    {
        if ($request->has('nic')) {
            $nic = $request->nic;
        }else{
            return view('evidencias')->withMessage('Nic es requirido');
        }
        if ($request->has('os')) {
            $os = $request->os;
        }else{
            return view('evidencias')->withMessage('OS es requirido');
        }
        
        if ($request->hasFile('pic')) {
            $image = $request->file("pic");
            $image->move(storage_path("/app/public/evidencias/".$nic."/".$os."/"),$image->getClientOriginalName());
        }else{
            return view('evidencias')->withMessage('Pic es requirido');
        }
        $newnic = OrderService::where('client_nic',$request->nic)->get();
        if(count($newnic) == 0){
            $newos = new OrderService([
                'os'     => $os,
                'client_nic'    => $nic,
                'user_id'    => 1,
                
            ]);
            if($newos->save()){
                $msg = 'Evidencia subida correctamente a una nueva OS';
            }else{
                $msg = 'Error guardando la OS en la base de dato';
            }
            
            return view('evidencias')->withMessage($msg);
        }
        $msg = 'Evidencia subida correctamente a la orden existente';
        return view('evidencias')->withMessage($msg);
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
        if(Auth::user()){
            if(strcmp(Auth::user()->role,"admin")==0){
                return view('listar')->withDetails(OrderService::all());
            }
        }
        return view('welcome')->withMessage('No tienes permiso para usar esa acción');
        
    }
    public function delete($os){
        if(Auth::user()){
            if(strcmp(Auth::user()->role,"admin")==0){
                if(OrderService::where('os',$os)->delete()){
                    //return view('listar')->withMessage('message' => 'Eliminado OS '.$os);
                    return redirect()->action('OrderServiceController@listar')->withMessage('Eliminado OS '.$os);
                }else{
                    //return view('listar')->withMessage('Algo ocurrio eliminando la OS '.$os);
                    return redirect()->action('OrderServiceController@listar')->withMessage('Algo ocurrio eliminando la OS '.$os) ;
                }
            }
        }
        return view('welcome')->withMessage('No tienes permiso para usar esa acción');
    }
    
}
