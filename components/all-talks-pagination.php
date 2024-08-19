<div class="all-talks-pagination">
    <div class="page-numbers">
        <?php
            for($pageNumber = 1; $pageNumber<=$pageCount; $pageNumber++) {
                $isPageActive = $pageNumber == $currentPageNumber ? ' active' : '';
                echo "<a href='talks.php?$G_page=$pageNumber' class='pagination-item $isPageActive'>$pageNumber</a>";
            }
        ?>
    </div>
</div>