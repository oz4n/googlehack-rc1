<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EGoogleHacks
 * @author Rochak Chauhan
 * @author ozan rock
 */
class EGoogleHacks extends CApplicationComponent {

    private $keyword = "rochakchauhan";
//    private $keyword = "";
    private $lyricsWebsite = "www.lyrics.com";
    private $googleUrl = "http://www.google.com/search?&q=";
    private $regpattern1 = '/<h1 class="r"\>(.*)\<\/h1>/Us';
    private $regpattern2 = '/<h2 class="r"\>(.*)\<\/h2>/Us';
    private $regpattern3 = '/<h3 class="r"\>(.*)\<\/h3>/Us';
    private $regpattern4 = '/<h4 class="r"\>(.*)\<\/h4>/Us';
    private $regpattern5 = '/<h5 class="r"\>(.*)\<\/h5>/Us';
    private $labelPattern = '/<div class="s"\>(.*)\<\/div>/Us';
//    private $labelPattern = '/<a href="(.*)" class=/Us';
//    private $tes = '/<div id="ires"\>(.*)\<div id="foot"\>/Us';
//    private $tes = '/<div id="center_col\">(.*)\<\div id="foot">/Us';
    private $musicURL = '-inurl:(htm|html|php) intitle:"index of" +"last modified" +"parent directory" +description +size +(.mp3|.wma|.ogg) ';   
    private $ebooksURL = '-inurl:(htm|html|php) intitle:"index of" +"last modified" +"parent directory" +description +size +(.txt|.pps|.lit|.odt|.doc|.rtf|.rar|.pdf|.chm) ';
    private $videoURL = '-inurl:(htm|html|php) intitle:"index of" +"last modified" +"parent directory" +description +size +(.mpg|.avi|.flv|.wmv|.di) ';
    private $appsURL = '-inurl:(htm|html|php) intitle:"index of" +"last modified" +"parent directory" +description +size +(.exe|.rar|.zip|.ddl) ';
    private $fontUrl = "space site:http://www.searchfreefonts.com/font OR site:www.dafont.com OR site:http://www.searchfreefonts.com/   -comments -categories.php -comment.php";

    /**
     * constructor function
     * @param string $keywork
     * @return class resource
     */
//    public function __construct() {
//        $this->keyword = $this->handleKeyword('blink 182');
//    }

    /**
     * Function to handle keyword
     *
     * @param string $keyword
     * @return string
     */
    private function handleKeyword($keyword) {
        if (trim(strip_tags($keyword)) != "") {
            return $keyword;
        } else {
            return $this->keyword;
        }
    }

    /**
     * function to return content from an url
     *
     * @param string $url
     * @return string
     */
    private function getHtmlCode($url) {
        $url = $this->googleUrl . $url;
        @ini_set("allow_url_fopen", "Off");
        $returnStr = "";
        $fp = fopen($url, "r");
        while (!feof($fp)) {
            $returnStr.=fgetc($fp);
        }
        fclose($fp);
        return $returnStr;
    }

    private function getLinkArray($str) {
        $returnArray = array();
         $returnArray = array();
        if (count($returnArray) == 0) {
            preg_match_all($this->regpattern3, $str, $returnArray, PREG_SET_ORDER);
        }
        if (count($returnArray) == 0) {
            preg_match_all($this->regpattern4, $str, $returnArray, PREG_SET_ORDER);
        }
        if (count($returnArray) == 0) {
            preg_match_all($this->regpattern5, $str, $returnArray, PREG_SET_ORDER);
        }
        
        $links = array();
        for ($i = 0; $i < count($returnArray); $i++) {
            $links[] = $returnArray[$i][1];
        }
        return str_replace("/url?q=", "", $links);
    }

    /**
     * function to return results only from music sites
     *
     * @param string $keyword
     * @return array
     */
    public function seachMusic($keyword = "") {
        $this->keyword = $this->handleKeyword($keyword);
        $url = urlencode($this->musicURL . '"' . $this->keyword . '"');
        $str = $this->getHtmlCode($url);
        return $this->getLinkArray($str);
    }

    /**
     * function to return results only from ebooks sites
     *
     * @param string $keyword
     * @return array
     */
    public function seachBooks($keyword = "") {
//        $this->keyword = $this->handleKeyword($keyword);
        $url = urlencode($this->ebooksURL . '"' . $this->handleKeyword($keyword) . '"');
        $str = $this->getHtmlCode($url);
        return $this->getLinkArray($str);
    }

    /**
     * function to return results only from videos
     *
     * @param string $keyword
     * @return array
     */
    public function seachVideos($keyword = "") {
        $this->keyword = $this->handleKeyword($keyword);
        $url = urlencode($this->videoURL . '"' . $this->keyword . '"');
        $str = $this->getHtmlCode($url);
        return $this->getLinkArray($str);
    }

    /**
     * function to return results only from applications
     *
     * @param string $keyword
     * @return array
     */
    public function seachApplications($keyword = "") {
        $this->keyword = $this->handleKeyword($keyword);
        $url = urlencode($this->appsURL . '"' . $this->keyword . '"');
        $str = $this->getHtmlCode($url);
        return $this->getLinkArray($str);
    }

    /**
     * function to return results only from lyrics
     *
     * @param string $keyword
     * @return array
     */
    public function seachLyrics($keyword = "") {
        $this->keyword = $this->handleKeyword($keyword);
        $url = urlencode("site:" . $this->lyricsWebsite . ' ' . $this->keyword);
        $str = $this->getHtmlCode($url);
        return $this->getLinkArray($str);
    }

    /**
     * function to return results only from torrent
     *
     * @param string $keyword
     * @return array
     */
    public function seachTorrents($keyword = "") {
        $this->keyword = $this->handleKeyword($keyword);
        $url = urlencode($this->keyword . " filetype:torrent");
        $str = $this->getHtmlCode($url);
        return $this->getLinkArray($str);
    }

    /**
     * function to return results only from font websites
     *
     * @param string $keyword
     * @return array
     */
    public function seachFonts($keyword = "") {
        $this->keyword = $this->handleKeyword($keyword);
        $url = urlencode($this->fontUrl . $this->keyword);
        $str = $this->getHtmlCode($url);
        return $this->getLinkArray($str);
    }

//    private function getLinkArray($str) {
//
//        $returnArray = array();
//        if (count($returnArray) == 0) {
//            preg_match_all($this->regpattern3, $str, $returnArray, PREG_SET_ORDER);
//        }
//        if (count($returnArray) == 0) {
//            preg_match_all($this->regpattern4, $str, $returnArray, PREG_SET_ORDER);
//        }
//        if (count($returnArray) == 0) {
//            preg_match_all($this->regpattern5, $str, $returnArray, PREG_SET_ORDER);
//        }
//
//        $links = array();
//        for ($i = 0; $i < count($returnArray); $i++) {
//            $links[] = $returnArray[$i][1];
//        }
//
//
//        $buffer = "";
//        for ($i = 0; $i < count($links); $i++) {
//            $buffer.=$links[$i] . "\r\n";
//        }
//
//        $returnArray = array();
//        for ($i = 0; $i < count($links); $i++) {
//            $labelArray = array();
//            preg_match_all($this->tes, $str, $labelArray);
//
//            $returnArray[] = array(
//                "link" => $links[$i],
////                "label" => strip_tags($labelArray[$i][$i])
//            );
////            $returnArray[] = $labelArray;
//        }
//
//        return $returnArray;
//    }

}