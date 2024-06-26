<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {
        return [
            'dashboard' => [
                'icon' => 'home',
                'title' => 'Area Administrativa',
                'route_name' => 'dashboard-overview-1',
                'params' => [
                    'layout' => 'side-menu',
                ],
            ],
            'dashboard2' => [
                'icon' => 'home',
                'title' => 'Area Asistencial',
                'route_name' => 'dashboard-overview-2',
                'params' => [
                    'layout' => 'side-menu',
                ],
            ],
            'file-manager' => [
                'icon' => 'hard-drive',
                'route_name' => 'categories',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Gestion de Servicios'
            ],
            
            'e-commerce' => [
                'icon' => 'trash',
                'route_name' => 'trash',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Papelera de reciclaje',
            ],
            'e-commerce2' => [
                'icon' => 'trash',
                'route_name' => 'add-product',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Soporte',
            ],
        ];
    }
}
