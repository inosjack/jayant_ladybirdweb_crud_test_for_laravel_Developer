<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
class AdminDashboardController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = 'Dashboard';
    }
    public function index() {
        return View::make('dashboard', $this->data);
    }

}