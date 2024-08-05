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
        $role = auth()->user() ? auth()->user()->getRoleNames()->first() : null;
        $menuSuperAdmin=[
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
            
            'e-commerce3' => [
                'icon' => 'user',
                'route_name' => 'users-layout-1',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Gestion Usuarios',
            ],
            'e-commerce2' => [
                'icon' => 'help-circle',
                'route_name' => 'add-product',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Soporte',
            ],
        ];

        $menuAdministrativo=[
            'dashboard' => [
                'icon' => 'home',
                'title' => 'Area Administrativa',
                'route_name' => 'dashboard-overview-1',
                'params' => [
                    'layout' => 'side-menu',
                ],
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
                'icon' => 'help-circle',
                'route_name' => 'add-product',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Soporte',
            ],
        ];

        $menuAsistencial=[
            'dashboard' => [
                'icon' => 'home',
                'title' => 'Area Asistencial',
                'route_name' => 'dashboard-overview-2',
                'params' => [
                    'layout' => 'side-menu',
                ],
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
                'icon' => 'help-circle',
                'route_name' => 'add-product',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Soporte',
            ],
        ];

        $menu = $role == 'superadmin' ? $menuSuperAdmin :
        ($role == 'asistencial' ? $menuAsistencial :
        ($role == 'administrativa' ? $menuAdministrativo : []));

        return $menu;

    }
}
