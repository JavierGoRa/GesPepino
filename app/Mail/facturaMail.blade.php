<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Factura;

class FacturaMail extends Mailable
{
    use Queueable, SerializesModels;

    private $factura;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($factura)
    {
        $this->factura = $factura;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.welcomeClient')
            ->with('cliente', $this->factura)
            ->from("javigora97@gmail.com", 'DWES')
            ->subject('Bienvenido a laravel');    
        }
}