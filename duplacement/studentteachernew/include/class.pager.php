<?php
class Pager 
  { 
  /*********************************************************************************** 
   * int findStart (int limit) 
   * Returns the start offset based on $_GET['page'] and $limit 
   ***********************************************************************************/ 
   function findStart($limit) 
    { 
     if ((!isset($_GET['page'])) || ($_GET['page'] == "1")) 
      { 
       $start = 0; 
       $_GET['page'] = 1; 
      } 
     else 
      { 
       $start = ($_GET['page']-1) * $limit; 
      } 

     return $start; 
    } 
  /*********************************************************************************** 
   * int findPages (int count, int limit) 
   * Returns the number of pages needed based on a count and a limit 
   ***********************************************************************************/ 
   function findPages($count, $limit) 
    { 
     $pages = (($count % $limit) == 0) ? $count / $limit : floor($count / $limit) + 1; 

     return $pages; 
    } 
  /*********************************************************************************** 
   * string pageList (int curpage, int pages) 
   * Returns a list of pages in the format of "« < [pages] > »" 
   ***********************************************************************************/ 
   function pageList($curpage, $pages) 
    { 
     $page_list  = ""; 

     /* Print the first and previous page links if necessary */ 
     if (($curpage != 1) && ($curpage)) 
      { 
       $page_list .= "  <a href=\"".$_SERVER['PHP_SELF']."?page=1"."&amp;category=".$_GET['category']."&amp;subcategory=".$_GET['subcategory']."&amp;filter=".$_GET['filter']."\" title=\"First Page\" class=\"arl10blue_link\">Pre&nbsp;</a> "; 
      } 

     if (($curpage-1) > 0) 
      { 
       $page_list .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage-1)."\" title=\"Previous Page\" class=\"arl10blue_link\"><</a> "; 
      } 

     /* Print the numeric page list; make the current page unlinked and bold */ 
     for ($i=1; $i<=$pages; $i++) 
      { 
       if ($i == $curpage) 
        { 
         $page_list .= "<b>".$i."</b>"; 
        } 
       else 
        { 
         $page_list .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".$i."&amp;category=".$_GET['category']."&amp;subcategory=".$_GET['subcategory']."&amp;filter=".$_GET['filter']."\" title=\"Page ".$i."\" class=\"arl10blue_link\">".$i."</a>"; 
        } 
       $page_list .= " "; 
      } 

     /* Print the Next and Last page links if necessary */ 
     if (($curpage+1) <= $pages) 
      { 
       $page_list .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage+1)."&amp;category=".$_GET['category']."&amp;subcategory=".$_GET['subcategory']."&amp;filter=".$_GET['filter']."\" title=\"Next Page\" class=\"arl10blue_link\">></a> "; 
      } 

     if (($curpage != $pages) && ($pages != 0)) 
      { 
       $page_list .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".$pages."&amp;category=".$_GET['category']."&amp;subcategory=".$_GET['subcategory']."&amp;filter=".$_GET['filter']."\" title=\"Last Page\" class=\"arl10blue_link\">&nbsp;Next</a> "; 
      } 
     $page_list .= "</td>\n"; 

     return $page_list; 
    } 
  /*********************************************************************************** 
   * string nextPrev (int curpage, int pages) 
   * Returns "Previous | Next" string for individual pagination (it's a word!) 
   ***********************************************************************************/ 
   function nextPrev($curpage, $pages) 
    { 
     $next_prev  = ""; 

     if (($curpage-1) <= 0) 
      { 
       $next_prev .= "Previous"; 
      } 
     else 
      { 
       $next_prev .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage-1)."\">Previous</a>"; 
      } 

     $next_prev .= " | "; 

     if (($curpage+1) > $pages) 
      { 
       $next_prev .= "Next"; 
      } 
     else 
      { 
       $next_prev .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage+1)."\">Next</a>"; 
      } 

     return $next_prev; 
    } 
  } 
?> 
