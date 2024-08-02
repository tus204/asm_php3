<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\LienHe;

class LienHeController extends Controller
{
    public $lien_he;
    public function __construct(){
        $this->lien_he = new LienHe();
    }
    public function page_contact(){
        return view('client.contact');
    }

    public function admin_contact(){
        $listLienHe = $this->lien_he->getListLH();
        //dd($listLienHe);
        return view('admin.lien_hes.index',compact('listLienHe'));
    }
}
