<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Kullanıcının oturum açıp açmadığını kontrol et
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Lütfen giriş yapınız.');
        }

        // Eğer argüman olarak 'admin' verilmişse admin kontrolü yap
        if (in_array('admin', $arguments)) {
            $user = $session->get('user');
            if (!isset($user['role']) || $user['role'] !== 'admin') {
                return redirect()->to('/')->with('error', 'Bu alana erişim yetkiniz yok.');
            }
        }
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action needed
    }
}
