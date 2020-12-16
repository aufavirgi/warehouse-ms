<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
 
class Dashboard extends Controller
{
    public function index()
    {
        $session = session();
        echo view('dashboard/dashboard_admin');
    }

    public function admin()
    {
        $session = session();
        echo view('dashboard/dashboard_admin_g');
    }

    public function receiver()
    {
        $session = session();
        echo view('dashboard/dashboard_receiver');
    }
}