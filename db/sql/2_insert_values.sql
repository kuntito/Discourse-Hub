
-- INSERT INTO `customers` (`customerID`, `password_hash`, `customer_forename`, `customer_surname`,`customer_email`, `date_of_birth`) VALUES
-- (1, '$2y$10$qOrhpkdI0Mib.Hizs7.6A.hApiW2HfJIH/iut2Q87m/NbSJRcdbx6', 'Fred', 'Brown', 'fred@test.com', '1985-11-13 00:00:00');

--
-- Dumping data for table `excursions`
--

-- INSERT INTO `events` (`eventID`, `event_title`, `description`, `event_date`, `price_per_person`, `event_imagepath`) VALUES
-- (1, 'October Comedy Night', 'Laugh all night at the very best local comedians','2023-10-20 20:00',25.50, 'AutumnComedyNight.jpg'),
-- (2, 'Family magic show', 'All the family can enjoy the fun of a magic show by the Great Marvella', '2023-11-08 14:00',12.00,'Marvella.jpg');

--
-- Dumping data for table `booking`
--

-- INSERT INTO `booking` (`eventID`, `customerID`, `number_people`,`total_booking_cost`, `booking_notes`) VALUES
-- (1, 1, 2, 51.00,'Wheelchair access needed');
USE discourse_hub;

INSERT INTO `events` (
    `eventID`,
    `event_title`,
    `event_speaker`,
    `description`,
    `event_date`,
    `room`,
    `price_per_person`,
    `event_imagepath`,
    `is_featured`
) VALUES(
    1,
    'How to keep your cool',
    'Weil Smith',
    "Explore the art of maintaining composure under challenging situations. Delve into techniques for managing stress, anger, and anxiety in high-pressure environments. Learn practical strategies for emotional regulation and mindfulness to stay cool and collected.",
    '2024-02-15 18:00',
    'emerald 203',
    12.50,
    '../assets/images/event-1 (pexels-diva-plavalaguna-6150527).jpg',
    1
);

INSERT INTO `events` (
    `eventID`,
    `event_title`,
    `event_speaker`,
    `description`,
    `event_date`,
    `room`,
    `price_per_person`,
    `event_imagepath`,
    `is_featured`
) VALUES(
    2,
    'Why I love diversity',
    'Borys Johnsin',
    "Engage in an insightful discussion on the vital role of diversity in our society. Understand the benefits of inclusive cultures in workplaces, communities, and schools. Explore how embracing differences can lead to innovation, growth, and a richer life experience.",
    '2024-03-22 19:00',
    'sapphire 305',
    14.00,
    '../assets/images/event-2 (yerling-villalobos-r-hssyiKimQ-unsplash).jpg',
    0
);

INSERT INTO `events` (
    `eventID`,
    `event_title`,
    `event_speaker`,
    `description`,
    `event_date`,
    `room`,
    `price_per_person`,
    `event_imagepath`,
    `is_featured`
) VALUES(
    3,
    'My body, My choice',
    'Kaitlyn Jenner',
    "Join a powerful conversation about body autonomy and individual rights. Discover the importance of respecting personal choices, the impact of societal norms on body image, and how to advocate for oneself in matters of health and identity.",
    '2024-04-10 20:00',
    'ruby 107',
    11.00,
    '../assets/images/event-3 (pexels-thisisengineering-3861962).jpg',
    1
);

INSERT INTO `events` (
    `eventID`,
    `event_title`,
    `event_speaker`,
    `description`,
    `event_date`,
    `room`,
    `price_per_person`,
    `event_imagepath`,
    `is_featured`
) VALUES(
    4,
    'The Art of Content Creation',
    'Miya Califa',
    "Explore the dynamic world of online content creation, focusing on innovation, engagement, and quality. Delve into the impact of digital content on audience reach, brand image, and online communities, and discover tools and strategies for crafting compelling digital narratives. Learn about the latest trends in content production and how to effectively harness various platforms to elevate your online presence and connect with your target audience.",
    '2024-05-05 17:00',
    'topaz 204',
    10.50,
    '../assets/images/event-4 (pexels-rdne-stock-project-7240112).jpg',
    0
);

-- INSERT INTO `events` (
--     `eventID`,
--     `event_title`,
--     `event_speaker`,
--     `description`,
--     `event_date`,
--     `room`,
--     `price_per_person`,
--     `event_imagepath`,
--     `is_featured`
-- ) VALUES(
--     4,
--     'Protecting the black community',
--     'NYPD',
--     "This event focuses on the proactive measures for safeguarding the black community. Discuss community policing, building trust between law enforcement and residents, and strategies for creating a safer environment for all community members.",
--     '2024-05-05 17:00',
--     'topaz 204',
--     10.50,
--     '../assets/images/img_rec.jpg',
--     0
-- );

INSERT INTO `events` (
    `eventID`,
    `event_title`,
    `event_speaker`,
    `description`,
    `event_date`,
    `room`,
    `price_per_person`,
    `event_imagepath`,
    `is_featured`
) VALUES(
    5,
    'How to retire early',
    'Jebron Lames',
    "Learn the secrets of retiring early from a high-profile perspective. Gain insights into financial planning, investment strategies, and lifestyle choices that can lead to early retirement. Understand how to balance current desires with long-term goals.",
    '2024-06-18 19:30',
    'opal 309',
    13.00,
    '../assets/images/event-5 (pexels-matheus-bertelli-3321796).jpg',
    0
);

INSERT INTO `events` (
    `eventID`,
    `event_title`,
    `event_speaker`,
    `description`,
    `event_date`,
    `room`,
    `price_per_person`,
    `event_imagepath`,
    `is_featured`
) VALUES(
    6,
    'The merits of Family planning',
    'Elon mosque',
    "Delve into the crucial aspects of family planning and its impact on modern society. Discuss the environmental, economic, and personal benefits of responsible family planning. Explore the latest advancements and options available.",
    '2024-07-21 18:15',
    'amber 210',
    15.00,
    '../assets/images/event-6 (pexels-pavel-danilyuk-8438918).jpg',
    0
);

INSERT INTO `events` (
    `eventID`,
    `event_title`,
    `event_speaker`,
    `description`,
    `event_date`,
    `room`,
    `price_per_person`,
    `event_imagepath`,
    `is_featured`
) VALUES(
    7,
    'Reclaiming your heritage',
    'Ritchie Sunaq',
    "Embark on a journey to discover and reclaim cultural heritage. Discuss the significance of understanding one's roots, the challenges of preserving cultural identity in a globalized world, and ways to connect with one's ancestral heritage.",
    '2024-08-30 20:00',
    'garnet 102',
    11.50,
    '../assets/images/event-7 (pexels-nur-alamin-17694517).jpg',
    0
);

INSERT INTO `events` (
    `eventID`,
    `event_title`,
    `event_speaker`,
    `description`,
    `event_date`,
    `room`,
    `price_per_person`,
    `event_imagepath`,
    `is_featured`
) VALUES(
    8,
    'How to save lives',
    'Josef Stalin',
    "A critical discussion on the various facets of life-saving measures in emergency and health scenarios. Learn about the importance of quick decision-making, the ethics of saving lives, and the impact of modern medicine and technology in critical care.",
    '2024-09-17 19:00',
    'jade 311',
    10.00,
    '../assets/images/event-8 (pexels-alena-darmel-7322232).jpg',
    0
);

INSERT INTO `events` (
    `eventID`,
    `event_title`,
    `event_speaker`,
    `description`,
    `event_date`,
    `room`,
    `price_per_person`,
    `event_imagepath`,
    `is_featured`
) VALUES(
    9,
    'Keeping your in-laws happy',
    'Megan Merkle',
    "Discover effective strategies for maintaining harmonious relationships with in-laws. Understand different cultural expectations, the art of communication, and the importance of setting boundaries for a healthy family dynamic.",
    '2024-10-23 18:30',
    'quartz 208',
    13.50,
    '../assets/images/event-9 (pexels-anastasia-shuraeva-6608313).jpg',
    1
);

INSERT INTO `events` (
    `eventID`,
    `event_title`,
    `event_speaker`,
    `description`,
    `event_date`,
    `room`,
    `price_per_person`,
    `event_imagepath`,
    `is_featured`
) VALUES(
    10,
    'Dating within your age bracket',
    'Lionardo Di Kaprio',
    "Explore the dynamics and challenges of dating within one's age group. Discuss societal expectations, personal preferences, and the psychological aspects of age-related dating. Gain insights into developing meaningful and age-appropriate relationships.",
    '2024-11-11 20:00',
    'diamond 105',
    12.00,
    '../assets/images/event-10 (pexels-henri-mathieusaintlaurent-8345978).jpg',
    0
);

INSERT INTO `events` (
    `eventID`,
    `event_title`,
    `event_speaker`,
    `description`,
    `event_date`,
    `room`,
    `price_per_person`,
    `event_imagepath`,
    `is_featured`
) VALUES(
    11,
    'The dangers of drug abuse',
    'Lil Wayne',
    "Address the critical issue of drug abuse, focusing on prevention, treatment, and recovery. Discuss the impact of addiction on health, relationships, and society, and learn about resources and strategies for overcoming substance abuse challenges.",
    '2024-12-05 19:00',
    'pearl 306',
    14.50,
    '../assets/images/event-11 (lil-wayne-2-chainz-kesha-ward-wedding-miami).jpg',
    0
);

INSERT INTO `events` (
    `eventID`,
    `event_title`,
    `event_speaker`,
    `description`,
    `event_date`,
    `room`,
    `price_per_person`,
    `event_imagepath`,
    `is_featured`
) VALUES(
    12,
    'The dangers of living too long',
    'Elizabeth Queen',
    "Explore the complexities of aging and longevity. Discuss the medical, ethical, and social implications of living a longer life, the challenges of elderly care, and strategies for maintaining health and happiness in later years.",
    '2024-12-15 18:00',
    'lapis 212',
    11.00,
    '../assets/images/event-12 (pexels-nashua-volquezyoung-1729931).jpg',
    0
);
