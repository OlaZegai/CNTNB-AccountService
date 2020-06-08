<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Utilisateur;
use DB;
use Auth;

class AccountsController extends Controller
{
   public function register(Request $request){ 

    $validation = $this->validate($request , [
        'Nom' => ['required', 'min:1', 'max:50'],
        'Prenom' => ['required', 'min:1', 'max:50'],
        'NomCompagnie' => ['required', 'min:1', 'max:50'],
        'IDCategorie' => ['required'],
        'IDAdresse' => ['required'],
        'NumeroTelephone' => ['required', 'min:10', 'max:15'],
        'Courriel' => ['required','unique:utilisateurs' ,'email:rfc', 'max:255'],
        'Password' => ['required', 'required_with:ConfirmedPassword','min:8', 'max:255'],
        'ConfirmedPassword'=>['required','same:Password'],
        'ZoneService'=>['required'],
        'Status'=>['required']

    ]);
 
    $account = Utilisateur::create($validation);

     return response()->json($account, 201);
    
            
   }

   public function login(Request $request){
      /* $this->validate($request,[
            'Courriel'  => 'required|Courriel',
            'Password'  => 'required|Password'
       ]);


        $user = Contracteur::where('email',$request->Courriel)->first();
        if(!$user)
        {
            return response(['status'=>'error','message'=>'Client non trouvé'])->json($user,401);
        }
        return response()->json($user,200);*/

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
      
          // Authentication passed...
          //redirect to the right view
       }
       else{
            //redirect to the right view
       }
      
   }

   public function logout(Request $request){
       Auth::logout();
       //redirect to the right view
   }

   public function update(Request $request,$id){
        /*$accounts = Utilisateur::findOrFail($id);
        $accounts->update($request->all());

        return response()->json(null, 204);*/

        $validator = Validator::update($request->all(),[
            'Nom' => ['required', 'min:1', 'max:50'],
            'Prenom' => ['required', 'min:1', 'max:50'],
            'NomCompagnie' => ['required', 'min:1', 'max:50'],
            'IDCategorie' => ['required'],
            'IDAdresse' => ['required'],
            'NumeroTelephone' => ['required', 'min:10', 'max:15'],
            'Courriel' => ['required','unique:utilisateurs' ,'email:rfc', 'max:255'],
            'Password' => ['required', 'required_with:ConfirmedPassword','min:8', 'max:255'],
            'ConfirmedPassword'=>['required','same:Password'],
            'ZoneService'=>['required'],
            'Status'=>['required']
        ]);
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());

       }
       return response()->json(null, 204);
   }

   public function delete($id){
        $accounts = Utilisateur::findOrFail($id);
        $accounts->delete();

        return response()->json(null, 204);
   }

   public function getRecord($id){
        return Utilisateur::findOrFail($id);
   }

   public function getAllRecord(){
        $accounts = Utilisateur::all();
        return response()->json($accounts);
   }
}
