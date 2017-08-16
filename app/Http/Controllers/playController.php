<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class playController extends Controller
{
	public function index(){
    	return view('user_view/play/index');
    }

    public function show(Request $req){
    	echo $req->id;
    }

    public function certificate()  
    {  
        date_default_timezone_set('Asia/Jakarta');  
        $now = date('Y-m-d');  
        $nomor="0000";

        // $nis= SiswaMdl::generateNomor($nomor);  
        $tmp = mt_rand(1,9); //"19120089";
        for ($i=0; $i < 7 ; $i++) { 
            # code...
            $tmp .= mt_rand(0, 9);
        }
        $nomorsertifikat=$tmp;      
        $user = Auth::user()->name;

        PDF::SetTitle('Diajaryuk.com Certificate');  
        PDF::AddPage('L','A4');  
        PDF::setPrintHeader(false);  
        $bMargin = PDF::getBreakMargin();  
        $auto_page_break = PDF::getAutoPageBreak();
        PDF::SetAutoPageBreak(false, 0);  
        // $img_file = public_path('/img/certificate.png');  
        $img_file = public_path('/img/Certificate_Template.png');
        PDF::Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);  
        PDF::SetAutoPageBreak($auto_page_break, $bMargin);  
        PDF::setPageMark();  
        // $html = '<span style="color:black;text-align:center;font-weight:bold;font-size:80pt;">PAGE 3</span>';  
        PDF::writeHTML(\View::make('backend.sertifikat.show', compact('user','nomorsertifikat','now') )->render() );  
        PDF::Output(public_path(uniqid().'_new_tab.pdf'),'I');  
    }


}
