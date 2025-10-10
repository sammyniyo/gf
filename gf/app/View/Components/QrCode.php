<?php

namespace App\View\Components;

use App\Services\QrCodeService;
use Illuminate\View\Component;

class QrCode extends Component
{
    public string $data;
    public int $size;
    public string $qrUrl;
    public string $qrBase64;

    /**
     * Create a new component instance.
     */
    public function __construct(string $data, int $size = 300)
    {
        $this->data = $data;
        $this->size = $size;
        $this->qrUrl = QrCodeService::generateUrl($data, $size);
        $this->qrBase64 = QrCodeService::generate($data, $size);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.qr-code');
    }
}
