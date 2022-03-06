<?php

namespace App\Http\Controllers;

use Redirect;
use App\User;
use Auth;
use DB;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;

class UserListImportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getFile()
    {
        
        //$file=$_FILES
        $row = 1;
        if (($handle = fopen($file, "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                $num = count($data);
                echo "<p> $num fields in line $row: <br /></p>\n";
                $row++;
                for ($c = 0; $c < $num; $c++) {
                    echo $data[$c] . "<br />\n";
                }
            }
            fclose($handle);
        }
    }


}
