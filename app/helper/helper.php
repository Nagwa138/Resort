<?php


function is_active(string $routeName)
 {
        return null !== request()->segment(2) && request()->segment(2) == $routeName ? 'active' : ' ' ;
 }

function getLocation()
{
       $location = array('Alexandria','MarthMatroh', 'RasElbar', 'Gmasa', 'Baltem', 'SharmElshaikh', 'Maraina', 'ElsahalElshmaly','Grdagha', 'Safagia', 'MarsAlam', 'ELsmalliay','PorSaid','Elsawas');

       return $location;
}

?>
