<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_code');
            $table->string('country_code');
            $table->timestamps();
        });

        DB::table('countries')->insert(
            array(
                ["phone_code" => "93", "country_code" => "AF", "name" => "Afghanistan"],
                ["phone_code" => "358", "country_code" => "AX", "name" => "Aland Islands"],
                ["phone_code" => "355", "country_code" => "AL", "name" => "Albania"],
                ["phone_code" => "213", "country_code" => "DZ", "name" => "Algeria"],
                ["phone_code" => "1684", "country_code" => "AS", "name" => "American Samoa"],
                ["phone_code" => "376", "country_code" => "AD", "name" => "Andorra"],
                ["phone_code" => "244", "country_code" => "AO", "name" => "Angola"],
                ["phone_code" => "1264", "country_code" => "AI", "name" => "Anguilla"],
                ["phone_code" => "672", "country_code" => "AQ", "name" => "Antarctica"],
                ["phone_code" => "1268", "country_code" => "AG", "name" => "Antigua and Barbuda"],
                ["phone_code" => "54", "country_code" => "AR", "name" => "Argentina"],
                ["phone_code" => "374", "country_code" => "AM", "name" => "Armenia"],
                ["phone_code" => "297", "country_code" => "AW", "name" => "Aruba"],
                ["phone_code" => "61", "country_code" => "AU", "name" => "Australia"],
                ["phone_code" => "43", "country_code" => "AT", "name" => "Austria"],
                ["phone_code" => "994", "country_code" => "AZ", "name" => "Azerbaijan"],
                ["phone_code" => "1242", "country_code" => "BS", "name" => "Bahamas"],
                ["phone_code" => "973", "country_code" => "BH", "name" => "Bahrain"],
                ["phone_code" => "880", "country_code" => "BD", "name" => "Bangladesh"],
                ["phone_code" => "1246", "country_code" => "BB", "name" => "Barbados"],
                ["phone_code" => "375", "country_code" => "BY", "name" => "Belarus"],
                ["phone_code" => "32", "country_code" => "BE", "name" => "Belgium"],
                ["phone_code" => "501", "country_code" => "BZ", "name" => "Belize"],
                ["phone_code" => "229", "country_code" => "BJ", "name" => "Benin"],
                ["phone_code" => "1441", "country_code" => "BM", "name" => "Bermuda"],
                ["phone_code" => "975", "country_code" => "BT", "name" => "Bhutan"],
                ["phone_code" => "591", "country_code" => "BO", "name" => "Bolivia"],
                ["phone_code" => "599", "country_code" => "BQ", "name" => "Bonaire, Sint Eustatius and Saba"],
                ["phone_code" => "387", "country_code" => "BA", "name" => "Bosnia and Herzegovina"],
                ["phone_code" => "267", "country_code" => "BW", "name" => "Botswana"],
                ["phone_code" => "55", "country_code" => "BV", "name" => "Bouvet Island"],
                ["phone_code" => "55", "country_code" => "BR", "name" => "Brazil"],
                ["phone_code" => "246", "country_code" => "IO", "name" => "British Indian Ocean Territory"],
                ["phone_code" => "673", "country_code" => "BN", "name" => "Brunei Darussalam"],
                ["phone_code" => "359", "country_code" => "BG", "name" => "Bulgaria"],
                ["phone_code" => "226", "country_code" => "BF", "name" => "Burkina Faso"],
                ["phone_code" => "257", "country_code" => "BI", "name" => "Burundi"],
                ["phone_code" => "855", "country_code" => "KH", "name" => "Cambodia"],
                ["phone_code" => "237", "country_code" => "CM", "name" => "Cameroon"],
                ["phone_code" => "1", "country_code" => "CA", "name" => "Canada"],
                ["phone_code" => "238", "country_code" => "CV", "name" => "Cape Verde"],
                ["phone_code" => "1345", "country_code" => "KY", "name" => "Cayman Islands"],
                ["phone_code" => "236", "country_code" => "CF", "name" => "Central African Republic"],
                ["phone_code" => "235", "country_code" => "TD", "name" => "Chad"],
                ["phone_code" => "56", "country_code" => "CL", "name" => "Chile"],
                ["phone_code" => "86", "country_code" => "CN", "name" => "China"],
                ["phone_code" => "61", "country_code" => "CX", "name" => "Christmas Island"],
                ["phone_code" => "672", "country_code" => "CC", "name" => "Cocos (Keeling) Islands"],
                ["phone_code" => "57", "country_code" => "CO", "name" => "Colombia"],
                ["phone_code" => "269", "country_code" => "KM", "name" => "Comoros"],
                ["phone_code" => "242", "country_code" => "CG", "name" => "Congo"],
                ["phone_code" => "242", "country_code" => "CD", "name" => "Congo, Democratic Republic of the Congo"],
                ["phone_code" => "682", "country_code" => "CK", "name" => "Cook Islands"],
                ["phone_code" => "506", "country_code" => "CR", "name" => "Costa Rica"],
                ["phone_code" => "225", "country_code" => "CI", "name" => "Cote D'Ivoire"],
                ["phone_code" => "385", "country_code" => "HR", "name" => "Croatia"],
                ["phone_code" => "53", "country_code" => "CU", "name" => "Cuba"],
                ["phone_code" => "599", "country_code" => "CW", "name" => "Curacao"],
                ["phone_code" => "357", "country_code" => "CY", "name" => "Cyprus"],
                ["phone_code" => "420", "country_code" => "CZ", "name" => "Czech Republic"],
                ["phone_code" => "45", "country_code" => "DK", "name" => "Denmark"],
                ["phone_code" => "253", "country_code" => "DJ", "name" => "Djibouti"],
                ["phone_code" => "1767", "country_code" => "DM", "name" => "Dominica"],
                ["phone_code" => "1809", "country_code" => "DO", "name" => "Dominican Republic"],
                ["phone_code" => "593", "country_code" => "EC", "name" => "Ecuador"],
                ["phone_code" => "20", "country_code" => "EG", "name" => "Egypt"],
                ["phone_code" => "503", "country_code" => "SV", "name" => "El Salvador"],
                ["phone_code" => "240", "country_code" => "GQ", "name" => "Equatorial Guinea"],
                ["phone_code" => "291", "country_code" => "ER", "name" => "Eritrea"],
                ["phone_code" => "372", "country_code" => "EE", "name" => "Estonia"],
                ["phone_code" => "251", "country_code" => "ET", "name" => "Ethiopia"],
                ["phone_code" => "500", "country_code" => "FK", "name" => "Falkland Islands (Malvinas)"],
                ["phone_code" => "298", "country_code" => "FO", "name" => "Faroe Islands"],
                ["phone_code" => "679", "country_code" => "FJ", "name" => "Fiji"],
                ["phone_code" => "358", "country_code" => "FI", "name" => "Finland"],
                ["phone_code" => "33", "country_code" => "FR", "name" => "France"],
                ["phone_code" => "594", "country_code" => "GF", "name" => "French Guiana"],
                ["phone_code" => "689", "country_code" => "PF", "name" => "French Polynesia"],
                ["phone_code" => "262", "country_code" => "TF", "name" => "French Southern Territories"],
                ["phone_code" => "241", "country_code" => "GA", "name" => "Gabon"],
                ["phone_code" => "220", "country_code" => "GM", "name" => "Gambia"],
                ["phone_code" => "995", "country_code" => "GE", "name" => "Georgia"],
                ["phone_code" => "49", "country_code" => "DE", "name" => "Germany"],
                ["phone_code" => "233", "country_code" => "GH", "name" => "Ghana"],
                ["phone_code" => "350", "country_code" => "GI", "name" => "Gibraltar"],
                ["phone_code" => "30", "country_code" => "GR", "name" => "Greece"],
                ["phone_code" => "299", "country_code" => "GL", "name" => "Greenland"],
                ["phone_code" => "1473", "country_code" => "GD", "name" => "Grenada"],
                ["phone_code" => "590", "country_code" => "GP", "name" => "Guadeloupe"],
                ["phone_code" => "1671", "country_code" => "GU", "name" => "Guam"],
                ["phone_code" => "502", "country_code" => "GT", "name" => "Guatemala"],
                ["phone_code" => "44", "country_code" => "GG", "name" => "Guernsey"],
                ["phone_code" => "224", "country_code" => "GN", "name" => "Guinea"],
                ["phone_code" => "245", "country_code" => "GW", "name" => "Guinea-Bissau"],
                ["phone_code" => "592", "country_code" => "GY", "name" => "Guyana"],
                ["phone_code" => "509", "country_code" => "HT", "name" => "Haiti"],
                ["phone_code" => "0", "country_code" => "HM", "name" => "Heard Island and Mcdonald Islands"],
                ["phone_code" => "39", "country_code" => "VA", "name" => "Holy See (Vatican City State)"],
                ["phone_code" => "504", "country_code" => "HN", "name" => "Honduras"],
                ["phone_code" => "852", "country_code" => "HK", "name" => "Hong Kong"],
                ["phone_code" => "36", "country_code" => "HU", "name" => "Hungary"],
                ["phone_code" => "354", "country_code" => "IS", "name" => "Iceland"],
                ["phone_code" => "91", "country_code" => "IN", "name" => "India"],
                ["phone_code" => "62", "country_code" => "ID", "name" => "Indonesia"],
                ["phone_code" => "98", "country_code" => "IR", "name" => "Iran, Islamic Republic of"],
                ["phone_code" => "964", "country_code" => "IQ", "name" => "Iraq"],
                ["phone_code" => "353", "country_code" => "IE", "name" => "Ireland"],
                ["phone_code" => "44", "country_code" => "IM", "name" => "Isle of Man"],
                ["phone_code" => "972", "country_code" => "IL", "name" => "Israel"],
                ["phone_code" => "39", "country_code" => "IT", "name" => "Italy"],
                ["phone_code" => "1876", "country_code" => "JM", "name" => "Jamaica"],
                ["phone_code" => "81", "country_code" => "JP", "name" => "Japan"],
                ["phone_code" => "44", "country_code" => "JE", "name" => "Jersey"],
                ["phone_code" => "962", "country_code" => "JO", "name" => "Jordan"],
                ["phone_code" => "7", "country_code" => "KZ", "name" => "Kazakhstan"],
                ["phone_code" => "254", "country_code" => "KE", "name" => "Kenya"],
                ["phone_code" => "686", "country_code" => "KI", "name" => "Kiribati"],
                ["phone_code" => "850", "country_code" => "KP", "name" => "Korea, Democratic People's Republic of"],
                ["phone_code" => "82", "country_code" => "KR", "name" => "Korea, Republic of"],
                ["phone_code" => "381", "country_code" => "XK", "name" => "Kosovo"],
                ["phone_code" => "965", "country_code" => "KW", "name" => "Kuwait"],
                ["phone_code" => "996", "country_code" => "KG", "name" => "Kyrgyzstan"],
                ["phone_code" => "856", "country_code" => "LA", "name" => "Lao People's Democratic Republic"],
                ["phone_code" => "371", "country_code" => "LV", "name" => "Latvia"],
                ["phone_code" => "961", "country_code" => "LB", "name" => "Lebanon"],
                ["phone_code" => "266", "country_code" => "LS", "name" => "Lesotho"],
                ["phone_code" => "231", "country_code" => "LR", "name" => "Liberia"],
                ["phone_code" => "218", "country_code" => "LY", "name" => "Libyan Arab Jamahiriya"],
                ["phone_code" => "423", "country_code" => "LI", "name" => "Liechtenstein"],
                ["phone_code" => "370", "country_code" => "LT", "name" => "Lithuania"],
                ["phone_code" => "352", "country_code" => "LU", "name" => "Luxembourg"],
                ["phone_code" => "853", "country_code" => "MO", "name" => "Macao"],
                ["phone_code" => "389", "country_code" => "MK", "name" => "Macedonia, the Former Yugoslav Republic of"],
                ["phone_code" => "261", "country_code" => "MG", "name" => "Madagascar"],
                ["phone_code" => "265", "country_code" => "MW", "name" => "Malawi"],
                ["phone_code" => "60", "country_code" => "MY", "name" => "Malaysia"],
                ["phone_code" => "960", "country_code" => "MV", "name" => "Maldives"],
                ["phone_code" => "223", "country_code" => "ML", "name" => "Mali"],
                ["phone_code" => "356", "country_code" => "MT", "name" => "Malta"],
                ["phone_code" => "692", "country_code" => "MH", "name" => "Marshall Islands"],
                ["phone_code" => "596", "country_code" => "MQ", "name" => "Martinique"],
                ["phone_code" => "222", "country_code" => "MR", "name" => "Mauritania"],
                ["phone_code" => "230", "country_code" => "MU", "name" => "Mauritius"],
                ["phone_code" => "269", "country_code" => "YT", "name" => "Mayotte"],
                ["phone_code" => "52", "country_code" => "MX", "name" => "Mexico"],
                ["phone_code" => "691", "country_code" => "FM", "name" => "Micronesia, Federated States of"],
                ["phone_code" => "373", "country_code" => "MD", "name" => "Moldova, Republic of"],
                ["phone_code" => "377", "country_code" => "MC", "name" => "Monaco"],
                ["phone_code" => "976", "country_code" => "MN", "name" => "Mongolia"],
                ["phone_code" => "382", "country_code" => "ME", "name" => "Montenegro"],
                ["phone_code" => "1664", "country_code" => "MS", "name" => "Montserrat"],
                ["phone_code" => "212", "country_code" => "MA", "name" => "Morocco"],
                ["phone_code" => "258", "country_code" => "MZ", "name" => "Mozambique"],
                ["phone_code" => "95", "country_code" => "MM", "name" => "Myanmar"],
                ["phone_code" => "264", "country_code" => "NA", "name" => "Namibia"],
                ["phone_code" => "674", "country_code" => "NR", "name" => "Nauru"],
                ["phone_code" => "977", "country_code" => "NP", "name" => "Nepal"],
                ["phone_code" => "31", "country_code" => "NL", "name" => "Netherlands"],
                ["phone_code" => "599", "country_code" => "AN", "name" => "Netherlands Antilles"],
                ["phone_code" => "687", "country_code" => "NC", "name" => "New Caledonia"],
                ["phone_code" => "64", "country_code" => "NZ", "name" => "New Zealand"],
                ["phone_code" => "505", "country_code" => "NI", "name" => "Nicaragua"],
                ["phone_code" => "227", "country_code" => "NE", "name" => "Niger"],
                ["phone_code" => "234", "country_code" => "NG", "name" => "Nigeria"],
                ["phone_code" => "683", "country_code" => "NU", "name" => "Niue"],
                ["phone_code" => "672", "country_code" => "NF", "name" => "Norfolk Island"],
                ["phone_code" => "1670", "country_code" => "MP", "name" => "Northern Mariana Islands"],
                ["phone_code" => "47", "country_code" => "NO", "name" => "Norway"],
                ["phone_code" => "968", "country_code" => "OM", "name" => "Oman"],
                ["phone_code" => "92", "country_code" => "PK", "name" => "Pakistan"],
                ["phone_code" => "680", "country_code" => "PW", "name" => "Palau"],
                ["phone_code" => "970", "country_code" => "PS", "name" => "Palestinian Territory, Occupied"],
                ["phone_code" => "507", "country_code" => "PA", "name" => "Panama"],
                ["phone_code" => "675", "country_code" => "PG", "name" => "Papua New Guinea"],
                ["phone_code" => "595", "country_code" => "PY", "name" => "Paraguay"],
                ["phone_code" => "51", "country_code" => "PE", "name" => "Peru"],
                ["phone_code" => "63", "country_code" => "PH", "name" => "Philippines"],
                ["phone_code" => "64", "country_code" => "PN", "name" => "Pitcairn"],
                ["phone_code" => "48", "country_code" => "PL", "name" => "Poland"],
                ["phone_code" => "351", "country_code" => "PT", "name" => "Portugal"],
                ["phone_code" => "1787", "country_code" => "PR", "name" => "Puerto Rico"],
                ["phone_code" => "974", "country_code" => "QA", "name" => "Qatar"],
                ["phone_code" => "262", "country_code" => "RE", "name" => "Reunion"],
                ["phone_code" => "40", "country_code" => "RO", "name" => "Romania"],
                ["phone_code" => "70", "country_code" => "RU", "name" => "Russian Federation"],
                ["phone_code" => "250", "country_code" => "RW", "name" => "Rwanda"],
                ["phone_code" => "590", "country_code" => "BL", "name" => "Saint Barthelemy"],
                ["phone_code" => "290", "country_code" => "SH", "name" => "Saint Helena"],
                ["phone_code" => "1869", "country_code" => "KN", "name" => "Saint Kitts and Nevis"],
                ["phone_code" => "1758", "country_code" => "LC", "name" => "Saint Lucia"],
                ["phone_code" => "590", "country_code" => "MF", "name" => "Saint Martin"],
                ["phone_code" => "508", "country_code" => "PM", "name" => "Saint Pierre and Miquelon"],
                ["phone_code" => "1784", "country_code" => "VC", "name" => "Saint Vincent and the Grenadines"],
                ["phone_code" => "684", "country_code" => "WS", "name" => "Samoa"],
                ["phone_code" => "378", "country_code" => "SM", "name" => "San Marino"],
                ["phone_code" => "239", "country_code" => "ST", "name" => "Sao Tome and Principe"],
                ["phone_code" => "966", "country_code" => "SA", "name" => "Saudi Arabia"],
                ["phone_code" => "221", "country_code" => "SN", "name" => "Senegal"],
                ["phone_code" => "381", "country_code" => "RS", "name" => "Serbia"],
                ["phone_code" => "381", "country_code" => "CS", "name" => "Serbia and Montenegro"],
                ["phone_code" => "248", "country_code" => "SC", "name" => "Seychelles"],
                ["phone_code" => "232", "country_code" => "SL", "name" => "Sierra Leone"],
                ["phone_code" => "65", "country_code" => "SG", "name" => "Singapore"],
                ["phone_code" => "1", "country_code" => "SX", "name" => "Sint Maarten"],
                ["phone_code" => "421", "country_code" => "SK", "name" => "Slovakia"],
                ["phone_code" => "386", "country_code" => "SI", "name" => "Slovenia"],
                ["phone_code" => "677", "country_code" => "SB", "name" => "Solomon Islands"],
                ["phone_code" => "252", "country_code" => "SO", "name" => "Somalia"],
                ["phone_code" => "27", "country_code" => "ZA", "name" => "South Africa"],
                ["phone_code" => "500", "country_code" => "GS", "name" => "South Georgia and the South Sandwich Islands"],
                ["phone_code" => "211", "country_code" => "SS", "name" => "South Sudan"],
                ["phone_code" => "34", "country_code" => "ES", "name" => "Spain"],
                ["phone_code" => "94", "country_code" => "LK", "name" => "Sri Lanka"],
                ["phone_code" => "249", "country_code" => "SD", "name" => "Sudan"],
                ["phone_code" => "597", "country_code" => "SR", "name" => "Suriname"],
                ["phone_code" => "47", "country_code" => "SJ", "name" => "Svalbard and Jan Mayen"],
                ["phone_code" => "268", "country_code" => "SZ", "name" => "Swaziland"],
                ["phone_code" => "46", "country_code" => "SE", "name" => "Sweden"],
                ["phone_code" => "41", "country_code" => "CH", "name" => "Switzerland"],
                ["phone_code" => "963", "country_code" => "SY", "name" => "Syrian Arab Republic"],
                ["phone_code" => "886", "country_code" => "TW", "name" => "Taiwan, Province of China"],
                ["phone_code" => "992", "country_code" => "TJ", "name" => "Tajikistan"],
                ["phone_code" => "255", "country_code" => "TZ", "name" => "Tanzania, United Republic of"],
                ["phone_code" => "66", "country_code" => "TH", "name" => "Thailand"],
                ["phone_code" => "670", "country_code" => "TL", "name" => "Timor-Leste"],
                ["phone_code" => "228", "country_code" => "TG", "name" => "Togo"],
                ["phone_code" => "690", "country_code" => "TK", "name" => "Tokelau"],
                ["phone_code" => "676", "country_code" => "TO", "name" => "Tonga"],
                ["phone_code" => "1868", "country_code" => "TT", "name" => "Trinidad and Tobago"],
                ["phone_code" => "216", "country_code" => "TN", "name" => "Tunisia"],
                ["phone_code" => "90", "country_code" => "TR", "name" => "Turkey"],
                ["phone_code" => "7370", "country_code" => "TM", "name" => "Turkmenistan"],
                ["phone_code" => "1649", "country_code" => "TC", "name" => "Turks and Caicos Islands"],
                ["phone_code" => "688", "country_code" => "TV", "name" => "Tuvalu"],
                ["phone_code" => "256", "country_code" => "UG", "name" => "Uganda"],
                ["phone_code" => "380", "country_code" => "UA", "name" => "Ukraine"],
                ["phone_code" => "971", "country_code" => "AE", "name" => "United Arab Emirates"],
                ["phone_code" => "44", "country_code" => "GB", "name" => "United Kingdom"],
                ["phone_code" => "1", "country_code" => "US", "name" => "United States"],
                ["phone_code" => "1", "country_code" => "UM", "name" => "United States Minor Outlying Islands"],
                ["phone_code" => "598", "country_code" => "UY", "name" => "Uruguay"],
                ["phone_code" => "998", "country_code" => "UZ", "name" => "Uzbekistan"],
                ["phone_code" => "678", "country_code" => "VU", "name" => "Vanuatu"],
                ["phone_code" => "58", "country_code" => "VE", "name" => "Venezuela"],
                ["phone_code" => "84", "country_code" => "VN", "name" => "Viet Nam"],
                ["phone_code" => "1284", "country_code" => "VG", "name" => "Virgin Islands, British"],
                ["phone_code" => "1340", "country_code" => "VI", "name" => "Virgin Islands, U.S"],
                ["phone_code" => "681", "country_code" => "WF", "name" => "Wallis and Futuna"],
                ["phone_code" => "212", "country_code" => "EH", "name" => "Western Sahara"],
                ["phone_code" => "967", "country_code" => "YE", "name" => "Yemen"],
                ["phone_code" => "260", "country_code" => "ZM", "name" => "Zambia"],
                ["phone_code" => "263", "country_code" => "ZW", "name" => "Zimbabwe"]
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
