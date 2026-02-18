<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class HomeController extends Controller
{
    public function index(): void
    {
        $user = User::findFirst();

        $this->render('Home', [
            'title' => 'TomTroc - Accueil',
            'user' => $user
        ]);
    }
}
