<?php
/* EMAIL SETTINGS */
// Subject
$APP_SUBJECT = "Application Submission";
// Who the submission will be sent to
$APP_TO = array(
	array(
		"name" => "Jeff Hinshaw",
		"email" => "jeffhinshaw@outlook.com"
	)
);
// Who will be CC'd in the email
// Set to NULL to remove
$APP_CC = NULL;
// Who the email will appear to be from
// MUST be an internal email address (@team4d.org)
$APP_FROM = array(
	"name" => "Alerts",
	"email" => "contact@team4d.org"
);

/* FORM SETTINGS */
// Valid Phone Number Formats
$phone_formats = 
	array (
		"(###) ###-####",
		"(###)###-####",
		"###-###-####",
		"##########"
	);
// States
$states = 
	array(
		"AL"=>"Alabama",
		"AK"=>"Alaska",
		"AZ"=>"Arizona",
		"AR"=>"Arkansas",
		"CA"=>"California",
		"CO"=>"Colorado",
		"CT"=>"Connecticut",
		"DE"=>"Deleware",
		"DC"=>"District of Columbia",
		"FL"=>"Florida",
		"GA"=>"Georgia",
		"HI"=>"Hawaii",
		"ID"=>"Idaho",
		"IL"=>"Illinois",
		"IN"=>"Indiana",
		"IA"=>"Iowa",
		"KS"=>"Kansas",
		"KY"=>"Kentucky",
		"LA"=>"Louisiana",
		"ME"=>"Maine",
		"MD"=>"Maryland",
		"MA"=>"Massachusetts",
		"MI"=>"Michigan",
		"MN"=>"Minnesota",
		"MS"=>"Mississippi",
		"MO"=>"Missouri",
		"MT"=>"Montana",
		"NE"=>"Nebraska",
		"NV"=>"Nevada",
		"NH"=>"New Hampshire",
		"NJ"=>"New Jersey",
		"NM"=>"New Mexico",
		"NY"=>"New York",
		"NC"=>"North Carolina",
		"ND"=>"North Dakota",
		"OH"=>"Ohio",
		"OK"=>"Oklahoma",
		"OR"=>"Oregon",
		"PA"=>"Pennsylvania",
		"RI"=>"Rhode Island",
		"SC"=>"South Carolina",
		"SD"=>"South Dakota",
		"TN"=>"Tennessee",
		"TX"=>"Texas",
		"UT"=>"Utah",
		"VT"=>"Vermont",
		"VA"=>"Virginia",
		"WA"=>"Washington",
		"WV"=>"West Virginia",
		"WI"=>"Wisconsin",
		"WY"=>"Wyoming"
	);
// Web Services
// Set "desc" to NULL for user input
// "placeholder" must be added if "desc" is set to NULL
$web_services = 
	array(
		"General" => array(
			array(
				"name" => "WEB_DOMAIN",
				"desc" => "Domain Registration"
			),
			array(
				"name" => "WEB_DESIGN",
				"desc" => "Design and Layout"
			),
			array(
				"name" => "WEB_HOSTING",
				"desc" => "Hosting and Maintenance"
			),
			array(
				"name" => "WEB_VISUALS",
				"desc" => "Visuals (logo, backgrounds, etc.)"
			)
		),
		"Features" => array(
			array(
				"name" => "WEB_ACCOUNTS",
				"desc" => "Accounts and Login"
			),
			array(
				"name" => "WEB_FORUMS",
				"desc" => "Forums"
			),
			array(
				"name" => "WEB_NEWS",
				"desc" => "News Feed"
			),
			array(
				"name" => "WEB_SOCIAL",
				"desc" => "Social Media Integration"
			),
			array(
				"name" => "WEB_CONTACT",
				"desc" => "Contact Form"
			),
			array(
				"name" => "WEB_NEWSLETTER",
				"desc" => "Newsletter Sign-Up"
			),
			array(
				"name" => "WEB_MEDIA",
				"desc" => "Photos and Videos"
			),
			array(
				"name" => "WEB_SEARCH",
				"desc" => "Search Engine Optimization"
			),
			array(
				"name" => "WEB_SHOPPING",
				"desc" => "Online Shopping"
			),
			array(
				"name" => "WEB_PAYMENT",
				"desc" => "Payment Processing"
			),
			array(
				"name" => "WEB_MOBILE",
				"desc" => "Mobile Site"
			),
			array(
				"name" => "WEB_EMAIL",
				"desc" => "Email Accounts"
			),
			array(
				"name" => "WEB_OTHER",
				"desc" => NULL,
				"placeholder" => "Other"
			)
		)
	);
// Mobile Services
// Set "desc" to NULL for user input
// "placeholder" must be added if "desc" is set to NULL
$mobile_services = 
	array(
		"General" => array(
			array(
				"name" => "MOBILE_IOS",
				"desc" => "iOS Application"
			),
			array(
				"name" => "MOBILE_ANDROID",
				"desc" => "Android Application"
			),
			array(
				"name" => "MOBILE_TABLET",
				"desc" => "Tablet Support"
			),
			array(
				"name" => "MOBILE_GRAPHICS",
				"desc" => "Graphics (icon, backgrounds, buttons, etc.)"
			)
		),
		"Features" => array(
			array(
				"name" => "MOBILE_ACCOUNTS",
				"desc" => "Accounts and Login"
			),
			array(
				"name" => "MOBILE_STORAGE",
				"desc" => "Data Storage"
			),
			array(
				"name" => "MOBILE_MESSAGING",
				"desc" => "In-App Messaging"
			),
			array(
				"name" => "MOBILE_NOTIFICATIONS",
				"desc" => "Notifications"
			),
			array(
				"name" => "MOBILE_CAMERA",
				"desc" => "Camera Integration"
			),
			array(
				"name" => "MOBILE_LOCATION",
				"desc" => "Location / Maps Integration"
			),
			array(
				"name" => "MOBILE_CALENDAR",
				"desc" => "Calendar Integration"
			),
			array(
				"name" => "MOBILE_SOCIAL",
				"desc" => "Social Media Integration"
			),
			array(
				"name" => "MOBILE_SHOPPING",
				"desc" => "In-App Shopping"
			),
			array(
				"name" => "MOBILE_PAYMENT",
				"desc" => "In-App Payments"
			),
			array(
				"name" => "MOBILE_RATING",
				"desc" => "Rating Systems"
			),
			array(
				"name" => "MOBILE_BARCODE",
				"desc" => "Barcode / QR Scanner"
			),
			array(
				"name" => "MOBILE_OTHER",
				"desc" => NULL,
				"placeholder" => "Other"
			)
		)
	);
// Social Services
// Set "desc" to NULL for user input
// "placeholder" must be added if "desc" is set to NULL
$social_services = 
	array(
		"General" => array(
			array(
				"name" => "SOCIAL_FACEBOOK",
				"desc" => "Facebook"
			),
			array(
				"name" => "SOCIAL_TWITTER",
				"desc" => "Twitter"
			),
			array(
				"name" => "SOCIAL_OTHER",
				"desc" => NULL,
				"placeholder" => "Other"
			)
		)
	);
?>