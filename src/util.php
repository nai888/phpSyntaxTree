<?php

// util.php - Helper functions
// Copyright (c) 2003-2005 Andre Eisenbach <andre@ironcreek.net>
//
// util.php is part of phpSyntaxTree.
//
// This program is free software; you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation; either version 2 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
//
// $Id$

function GetVar( $name, $default = NULL )
{
    if ( isset( $_GET[$name] ))
        return $_GET[$name];

    if ( isset( $_POST[$name] ))
        return $_POST[$name];

    if ( isset( $_SESSION[$name] ))
        return $_SESSION[$name];

    return $default;
}
