<?php


class Cf_PHPMenu {
    
    
    function menu_ul($sel = 'inicio')
   {
        $items = array(
            'inicio' => array(
                'id'     => 'inicio',
                'title'  => 'Home',
                'link'   => ''
            ),
            'about' => array(
                'id'     => 'about',
                'title'  => 'About Us',
                'link'   => 'about'
            ),
            'services' => array(
                'id'     => 'services',
                'title'  => 'Our Services',
                'link'   => 'services'
            ),
            'contact' => array(
                'title'  => 'Contact Us',
                'link'   => 'contact'
            )
        );
        
        $menu = '<ul class="inline" >'.  PHP_EOL;
        foreach($items as $item)
        {
            $current = (in_array($sel, $item)) ? ' class="current"' : '';
            $id = (!empty($item['id'])) ? ' id="'.$item['id'].'"' : '';
            $menu .= '<li'.$current.'><a href="'.$item['link'].'"'.$id.'>'.$item['title'].'</a></li>'."\n";
        }
        $menu .= '</ul>'. PHP_EOL . PHP_EOL;
        return $menu;
    }
    
    function menu_p($sel = 'inicio', $separador = '')
   {
        //$CI =& get_instance();
        $items = array(
            'inicio' => array(
                'id'     => 'inicio',
                'title'  => 'Home',
                'link'   => ''
            ),
            'about' => array(
                'id'     => 'about',
                'title'  => 'About Us',
                'link'   => 'about'
            ),
            'services' => array(
                'id'     => 'services',
                'title'  => 'Our Services',
                'link'   => 'services'
            ),
            'contact' => array(
                'title'  => 'Contact Us',
                'link'   => 'contact'
            )
        );

        $count = count($items);
        $i = 0;
        $menu =  PHP_EOL .'<p class="bottom_nav">';
        foreach($items as $item)
        {
            $current = (in_array($sel, $item)) ? ' class="current"' : '';
            $id = (!empty($item['id'])) ? ' id="'.$item['id'].'"' : '';
            $menu .= '<a'.$current.' href="'.$item['link'].'"'.$id.'>'.$item['title'].'</a>';
            $i++;
            if($count != $i)
            {
                $menu .= ' '.$separador.' ';
            }
        }
        $menu .= '</p>'. PHP_EOL ;
        return $menu;
    }
    
    
}