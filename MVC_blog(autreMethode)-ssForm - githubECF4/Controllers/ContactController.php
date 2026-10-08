<?php
// Contrôleur pour la page de contact

namespace App\Controllers; 

// Définition de la classe ContactController
class ContactController extends Controller
{
    // Méthode pour afficher la page de contact
    public function index()
    {
        $this->render('contact/index');
    }
}