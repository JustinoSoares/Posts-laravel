<?php

namespace App\Http\Controllers;

use App\Models\conversa;
use App\Models\conversa_user;
use App\Models\conversas;
use App\Models\Participante;
use App\Models\User;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\NewMessage;

use Symfony\Contracts\Service\Attribute\Required;

class chatController extends Controller
{
    public function index()
    {
        $user_auth_id = Auth::id();
        $user_auth  = User::find($user_auth_id);
         //pegar todas as conversas do usuário
         $conversas = $user_auth->conversa;
        
         //filtrar as conversas reperidas
         $res = [];
        foreach ($conversas as $c){
         $res[] = $c->id;
         }
        $resUnica = array_unique($res);
        $conversasIn = conversa::select("conversa.*")->whereIn('conversa.id', $resUnica)->get();

        // $participantes = Participante::whereIn("conversa_id",$res)
        // ->where("user_id","!=",$user_auth_id)->get();

        $participantes = Participante::select('user_id')
        ->whereIn('conversa_id', function ($query) use ($user_auth_id) {
            $query->select('conversa_id')
                ->from('participantes')
                ->where('user_id',$user_auth_id);
        })->where("user_id","!=",$user_auth_id)->get();


        // $conversas = conversa::select('conversa.*')
        // ->join(
        //     conversa_user::select('conversa.*', DB::raw('MAX(created_at) as latest_message_date'))
        //         ->groupBy('conversa_id')
        //         ->getQuery(),
        //         function ($join) {
        //         $join->on('conversa.id', '=', 'conversa_user.conversa_id');
        //         })->get();
                 

    
        return view("chat", [
            "user_auth" => $user_auth,
            "user_auth_id" => $user_auth_id,
             "conversasIn" => $conversasIn,
             "res" => $res,   
             "participantes"=> $participantes,       
        ])->with('conversas', $conversas);
    }
    //
    public function privada($id)
    {
        $user_auth_id = Auth::id();
        $user_auth  = User::find($user_auth_id);
        $user_recebe = User::find($id);
        //pegar todas as conversas do usuário
        $conversas = $user_auth->conversa;
        
        // $resultado = collect($conversas)->unique('id')->values()->all();
        $res = [];
       foreach ($conversas as $c) {
        $res[] = $c->id;
       }
        $resUnica = array_unique($res);
        $conversasIn = conversa::select("conversa.*")->whereIn('conversa.id', $resUnica)->get();

        //pegando todos os participantes da conversa para listar 
        $participantes = Participante::select('participantes.user_id')
        ->whereIn('participantes.conversa_id', function ($query) use ($user_auth_id) {
            $query->select('participantes.conversa_id')
                ->from('participantes')
                ->where('user_id',$user_auth_id);
        })
        // ->join("conversa_user", 'participantes.conversa_id','=','conversa_user.conversa_id')
        ->where("participantes.user_id","!=",$user_auth_id)
        ->orderBy("participantes.id","desc")
        ->get();

        $verificar_se_exite_conversa = conversa::whereHas('participantes', function ($query) use ($user_auth_id) {
            $query->where('user_id', $user_auth_id);
        })->whereHas('participantes', function ($query) use ($id) {
            $query->where('user_id', $id);
        })->first();

        if($verificar_se_exite_conversa != null){
                
                $conversa_id = $verificar_se_exite_conversa->id;
                $sms = conversa_user::select("conversa_user.*")
               ->where("conversa_id", $conversa_id)
               ->get();    
        }else{
            $sms = [];
        }



        return view("chat", [
            "user_recebe" => $user_recebe,
            "user_recebe_id" => $id,
            "user_auth" => $user_auth,
            "user_auth_id" => $user_auth_id,
            "conversas" => $conversas,
            "sms" => $sms,
            // "res" => $resultado,
            "conversasIn" =>  $conversasIn,
            "participantes" =>  $participantes,
        ]);
    }


    public function mensagem($id, Request $request)
    {
        //pegar o id do usuário que recebe a mensagem

        $user_auth_id = Auth::id();
        $user_auth  = User::find($user_auth_id);
        $user_recebe = User::find($id);
        //pegar todas as conversas do usuário
        $conversas = $user_auth->conversa;

        $verificar_se_exite_conversa = conversa::whereHas('participantes', function ($query) use ($user_auth_id) {
            $query->where('user_id', $user_auth_id);
        })->whereHas('participantes', function ($query) use ($id){
            $query->where('user_id', $id);
        })->first();

        // $conversa_id = $verificar_se_exite_conversa->id;

        // $conversa_especifica = conversa::find($conversa_id);
        if (empty($verificar_se_exite_conversa)) {
            $nova_conversa = conversa::create([
                "nome_conversa" => "conversa privada"
            ]);
            $participante1 = Participante::create([
                "user_id" => $user_auth_id,
                "conversa_id" => $nova_conversa->id,
            ]);
            $participante2 = Participante::create([
                "user_id" => $id,
                "conversa_id" => $nova_conversa->id,
            ]);
            $mensagem = conversa_user::create([
                "conteudo" => $request->conteudo,
                "user_id" => $user_auth_id,
                "tipo" => "text",
                "conversa_id" => $nova_conversa->id,
            ]);
            // event(new NewMessage($mensagem));
            
            // $mensagens = $nova_conversa->conversa_user;
            return redirect()->route('privada.show', ['user_id' => $id]);
        } else {
            // $sms = $verificar_se_exite_conversa->conversa_user;

            $mensagem = conversa_user::create([
                "conteudo" => $request->conteudo,
                "user_id" => $user_auth_id,
                "tipo" => "text",
                "conversa_id" => $verificar_se_exite_conversa->id,
            ]);
            return redirect()->route('privada.show', ['user_id' => $id]);
        }
        return view("chat", [
            "user_recebe" => $user_recebe,
            "user_auth" => $user_auth,
            "user_auth_id" => $user_auth_id,
            "conversas" => $conversas,
        ]);
    }
}
