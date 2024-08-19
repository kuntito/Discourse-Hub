<?php
    $allLinks = [
        "About us 1" => "https://www.pexels.com/photo/brown-and-black-wooden-chairs-inside-room-207691/",
        "About us 2" => "https://www.pexels.com/photo/man-standing-in-front-of-people-1709003/",
        "Event 1" => "https://www.pexels.com/photo/man-in-sweatshirt-in-front-of-people-6150527/",
        "Event 2" => "https://unsplash.com/photos/selective-focus-photography-of-man-wearing-blue-and-white-striped-collared-top-r-hssyiKimQ",
        "Event 3" => "https://www.pexels.com/photo/woman-in-black-tank-top-3861962/",
        "Event 4" => "https://www.pexels.com/photo/woman-in-red-long-sleeve-dress-posing-7240112/",
        "Event 5" => "https://www.pexels.com/photo/photo-of-man-sitting-in-front-3321796/",
        "Event 6" => "https://www.pexels.com/photo/elderly-man-thinking-while-looking-at-a-chessboard-8438918/",
        "Event 7" => "https://www.pexels.com/photo/bangladeshi-boy-17694517/",
        "Event 8" => "https://www.pexels.com/photo/elderly-man-in-gray-long-sleeves-smiling-7322232/",
        "Event 9" => "https://www.pexels.com/photo/a-woman-smiling-holding-the-mug-6608313/",
        "Event 10" => "https://www.pexels.com/photo/a-man-talking-using-microphone-in-the-conference-room-8345978/",
        "Event 11" => "https://www.lilwaynehq.com/images/blog/lil-wayne-2-chainz-kesha-ward-wedding-miami.jpg",
        "Event 12" => "https://www.pexels.com/photo/woman-wearing-red-hat-and-sunglasses-1729931/"
    ];
    
?>
<section class="all-talks-section section-container credits-section">
    <div class="section-header-text">Image credits</div>
    <div class="main-content">
        <div class="credit-links">
            <?php
                foreach ($allLinks as $imageTitle => $link) {                 
                    include("../components/credit-item.php");
                }
            ?>
        </div>
    </div>
</section>