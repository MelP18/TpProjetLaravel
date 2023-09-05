<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    
    /*===================> PAGE CONNEXION <==================*/
    public function userlogin(){
        return view('login');
    }


     /*===================> PAGE INSCRIPTION <==================*/
    public function userSignup(){
        return view('signup');
    }


     /*===================> VALIDATION DE L'INSCRIPTION
     ET ENVOI DU MAIL POUR ACTIVATION DE COMPTE <==================*/
    public function register(Request $request){
        $data = $request->all();


         //  validation du formulaire
        $request->validate([
            'avatar' => 'required',
            'surname'=> 'required | min:2',
            'firstname' => 'required | min:3',
            'birthday' => 'required',
            'email' => 'required |unique:users|regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/',
            'password' => array(
                'required',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&#^_;:,])[A-Za-z\d@$!%?&#^_;:,]{8,}$/',
                'confirmed:password_confirmation'
            ),
        ]);


        $picture = Storage::disk('local')->put('avatars', $request->avatar);


        //Sauvegarde temporiare
        $save = User::create([
            'avatar'=> $picture,
            'surname' => $data['surname'],
            'firstname'=> $data ['firstname'],
            'birthday' =>$data['birthday'],
            'email' => $data['email'],
            'password'=>Hash::make( $data['password'])
        ]); 


        //Création de l'url d'activation
        $url = URL::temporarySignedRoute(
            'verifyEmail', now()->addMinute(30),['email'=> $data['email']]
        );


        //dd($url);
 

        //Envoie de l'url générer par mail pour activation du compte
        //send(view,paramètre,fonction callback)
        Mail::send('mail',['url'=> $url],function($message ) use ($data){
            $config = config('mail');
            $name = $data['surname'].' '.$data ['firstname'];
            $message-> subject('Registration verification !')
                    ->from($config ['from']['address'], $config['from']['name'])//on va yrevenir
                    ->to($data['email'], $name);

        });

        return redirect()->back()->with('message',' Email envoyé! Veuillez confirmer pour activer votre compte !');
    }


     /*===================> VERIFICATION DU USER DU MAIL,
     VERIFICATION DU LIEN ENCORE VALIDE ET MISE À JOUR 
     COLONNES DE E-MAIL VERIFIÉ <==================*/
    public function verify (Request $request, $email){

        $user = User::where('email', $email)->first();
        if(!$user){
            abort(404);
        }

        if(!$request->hasValidSignature()){
            abort(404);
        }

        $user->update([
            'email_verified_at' => now(),
            'email_verified' => true
        ]);

    
        return redirect()->route('login')->with('message', 'Compte activé avec succès');

    }


     /*===================> PAGE DE RENSEIGNEMENT
     DU MAIL POUR MOT DE PASSE OUBLIÉ <==================*/
    public function verifyEmailForgotPassword(){
        return view('forgotPasswordVerifyEmail');
    }


     /*===================> VERIFICATION DE LA SYNTHAXE DE 
     L'EXISTENCE DU MAIL DANS LA BASE DE DONNE
     ET ENVOI DU MAIL POUR CONFIRMATION DE CHANGEMENT DE MOT DE PASSE 
     <==================*/
    public function verifyEmailForgotPasswordSend(Request $request){
        $data = $request->all();
        
        $request->validate([
            'email' => 'required |regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/',
        ]);

        $email = $request->email;
        $user = User::where('email', $email)->first();
        //dd($data);

        if(!$user){
            return redirect()->back()->with('error', 'E-mail invalid!');

        }else{


            $url = URL::temporarySignedRoute(
                'modifyPassword', now()->addMinute(30),['email'=> $data['email']]
            );

            
            Mail::send('modifyPasswordMail',['url'=> $url],function($message ) use ($data){
                $config = config('mail');
                $message-> subject('Modification du Mot de Passe !')
                        ->from($config ['from']['address'], $config['from']['name'])//on va yrevenir
                        ->to($data['email'] );
    
            });
            return redirect()->back()->with('message', 'E-mail envoyé! Veuillez valider la modification de votre Mot de passe par E-mail');

        }; 
        
    }


    /*===================> RECHERCHE DU USER CORRESPONDANT
    À L'ADRESSE MAIL ET REDIRECTION SUR LA PAGE DE CHANGEMENT
    DE MOT DE PASSE<==================*/
    public function modificationPassword(Request $request, $email){
        $data = $request->all();

        $user = User::where('email', $email)->first();
        if(!$user){
            abort(404);
        }

        if(!$request->hasValidSignature()){
            abort(404);
        };

        //dd($email);
        return view('modifyPassword',compact('email'))->with('message', 'Email Confirmer Vous pouvez modifier votre mot de passe');
    }


     /*===================> VERIFICATION DE LA SYNTHAXE 
     ET CHANGEMENT DU MOT DE PASSE DANS LA BASE DE DONNE <==================*/
    public function modifyPasswordSend(Request $request, $email){
        $user = User::where('email', $email)->first();
        $data = $request->all();
        $request->validate([
            'password' => array(
                'required',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&#^_;:,])[A-Za-z\d@$!%?&#^_;:,]{8,}$/',
                'confirmed:password_confirmation'
            )
        ]);

        //$email = $request->email;
        User::where('email', $email)->update([
            'password'=> Hash::make($data['password'])
        ]);

         return redirect()->route('login')->with('message', 'Mot de passe modifié avec succès! Vous pouvez vous connecter!'); 
    }


     /*===================> CONNEXION A LA PLATEFORME <==================*/
    public function authentificationLogin (Request $request){
       
        $user = Auth::attempt([
            'email' =>$request->email,
            'password' => $request->password,
            'email_verified' => true,
        ]);

        if(!$user){
            
            return redirect()->back()->with('error', 'Email/Mot de Passe invalid');
        }

        $userConnect = Auth::user();
        $userConnectAvatar = $userConnect['avatar'];
        return redirect()->route('studentslists','userConnect',);

    }

    
     /*===================> DECONNEXION <==================*/
    public function userlogout(){ 
        Auth::logout();
        return view('login');
    }
}
