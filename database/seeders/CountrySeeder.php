<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::insert(
            [
                [
                    'id' => '4',
                    'name' => 'Afghanistan',
                    'code2' => 'AF',
                    'code3' => 'AFG',
                    'isd_code' => '93',
                    'currency_code' => 'AFN',
                    'currency_symbol' => '؋',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],

                [
                    'id' => '8',
                    'name' => 'Albania',
                    'code2' => 'AL',
                    'code3' => 'ALB',
                    'isd_code' => '355',
                    'currency_code' => 'ALL',
                    'currency_symbol' => 'Lek',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],

                [
                    'id' => '10',
                    'name' => 'Antarctica',
                    'code2' => 'AQ',
                    'code3' => 'ATA',
                    'isd_code' => '672',
                    'currency_code' => 'USD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],     

                [
                    'id' => '12',
                    'name' => 'Algeria',
                    'code2' => 'DZ',
                    'code3' => 'DZA',
                    'isd_code' => '213',
                    'currency_code' => 'DZD',
                    'currency_symbol' => 'دج',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],            
              
                [
                    'id' => '16',
                    'name' => 'American Samoa',
                    'code2' => 'AS',
                    'code3' => 'ASM',
                    'isd_code' => '1684',
                    'currency_code' => 'USD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],              
              
                [
                    'id' => '20',
                    'name' => 'Andorra',
                    'code2' => 'AD',
                    'code3' => 'AND',
                    'isd_code' => '376',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],              
              
                [
                    'id' => '24',
                    'name' => 'Angola',
                    'code2' => 'AO',
                    'code3' => 'AGO',
                    'isd_code' => '244',
                    'currency_code' => 'AOA',
                    'currency_symbol' => 'Kz',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],              
              
                [
                    'id' => '28',
                    'name' => 'Antigua and Barbuda',
                    'code2' => 'AG',
                    'code3' => 'ATG',
                    'isd_code' => '1268',
                    'currency_code' => 'XCD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],              
              
                [
                    'id' => '31',
                    'name' => 'Azerbaijan',
                    'code2' => 'AZ',
                    'code3' => 'AZE',
                    'isd_code' => '994',
                    'currency_code' => 'AZN',
                    'currency_symbol' => '₼',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],              
              
                [
                    'id' => '32',
                    'name' => 'Argentina',
                    'code2' => 'AR',
                    'code3' => 'ARG',
                    'isd_code' => '54',
                    'currency_code' => 'ARS',
                    'currency_symbol' => '$',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],              
              
                [
                    'id' => '36',
                    'name' => 'Australia',
                    'code2' => 'AU',
                    'code3' => 'AUS',
                    'isd_code' => '61',
                    'currency_code' => 'AUD',
                    'currency_symbol' => '$',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],              
              
                [
                    'id' => '40',
                    'name' => 'Austria',
                    'code2' => 'AT',
                    'code3' => 'AUT',
                    'isd_code' => '43',
                    'currency_code' => 'ATS',
                    'currency_symbol' => 'S',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],              
              
                [
                    'id' => '44',
                    'name' => 'Bahamas',
                    'code2' => 'BS',
                    'code3' => 'BHS',
                    'isd_code' => '1242',
                    'currency_code' => 'BSD',
                    'currency_symbol' => 'B$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],              
              
                [
                    'id' => '48',
                    'name' => 'Bahrain',
                    'code2' => 'BH',
                    'code3' => 'BHR',
                    'isd_code' => '973',
                    'currency_code' => 'BHD',
                    'currency_symbol' => 'BD',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],              
              
                [
                    'id' => '50',
                    'name' => 'Bangladesh',
                    'code2' => 'BD',
                    'code3' => 'BGD',
                    'isd_code' => '880',
                    'currency_code' => 'BDT',
                    'currency_symbol' => '৳',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],              
              
                [
                    'id' => '51',
                    'name' => 'Armenia',
                    'code2' => 'AM',
                    'code3' => 'ARM',
                    'isd_code' => '374',
                    'currency_code' => 'AMD',
                    'currency_symbol' => '֏',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],              
              
                [
                    'id' => '52',
                    'name' => 'Barbados',
                    'code2' => 'BB',
                    'code3' => 'BRB',
                    'isd_code' => '1246',
                    'currency_code' => 'BBD',
                    'currency_symbol' => 'Bds$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],              
                    
                [
                    'id' => '56',
                    'name' => 'Belgium',
                    'code2' => 'BE',
                    'code3' => 'BEL',
                    'isd_code' => '32',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],              
                    
                [
                    'id' => '60',
                    'name' => 'Bermuda',
                    'code2' => 'BM',
                    'code3' => 'BMU',
                    'isd_code' => '1441',
                    'currency_code' => 'BMD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],              
                    
                [
                    'id' => '64',
                    'name' => 'Bhutan',
                    'code2' => 'BT',
                    'code3' => 'BTN',
                    'isd_code' => '975',
                    'currency_code' => 'BTN',
                    'currency_symbol' => 'Nu',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '68',
                    'name' => 'Bolivia',
                    'code2' => 'BO',
                    'code3' => 'BOL',
                    'isd_code' => '591',
                    'currency_code' => 'BOB',
                    'currency_symbol' => 'Bs',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '70',
                    'name' => 'Bosnia and Herzegovina',
                    'code2' => 'BA',
                    'code3' => 'BIH',
                    'isd_code' => '387',
                    'currency_code' => 'BAM',
                    'currency_symbol' => 'KM',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '72',
                    'name' => 'Botswana',
                    'code2' => 'BW',
                    'code3' => 'BWA',
                    'isd_code' => '267',
                    'currency_code' => 'BWP',
                    'currency_symbol' => 'P',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '74',
                    'name' => 'Bouvet Island',
                    'code2' => 'BV',
                    'code3' => 'BVT',
                    'isd_code' => '47',
                    'currency_code' => 'NOK',
                    'currency_symbol' => 'kr‎',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '76',
                    'name' => 'Brazil',
                    'code2' => 'BR',
                    'code3' => 'BRA',
                    'isd_code' => '55',
                    'currency_code' => 'BRL',
                    'currency_symbol' => 'R$',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '84',
                    'name' => 'Belize',
                    'code2' => 'BZ',
                    'code3' => 'BLZ',
                    'isd_code' => '501',
                    'currency_code' => 'BZD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '86',
                    'name' => 'British Indian Ocean Territory',
                    'code2' => 'IO',
                    'code3' => 'IOT',
                    'isd_code' => '246',
                    'currency_code' => 'USD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '90',
                    'name' => 'Solomon Islands',
                    'code2' => 'SB',
                    'code3' => 'SLB',
                    'isd_code' => '677',
                    'currency_code' => 'SBD',
                    'currency_symbol' => 'Si$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '92',
                    'name' => 'Virgin Islands, British',
                    'code2' => 'VG',
                    'code3' => 'VGB',
                    'isd_code' => '1284',
                    'currency_code' => 'USD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '96',
                    'name' => 'Brunei Darussalam',
                    'code2' => 'BN',
                    'code3' => 'BRN',
                    'isd_code' => '673',
                    'currency_code' => 'BND',
                    'currency_symbol' => 'B$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '100',
                    'name' => 'Bulgaria',
                    'code2' => 'BG',
                    'code3' => 'BGR',
                    'isd_code' => '359',
                    'currency_code' => 'BGN',
                    'currency_symbol' => 'Лв',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '104',
                    'name' => 'Myanmar',
                    'code2' => 'MM',
                    'code3' => 'MMR',
                    'isd_code' => '95',
                    'currency_code' => 'MMK',
                    'currency_symbol' => 'K',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '108',
                    'name' => 'Burundi',
                    'code2' => 'BI',
                    'code3' => 'BDI',
                    'isd_code' => '257',
                    'currency_code' => 'BIF',
                    'currency_symbol' => 'FBu',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '112',
                    'name' => 'Belarus',
                    'code2' => 'BY',
                    'code3' => 'BLR',
                    'isd_code' => '375',
                    'currency_code' => 'BYN',
                    'currency_symbol' => 'Rbl',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '116',
                    'name' => 'Cambodia',
                    'code2' => 'KH',
                    'code3' => 'KHM',
                    'isd_code' => '855',
                    'currency_code' => 'KHR',
                    'currency_symbol' => '៛',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '120',
                    'name' => 'Cameroon',
                    'code2' => 'CM',
                    'code3' => 'CMR',
                    'isd_code' => '237',
                    'currency_code' => 'XAF',
                    'currency_symbol' => 'F.CFA',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '124',
                    'name' => 'Canada',
                    'code2' => 'CA',
                    'code3' => 'CAN',
                    'isd_code' => '1',
                    'currency_code' => 'USD',
                    'currency_symbol' => '$',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '132',
                    'name' => 'Cape Verde',
                    'code2' => 'CV',
                    'code3' => 'CPV',
                    'isd_code' => '238',
                    'currency_code' => 'CVE',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '136',
                    'name' => 'Cayman Islands',
                    'code2' => 'KY',
                    'code3' => 'CYM',
                    'isd_code' => '1345',
                    'currency_code' => 'KYD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '140',
                    'name' => 'Central African Republic',
                    'code2' => 'CF',
                    'code3' => 'CAF',
                    'isd_code' => '236',
                    'currency_code' => 'XAF',
                    'currency_symbol' => 'FCFA',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '144',
                    'name' => 'Sri Lanka',
                    'code2' => 'LK',
                    'code3' => 'LKA',
                    'isd_code' => '94',
                    'currency_code' => 'LKR',
                    'currency_symbol' => 'රු',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '148',
                    'name' => 'Chad',
                    'code2' => 'TD',
                    'code3' => 'TCD',
                    'isd_code' => '235',
                    'currency_code' => 'XAF',
                    'currency_symbol' => 'FCFA',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '152',
                    'name' => 'Chile',
                    'code2' => 'CL',
                    'code3' => 'CHL',
                    'isd_code' => '56',
                    'currency_code' => 'CLP',
                    'currency_symbol' => '$',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '156',
                    'name' => 'China',
                    'code2' => 'CN',
                    'code3' => 'CHN',
                    'isd_code' => '86',
                    'currency_code' => 'CNY',
                    'currency_symbol' => '¥',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '158',
                    'name' => 'Taiwan, Province Of China',
                    'code2' => 'TW',
                    'code3' => 'TWN',
                    'isd_code' => '886',
                    'currency_code' => 'TWD',
                    'currency_symbol' => 'NT$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '162',
                    'name' => 'Christmas Island',
                    'code2' => 'CX',
                    'code3' => 'CXR',
                    'isd_code' => '61',
                    'currency_code' => 'AUD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '166',
                    'name' => 'Cocos (Keeling) Islands',
                    'code2' => 'CC',
                    'code3' => 'CCK',
                    'isd_code' => '672',
                    'currency_code' => 'AUD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '170',
                    'name' => 'Colombia',
                    'code2' => 'CO',
                    'code3' => 'COL',
                    'isd_code' => '57',
                    'currency_code' => 'COP',
                    'currency_symbol' => '$',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '174',
                    'name' => 'Comoros',
                    'code2' => 'KM',
                    'code3' => 'COM',
                    'isd_code' => '269',
                    'currency_code' => 'KMF',
                    'currency_symbol' => 'CF',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '175',
                    'name' => 'Mayotte',
                    'code2' => 'YT',
                    'code3' => 'MYT',
                    'isd_code' => '269',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '178',
                    'name' => 'Congo',
                    'code2' => 'CG',
                    'code3' => 'COG',
                    'isd_code' => '242',
                    'currency_code' => 'CDF',
                    'currency_symbol' => 'FC',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '180',
                    'name' => 'Congo, The Democratic Republic Of The',
                    'code2' => 'CD',
                    'code3' => 'COD',
                    'isd_code' => '242',
                    'currency_code' => 'CDF',
                    'currency_symbol' => 'FC',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '184',
                    'name' => 'Cook Islands',
                    'code2' => 'CK',
                    'code3' => 'COK',
                    'isd_code' => '682',
                    'currency_code' => 'USD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '188',
                    'name' => 'Costa Rica',
                    'code2' => 'CR',
                    'code3' => 'CRI',
                    'isd_code' => '506',
                    'currency_code' => 'CRC',
                    'currency_symbol' => '₡',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '191',
                    'name' => 'Croatia',
                    'code2' => 'HR',
                    'code3' => 'HRV',
                    'isd_code' => '385',
                    'currency_code' => 'HRK',
                    'currency_symbol' => 'kn',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '192',
                    'name' => 'Cuba',
                    'code2' => 'CU',
                    'code3' => 'CUB',
                    'isd_code' => '53',
                    'currency_code' => 'CUP',
                    'currency_symbol' => '$MN',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '196',
                    'name' => 'Cyprus',
                    'code2' => 'CY',
                    'code3' => 'CYP',
                    'isd_code' => '357',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '203',
                    'name' => 'Czech Republic',
                    'code2' => 'CZ',
                    'code3' => 'CZE',
                    'isd_code' => '420',
                    'currency_code' => 'CZK',
                    'currency_symbol' => 'Kc',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '204',
                    'name' => 'Benin',
                    'code2' => 'BJ',
                    'code3' => 'BEN',
                    'isd_code' => '229',
                    'currency_code' => 'XOF',
                    'currency_symbol' => 'CFA',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '208',
                    'name' => 'Denmark',
                    'code2' => 'DK',
                    'code3' => 'DNK',
                    'isd_code' => '45',
                    'currency_code' => 'DKK',
                    'currency_symbol' => 'Kr',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '212',
                    'name' => 'Dominica',
                    'code2' => 'DM',
                    'code3' => 'DMA',
                    'isd_code' => '1767',
                    'currency_code' => 'XCD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '214',
                    'name' => 'Dominican Republic',
                    'code2' => 'DO',
                    'code3' => 'DOM',
                    'isd_code' => '1809',
                    'currency_code' => 'DOP',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '218',
                    'name' => 'Ecuador',
                    'code2' => 'EC',
                    'code3' => 'ECU',
                    'isd_code' => '593',
                    'currency_code' => 'USD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '222',
                    'name' => 'El Salvador',
                    'code2' => 'SV',
                    'code3' => 'SLV',
                    'isd_code' => '503',
                    'currency_code' => 'USD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '226',
                    'name' => 'Equatorial Guinea',
                    'code2' => 'GQ',
                    'code3' => 'GNQ',
                    'isd_code' => '240',
                    'currency_code' => 'XAF',
                    'currency_symbol' => 'FCFA',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '231',
                    'name' => 'Ethiopia',
                    'code2' => 'ET',
                    'code3' => 'ETH',
                    'isd_code' => '251',
                    'currency_code' => 'ETB',
                    'currency_symbol' => 'Br',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '232',
                    'name' => 'Eritrea',
                    'code2' => 'ER',
                    'code3' => 'ERI',
                    'isd_code' => '291',
                    'currency_code' => 'ERN',
                    'currency_symbol' => 'Nfk',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '233',
                    'name' => 'Estonia',
                    'code2' => 'EE',
                    'code3' => 'EST',
                    'isd_code' => '372',
                    'currency_code' => 'EEK',
                    'currency_symbol' => 'KR',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '234',
                    'name' => 'Faroe Islands',
                    'code2' => 'FO',
                    'code3' => 'FRO',
                    'isd_code' => '298',
                    'currency_code' => 'FOK',
                    'currency_symbol' => 'kr',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '238',
                    'name' => 'Falkland Islands  (Malvinas)',
                    'code2' => 'FK',
                    'code3' => 'FLK',
                    'isd_code' => '500',
                    'currency_code' => 'FKP',
                    'currency_symbol' => '£',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '239',
                    'name' => 'South Georgia and the South Sandwich Islands',
                    'code2' => 'GS',
                    'code3' => 'SGS',
                    'isd_code' => '500',
                    'currency_code' => 'GEL',
                    'currency_symbol' => 'GEL',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '242',
                    'name' => 'Fiji',
                    'code2' => 'FJ',
                    'code3' => 'FJI',
                    'isd_code' => '679',
                    'currency_code' => 'FJD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '246',
                    'name' => 'Finland',
                    'code2' => 'FI',
                    'code3' => 'FIN',
                    'isd_code' => '358',
                    'currency_code' => 'FIM',
                    'currency_symbol' => 'Mk‎',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '248',
                    'name' => 'Falkland Islands',
                    'code2' => 'AX',
                    'code3' => 'ALA',
                    'isd_code' => '500',
                    'currency_code' => 'FKP',
                    'currency_symbol' => '£',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '250',
                    'name' => 'France',
                    'code2' => 'FR',
                    'code3' => 'FRA',
                    'isd_code' => '33',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '254',
                    'name' => 'French Guiana',
                    'code2' => 'GF',
                    'code3' => 'GUF',
                    'isd_code' => '594',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '258',
                    'name' => 'French Polynesia',
                    'code2' => 'PF',
                    'code3' => 'PYF',
                    'isd_code' => '689',
                    'currency_code' => 'XPF',
                    'currency_symbol' => '₣',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '260',
                    'name' => 'French Southern Territories',
                    'code2' => 'TF',
                    'code3' => 'ATF',
                    'isd_code' => '262',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '262',
                    'name' => 'Djibouti',
                    'code2' => 'DJ',
                    'code3' => 'DJI',
                    'isd_code' => '253',
                    'currency_code' => 'DJF',
                    'currency_symbol' => 'Fdj',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '266',
                    'name' => 'Gabon',
                    'code2' => 'GA',
                    'code3' => 'GAB',
                    'isd_code' => '241',
                    'currency_code' => 'XAF',
                    'currency_symbol' => 'FCFA',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '268',
                    'name' => 'Georgia',
                    'code2' => 'GE',
                    'code3' => 'GEO',
                    'isd_code' => '995',
                    'currency_code' => 'GEL',
                    'currency_symbol' => 'GEL',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '270',
                    'name' => 'Gambia',
                    'code2' => 'GM',
                    'code3' => 'GMB',
                    'isd_code' => '220',
                    'currency_code' => 'GMD',
                    'currency_symbol' => 'D',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '275',
                    'name' => 'Palestinian Territory, Occupied',
                    'code2' => 'PS',
                    'code3' => 'PSE',
                    'isd_code' => '970',
                    'currency_code' => 'ILS',
                    'currency_symbol' => '₪',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '276',
                    'name' => 'Germany',
                    'code2' => 'DE',
                    'code3' => 'DEU',
                    'isd_code' => '49',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '288',
                    'name' => 'Ghana',
                    'code2' => 'GH',
                    'code3' => 'GHA',
                    'isd_code' => '233',
                    'currency_code' => 'GHS',
                    'currency_symbol' => 'GH₵',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '292',
                    'name' => 'Gibraltar',
                    'code2' => 'GI',
                    'code3' => 'GIB',
                    'isd_code' => '350',
                    'currency_code' => 'GIP',
                    'currency_symbol' => '£',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '296',
                    'name' => 'Kiribati',
                    'code2' => 'KI',
                    'code3' => 'KIR',
                    'isd_code' => '686',
                    'currency_code' => 'KID',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '300',
                    'name' => 'Greece',
                    'code2' => 'GR',
                    'code3' => 'GRC',
                    'isd_code' => '30',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '304',
                    'name' => 'Greenland',
                    'code2' => 'GL',
                    'code3' => 'GRL',
                    'isd_code' => '299',
                    'currency_code' => 'DKK',
                    'currency_symbol' => 'Kr',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '308',
                    'name' => 'Grenada',
                    'code2' => 'GD',
                    'code3' => 'GRD',
                    'isd_code' => '1473',
                    'currency_code' => 'XCD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '312',
                    'name' => 'Guadeloupe',
                    'code2' => 'GP',
                    'code3' => 'GLP',
                    'isd_code' => '590',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '316',
                    'name' => 'Guam',
                    'code2' => 'GU',
                    'code3' => 'GUM',
                    'isd_code' => '1671',
                    'currency_code' => 'USD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '320',
                    'name' => 'Guatemala',
                    'code2' => 'GT',
                    'code3' => 'GTM',
                    'isd_code' => '502',
                    'currency_code' => 'GTQ',
                    'currency_symbol' => 'Q',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '324',
                    'name' => 'Guinea',
                    'code2' => 'GN',
                    'code3' => 'GIN',
                    'isd_code' => '224',
                    'currency_code' => 'GNF',
                    'currency_symbol' => 'FG',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '328',
                    'name' => 'Guyana',
                    'code2' => 'GY',
                    'code3' => 'GUY',
                    'isd_code' => '592',
                    'currency_code' => 'GYD',
                    'currency_symbol' => 'G$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '332',
                    'name' => 'Haiti',
                    'code2' => 'HT',
                    'code3' => 'HTI',
                    'isd_code' => '509',
                    'currency_code' => 'HTG',
                    'currency_symbol' => 'G',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '334',
                    'name' => 'Heard Island and McDonald Islands',
                    'code2' => 'HM',
                    'code3' => 'HMD',
                    'isd_code' => '11',
                    'currency_code' => 'AUD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '336',
                    'name' => 'Holy See (Vatican City State)',
                    'code2' => 'VA',
                    'code3' => 'VAT',
                    'isd_code' => '39',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '340',
                    'name' => 'Honduras',
                    'code2' => 'HN',
                    'code3' => 'HND',
                    'isd_code' => '504',
                    'currency_code' => 'HNL',
                    'currency_symbol' => 'L',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '344',
                    'name' => 'Hong Kong',
                    'code2' => 'HK',
                    'code3' => 'HKG',
                    'isd_code' => '852',
                    'currency_code' => 'HKD',
                    'currency_symbol' => 'HK$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '348',
                    'name' => 'Hungary',
                    'code2' => 'HU',
                    'code3' => 'HUN',
                    'isd_code' => '36',
                    'currency_code' => 'HUF',
                    'currency_symbol' => 'Ft',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '352',
                    'name' => 'Iceland',
                    'code2' => 'IS',
                    'code3' => 'ISL',
                    'isd_code' => '354',
                    'currency_code' => 'ISK',
                    'currency_symbol' => 'kr',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '356',
                    'name' => 'India',
                    'code2' => 'IN',
                    'code3' => 'IND',
                    'isd_code' => '91',
                    'currency_code' => 'INR',
                    'currency_symbol' => '₹',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '360',
                    'name' => 'Indonesia',
                    'code2' => 'ID',
                    'code3' => 'IDN',
                    'isd_code' => '62',
                    'currency_code' => 'IDR',
                    'currency_symbol' => 'Rp',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '364',
                    'name' => 'Iran',
                    'code2' => 'IR',
                    'code3' => 'IRN',
                    'isd_code' => '98',
                    'currency_code' => 'IRR',
                    'currency_symbol' => '﷼',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '368',
                    'name' => 'Iraq',
                    'code2' => 'IQ',
                    'code3' => 'IRQ',
                    'isd_code' => '964',
                    'currency_code' => 'IQD',
                    'currency_symbol' => 'ع.د',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '372',
                    'name' => 'Ireland',
                    'code2' => 'IE',
                    'code3' => 'IRL',
                    'isd_code' => '353',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '376',
                    'name' => 'Israel',
                    'code2' => 'IL',
                    'code3' => 'ISR',
                    'isd_code' => '972',
                    'currency_code' => 'ILS',
                    'currency_symbol' => '₪',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '380',
                    'name' => 'Italy',
                    'code2' => 'IT',
                    'code3' => 'ITA',
                    'isd_code' => '39',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '384',
                    'name' => 'CÃƒÆ’Ã‚Â´te D\'Ivoire',
                    'code2' => 'CI',
                    'code3' => 'CIV',
                    'isd_code' => '225',
                    'currency_code' => 'XOF',
                    'currency_symbol' => 'F.CFA',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '388',
                    'name' => 'Jamaica',
                    'code2' => 'JM',
                    'code3' => 'JAM',
                    'isd_code' => '1876',
                    'currency_code' => 'JMD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '392',
                    'name' => 'Japan',
                    'code2' => 'JP',
                    'code3' => 'JPN',
                    'isd_code' => '81',
                    'currency_code' => 'JPY',
                    'currency_symbol' => '¥',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '398',
                    'name' => 'Kazakhstan',
                    'code2' => 'KZ',
                    'code3' => 'KAZ',
                    'isd_code' => '7',
                    'currency_code' => 'KZT',
                    'currency_symbol' => '₸',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '400',
                    'name' => 'Jordan',
                    'code2' => 'JO',
                    'code3' => 'JOR',
                    'isd_code' => '962',
                    'currency_code' => 'JOD',
                    'currency_symbol' => 'د.ا',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '404',
                    'name' => 'Kenya',
                    'code2' => 'KE',
                    'code3' => 'KEN',
                    'isd_code' => '254',
                    'currency_code' => 'KES',
                    'currency_symbol' => 'Ksh',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '408',
                    'name' => 'Korea, Democratic People\'s Republic Of',
                    'code2' => 'KP',
                    'code3' => 'PRK',
                    'isd_code' => '850',
                    'currency_code' => 'KPW',
                    'currency_symbol' => '₩',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '410',
                    'name' => 'Korea, Republic of',
                    'code2' => 'KR',
                    'code3' => 'KOR',
                    'isd_code' => '82',
                    'currency_code' => 'KRW',
                    'currency_symbol' => '₩',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '414',
                    'name' => 'Kuwait',
                    'code2' => 'KW',
                    'code3' => 'KWT',
                    'isd_code' => '965',
                    'currency_code' => 'KWD',
                    'currency_symbol' => 'KD',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '417',
                    'name' => 'Kyrgyzstan',
                    'code2' => 'KG',
                    'code3' => 'KGZ',
                    'isd_code' => '996',
                    'currency_code' => 'KGS',
                    'currency_symbol' => 'Лв',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '418',
                    'name' => 'Lao People\'s Democratic Republic',
                    'code2' => 'LA',
                    'code3' => 'LAO',
                    'isd_code' => '856',
                    'currency_code' => 'LAK',
                    'currency_symbol' => '₭',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '422',
                    'name' => 'Lebanon',
                    'code2' => 'LB',
                    'code3' => 'LBN',
                    'isd_code' => '961',
                    'currency_code' => 'LBP',
                    'currency_symbol' => 'ل.ل',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '426',
                    'name' => 'Lesotho',
                    'code2' => 'LS',
                    'code3' => 'LSO',
                    'isd_code' => '266',
                    'currency_code' => 'LSL',
                    'currency_symbol' => 'L',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '428',
                    'name' => 'Latvia',
                    'code2' => 'LV',
                    'code3' => 'LVA',
                    'isd_code' => '371',
                    'currency_code' => 'LVL',
                    'currency_symbol' => 'Ls',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '430',
                    'name' => 'Liberia',
                    'code2' => 'LR',
                    'code3' => 'LBR',
                    'isd_code' => '231',
                    'currency_code' => 'LRD',
                    'currency_symbol' => 'L$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '434',
                    'name' => 'Libya',
                    'code2' => 'LY',
                    'code3' => 'LBY',
                    'isd_code' => '218',
                    'currency_code' => 'LYD',
                    'currency_symbol' => 'LD',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '438',
                    'name' => 'Liechtenstein',
                    'code2' => 'LI',
                    'code3' => 'LIE',
                    'isd_code' => '423',
                    'currency_code' => 'CHF',
                    'currency_symbol' => 'fr.',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '440',
                    'name' => 'Lithuania',
                    'code2' => 'LT',
                    'code3' => 'LTU',
                    'isd_code' => '370',
                    'currency_code' => 'LTL',
                    'currency_symbol' => 'Lt',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '442',
                    'name' => 'Luxembourg',
                    'code2' => 'LU',
                    'code3' => 'LUX',
                    'isd_code' => '352',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '446',
                    'name' => 'Macao',
                    'code2' => 'MO',
                    'code3' => 'MAC',
                    'isd_code' => '853',
                    'currency_code' => 'MOP',
                    'currency_symbol' => 'MOP$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '450',
                    'name' => 'Madagascar',
                    'code2' => 'MG',
                    'code3' => 'MDG',
                    'isd_code' => '261',
                    'currency_code' => 'MGA',
                    'currency_symbol' => 'Ar',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '454',
                    'name' => 'Malawi',
                    'code2' => 'MW',
                    'code3' => 'MWI',
                    'isd_code' => '265',
                    'currency_code' => 'MWK',
                    'currency_symbol' => 'MK',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '458',
                    'name' => 'Malaysia',
                    'code2' => 'MY',
                    'code3' => 'MYS',
                    'isd_code' => '60',
                    'currency_code' => 'MYR',
                    'currency_symbol' => 'RM',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '462',
                    'name' => 'Maldives',
                    'code2' => 'MV',
                    'code3' => 'MDV',
                    'isd_code' => '960',
                    'currency_code' => 'MVR',
                    'currency_symbol' => 'Rf',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '466',
                    'name' => 'Mali',
                    'code2' => 'ML',
                    'code3' => 'MLI',
                    'isd_code' => '223',
                    'currency_code' => 'XOF',
                    'currency_symbol' => 'CFA',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '470',
                    'name' => 'Malta',
                    'code2' => 'MT',
                    'code3' => 'MLT',
                    'isd_code' => '356',
                    'currency_code' => 'MTL',
                    'currency_symbol' => 'Lm',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '474',
                    'name' => 'Martinique',
                    'code2' => 'MQ',
                    'code3' => 'MTQ',
                    'isd_code' => '596',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '478',
                    'name' => 'Mauritania',
                    'code2' => 'MR',
                    'code3' => 'MRT',
                    'isd_code' => '222',
                    'currency_code' => 'MRU',
                    'currency_symbol' => 'UM',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '480',
                    'name' => 'Mauritius',
                    'code2' => 'MU',
                    'code3' => 'MUS',
                    'isd_code' => '230',
                    'currency_code' => 'MUR',
                    'currency_symbol' => 'Rs',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '484',
                    'name' => 'Mexico',
                    'code2' => 'MX',
                    'code3' => 'MEX',
                    'isd_code' => '52',
                    'currency_code' => 'MXN',
                    'currency_symbol' => '$',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '492',
                    'name' => 'Monaco',
                    'code2' => 'MC',
                    'code3' => 'MCO',
                    'isd_code' => '377',
                    'currency_code' => 'MFC',
                    'currency_symbol' => 'F',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '496',
                    'name' => 'Mongolia',
                    'code2' => 'MN',
                    'code3' => 'MNG',
                    'isd_code' => '976',
                    'currency_code' => 'MNT',
                    'currency_symbol' => '₮',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '498',
                    'name' => 'Moldova, Republic of',
                    'code2' => 'MD',
                    'code3' => 'MDA',
                    'isd_code' => '373',
                    'currency_code' => 'MDL',
                    'currency_symbol' => 'L',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '499',
                    'name' => 'Montenegro',
                    'code2' => 'ME',
                    'code3' => 'MNE',
                    'isd_code' => '382',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '500',
                    'name' => 'Montserrat',
                    'code2' => 'MS',
                    'code3' => 'MSR',
                    'isd_code' => '1664',
                    'currency_code' => 'XCD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '504',
                    'name' => 'Morocco',
                    'code2' => 'MA',
                    'code3' => 'MAR',
                    'isd_code' => '212',
                    'currency_code' => 'MAD',
                    'currency_symbol' => 'MAD',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '508',
                    'name' => 'Mozambique',
                    'code2' => 'MZ',
                    'code3' => 'MOZ',
                    'isd_code' => '258',
                    'currency_code' => 'MZN',
                    'currency_symbol' => 'MT',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '512',
                    'name' => 'Oman',
                    'code2' => 'OM',
                    'code3' => 'OMN',
                    'isd_code' => '968',
                    'currency_code' => 'OMR',
                    'currency_symbol' => 'R.O',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '516',
                    'name' => 'Namibia',
                    'code2' => 'NA',
                    'code3' => 'NAM',
                    'isd_code' => '264',
                    'currency_code' => 'NAD',
                    'currency_symbol' => 'N$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '520',
                    'name' => 'Nauru',
                    'code2' => 'NR',
                    'code3' => 'NRU',
                    'isd_code' => '674',
                    'currency_code' => 'AUD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '524',
                    'name' => 'Nepal',
                    'code2' => 'NP',
                    'code3' => 'NPL',
                    'isd_code' => '977',
                    'currency_code' => 'NPR',
                    'currency_symbol' => 'रू',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '528',
                    'name' => 'Netherlands',
                    'code2' => 'NL',
                    'code3' => 'NLD',
                    'isd_code' => '31',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '531',
                    'name' => 'Curacao',
                    'code2' => 'CW',
                    'code3' => 'CUW',
                    'isd_code' => '599',
                    'currency_code' => 'ANG',
                    'currency_symbol' => 'ƒ',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '533',
                    'name' => 'Aruba',
                    'code2' => 'AW',
                    'code3' => 'ABW',
                    'isd_code' => '297',
                    'currency_code' => 'AWG',
                    'currency_symbol' => 'ƒ',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '534',
                    'name' => 'Sint Maarten (Dutch part)',
                    'code2' => 'SX',
                    'code3' => 'SXM',
                    'isd_code' => '1',
                    'currency_code' => 'ANG',
                    'currency_symbol' => 'ƒ',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '535',
                    'name' => 'Bonaire, Sint Eustatius and Saba',
                    'code2' => 'BQ',
                    'code3' => 'BES',
                    'isd_code' => '599',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '540',
                    'name' => 'New Caledonia',
                    'code2' => 'NC',
                    'code3' => 'NCL',
                    'isd_code' => '687',
                    'currency_code' => 'XPF',
                    'currency_symbol' => 'Franc',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '548',
                    'name' => 'Vanuatu',
                    'code2' => 'VU',
                    'code3' => 'VUT',
                    'isd_code' => '678',
                    'currency_code' => 'VUV',
                    'currency_symbol' => 'VT',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '554',
                    'name' => 'New Zealand',
                    'code2' => 'NZ',
                    'code3' => 'NZL',
                    'isd_code' => '64',
                    'currency_code' => 'NZD',
                    'currency_symbol' => '$',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '558',
                    'name' => 'Nicaragua',
                    'code2' => 'NI',
                    'code3' => 'NIC',
                    'isd_code' => '505',
                    'currency_code' => 'NIO',
                    'currency_symbol' => 'C$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '562',
                    'name' => 'Niger',
                    'code2' => 'NE',
                    'code3' => 'NER',
                    'isd_code' => '227',
                    'currency_code' => 'XOF',
                    'currency_symbol' => 'CFA',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '566',
                    'name' => 'Nigeria',
                    'code2' => 'NG',
                    'code3' => 'NGA',
                    'isd_code' => '234',
                    'currency_code' => 'NGN',
                    'currency_symbol' => '₦',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '570',
                    'name' => 'Niue',
                    'code2' => 'NU',
                    'code3' => 'NIU',
                    'isd_code' => '683',
                    'currency_code' => 'NZD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '574',
                    'name' => 'Norfolk Island',
                    'code2' => 'NF',
                    'code3' => 'NFK',
                    'isd_code' => '672',
                    'currency_code' => 'AUD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '578',
                    'name' => 'Norway',
                    'code2' => 'NO',
                    'code3' => 'NOR',
                    'isd_code' => '47',
                    'currency_code' => 'NOK',
                    'currency_symbol' => 'kr',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '580',
                    'name' => 'Northern Mariana Islands',
                    'code2' => 'MP',
                    'code3' => 'MNP',
                    'isd_code' => '1670',
                    'currency_code' => 'USD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '581',
                    'name' => 'United States Minor Outlying Islands',
                    'code2' => 'UM',
                    'code3' => 'UMI',
                    'isd_code' => '1',
                    'currency_code' => 'USD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '583',
                    'name' => 'Micronesia, Federated States Of',
                    'code2' => 'FM',
                    'code3' => 'FSM',
                    'isd_code' => '691',
                    'currency_code' => 'USD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '584',
                    'name' => 'Marshall Islands',
                    'code2' => 'MH',
                    'code3' => 'MHL',
                    'isd_code' => '692',
                    'currency_code' => 'USD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '585',
                    'name' => 'Palau',
                    'code2' => 'PW',
                    'code3' => 'PLW',
                    'isd_code' => '680',
                    'currency_code' => 'USD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '586',
                    'name' => 'Pakistan',
                    'code2' => 'PK',
                    'code3' => 'PAK',
                    'isd_code' => '92',
                    'currency_code' => 'PKR',
                    'currency_symbol' => 'Rs.',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '591',
                    'name' => 'Panama',
                    'code2' => 'PA',
                    'code3' => 'PAN',
                    'isd_code' => '507',
                    'currency_code' => 'PAB',
                    'currency_symbol' => 'B/',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '598',
                    'name' => 'Papua New Guinea',
                    'code2' => 'PG',
                    'code3' => 'PNG',
                    'isd_code' => '675',
                    'currency_code' => 'PGK',
                    'currency_symbol' => 'K',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '600',
                    'name' => 'Paraguay',
                    'code2' => 'PY',
                    'code3' => 'PRY',
                    'isd_code' => '595',
                    'currency_code' => 'PYG',
                    'currency_symbol' => 'Gs',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '604',
                    'name' => 'Peru',
                    'code2' => 'PE',
                    'code3' => 'PER',
                    'isd_code' => '51',
                    'currency_code' => 'PEN',
                    'currency_symbol' => 'S/.',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '608',
                    'name' => 'Philippines',
                    'code2' => 'PH',
                    'code3' => 'PHL',
                    'isd_code' => '63',
                    'currency_code' => 'PHP',
                    'currency_symbol' => '₱',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '612',
                    'name' => 'Pitcairn',
                    'code2' => 'PN',
                    'code3' => 'PCN',
                    'isd_code' => '64',
                    'currency_code' => 'NZD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '616',
                    'name' => 'Poland',
                    'code2' => 'PL',
                    'code3' => 'POL',
                    'isd_code' => '48',
                    'currency_code' => 'PLN',
                    'currency_symbol' => 'zloty',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '620',
                    'name' => 'Portugal',
                    'code2' => 'PT',
                    'code3' => 'PRT',
                    'isd_code' => '351',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '624',
                    'name' => 'Guinea-Bissau',
                    'code2' => 'GW',
                    'code3' => 'GNB',
                    'isd_code' => '245',
                    'currency_code' => 'XOF',
                    'currency_symbol' => 'CFA',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '626',
                    'name' => 'Timor-Leste',
                    'code2' => 'TL',
                    'code3' => 'TLS',
                    'isd_code' => '670',
                    'currency_code' => 'USD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '630',
                    'name' => 'Puerto Rico',
                    'code2' => 'PR',
                    'code3' => 'PRI',
                    'isd_code' => '1787',
                    'currency_code' => 'USD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '634',
                    'name' => 'Qatar',
                    'code2' => 'QA',
                    'code3' => 'QAT',
                    'isd_code' => '974',
                    'currency_code' => 'QAR',
                    'currency_symbol' => 'QR',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '642',
                    'name' => 'Romania',
                    'code2' => 'RO',
                    'code3' => 'ROU',
                    'isd_code' => '40',
                    'currency_code' => 'RON',
                    'currency_symbol' => 'lei',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '643',
                    'name' => 'Russian Federation',
                    'code2' => 'RU',
                    'code3' => 'RUS',
                    'isd_code' => '70',
                    'currency_code' => 'RUB',
                    'currency_symbol' => '₽',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '646',
                    'name' => 'Rwanda',
                    'code2' => 'RW',
                    'code3' => 'RWA',
                    'isd_code' => '250',
                    'currency_code' => 'RWF',
                    'currency_symbol' => 'R₣',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '652',
                    'name' => 'Saint Barth',
                    'code2' => 'BL',
                    'code3' => 'BLM',
                    'isd_code' => '590',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '654',
                    'name' => 'Saint Helena, Ascension and Tristan Da Cunha',
                    'code2' => 'SH',
                    'code3' => 'SHN',
                    'isd_code' => '290',
                    'currency_code' => 'SHP',
                    'currency_symbol' => '£',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '659',
                    'name' => 'Saint Kitts And Nevis',
                    'code2' => 'KN',
                    'code3' => 'KNA',
                    'isd_code' => '1869',
                    'currency_code' => 'XCD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '660',
                    'name' => 'Anguilla',
                    'code2' => 'AI',
                    'code3' => 'AIA',
                    'isd_code' => '1264',
                    'currency_code' => 'XCD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '662',
                    'name' => 'Saint Lucia',
                    'code2' => 'LC',
                    'code3' => 'LCA',
                    'isd_code' => '1758',
                    'currency_code' => 'XCD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '663',
                    'name' => 'Saint Martin (French Part)',
                    'code2' => 'MF',
                    'code3' => 'MAF',
                    'isd_code' => '1',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '666',
                    'name' => 'Saint Pierre And Miquelon',
                    'code2' => 'PM',
                    'code3' => 'SPM',
                    'isd_code' => '508',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '670',
                    'name' => 'Saint Vincent And The Grenadines',
                    'code2' => 'VC',
                    'code3' => 'VCT',
                    'isd_code' => '1784',
                    'currency_code' => 'XCD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '674',
                    'name' => 'San Marino',
                    'code2' => 'SM',
                    'code3' => 'SMR',
                    'isd_code' => '378',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '678',
                    'name' => 'Sao Tome and Principe',
                    'code2' => 'ST',
                    'code3' => 'STP',
                    'isd_code' => '239',
                    'currency_code' => 'STD',
                    'currency_symbol' => 'Db',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '682',
                    'name' => 'Saudi Arabia',
                    'code2' => 'SA',
                    'code3' => 'SAU',
                    'isd_code' => '966',
                    'currency_code' => 'SAR',
                    'currency_symbol' => '﷼',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '686',
                    'name' => 'Senegal',
                    'code2' => 'SN',
                    'code3' => 'SEN',
                    'isd_code' => '221',
                    'currency_code' => 'XOF',
                    'currency_symbol' => 'CFA',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '688',
                    'name' => 'Serbia',
                    'code2' => 'RS',
                    'code3' => 'SRB',
                    'isd_code' => '381',
                    'currency_code' => 'RSD',
                    'currency_symbol' => 'din',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '690',
                    'name' => 'Seychelles',
                    'code2' => 'SC',
                    'code3' => 'SYC',
                    'isd_code' => '248',
                    'currency_code' => 'SCR',
                    'currency_symbol' => 'SR',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '694',
                    'name' => 'Sierra Leone',
                    'code2' => 'SL',
                    'code3' => 'SLE',
                    'isd_code' => '232',
                    'currency_code' => 'SLE',
                    'currency_symbol' => 'Le',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '702',
                    'name' => 'Singapore',
                    'code2' => 'SG',
                    'code3' => 'SGP',
                    'isd_code' => '65',
                    'currency_code' => 'SGD',
                    'currency_symbol' => '$',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '703',
                    'name' => 'Slovakia',
                    'code2' => 'SK',
                    'code3' => 'SVK',
                    'isd_code' => '421',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '704',
                    'name' => 'Vietnam',
                    'code2' => 'VN',
                    'code3' => 'VNM',
                    'isd_code' => '84',
                    'currency_code' => 'VND',
                    'currency_symbol' => 'd',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '705',
                    'name' => 'Slovenia',
                    'code2' => 'SI',
                    'code3' => 'SVN',
                    'isd_code' => '386',
                    'currency_code' => 'SIT',
                    'currency_symbol' => 'SIT',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '706',
                    'name' => 'Somalia',
                    'code2' => 'SO',
                    'code3' => 'SOM',
                    'isd_code' => '252',
                    'currency_code' => 'SOS',
                    'currency_symbol' => 'Sh.',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '710',
                    'name' => 'South Africa',
                    'code2' => 'ZA',
                    'code3' => 'ZAF',
                    'isd_code' => '27',
                    'currency_code' => 'ZAR',
                    'currency_symbol' => 'R',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '716',
                    'name' => 'Zimbabwe',
                    'code2' => 'ZW',
                    'code3' => 'ZWE',
                    'isd_code' => '263',
                    'currency_code' => 'ZWL',
                    'currency_symbol' => 'Z$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '724',
                    'name' => 'Spain',
                    'code2' => 'ES',
                    'code3' => 'ESP',
                    'isd_code' => '34',
                    'currency_code' => 'EUR',
                    'currency_symbol' => '€',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '728',
                    'name' => 'South Sudan',
                    'code2' => 'SS',
                    'code3' => 'SSD',
                    'isd_code' => '211',
                    'currency_code' => 'SSP',
                    'currency_symbol' => 'SSP',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '729',
                    'name' => 'Sudan',
                    'code2' => 'SD',
                    'code3' => 'SDN',
                    'isd_code' => '249',
                    'currency_code' => 'SDG',
                    'currency_symbol' => 'ج.س',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '732',
                    'name' => 'Western Sahara',
                    'code2' => 'EH',
                    'code3' => 'ESH',
                    'isd_code' => '212',
                    'currency_code' => 'MAD',
                    'currency_symbol' => 'Dirham',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '740',
                    'name' => 'Suriname',
                    'code2' => 'SR',
                    'code3' => 'SUR',
                    'isd_code' => '597',
                    'currency_code' => 'SRD',
                    'currency_symbol' => 'Sur$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '744',
                    'name' => 'Svalbard And Jan Mayen',
                    'code2' => 'SJ',
                    'code3' => 'SJM',
                    'isd_code' => '47',
                    'currency_code' => 'NOK',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '748',
                    'name' => 'Swaziland',
                    'code2' => 'SZ',
                    'code3' => 'SWZ',
                    'isd_code' => '268',
                    'currency_code' => 'SGD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '752',
                    'name' => 'Sweden',
                    'code2' => 'SE',
                    'code3' => 'SWE',
                    'isd_code' => '46',
                    'currency_code' => 'SEK',
                    'currency_symbol' => 'kr',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '756',
                    'name' => 'Switzerland',
                    'code2' => 'CH',
                    'code3' => 'CHE',
                    'isd_code' => '41',
                    'currency_code' => 'CHF',
                    'currency_symbol' => 'fr.',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '760',
                    'name' => 'Syrian Arab Republic',
                    'code2' => 'SY',
                    'code3' => 'SYR',
                    'isd_code' => '963',
                    'currency_code' => 'SYP',
                    'currency_symbol' => 'LS',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '762',
                    'name' => 'Tajikistan',
                    'code2' => 'TJ',
                    'code3' => 'TJK',
                    'isd_code' => '992',
                    'currency_code' => 'TJS',
                    'currency_symbol' => 'ЅM',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '764',
                    'name' => 'Thailand',
                    'code2' => 'TH',
                    'code3' => 'THA',
                    'isd_code' => '66',
                    'currency_code' => 'THB',
                    'currency_symbol' => '฿',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '768',
                    'name' => 'Togo',
                    'code2' => 'TG',
                    'code3' => 'TGO',
                    'isd_code' => '228',
                    'currency_code' => 'XOF',
                    'currency_symbol' => 'F.CFA',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '772',
                    'name' => 'Tokelau',
                    'code2' => 'TK',
                    'code3' => 'TKL',
                    'isd_code' => '690',
                    'currency_code' => 'NZD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '776',
                    'name' => 'Tonga',
                    'code2' => 'TO',
                    'code3' => 'TON',
                    'isd_code' => '676',
                    'currency_code' => 'TOP',
                    'currency_symbol' => 'T$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '780',
                    'name' => 'Trinidad and Tobago',
                    'code2' => 'TT',
                    'code3' => 'TTO',
                    'isd_code' => '1868',
                    'currency_code' => 'TTD',
                    'currency_symbol' => 'TT$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '784',
                    'name' => 'United Arab Emirates',
                    'code2' => 'AE',
                    'code3' => 'ARE',
                    'isd_code' => '971',
                    'currency_code' => 'AED',
                    'currency_symbol' => 'د.إ',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '788',
                    'name' => 'Tunisia',
                    'code2' => 'TN',
                    'code3' => 'TUN',
                    'isd_code' => '216',
                    'currency_code' => 'TND',
                    'currency_symbol' => 'د.ت',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '792',
                    'name' => 'Turkey',
                    'code2' => 'TR',
                    'code3' => 'TUR',
                    'isd_code' => '90',
                    'currency_code' => 'TRY',
                    'currency_symbol' => '₺',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '795',
                    'name' => 'Turkmenistan',
                    'code2' => 'TM',
                    'code3' => 'TKM',
                    'isd_code' => '7370',
                    'currency_code' => 'TMT',
                    'currency_symbol' => 'T',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '796',
                    'name' => 'Turks and Caicos Islands',
                    'code2' => 'TC',
                    'code3' => 'TCA',
                    'isd_code' => '1649',
                    'currency_code' => 'USD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '798',
                    'name' => 'Tuvalu',
                    'code2' => 'TV',
                    'code3' => 'TUV',
                    'isd_code' => '688',
                    'currency_code' => 'AUD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '800',
                    'name' => 'Uganda',
                    'code2' => 'UG',
                    'code3' => 'UGA',
                    'isd_code' => '256',
                    'currency_code' => 'UGX',
                    'currency_symbol' => 'USh',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '804',
                    'name' => 'Ukraine',
                    'code2' => 'UA',
                    'code3' => 'UKR',
                    'isd_code' => '380',
                    'currency_code' => 'UAH',
                    'currency_symbol' => '₴',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '807',
                    'name' => 'Macedonia, the Former Yugoslav Republic Of',
                    'code2' => 'MK',
                    'code3' => 'MKD',
                    'isd_code' => '389',
                    'currency_code' => 'MKD',
                    'currency_symbol' => 'DEN',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '818',
                    'name' => 'Egypt',
                    'code2' => 'EG',
                    'code3' => 'EGY',
                    'isd_code' => '20',
                    'currency_code' => 'EGP',
                    'currency_symbol' => 'E£',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '826',
                    'name' => 'United Kingdom',
                    'code2' => 'GB',
                    'code3' => 'GBP',
                    'isd_code' => '44',
                    'currency_code' => 'GBP',
                    'currency_symbol' => '£',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '831',
                    'name' => 'Guernsey',
                    'code2' => 'GG',
                    'code3' => 'GGY',
                    'isd_code' => '44',
                    'currency_code' => 'GGP ',
                    'currency_symbol' => '£',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '832',
                    'name' => 'Jersey',
                    'code2' => 'JE',
                    'code3' => 'JEY',
                    'isd_code' => '44',
                    'currency_code' => 'GBP',
                    'currency_symbol' => '£',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '833',
                    'name' => 'Isle of Man',
                    'code2' => 'IM',
                    'code3' => 'IMN',
                    'isd_code' => '44',
                    'currency_code' => 'IMP',
                    'currency_symbol' => '£',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '834',
                    'name' => 'Tanzania, United Republic of',
                    'code2' => 'TZ',
                    'code3' => 'TZA',
                    'isd_code' => '255',
                    'currency_code' => 'TZS',
                    'currency_symbol' => 'TSh',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '840',
                    'name' => 'United States',
                    'code2' => 'US',
                    'code3' => 'USA',
                    'isd_code' => '1',
                    'currency_code' => 'USD',
                    'currency_symbol' => '$',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '850',
                    'name' => 'Virgin Islands, U.S.',
                    'code2' => 'VI',
                    'code3' => 'VIR',
                    'isd_code' => '1340',
                    'currency_code' => 'USD',
                    'currency_symbol' => '$',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '854',
                    'name' => 'Burkina Faso',
                    'code2' => 'BF',
                    'code3' => 'BFA',
                    'isd_code' => '226',
                    'currency_code' => 'XOF',
                    'currency_symbol' => 'CFA',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '858',
                    'name' => 'Uruguay',
                    'code2' => 'UY',
                    'code3' => 'URY',
                    'isd_code' => '598',
                    'currency_code' => 'UYU',
                    'currency_symbol' => '$U',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '860',
                    'name' => 'Uzbekistan',
                    'code2' => 'UZ',
                    'code3' => 'UZB',
                    'isd_code' => '998',
                    'currency_code' => 'UZS',
                    'currency_symbol' => 'so\'m',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '862',
                    'name' => 'Venezuela, Bolivarian Republic of',
                    'code2' => 'VE',
                    'code3' => 'VEN',
                    'isd_code' => '58',
                    'currency_code' => 'VED',
                    'currency_symbol' => 'Bs.',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '876',
                    'name' => 'Wallis and Futuna',
                    'code2' => 'WF',
                    'code3' => 'WLF',
                    'isd_code' => '681',
                    'currency_code' => 'XPF',
                    'currency_symbol' => 'Franc',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '882',
                    'name' => 'Samoa',
                    'code2' => 'WS',
                    'code3' => 'WSM',
                    'isd_code' => '684',
                    'currency_code' => 'WST',
                    'currency_symbol' => 'SAT',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '887',
                    'name' => 'Yemen',
                    'code2' => 'YE',
                    'code3' => 'YEM',
                    'isd_code' => '967',
                    'currency_code' => 'YER',
                    'currency_symbol' => '﷼',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ],
                    
                    
                [
                    'id' => '894',
                    'name' => 'Zambia',
                    'code2' => 'ZM',
                    'code3' => 'ZMB',
                    'isd_code' => '260',
                    'currency_code' => 'ZMW',
                    'currency_symbol' => 'ZK',
                    'status' => 'archive',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => NULL
                ]
            ]
        );
    }
}
