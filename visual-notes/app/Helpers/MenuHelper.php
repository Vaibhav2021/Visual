<?php
if( !function_exists('AdminMenu') ){
    function AdminMenu(){

        return array(
            

            array(
                'title' => '',
                'icon'  => 'add',
                'id'  => 'add',
                'url'   => 'javascript:void(0);',
                'routes' => [],
                
            ),

            array(
                'title' => '',
                'icon'  => 'add_home',
                'id'    => 'home',
                'url'   => Route('home'),
                'routes' => ['home'],
              
                'submenus'  => array(
                
                )
            ),

            array(
                'title' => '',
                'icon'  => 'news',
                'id'  => 'news',
                'url'   => Route('my-notes'),
                'routes' => ['my-notes'],
              
                'submenus'  => array(
                
                )
            ),

            array(
                'title' => '',
                'icon'  => ' person_celebrate',
                'id'  => ' person_celebrate',
                'url'   => Route('home'),
                'routes' => [],
              
                'submenus'  => array(
                
                )
            ),
    

            array(
                'title' => '',
                'icon'  => ' collections_bookmark',
                'id'  => ' collections_bookmark',
                'url'   => Route('master.index'),
                'routes' => [],
              
                'submenus'  => array(
                
                )
            ),

            array(
                'title' => '',
                'icon'  => 'settings',
                'id' => 'settings',
                'url'   => Route('settings.index'),
                'routes' => ['settings.index'],
              
                'submenus'  => array(
                
                )
            ),

           

        );
    }
}
?>
