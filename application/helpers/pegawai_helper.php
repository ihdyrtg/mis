<?php
defined('BASEPATH') or die('No direct script access allowed!');

function pegawai($p = 0)
{
    $pegawai_arr = [
        '1277052010750001' => 'Yusri Fahmi',
        '1277050208870003' => 'Aflah Indra Pulungan',
        '1407055209960004' => 'Darmayanti',
        '1277027101790006' => 'Zuraidah',
        '1277025205960001' => 'Elysa Fitri Pakpahan',
        '1277016706820003' => 'Mutia Handayani',
        '127302531197001' => 'El Shifa Alhafisa Nasution',
        '1277023101800003' => 'Muhammad Ihsan Ritonga',
        '1271094610950001' => 'Suci Syahfifa Nasution',
        '1220041505592000' => 'Jainal Siregar',
        '1213063001193000' => 'Adi Firmansyah',
        '1277051708970001' => 'Faqihuddin Nasution',
        '1213035006960003' => 'Rina Edipa',
        '1213020804820001' => 'Muhammad Nuddin',
        '1277012709960004' => 'Rizqi Nusabbih',
        '1277015701980003' => 'Fatimah Ramadani Gaja',
        '1272034503940002' => 'Diva Rahmadani Damanik',
        '1277011810930003' => 'Kamal Siregar',
        '1277010308960003' => 'Ihdi Syahputra Ritonga',
        '1213214709900001' => 'Erni Wahyuni',
        '1277020510930004' => 'Deni Mas Eko'
    ];

    if ($p !== 0) {
        return $pegawai_arr[$p];
    }
    return $pegawai_arr;
}

function gender($g = 0)
{
    $gender_arr = [
        '1277052010750001' => 'lk',
        '1277050208870003' => 'lk',
        '1277023101800003' => 'lk',
        '1220041505592000' => 'lk',
        '1213063001193000' => 'lk',
        '1277051708970001' => 'lk',
        '1213020804820001' => 'lk',
        '1277012709960004' => 'lk',
        '1407055209960004' => 'pr',
        '1277027101790006' => 'pr',
        '1277025205960001' => 'pr',
        '1277016706820003' => 'pr',
        '127302531197001' => 'pr',
        '1271094610950001' => 'pr',
        '1213035006960003' => 'pr'
    ];

    if ($g !== 0) {
        return $gender_arr[$g];
    }
    return $gender_arr;
}
