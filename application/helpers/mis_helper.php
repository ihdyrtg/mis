<?php
defined('BASEPATH') or die('No direct script access allowed!');

function masterdata($segment2)
{
    $ci = get_instance();
    $segment1 = $ci->uri->segment(1) == "masterdata" && $ci->uri->segment(2) == "$segment2";
    return $segment1;
}

function info($segment2)
{
    $ci = get_instance();
    $segment1 = $ci->uri->segment(1) == "info" && $ci->uri->segment(2) == "$segment2";
    return $segment1;
}

function transaksi($segment2)
{
    $ci = get_instance();
    $segment1 = $ci->uri->segment(1) == "transaksi" && $ci->uri->segment(2) == "$segment2";
    return $segment1;
}

function pelaporan($segment2)
{
    $ci = get_instance();
    $segment1 = $ci->uri->segment(1) == "pelaporan" && $ci->uri->segment(2) == "$segment2";
    return $segment1;
}

function sirkulasi($segment2)
{
    $ci = get_instance();
    $segment1 = $ci->uri->segment(1) == "sirkulasi" && $ci->uri->segment(2) == "$segment2";
    return $segment1;
}

function lokasi($string)
{
    $pemisah = " - ";
    $string = explode($pemisah, $string);
    return $string;
}

function stm($segment3)
{
    $ci = get_instance();
    $segment1 = $ci->uri->segment(1) == "stm" && $ci->uri->segment(2) == "admin" && $ci->uri->segment(3) == "$segment3";
    return $segment1;
}

function infaq($segment3)
{
    $ci = get_instance();
    $segment1 = $ci->uri->segment(1) == "infaq" && $ci->uri->segment(2) == "admin" && $ci->uri->segment(3) == "$segment3";
    return $segment1;
}

function car_del($tanggal)
{
    $result = preg_replace("/[^0-9]/", "", $tanggal);
    return $result;
}
