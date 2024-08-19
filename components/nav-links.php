<?php
    function getListItemClasses($displayOnMobile, $linkDestination, $currentPage) {
        $classes = [];

        // links with `mobile-only` class should only be visible on mobile i.e. breakpoint 768px
        $isMobileOnly = $displayOnMobile ? "mobile-only" : "";
    
        // `currentPage` is declared at the starting php block of every page
        $isLinkActive = $currentPage === $linkDestination ? "active" : "";

        // Add classes to the $classes array if they have values
        if ($isMobileOnly) {
            $classes[] = $isMobileOnly;
        }

        if ($isLinkActive) {
            $classes[] = $isLinkActive;
        }

        // Convert the array to a space-separated string
        return implode(' ', $classes);
    }
    
?>
<?php
    include("../data/nav-links-array.php");
?>
<ul class="nav-links collapsible-content">
    <?php
        foreach ($nav_links_array as $linkText => $linkInfo) {
            $linkDestination = $linkInfo['link'];
            $displayOnMobile = $linkInfo['is_mobile_only'];
            
            $classes = getListItemClasses($displayOnMobile, $linkDestination, $currentPage);
        
            echo "<li class='$classes'>";
            include("../components/link.php");
            echo "</li>";
        }
    ?>
</ul>