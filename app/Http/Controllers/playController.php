<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class playController extends Controller
{
	public function index(){
    	return view('user_view/play/index');
    }

    public function show(Request $req){
    	echo $req->id;
    }

    /*public function certificate(){
    	$view = \View::make('HtmlToPDF');
    	$url_gambar = url('/certificate.jpg');
    	$image = file_get_contents($url_gambar);
    	$html_content = $view->render();

    	PDF::SetTitle('Certificate');
		PDF::AddPage();
		PDF::Image($image, 15, 140, 75, 113, 'JPG', 'http://www.tcpdf.org', '', true, 150, '', false, false, 1, false, false, false);
		PDF::WriteHTML($html_content, true, false, true, false, '');
		PDF::Output('Certificate.pdf');
    }*/
    public function certificate()  
    {  
        date_default_timezone_set('Asia/Jakarta');  
        $now = date('Y-m-d');  
        $nomor="0000";

        // $nis= SiswaMdl::generateNomor($nomor);  
        $nis = "19120089";
        $nomorsertifikat=$nis;      
        // $tampil = SiswaMdl::where('nis','LIKE','%'.$id.'%')->get()->first();  
        $data  = "sesuatu";  
        PDF::SetTitle('Ceritificate of Achievement');  
        PDF::AddPage('L','A4');  
        PDF::setPrintHeader(false);  
        $bMargin = PDF::getBreakMargin();  
        $auto_page_break = PDF::getAutoPageBreak();
        PDF::SetAutoPageBreak(false, 0);  
        $img_file = public_path('/img/certificate.png');  
        PDF::Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);  
        PDF::SetAutoPageBreak($auto_page_break, $bMargin);  
        PDF::setPageMark();  
        $html = '<span style="color:black;text-align:center;font-weight:bold;font-size:80pt;">PAGE 3</span>';  
        PDF::Output(public_path(uniqid().'_new_tab.pdf'),'I');  
        PDF::writeHTML(\View::make('backend.sertifikat.show', compact('data','tampil','nomorsertifikat','now') )->render() );  
    }


}
