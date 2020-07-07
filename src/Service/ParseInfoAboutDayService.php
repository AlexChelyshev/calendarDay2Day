<?php


namespace App\Service;

class ParseInfoAboutDayService
{
    /**
     * @return string
     */
    public function parseInfoAboutDay(): string {

        $html = new simple_html_dom();

        $html->load_file( "http://www.calendarium.com.ua/" );

        $element = $html->find( "h1" );
        $finalHTML = $element[0];
        $element = $html->find( "h2" );
        $finalHTML .= $element[0];
        $element = $html->find( ".day-inner h3 a" );

        $html->load_file( "http://www.calendarium.com.ua/".$element[0]->href );
        $element = $html->find( "h2" );
        $finalHTML .=  $element[0];
        $element = $html->find( "span" );
        $finalHTML .=  $element[0];

        return $finalHTML;
    }

}