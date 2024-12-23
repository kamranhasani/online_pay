<?php

namespace   Kamranhasani\Settarehpay\settareh;

interface interface_settareh
{
public function DB();
public function insertzero_pay($name,$size,$color,$price,$number,$info,$id_online);
public function searchzero($id);
public function updatezwer($name,$size,$color,$price,$number,$info,$id_online);
public function selectzero();
public function fetchzero();
public function selectone_pay();
public function fetch_pay();
public function selecttwo_pay($name);
public function fetchtwo_pay();
public function insertuser($name,$family,$email,$address,$phone,$zipcode,$date);
public function show_user($code);
public function deleteall();
public function delete_one($id);
public function countrow();








}












?>