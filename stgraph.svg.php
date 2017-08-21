<?php

// stgraph.svg - Syntax tree SVG image generator script
// Copyright (c) 2003-2004 Andre Eisenbach <andre@ironcreek.net>
//
// stgraph.svg is part of phpSyntaxTree.
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
// $Id: stgraph.svg,v 1.3 2006/07/21 22:27:52 int2str Exp $

require_once( "src/class.elementlist.php" );
require_once( "src/class.stringparser.php" );
require_once( "src/class.svggraph.php" );

// Start session to retrieve graph data
session_start();

// We force the web server (via .htaccess usually)
//   to treat this file as PHP. Now tell the user agent
//   that we are a PNG image...

if ( !isset( $_GET['debug'] ) )
    header("Content-type: image/svg+xml");
else
    header("Content-type: text/plain");

// Read session data

if ( !isset( $_SESSION['data'] ) )
    exit;

$data = $_SESSION['data'];

$color     = isset( $_SESSION['color'] )     ? $_SESSION['color']     : 0;
$triangles = isset( $_SESSION['triangles'] ) ? $_SESSION['triangles'] : FALSE;
$antialias = isset( $_SESSION['antialias'] ) ? $_SESSION['antialias'] : 0;
$autosub   = isset( $_SESSION['autosub'] )   ? $_SESSION['autosub']   : 0;
$font      = isset( $_SESSION['font'] )      ? $_SESSION['font']      : 'Vera.ttf';
$fontsize  = 12;

// Validate the phrase and draw the tree

$sp = new CStringParser( $data );

if (!$sp->Validate() )
{
    // Display an error if the phrase doesn't validate.
    //   Right now that only means the brackets didn't 
    //   match up. More tests could be added in the future.
    
    print( "Sentence brackets don't match up...<br />\n" );
} else {
    // If all is well, go ahead and draw the graph ...
    
    $sp->Parse();
    
    if ( $autosub )
        $sp->AutoSubscript();
    
    $elist = $sp->GetElementList();
    
    // Draw the graph
    
    $fontpath = dirname( $_SERVER['SCRIPT_FILENAME'] ) . '/ttf/';

    $graph = new CSVGGraph( $elist
        , $color, $antialias, $triangles
        , $fontpath . $font, $fontsize );
    $graph->Draw();
}

?>
